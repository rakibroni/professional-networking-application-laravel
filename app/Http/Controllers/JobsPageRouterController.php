<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class JobsPageRouterController extends Controller
{
    public function getJobsPageNavbar() {
        $jobsPageNavBar = View::make("components.jobs_page_navbar")->with([
            "user" => auth()->user()
        ])->render();
        echo json_encode($jobsPageNavBar);
    }



    public function getJobsPageTalents() {
        // GET TALENTS BASED ON GET DATA
        $response = '';
        for ($i = 0; $i < 5; $i++) {
            $response .= View::make("components.jobs_page_talent")->render();
        }
        echo json_encode($response);
    }
}
