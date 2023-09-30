<?php

namespace App\Http\Controllers;

use App\Models\DocumentationSystem;
use App\Models\FurtherEducation;
use App\Models\Language;
use App\Models\LanguageLevel;
use App\Models\TalentSearch;
use Illuminate\Support\Facades\View;

class JobSearchFilterController extends Controller
{
    public function index()
    {
        $furtherEducation = FurtherEducation::get()->pluck('name');
        $documentationSystems = DocumentationSystem::get()->pluck('name');
        $languages = Language::get()->pluck('name');
        $languageLevels = LanguageLevel::get()->pluck('name');
        $openPositions = TalentSearch::get();

        $jobsPageFilter = View::make("components.jobs_search_filter")->with([
            'documentationSystems' => $documentationSystems,
            'furtherEducation' => $furtherEducation,
            'languages' => $languages,
            'languageLevels' => $languageLevels,
            'openPositions' => $openPositions
        ])->render();



        echo json_encode($jobsPageFilter);
    }
}
