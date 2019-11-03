<?php

namespace App\Http\Controllers\Web\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;
class FilterAnswerController extends Controller
{

    /*
     * this method filter the answer
     * First of all we check our database which answer description is not null,
     * secondly we again check which answer submitted last 2 days ir 48 hours
     */
    public function filterAnswer()
    {
        //Our Query Will be gose here..
        $filterAnswers = Answer::whereNotNull('description')->where( 'created_at', '>=', Carbon::now()->subDays(2))->with('question')->get();
       // dd($filterAnswers);
        $filter_answer_count = count($filterAnswers);
        $data = array(
            'filterAnswers' => $filterAnswers,
            'filter_answer_count' => $filter_answer_count
        );
        return view('admin.filterAnswer.index',$data);

    }


    public function showFilterAnswer($id)
    {
       $filterAnswer = Answer::with('question')->findOrFail($id);
       return view('admin.filterAnswer.show',compact('filterAnswer'));
    }


    public function deleteFilterAnswer($id)
    {
        $filter_Answer_data = Answer::findOrFail($id);
        
        if($filter_Answer_data->delete()){
            Session::flash('response', array('type' => 'success', 'message' => 'Data Remove Successfully'));
            return redirect(route('answer.filter'));
        }else{
            Session::flash('response', array('type' => 'error', 'message' => 'Data Remove Unsuccessfully'));
            return redirect()->back();
        }
    }


}
