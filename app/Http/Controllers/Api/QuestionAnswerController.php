<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionAnswerCollection;
use App\Http\Resources\QuestionAnswerResource;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionAnswerController extends Controller
{

    public function index()
    {

        //Here We Use QuestionAnswerCollection Resource for get Well Organize Data.
          return new QuestionAnswerCollection(Answer::orderBy('id', 'desc')->with('question')->paginate(5));

    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {

        return new QuestionAnswerCollection(Answer::where('id',$id)->with('question')->get());
    }


    public function update(Request $request, $id)
    {
        //return $request->user_name;
       $valid_data =   $this->validate($request,[
             'user_name'   => 'required|max:80|min:3',
            'answer' => 'required|max:120|min:4',
            'description' => 'sometimes'
        ]);

       return  Answer::findOrfail($id);

       $answer->user_name = $request->user_name;
       $answer->answer = $request->answer;
       $answer->description = $request->description;
       $answer->save();




    }


}
