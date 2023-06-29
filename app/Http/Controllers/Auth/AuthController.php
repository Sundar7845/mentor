<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }

    public function dashboard()
    {
        return view('pages.dashboard');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                ->withSuccess('You have Successfully loggedin');
        }

        return redirect("login")->witherrors('Opps! You have entered invalid credentials');
    }

    public function postRegistration(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phonenumber' => 'required',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }

    // public function dashboard()
    // {

    //     if (Auth::check()) {
    //         return view('dashboard');
    //     }
    //     return redirect("login")->withSuccess('Opps! You do not have access');
    // }

    public function create(array $data)
    {

        return User::create([
            'firstname' => $data['first_name'],
            'lastname' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phonenumber' => $data['phonenumber'],
        ]);
    }


    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }

    public function leaderboard()
    {
        $leaderboard =User::get();
        return view('pages.leaderboard',compact('leaderboard'));
    }

    public function topquestion()
    {
        $topQuestion = Question::join('Users','Users.id','question.id')->get();
        return view('pages.top-question',compact('topQuestion'));
    }

    public function askquestion()
    {
        $askQuestion = Question::join('Users','Users.id','question.id')->get();
        return view('pages.ask-question',compact('askQuestion'));
    }

    public function mentor()
    {
        $mentors = User::where('userrole_id','=','1')->get();
        return view ('pages.mentors',compact('mentors'));
    }

    public function mentee()
    {
        $mentees= User::where('userrole_id','=','2')->get();
        return view ('pages.mentees',compact('mentees'));
    }

    
}