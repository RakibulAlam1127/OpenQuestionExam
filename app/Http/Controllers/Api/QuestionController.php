<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionCollection;
use App\Http\Resources\QuestionResource;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    public function index()
    {
        //For Show Single table of Data We Use Resource Controller for Data Viewing
        return new QuestionResource(Question::orderBy('id','desc')->paginate(5));
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        return new QuestionResource(Question::findOrfail($id));
    }


    public function update(Request $request, $id)
    {
       // return $request->all();
        $this->validate($request,[
             'name'   => 'required|max:80',
             'type' => 'required|max:120',
             'question_require' => 'required|max:80|unique:questions,question_require',$id,
             'date'    => 'required'
        ]);


      $question = Question::findOrfail($id);

       $question->name = $request->name;
       $question->type = $request->type;
       $question->question_require = $request->question_require;
       $question->date = $request->date;
       $question->save();



    }


    public function destroy($id)
    {
        //
    }
}
