<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function register(Request $request)
    {
        $validator = validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|min:3',
            //'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            // 'phonenumber' => 'nullable|min:10|numeric',
            // 'userrole_id' => 'required',
            // 'disclaimer' => 'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => implode(",",$validator->errors()->all())], 400);
        }

        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            //'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phonenumber' => $request->phonenumber,
            'userrole_id' => $request->userrole_id,
            'disclaimer' => $request->disclaimer
        ]);

        return response()->json(['status' => true, 'message' => 'Registered Successfully'], 200);
    }

    public function login(Request $request)
    {
        $validator = validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
            // 'fcm' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => implode(",",$validator->errors()->all())], 400);
        }

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('mentor')->accessToken;
            $user_id = auth()->user()->id;
            $user_firstname = auth()->user()->firstname;
            $user_lastname = auth()->user()->lastname;
            $user_name = $user_firstname . ' ' . $user_lastname;
            $userrole_id = auth()->user()->userrole_id;
            $user_profile=url('/api/user/profile/images/'.$user_id);

           $fcm = User::where('id', '=',$user_id)->update([
            'fcm' => $request->fcm
           ]);

            $responseData['status']=true;
            $responseData['message']='Logged in Successfully';
            $userCollection = array("id" => $user_id, "name" => $user_name, "user_profile" => $user_profile, "userrole_id" => $userrole_id, "token" => $token, "fcm" => $request->fcm );
            $responseData['data']=$userCollection;
            return response()->json($responseData, 200);
        } else {
            return response()->json(['status' => false, 'message' => 'User does not exist please sign up'], 401);
        }
    }

    public function createpassword(Request $request)
    {
        $validator = validator::make($request->all(), [
            'password' => 'required|min8',
            'confirmpassword' => 'required|samepassword'
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'error' => $validator->errors()], 400);
        }
    }

    //UserProfile Update

    public function ProfileResponse(Request $request)
   {
    $validator = Validator::make($request->all(), [
        'id' => 'required',
        'photo' => 'required',
        'title' => 'required',
        'about' => 'required',
        'experience' => 'required',
        'location' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json(['status' => false, 'message' => implode(",",$validator->errors()->all())], 400);
    }
        
        $file = $request->file('photo');
        $input['photo'] = time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = storage_path('public/images/');
        $file->move($destinationPath, $input['photo']);
        
        $post = UserProfile::updateOrCreate([
            'user_id' => auth()->user()->id
        ], [
            'title' => $request->title,
            'photo' => $input['photo'],
            'about' => $request->about,
            'location' => $request->location,
            'experience' => $request->experience,
        ]);

        $photo = url('/api/user/profile/images/' . auth()->user()->id);

        $userName = User::where('id', '=', auth()->user()->id)->select('firstname','lastname')->first();
            $fname= $userName->firstname;
            $lname= $userName->lastname;
            $UserName=$fname . ' ' . $lname;
        
        $responseData['status']=true;
        $responseData['message']='Updated Successfully';
        $UserProfileCollection = array(
            "photo" => $photo, 
            "user_name" => $UserName, 
            "title" => $post['title'], 
            "location" => $post['location'], 
            "experience" => $post['experience'], 
            "about" => $post['about']
        );
        $responseData['data']=$UserProfileCollection;
        return response()->json($responseData);
   }

   // UserProfile GET Method

   public function show()
    {
       $id=auth()->user()->id;
       $userCollection=UserProfile::where('user_id',$id)->select('title','photo','about','location','experience')->first();
       
       $userName = User::where('id', '=', $id)->select('firstname','lastname')->first();
            $fname= $userName->firstname;
            $lname= $userName->lastname;
            $UserName=$fname . ' ' . $lname;

       $photo=url('/api/user/profile/images/' . $id);
       $profileDetails['photo']=isset($userCollection)?$photo:null;
       $profileDetails['user_name']=$UserName;
       $profileDetails['title']=isset($userCollection->title)?$userCollection->title:null;
       $profileDetails['location']=isset($userCollection->location)?$userCollection->location:null;
       $profileDetails['experience']=isset($userCollection->experience)?$userCollection->experience:null;
       $profileDetails['about']=isset($userCollection->about)?$userCollection->about:null;

       $answerDetails=[];
       $profileDetails['questions_answered']=$answerDetails;

        $responseData['status']=true;
        $responseData['message']='Successful';
        $responseData['data']=$profileDetails;
        return response()->json($responseData);
    }

    public function logout()
{
    auth()->user()->token()->revoke();
    return response()->json([
        'status' => 'true',
        'message' => 'Successfully logged out'
    ],200);
}


public function dashboard()
{
    return view('pages.dashboard');
}

    public function create()
    {
        return view('pages.create_user');
    }
}