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

//Admin Route Group
Route::prefix('admin')->namespace('Web\Backend\Admin')->group(function(){

    // Admin Dashboard Controller Showing for Admin Dashboard
    Route::get('/dashboard','AdminDashboardController@index')->name('admin.dashboard');

    //Question Controller For Admin
     Route::resource('question','QuestionController');

});



//Frontend Group Controller
 Route::namespace('Web\Frontend')->group(function(){
     Route::get('/','FrontendController@index');
     Route::get('/category/{type}','CategoryController@showCategory');
     Route::post('/answer','AnswerController@store')->name('answer.store');
 });