<?php

namespace App\Repositories;

use App\Http\Requests\QuestionRequest;
use App\Http\Requests\ReactionRequest;
use App\Http\Requests\UpvoteRequest;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\QuestionInterface;
use App\Models\Answer;
use App\Models\Category;
use App\Models\Company;
use App\Models\Emotion;
use App\Traits\ResponseAPI;
use App\Models\Question;
use App\Models\QuestionAssociation;
use App\Models\TopKeywords;
use App\Models\UpVote;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\UserReaction;
use Illuminate\Support\Facades\DB;


class QuestionRepository implements QuestionInterface
{    
    use ResponseAPI;

    public function getQuestionAnswer(QuestionRequest $request)
    {
      DB::beginTransaction();
      
      Question::create([
        'question' => $request->question,
        'created_by'=> Auth::user()->id,
        'category_id' => $request->category_id,
        'emotion_id' => $request->emotion_id,
        'question_association_id'=> $request->question_association_id
      ]);
      

      DB::commit();
      $data['question'] = $request->question;
      $data['user_id'] = Auth::user()->id;
      $data['category_id'] = $request->category_id;
      $data['emotion_id'] = $request->emotion_id;
      $data['question_association'] = $request->question_association_id;

      $message = "Question Stored Successfully";
      return response()->json(['status' => true, 'message' =>  $message ], 200);
    }

    public function questionFeed()
    {
      $responseData=[];
      $responseData['questions_feeds']=[];
      $questionCollection=Question::get();
      foreach($questionCollection as $question)
      {
        $profile_logo = UserProfile::where('id',$question->id)->pluck('photo')->first();
        $profile_picture = url('api/user/profile/images').'/'.$question->created_by;

        $Answer_link = Answer::where('id',$question->id)->pluck('media')->first();
        $Answer_url = url('/api/question').'/'.$question->id.'/answer';

        $questionDetails['id']=$question->id;
        $questionDetails['question']=$question->question;
        $userDetails=User::where('id',$question->created_by)->first();
        $questionDetails['user_name']=$userDetails->firstname.' '.$userDetails->lastname;
        $questionDetails['category']=Category::where('id',$question->category_id)->pluck('job_title')->first();
        $questionDetails['emotion']=Emotion::where('id',$question->emotion_id)->pluck('emotion')->first();
        $questionDetails['questionAssociation']=QuestionAssociation::where('id',$question->question_association_id)
        ->pluck('question_association')->first();
        $questionDetails['profile_picture']=isset($profile_logo)?$profile_picture:null;
        //$questionDetails['answers']=isset($Answer_link)?$Answer_url:null;
        array_push($responseData['questions_feeds'],$questionDetails);
      }
      $message = "Question feed listed successfully";
      return response()->json(['status' => true,'message' =>$message, 'data' =>  $responseData ], 200); 
      
    }

    public function landingpage()
    {

      $responseData=[];

      $responseData['questions']=[];
      $questionCollection=Question::get();
      foreach($questionCollection as $question)
      {
        $questionDetails['question']=$question->question;
        $questionDetails['link']=url('/api/question').'/'.$question->id.'/answer';
        array_push($responseData['questions'],$questionDetails);
      }

      $responseData['keywords']=[];
      $keywordCollection=TopKeywords::get();
      foreach($keywordCollection as $keyword)
      {
        $keyworddetails['id']=$keyword->id;
        $keyworddetails['keyword']=$keyword->keywords;
        array_push($responseData['keywords'],$keyworddetails);
      }

      $responseData['company']=[];
      $companycollection=Company::get();
      foreach($companycollection as $company)
      {
        $company_logo = Company::where('user_id',$company->user_id)->pluck('logo')->first();
        $company_picture = url('api/company/logo').'/'.$company->id;

        $companyDetails['id']=$company->id;
        $companyDetails['name']=$company->name;
        $companyDetails['logo']=isset($company_logo)?$company_picture:null;
        array_push($responseData['company'],$companyDetails);
      }
      $message = "success";
      return response()->json(['status' => true ,'message' => $message,'data' => $responseData] ,200);

    }

