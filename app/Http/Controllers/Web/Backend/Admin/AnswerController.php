<?php

namespace App\Http\Controllers\Web\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{

    public function index()
    {
        $latest_answers = Answer::orderBy('id', 'desc')->take(5)->with('question')->get();
        return view('admin.answer_list.index',compact('latest_answers'));
    }

}
