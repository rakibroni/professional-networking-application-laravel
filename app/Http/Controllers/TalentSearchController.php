<?php

namespace App\Http\Controllers;

use App\Models\Talent;
use App\Models\Language;
use App\Models\Institute;
use App\Models\RandomName;
use Illuminate\Support\Str;
use App\Models\TalentSearch;
use Illuminate\Http\Request;
use App\Models\LanguageLevel;
use App\Models\JobContractType;
use App\Models\FurtherEducation;
use App\Models\DemoTalentLanguage;
use Illuminate\Support\Facades\DB;
use App\Models\DocumentationSystem;
use App\Models\TalentSearchLanguage;
use App\Models\TalentSearchTraining;
use Illuminate\Support\Facades\View;
use App\Models\TalentSearchDocumentation;
use App\Models\DemoTalentFurtherEducation;
use App\Models\DemoTalentDocumentationSystem;

class TalentSearchController extends Controller
{
    // RANDOM == CITY OF COMPANY ACCOUNT

    // 
    public function index(Request $request)
    {
        $talents = Talent::where('user_id', auth()->user()->id)->get();

        foreach ($talents as $talent) {
            if (!$talent->isSaved() && !$talent->isInvited()) {
                $talent->delete();
            }
        }

        $demo = true;
        $position = $request->position;
        $city = $request->locationCity;
        $state = $request->locationState;
        $companyType = $request->companyType;
        $contractType = $request->contractType;
        $yearsOfExperience = $request->yearsOfExperience;
        $contractStart = $request->contractStart;
        $driversLicense = $request->driversLicense;
        $documentationSystems = json_decode($request->documentationSystems);
        $furtherEducation = json_decode($request->furtherEducation);
        $languages = json_decode($request->languages);

        if ($driversLicense == true) {
            $driversLicense = 1;
        }


        $matchPerctage = 0;
        $finalYearsOfExperience = 0;
        if ($state == "" || $state == "undefined") {
            $state = auth()->user()->location_state;
        }
        if ($city == "" || $city == "undefined") {
            $city = auth()->user()->location_city;
        }
        if ($position == "" || $position == "undefined") {
            $position = "Altenpflegefachkraft";
        }
        if ($companyType == "" || $companyType == "undefined") {
            $companyType = "Krankenhaus";
        }

        if ($contractType == "" || $contractType == "undefined") {
            $contractType = "Vollzeit";
        }

        if ($contractStart == "" || $contractStart == "undefined") {
            $contractStart = "sofort";
        }

        $talents = Talent::get();




        $randTopTalensCount = rand(1, 3);
        $response = '';
        for ($i = 0; $i < 10; $i++) {
            if ($i == 0) {
                $response .= View::make("components.top_three_talents")->render();
            }
            if ($i == 3) {
                $response .= View::make("components.more_talents")->render();
            }
            if ($demo) {
                $firstname = RandomName::firstname();
                $lastname = RandomName::name();
                $suffix = (rand(0, 9) / 10);


                if ($i == 0) {
                    $matchPerctage = 90 + rand(4, 8) + $suffix;
                    $finalYearsOfExperience = $yearsOfExperience + 2;
                }
                if ($i == 1) {
                    $matchPerctage = 90 + rand(2, 4) + $suffix;
                    $finalYearsOfExperience = $yearsOfExperience +  1;
                }
                if ($i == 2) {
                    $matchPerctage = 90 + rand(0, 2) + $suffix;
                }
                if ($i > 2) {
                    $matchPerctage = 80 + rand(0, 8) + $suffix;
                    if ($yearsOfExperience != 0) {
                        $finalYearsOfExperience = $yearsOfExperience -  rand(0, 1);
                    }
                }
            }

            $randPic = rand(0, 29);
            $profilePic = '/images/norealpersons/' . $randPic . '.jpg';
            $randNUmberOfTalents = rand(1, 10);
            $talent = Talent::create([
                'user_id' => auth()->user()->id,
                'contract_type' => $contractType,
                'contract_start_date' => $contractStart,
                'drivers_license_necessary' => $driversLicense,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'position' => $position,
                'location_city' => $city,
                'location_state' => $state,
                'institution_type' => $companyType,
                'years_of_experience' => $finalYearsOfExperience,
                'uuid' => Str::random(10),
                'match_percentage' => $matchPerctage,
                'profile_pic' => $profilePic
            ]);


            if ($i < 3 && $randNUmberOfTalents > 5 || $i > 2 && $randNUmberOfTalents > 5 || $i == 0) {
                $response .= View::make("components.jobs_page_talent")->with([
                    'talent' => $talent
                ])->render();
            } else {
                $talent->delete();
            }





            /*if ($documentationSystems) {
                foreach ($documentationSystems as $documentationSystem) {           
                    $documentationSystemId = DocumentationSystem::where('name', $documentationSystem)->get()->first()->id;
                    DemoTalentDocumentationSystem::create([
                        'talent_id' => $talent->id,
                        'documentation_system_id' => $documentationSystemId
                    ]);
                }
            }

            if ($furtherEducation) {
                foreach ($furtherEducation as $furtherEducationObject) {           
                    $furtherEducationId = FurtherEducation::where('name', $furtherEducationObject)->get()->first()->id;
                    DemoTalentFurtherEducation::create([
                        'talent_id' => $talent->id,
                        'further_education_id' => $furtherEducationId
                    ]);
                }
            }

            if ($languages) {
                foreach ($languages as $language) {    
                    $splitted = explode(" ", $language);   
                    $language = $splitted[0];
                    $level = $splitted[1];
                    $level = str_replace("(", "", $level);
                    $level = str_replace(")", "", $level);
                    $firstname = $level;

                    $languageId = Language::where('name', $language)->get()->first()->id;
                    $languageLevelId = LanguageLevel::where('name', $level)->get()->first()->id;

                    DemoTalentLanguage::create([
                        'talent_id' => $talent->id,
                        'language_id' => $languageId,
                        'language_level_id' => $languageLevelId
                    ]);
                }
            }*/
        }

        echo json_encode($response);
    }

