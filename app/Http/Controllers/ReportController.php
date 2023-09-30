<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ViolationReport;
use Illuminate\Foundation\Auth\User;

class ReportController extends Controller
{
    public function create(Request $request) {

       $reported_user = User::where('username', $request->reportedUserUsername)->get()->first();

 
        if ($request->reportMessage == null) {
            $reportMessage = "";
        } else {
            $reportMessage = $request->reportMessage;
        }

       ViolationReport::create([
           'reporting_user_id' => $reported_user->id,
           'reported_user_id' => auth()->user()->id,
           'type' => $request->type,
           'type_id' => $request->typeId,
           'report_message' => $reportMessage
       ]);



       echo json_encode("asd");
    }
}



