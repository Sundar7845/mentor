<?php

namespace App\Repositories;

use App\Http\Requests\UserRequest;
use App\Interfaces\UserInterface;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserInterface
{
    public function dashboard()
    {
        return view('pages.dashboard');
    }

    public function create()
    {
        return view('pages.create_user');
    }

    public function storeUser(UserRequest $request)
    {
       $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
            'phonenumber' => $request->phonenumber,
            'userrole_id' => $request->userrole_id,
        ]);

        $file = $request->file('photo');
        $input['photo'] = time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = storage_path('public/images/');
        $file->move($destinationPath, $input['photo']);

        UserProfile::create([
            'user_id' => $user->id,
            'photo' => $input['photo'],
            'title' => $request->title,
            'about' => $request->about,
            'experience' => $request->experience,
            'location' => $request->location,
        ]);
        return back()->with('message', 'User has been Created');
    }
    
    public function getMentor()
    {
        $user = User::where('userrole_id','=',"1")->leftjoin('userprofile','userprofile.user_id','Users.id')
          ->select('Users.*','userprofile.photo','userprofile.title','userprofile.about',
          'userprofile.experience','userprofile.location')
         ->get();
        return view('pages.mentor_report', compact('user'));
    }

    public function getMentee()
    {
        $user = User::where('userrole_id','=', "2")->leftjoin('userprofile','userprofile.user_id','Users.id')
          ->select('Users.*','userprofile.photo','userprofile.title','userprofile.about',
          'userprofile.experience','userprofile.location')
         ->get();
        return view('pages.mentee_report', compact('user'));
    }

    public function edit($id)
    {
   
       
        $user = User::find($id); 
        $userprofile = User::leftjoin('userprofile','userprofile.user_id','Users.id')
        ->select('Users.*','userprofile.photo','userprofile.title','userprofile.about',
        'userprofile.experience','userprofile.location')
        ->where('Users.id',$id)
       ->get();
      // dd($user_profile);
        return view('pages.user_edit', compact('user','userprofile'));
    }

    public function requestUser(UserRequest $request, $id)
    {
        User::where('id', $id)->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
            'phonenumber' => $request->phonenumber,
            'userrole_id' => $request->userrole_id,
        ]);

        $file = $request->file('photo');
        $input['photo'] = time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = storage_path('public/images/');
        $file->move($destinationPath, $input['photo']);

        UserProfile::where('user_id', $id)->update([
            'user_id' => $id,
            'photo' => $input['photo'],
            'title' => $request->title,
            'about' => $request->about,
            'experience' => $request->experience,
            'location' => $request->location,
        ]);

        // $user = User::find($id);
        // $user->fill($request->all());
        // $user->save();
        return redirect()->route('mentor_report')->with('message', 'User has been updated');
    }

    public function deleteUser($id)
    {
        User::where('id',$id)->delete();
        UserProfile::where('user_id',$id)->delete();
        return back()->with('message', 'User has been deleted');
    }
}