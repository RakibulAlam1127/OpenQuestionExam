<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
     public function showCategory($category)
     {

         //Show category result
         $category_results = Question::where('type',$category)->get();

         //Show The all Categories
         $categories = Question::distinct()->get(['type']);
         return view('frontend.question',compact('category_results','categories'));
     }
}
