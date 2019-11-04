<?php

namespace App\Http\Controllers\Web\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;
use Session;
class QuestionController extends Controller
{

    public function index()
    {
                $all_questions = Question::orderBy('created_at','DESC')->get();

       // dd($data);
        return view('admin.question.index',compact('all_questions'));
    }

//This Method for Showing question create form
    public function create()
    {
        $question = new Question();
        return view('admin.question.create',compact('question'));
    }

   //This Method for store question with validation
    public function store(Request $request)
    {
       //Check the data valid or not
        $valid_data =  $request->validate([
            'name' => 'required|max:80|min:2',
            'type' => 'required|max:60|min:2',
            'question_require' => 'required|unique:questions|max:100',
            'date'          => 'required|date'
        ]);

        $date = date('Y-m-d');

        //Here We check the date.Because Given date is not gather than Current date

        if($request['date'] <= $date){
            //Here We Insert the valid data
            if(Question::create($valid_data)){
                Session::flash('response', array('type' => 'success', 'message' => 'Question Added Successfully'));
                return redirect()->back();
            }else{
                Session::flash('response', array('type' => 'error', 'message' => 'Question Not Added Successfully!'));
                return redirect()->back();
            }
        }else{
            Session::flash('response', array('type' => 'error', 'message' => 'Date Must not be Gather than Current Date'));
            return redirect()->back();
        }



    }


    public function show($id)
    {
        //
    }


    public function edit(Question $question)
    {

        return view('admin.question.edit',compact('question'));
    }


    public function update(Request $request,Question $question)
    {
        $valid_data =  $request->validate([
            'name' => 'required|max:80|min:2',
            'type' => 'required|max:60|min:2',
            'question_require' => 'required|max:100|unique:questions',
            'date'          => 'required|date'
        ]);

        $date = date('Y-m-d');
        if($request['date'] <= $date){
            if($question->update($valid_data)){
                Session::flash('response', array('type' => 'success', 'message' => 'Question Edit Successfully'));
                return redirect(route('question.index'));

            }else{
                Session::flash('response', array('type' => 'error', 'message' => 'Question Edit Unsuccessfully'));
                return redirect()->back();
            }
        }else{
            Session::flash('response', array('type' => 'error', 'message' => 'Date Must not be Gather than Current Date'));
            return redirect()->back();
        }

    }


    public function destroy(Question $question)
    {
       if($question->delete()){
           Session::flash('response', array('type' => 'success', 'message' => 'Question Remove Successfully'));
           return redirect(route('question.index'));
       }else{
           Session::flash('response', array('type' => 'error', 'message' => 'Question Remove Unsuccessfully'));
           return redirect()->back();
       }
    }
}
