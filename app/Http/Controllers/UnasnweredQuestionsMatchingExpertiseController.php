<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UnasnweredQuestionsMatchingExpertiseController extends Controller
{
    public function index() {
        $response = auth()->user()->unansweredQuestionsMatchingExpertise();
        echo json_encode($response);
    }
}
