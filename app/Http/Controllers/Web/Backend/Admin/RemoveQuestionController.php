<?php

namespace App\Http\Controllers\Web\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class RemoveQuestionController extends Controller
{

    public function index()
    {


        return view('admin.removeAnswer.index');
    }

    public function destroy()
    {

        $answers = DB::table('answers')->select('question_id')->get();
        $arr = json_decode(json_encode($answers), true);


        $results = DB::table('questions')
            ->whereNotIn('id',$arr)->where( 'created_at', '<', Carbon::now()->subDays(1))
            ->delete();


        if($results){
            Session::flash('response', array('type' => 'success', 'message' => 'Successfully, Remove  All Questions for the past 24 Hours'));
            return redirect(route('admin.dashboard'));
        }else{
            Session::flash('response', array('type' => 'error', 'message' => 'Already Remove  All Questions for the past 24 Hours'));
            return redirect()->back();
        }





    }


}
