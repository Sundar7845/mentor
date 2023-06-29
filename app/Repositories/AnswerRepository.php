<?php

namespace App\Repositories;


use App\Interfaces\AnswerInterface;
use App\Models\Answer;
use App\Traits\ResponseAPI;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AnswerRequest;


class AnswerRepository implements AnswerInterface    
{
    use ResponseAPI;

public function answerforquestions(AnswerRequest $request)
  {

    DB::beginTransaction();
    
    $file = $request->file('media');
    $input['media'] = time() . '.' . $file->getClientOriginalExtension();
    $destinationPath = storage_path('public/media/');
    $file->move($destinationPath, $input['media']);
    $answerCollections= Answer::create([
      'answer_by' => Auth::user()->id,
      'question_id' => $request->question_id,
      'media' => $input['media'],
      'comments' => $request->comments
    ]);

    DB::commit();
    $media = url('api/answer/media').'/'.$answerCollections->id;
    $data['answer_by'] = Auth::user()->id;
    $data['question_id'] = $request->question_id;
    $data['media'] = $media;
    $data['comments'] = $request->comments;
    $message = "answer stored successfully";
    return response()->json(['status' => true, 'message'=> $message ],200);
  }
}