<?php

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



//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Admin Dashboard Routes Group
Route::prefix('admin')->namespace('Web\Backend\Admin')->group(function(){

    // Admin Dashboard Controller Showing for Admin Dashboard
    Route::get('/dashboard','AdminDashboardController@index')->name('admin.dashboard');

    //Question Controller For Admin
     Route::resource('question','QuestionController');

        //In this route Our honorable admin see this list of the filter answer .
     Route::get('/filterAnswer','FilterAnswerController@filterAnswer')->name('answer.filter');

      //In this route Our Honorable Admin see the filter answer
     Route::get('/filterAnswer/{filterAnswer}','FilterAnswerController@showFilterAnswer');


     //In this route Our Honorable admin Remove the filter answer
     Route::delete('/filterAnswer/{filterAnswer}','FilterAnswerController@deleteFilterAnswer');


     //Our Honorable Admin see the last five question answer and user  list
      Route::get('/answer','AnswerController@index')->name('answer.list');

      //Our Honorable Admin Remove all question answer with empty values past 24 hours
      Route::get('/remove','RemoveQuestionController@index')->name('remove.index');
      Route::delete('/remove','RemoveQuestionController@destroy')->name('remove.index');





});


  ////Admin Login Route Group
Route::prefix('/admin')->namespace('Auth')->group(function(){

    //Here this is the AdminLogin Controller .in this controller admin show the login form
    Route::get('login','AdminLoginController@create')->name('admin.login');

    //Our Admin Successfully Login in this Route
    Route::post('login','AdminLoginController@adminLogin')->name('admin.login.submit');

    //This Route Working with logout our Admin
    Route::post('logout','AdminLoginController@logout')->name('admin.logout');


});





//Frontend Routes Group Controller
 Route::namespace('Web\Frontend')->group(function(){
     Route::get('/','FrontendController@index');
     Route::get('/category/{type}','CategoryController@showCategory');
     Route::post('/answer','AnswerController@store')->name('answer.store');
 });