    public function getAnswersForQuestions()
    {
     $responseData = [];
     $responseData['questions_with_answers']=[];
     $questionCollection=Question::get();
     foreach($questionCollection as $question)
     {
      
      $profile_logo = UserProfile::where('user_id',$question->created_by)->pluck('photo')->first();
      $profile_picture = url('api/user/profile/images').'/'.$question->created_by;

      $userDetails=User::where('id',$question->created_by)->first();
      $questionDetails['user_name']=$userDetails->firstname.' '.$userDetails->lastname;
      $questionDetails['question_id']=$question->id;
      $questionDetails['question']=$question->question;
      $questionDetails['created_by']=$question->created_by;
      $questionDetails['profile_logo']=isset($profile_logo)?$profile_picture:null;

      $categoryDetails = Category::where('id',$question->category_id)->pluck('job_title')->first();
      $questionDetails['category_id'] =$question->category_id;
      $questionDetails['job_title'] = $categoryDetails;

      $emotionDetails = Emotion::where('id',$question->emotion_id)->pluck('emotion')->first();
      $questionDetails['emotion_id'] =$question->emotion_id;
      $questionDetails['emotion'] = $emotionDetails;

      $associationDetails = QuestionAssociation::where('id',$question->question_association_id)->pluck('question_association')->first();
      $questionDetails['question_association_id'] =$question->question_association_id;
      $questionDetails['question_association'] = $associationDetails;     

      $answerCollections = Answer::where('question_id',$question->id)->get();
      $answerDetails=[];
      $questionDetails['answer']=[];
      foreach($answerCollections as $answer)
      {
        $profile_logo = UserProfile::where('user_id',$answer->answer_by)->pluck('photo')->first();
        $profile_picture = url('api/user/profile/images').'/'.$answer->answer_by;

        $answerDetails['answer_id'] = $answer->id;
        $userDetails=User::where('id',$answer->answer_by)->first();
        $answerDetails['answer_by']=$userDetails->firstname.' '.$userDetails->lastname;
        $answerDetails['profile_logo']=isset($profile_logo)?$profile_picture:null;
        $answerDetails['answer']=url('api/answer/media').'/'.$answer->id;
        $answerDetails['comments']=$answer->comments;
        $answerDetails['created_at']=$answer->created_at;

      $reactionDetails=[];
      $answerDetails['reaction']=[];
      
        $reaction_counts = UserReaction::where('answer_id',$answer->id)->get();

        $like = 0;
        $heart = 0;
        $smiley = 0;
        $clap = 0;
        $brilliant =0;

        foreach($reaction_counts as $reaction){

          if($reaction->reaction_id == 1){
            $like++;
          }
          elseif($reaction->reaction_id == 2){
            $heart++;
          }elseif($reaction->reaction_id == 3){
            $smiley++;
          }elseif($reaction->reaction_id == 4){
            $clap++;
          }elseif($reaction->reaction_id == 5){
            $brilliant++;
          }  
          

        }
          $reactionDetails['like'] = $like;
          $reactionDetails['heart'] = $heart;
          $reactionDetails['smiley'] = $smiley;
          $reactionDetails['clap'] = $clap;
          $reactionDetails['brilliant'] = $brilliant;
          array_push($answerDetails['reaction'],$reactionDetails);

       
      
        array_push($questionDetails['answer'],$answerDetails);
      }
        array_push($responseData['questions_with_answers'],$questionDetails);
    }
    
    $message = "Data retrieved successfully.";
    return response()->json(['status' => true ,'message' => $message,'data' => $responseData] ,200);
  }
  public function leaderBoard()
  {
    $responseData=[];

    $responseData['mentor']=[];
    $mentors=User::where('userrole_id','=','1')->get();
    foreach($mentors as $mentor)
    {
      $mentorprofile = UserProfile::where('user_id',$mentor->id)->pluck('photo')->first();
      $mentor_profile_logo = url('api/user/profile/images').'/'.$mentor->id;

      $mentorDetails['profile_logo']=isset($mentorprofile)?$mentor_profile_logo:null;
      $mentorDetails['name']=$mentor->firstname.' '.$mentor->lastname;
      $mentorDetails['points']="0";
      $mentorDetails['ranking']="0";
      array_push($responseData['mentor'],$mentorDetails);
    }
    $responseData['mentee']=[];
    $mentees=User::where('userrole_id','=','2')->get();
    foreach($mentees as $mentee)
    {

      $menteeprofile = UserProfile::where('user_id',$mentee->id)->pluck('photo')->first();
      $mentee_profile_logo = url('api/user/profile/images').'/'.$mentee->id;

      $menteeDetails['profile_logo']=isset($menteeprofile)?$mentee_profile_logo:null;
      $menteeDetails['name']=$mentee->firstname.' '.$mentee->lastname;
      $menteeDetails['points']="0";
      $menteeDetails['ranking']="0";
      array_push($responseData['mentee'],$menteeDetails);
    }
    
    $message = "success";

    return response()->json(['status' => true, 'message'=> $message, 'data'=>$responseData], 200);
  }

