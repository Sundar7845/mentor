<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ForgotPasswordController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\MediaImageController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\QuestionsController;
use App\Http\Controllers\Api\ViewCompanyController;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Middleware\LeaderboardMiddleware;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
   // return $request->user();
//});

// login and register api
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::post('password', [UserController::class, 'createpassword']);

//reset password
Route::post('forgotpassword', [ForgotPasswordController::class, 'sendResetLinkResponse']);
Route::post('password', [ForgotPasswordController::class, 'sendResetResponse']);
Route::post('notification', [ForgotPasswordController::class, 'sendPasswordResetNotification']);

// Write Api for company

Route::group(['middleware' => ['auth:api']], function () {
    
	Route::post('logout',[UserController::class, 'logout']);
    Route::post('company/store', [CompanyController::class, 'store']);
    Route::post('company/update', [CompanyController::class, 'update']);
    Route::post('post/store', [PostController::class, 'store']);
    Route::get('viewcompany/show/{id}', [ViewCompanyController::class, 'show']);
    Route::post('userprofile',[UserController::class,'ProfileResponse']);
    Route::get('viewprofile',[UserController::class,'show']);
	Route::post('question/add',[QuestionsController::class,'getQuestionAnswer']);
    Route::post('categories/questions',[CategoriesController::class,'categorizethequestion']);
    Route::post('top/question',[QuestionsController::class,'TopQuestions']);
    Route::post('question/feed',[QuestionsController::class,'questionFeed']);
    Route::post('landing/page',[QuestionsController::class,'landingpage']);
	Route::get('get/answers',[QuestionsController::class,'getAnswersForQuestions']); 
	Route::post('question/answer',[QuestionsController::class,'answerforquestions']);
    Route::get('search/{name}',[QuestionsController::class,'search']);
	Route::get('question/answer/{id}',[QuestionsController::class,'viewAnswer'])->name('answer.viewAnswer');
    Route::post('question/upvote',[QuestionsController::class,'upVote']);
    Route::post('answer/reaction',[QuestionsController::class,'reaction']);
    Route::get('leaderboard', [QuestionsController::class,'leaderboard']);
    Route::get('audio/logo',[QuestionsController::class,'audio']);

    // Route::middleware([LeaderboardMiddleware::class])->group(function(){

    //     Route::get('leaderboard', [QuestionsController::class,'leaderboard']);
    
    // });
    Route::get('image/{id}', [ImageController::class,'displayImage'])->name('logo.displayImage');
    Route::get('post/media/{post_id}', [MediaImageController::class,'mediaImage'])->name('media_url.mediaImage');
    Route::get('user/profile/images/{id}', [ImageController::class,'profilephoto'])->name('photo.ProfileLogo');
    Route::get('question/answer',[ImageController::class,'viewAnswer'])->name('answer.viewAnswers');
    Route::get('top/question/{id}',[ImageController::class,'ViewQuestion'])->name('question.viewQuestion');
    Route::get('company/logo/{id}',[ImageController::class,'companyLogo'])->name('logo.companyLogo');
    Route::get('answer/media/{id}',[ImageController::class,'mediafile'])->name('answer.mediafile');
});

    


