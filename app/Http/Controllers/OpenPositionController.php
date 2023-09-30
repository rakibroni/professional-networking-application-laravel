<?php

namespace App\Http\Controllers;

use App\Models\TalentSearch;
use Illuminate\Http\Request;
use App\Models\JobContractType;
use Illuminate\Support\Facades\DB;
use App\Models\TalentSearchTraining;
use App\Models\TalentSearchDocumentation;
use App\Models\TalentSearchLanguage;

class OpenPositionController extends Controller
{
    function index(Request $request)
    {
        $talentSearch = TalentSearch::where('id', $request->talent_search_id)->first();
        $contractType = JobContractType::where('id', $talentSearch->contract_type)->first()->name;
        $talentSearchTraining = TalentSearchTraining::leftJoin('further_education', 'further_education.id', '=', 'talent_search_trainings.training_id')->where('talent_search_id', $request->talent_search_id)->get(['name']);
        $talentSearchDocumentation = TalentSearchDocumentation::leftJoin('documentation_systems', 'documentation_systems.id', '=', 'talent_search_documentations.documentation_id')->where('talent_search_id', $request->talent_search_id)->get(['name']);
         
        $talentSearchLanguage = TalentSearchLanguage::leftJoin('languages', 'languages.id', '=', 'talent_search_languages.language_id')
            ->leftJoin('language_levels', 'language_levels.id', '=', 'talent_search_languages.language_skill_id')
            ->where('talent_search_languages.talent_search_id', '=', $request->talent_search_id)
            ->select('languages.name AS language', 'language_levels.name AS language_lavel')
            ->get();
        //dd($talent_search_language);

        $talentSearchArray = array();
        $talent = array(
            'talent_search_id' => $request->talent_search_id,
            'contract_type' => $contractType,
            'location' =>  $talentSearch->location_city . ',' . $talentSearch->location_state,
            'position' => $talentSearch->position,
            'institution_type' => $talentSearch->institution_type,
            'years_of_experience' => $talentSearch->years_of_experience,
            'contract_type' => $talentSearch->contract_type,
            'contract_start_date' => $talentSearch->contract_start_date,
            'drivers_license_necessary' => $talentSearch->drivers_license_necessary,
        );
        $talentSearchArray['talent'] = $talent;
        $talentSearchArray['training'] = $talentSearchTraining;
        $talentSearchArray['documentation'] = $talentSearchDocumentation;
        $talentSearchArray['language'] = $talentSearchLanguage;
        //dd($talent_search_array); 
        echo json_encode($talentSearchArray);
    }
}