  public function search($question)
  {
    
    $responseData=[];
    $results = Question::where('question', 'LIKE', '%'. $question. '%')->select('question','id')->get();
    foreach($results as $result)
    {
      $searchDetails['id'] = $result->id;
      $searchDetails['question'] = $result->question;
      $searchDetails['link'] = url('api/question').'/'.$result->id.'/answer';
      array_push($responseData,$searchDetails);
    }
    if(count($results)){
      $message = "success";
      return Response()->json(['status' => true, 'message' =>$message,'data'=> $responseData]);
    }
    else
    {
      return response()->json(['status' => false,'message' => 'No Data not found'], 404);
    }
    
  }
  public function viewAnswer($id)
  {
    $responseData = [];
    $responseData['question_answer']=[];
    $questionCollection=Question::where('id',$id)->pluck('question')->first();
    $userDetails=User::where('id',$id)->first();
    $questionDetails['question']=$questionCollection;
    $answerCollections = Answer::where('question_id',$id)->get();
    $answerDetails=[];
    $questionDetails['answer']=[];
    foreach($answerCollections as $answer)
    {
      
      $profile_logo = UserProfile::where('user_id',$answer->answer_by)->pluck('photo')->first();
      $profile_picture = url('api/user/profile/images').'/'.$answer->answer_by;

      
      $userDetails=User::where('id',$answer->answer_by)->first();
      $answerDetails['answer_by']=$userDetails->firstname.' '.$userDetails->lastname;
      $answerDetails['media']=url('api/answer/media').'/'.$answer->id;
      $answerDetails['comments']=$answer->comments;
      $answerDetails['created_at']=$answer->created_at;
      $answerDetails['profile_logo']=isset($profile_logo)?$profile_picture:null;
      array_push($questionDetails['answer'],$answerDetails);
    }

      $responseData['question_answer']=$questionDetails;

    $message = "Successfully Answer Listed";
    return response()->json(['message' => $message, 'data' =>  $responseData ], 200);
  }

    public function upVote(UpvoteRequest $request)
    {  
     
        $upvote = UpVote::where('question_id',$request->question_id)->where('upvote_by',Auth::user()->id)->pluck('id')
       ->first();
  
      
        if($upvote){
            $result = UpVote::where('id',$upvote)->delete();
            $responseData['status']=true;
            $responseData['message'] = "Downvote Successfully";
            return response()->json($responseData);
        }else{
            $upvote_by = Upvote::create([
              'question_id' => $request->question_id,
              'upvote_by' => Auth::user()->id,
              'status' => '1'
          ]);

          $responseData['status']=true;
          $responseData['message'] = "Upvote Successfully";
       
        $data = array(
          "question_id" => $upvote_by['question_id'],
          "upvote_by" => $upvote_by['upvote_by'],
          "status" => $upvote_by['status']
        );
        
        $responseData['data']=$data;
        }

        return response()->json($responseData);
    }

    public function Reaction(ReactionRequest $request)
    {

      $reaction = UserReaction::updateorcreate([
        'reaction_by' => Auth::user()->id,
        'answer_id' => $request->answer_id
      ],

      [
        'reaction_id' => $request->reaction_id
      ]);

      $responseData['status']=true;
      $responseData['message'] = "Reactions Created Successfully";
      $data = array(
        "answer_id" => $reaction['answer_id'],
        "reaction_id" => $reaction['reaction_id'],
        "reaction_by" => $reaction['reaction_by']
      );

      $responseData['data']=$data;
      return response()->json($responseData);
    }

    public function audio()
    {
      
    }

}