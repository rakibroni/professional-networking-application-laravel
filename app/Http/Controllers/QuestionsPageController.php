<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class QuestionsPageController extends Controller
{
    public function index() {
        $q_category_array[]='';
        $question_categories =  DB::table('categories')->select('name')->get();
         foreach($question_categories as $qc){
             $q_category_array[] .=  $qc->name  ;
         } 
         //$q_category_array = array_filter($q_category_array);  
        return view('home')->with('question_categories', $q_category_array);
    }
}
