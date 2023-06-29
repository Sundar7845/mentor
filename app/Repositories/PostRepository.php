<?php

namespace App\Repositories;

use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\PostInterface;
use App\Models\Post;
use App\Models\Postmedia;
use App\Models\Company;
use DB;

class PostRepository implements PostInterface
{
    public function requestPost(PostRequest $request)
    {
        DB::beginTransaction();

        $user_id = Auth::user()->id;
        $company = Company::where('user_id','=',$user_id)->select('id')->first();

        $post = new Post();

        $post->title=$request->title;
        $post->comment=$request->comment;
        $post->posted_by_id = Auth::user()->id;
        $post->company_id = $company->id;

        if(request()->post_type_id==1)
        {
            $allowedMimeTypes = ['image/jpeg','image/gif','image/png'];
            $contentType = $request->file('media_url');
            $input['media_url'] = $contentType->getClientMimeType();
    
           if(! in_array($input['media_url'], $allowedMimeTypes) ){
                $media_type = "2";
            }else{
                $media_type = "1";
            }
            
            $file = $request->file('media_url');
            $input['media_url'] = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = storage_path('public/post_media/');
            $file->move($destinationPath, $input['media_url']);

            $post->post_type_id = 1;
            $post->save();
            
            $post_media = new Postmedia();
            $post_media->post_id = $post->id;
            $post_media->media_type_id = $media_type;
            $post_media->media_url = $input['media_url'];
            $post_media->save();

            $media = url('/api/post/media/' . $post_media->post_id);

            DB::commit();
            $responseData['status']=true;
            $responseData['message']='Post Created Successfully';
            $postCollection = array("title" => $post['title'], "comment" => $post['comment'], "media_url" => $media);
            $responseData['data']=$postCollection;
            return response()->json($responseData);
        }

        if(request()->post_type_id==2)
        {
            $post->post_type_id = 2;
            $post->qualification=$request->qualification;
            $post->experience=$request->experience;
            $post->salary_min=$request->salary_min;
            $post->salary_max=$request->salary_max;
            $post->save();

            DB::commit();
            $responseData['status']=true;
            $responseData['message']='Job Post Created Successfully';
            $postCollection = array("title" => $post['title'], "comment" => $post['comment'], "qualification" => $post['qualification'], "experience" => $post['experience'], "salary_min" => $post['salary_min'], "salary_max" => $post['salary_max']);
            $responseData['data']=$postCollection;
            return response()->json($responseData);
        }
    }
}