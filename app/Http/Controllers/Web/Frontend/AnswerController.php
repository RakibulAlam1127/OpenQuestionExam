<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use Illuminate\Http\Request;
use Session;
class AnswerController extends Controller
{
    public function store(Request $request)
    {

      $valid_data = $request->validate([
           'answer' => 'required|max:80|min:4',
            'description' => 'sometimes',
            'user_name'   => 'required|max:20|min:3',
            'question_id' => 'required'

       ]);

     // dd($valid_data);

      if(Answer::create($valid_data)){
          Session::flash('response', array('type' => 'success', 'message' => 'Your Answer Submit Successfully'));
          return redirect()->back();
      }else{
          Session::flash('response', array('type' => 'error', 'message' => 'Your Answer Submit Unsuccessfully'));
          return redirect()->back();
      }



    }
}
