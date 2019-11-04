<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Here We Change mapApiRoutes() in the Providers/RouteServiceProvider.php file for namespace.
Route::apiResource('/answer','QuestionAnswerController');
//http://127.0.0.1:8000/api/answer is is the end point of all Question ans with Paginate


//Route for update a question
Route::apiResource('/question','QuestionController');
 //http://127.0.0.1:8000/api/question/{id} this is the End point of Update a Question