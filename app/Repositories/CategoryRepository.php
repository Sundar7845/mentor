<?php

namespace App\Repositories;


use App\Interfaces\CategoryInterface;
use App\Models\Category;
use App\Models\Emotion;
use App\Models\QuestionAssociation;
use App\Traits\ResponseAPI;





class CategoryRepository implements CategoryInterface    
{
    use ResponseAPI;

public function categorizethequestion()
  {
    try {
        $data['category'] = Category::select('id','job_title as label')->get();
        $data['emotion'] = Emotion::select('id','emotion as label')->get();
        $data['QuestionAssociation'] = QuestionAssociation::select('id','question_association as label')->get();
        $message = "success";
    return response()->json(['status' => true,'message' => $message, 'data' => $data], 200);
    } catch (\Exception $e) {
        return $this->error($e->getMessage(), $e->getCode());
    }
   
  }
}