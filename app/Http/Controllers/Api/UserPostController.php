<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $user_posts = Post::leftjoin('users','users.id', 'posts.posted_by_id')
       ->leftjoin('companies','companies.id','posts.company_id')
       ->leftjoin('posttypes','posttypes.id','posts.post_type_id')
       ->leftJoin('postmedia','posts.id','postmedia.post_id')
       ->select('posts.*','companies.company_name','users.firstname','users.lastname',
       'posttypes.type','postmedia.media_url')
       ->get();

       return view ('userpost.index',compact('user_posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('userpost.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required|max:255',
        //     'comment' => 'required|max:255',
        //     //'media_url' => 'required'
        //    ]);

        //    $file = $request->file('media_url');
        //    $input['media_url'] = time() . '.' . $file->getClientOriginalExtension();
        //    $destinationPath = storage_path('public/images/');
        //    $file->move($destinationPath, $input['media_url']);
    
        //    Post::create($request->all());
    
        //    return redirect()->route('userpost.index')->
        //             with('success','post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $post = Post::find($id);
        // return view ('userpost.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'title' => 'required|max:255',
        //     'comment' => 'required|max:255',
        //     //'media_url' => 'required'
        //    ]);
    
        //    $post = Post::find($id);
        //    $post->fill($request->all());
        //    $post->save();
        //    return redirect()->route('userpost.index')->with('success','post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post = Post::find($id);
      $post->delete();
      return redirect()->back()->with('danger','post deleted successfully');
    }
}
