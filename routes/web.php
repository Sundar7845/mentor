<?php


use App\Http\Controllers\api\PostManagementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\api\UserPostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', function()
// {
    //    return view('pages.dashboard');
    // });
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::get('leaderboard',[AuthController::class,'leaderboard'])->name('leaderboard');
    Route::get('top-question',[AuthController::class,'topquestion'])->name('topquestion');
    Route::get('ask-question',[AuthController::class,'askquestion'])->name('askquestion');
 
    Route::get('mentor',[AuthController::class,'mentor'])->name('mentor');
    Route::get('mentee',[AuthController::class,'mentee'])->name('mentee');
    //Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
    //Route::get('dashboard', [AuthController::class, 'dashboard']);
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('registration', [AuthController::class, 'registration'])->name('register');
    Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');


    Route::group(['middleware' => ['auth:web']], function () {
        Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
        Route::get('create',[UserController::class, 'create'])->name('create_user');
        Route::post('store',[UserController::class, 'store'])->name('store');
        Route::get('mentor',[UserController::class, 'mentor'])->name('mentor_report');
        Route::get('mentee',[UserController::class, 'mentee'])->name('mentee_report');
        Route::get('edit/{id}',[UserController::class, 'edit'])->name('user_edit');
        Route::patch('/update/{id}',[UserController::class, 'update'])->name('update');
        Route::delete('/delete/{id}',[UserController::class, 'destroy'])->name('delete');
        Route::get('user/profile/images/{id}', [ImageController::class,'profilephoto'])->name('photo.ProfileLogos');
    });

    // post management
    Route::resource('postmanagement',PostManagementController::class);
    Route::post('post/management',[PostManagementController::class,'index'])->name('post.management');
    // Route::get('post/create',[PostManagementController::class,'create'])->name('post.create');
    // Route::post('post/store',[PostManagementController::class,'store'])->name('post.store');   
    // Route::get('post/{id}/edit',[PostManagementController::class,'edit'])->name('post.edit');
    // Route::post('post/update/{id}',[PostManagementController::class,'update'])->name('post.update');
    Route::get('post/destroy/{id}',[PostManagementController::class,'destroy'])->name('post.destroy');

    // user post management

    Route::resource('userpost',UserPostController::class);
    Route::get('user/post',[UserPostController::class,'index'])->name('user.post');
    // Route::get('user/create',[UserPostController::class,'create'])->name('user.create');
    // Route::post('user/store',[UserPostController::class,'store'])->name('user.store');   
    // Route::get('user/{id}/edit',[UserPostController::class,'edit'])->name('user.edit');
    // Route::post('user/update/{id}',[UserPostController::class,'update'])->name('user.update');
    Route::get('user/destroy/{id}',[UserPostController::class,'destroy'])->name('user.destroy');
