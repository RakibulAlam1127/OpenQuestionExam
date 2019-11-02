<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {

        $categories = Question::distinct()->get(['type']);
        return view('frontend.index',compact('categories'));
    }
}