    public function store(Request $request)
    {
        $response = '';
        $position = $request->position;
        $city = $request->locationCity;
        $state = $request->locationState;
        $companyType = $request->companyType;
        $contractType = $request->contractType;
        $yearsOfExperience = $request->yearsOfExperience;
        $contractStart = $request->contractStart;
        $documentationSystems = json_decode($request->documentationSystems);
        $furtherEducation = json_decode($request->furtherEducation);
        $languages = json_decode($request->languages);

        if ($request->driversLicense == 'true') { 
            $driversLicense = 1;
        } else {
            $driversLicense = 0;
        }



        $talentSearch = TalentSearch::create([
            'user_id' => auth()->user()->id,
            'contract_type' => $contractType,
            'contract_start_date' => $contractStart,
            'drivers_license_necessary' => $driversLicense,
            'position' => $position,
            'location_city' => $city,
            'location_state' => $state,
            'institution_type' => $companyType,
            'years_of_experience' => $yearsOfExperience,
        ]);

        if ($documentationSystems) {
            foreach ($documentationSystems as $documentationSystem) {

                $documentationSystemId = DocumentationSystem::where('name', $documentationSystem)->get()->first()->id;
                TalentSearchDocumentation::create([
                    'talent_search_id' => $talentSearch->id,
                    'documentation_id' => $documentationSystemId
                ]);
            }
        }

        if ($furtherEducation) {
            foreach ($furtherEducation as $furtherEducationObject) {
                $furtherEducationId = FurtherEducation::where('name', $furtherEducationObject)->get()->first()->id;
                TalentSearchTraining::create([
                    'talent_search_id' => $talentSearch->id,
                    'training_id' => $furtherEducationId
                ]);
            }
        }

        if ($languages) {
            foreach ($languages as $language) {
                $splitted = explode(" ", $language);
                $language = $splitted[0];
                $level = $splitted[1];
                $level = str_replace("(", "", $level);
                $level = str_replace(")", "", $level);
                $firstname = $level;

                $languageId = Language::where('name', $language)->get()->first()->id;
                $languageLevelId = LanguageLevel::where('name', $level)->get()->first()->id;

                TalentSearchLanguage::create([
                    'talent_search_id' => $talentSearch->id,
                    'language_id' => $languageId,
                    'language_skill_id' => $languageLevelId
                ]);
            }
        }
        echo json_encode($response);
    }
    public function edit(Request $request)
    {
        $response = '';
        $talentSearchId = $request->talentSearchId;
        $position = $request->position;
        $city = $request->locationCity;
        $state = $request->locationState;
        $companyType = $request->companyType;
        $contractType = $request->contractType;
        $yearsOfExperience = $request->yearsOfExperience;
        $contractStart = $request->contractStart; 
        $documentationSystems = json_decode($request->documentationSystems);
        $furtherEducation = json_decode($request->furtherEducation);
        $languages = json_decode($request->languages);

        if ($request->driversLicense == 'true') { 
            $driversLicense = 1;
        } else {
            $driversLicense = 0;
        }

        $talentSearch = TalentSearch::where('id', $talentSearchId)->update([
            'user_id' => auth()->user()->id,
            'contract_type' => $contractType,
            'contract_start_date' => $contractStart,
            'drivers_license_necessary' => $driversLicense,
            'position' => $position,
            'location_city' => $city,
            'location_state' => $state,
            'institution_type' => $companyType,
            'years_of_experience' => $yearsOfExperience,
        ]);

        $delete_doc = TalentSearchDocumentation::where('talent_search_id', $talentSearchId)->delete();
        $delete_training = TalentSearchTraining::where('talent_search_id', $talentSearchId)->delete();
        $delete_language = TalentSearchLanguage::where('talent_search_id', $talentSearchId)->delete();

        if ($documentationSystems) {
            foreach ($documentationSystems as $documentationSystem) {

                $documentationSystemId = DocumentationSystem::where('name', $documentationSystem)->get()->first()->id;
                TalentSearchDocumentation::create([
                    'talent_search_id' => $talentSearchId,
                    'documentation_id' => $documentationSystemId
                ]);
            }
        }

        if ($furtherEducation) {
            foreach ($furtherEducation as $furtherEducationObject) {
                $furtherEducationId = FurtherEducation::where('name', $furtherEducationObject)->get()->first()->id;
                TalentSearchTraining::create([
                    'talent_search_id' => $talentSearchId,
                    'training_id' => $furtherEducationId
                ]);
            }
        }

        if ($languages) {
            foreach ($languages as $language) {
                $splitted = explode(" ", $language);
                $language = $splitted[0];
                $level = $splitted[1];
                $level = str_replace("(", "", $level);
                $level = str_replace(")", "", $level);
                $firstname = $level;

                $languageId = Language::where('name', $language)->get()->first()->id;
                $languageLevelId = LanguageLevel::where('name', $level)->get()->first()->id;

                TalentSearchLanguage::create([
                    'talent_search_id' => $talentSearchId,
                    'language_id' => $languageId,
                    'language_skill_id' => $languageLevelId
                ]);
            }
        }
        echo json_encode($response);
    }
}
