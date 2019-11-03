<?php

namespace App\Http\Controllers\Web\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
        {
            $data = array(
                  'all_questions' => Question::all()->count(),
                  'all_answers' => Answer::all()->count(),
                  'filter_answers' =>  $filterAnswer = Answer::whereNotNull('description')->where( 'created_at', '>=', Carbon::now()->subDays(2))->count()
            );
            return view('admin.dashboard.index',$data);
        }
}
