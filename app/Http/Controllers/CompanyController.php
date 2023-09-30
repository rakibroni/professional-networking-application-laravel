<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\CompanyGallary;
use App\Models\CompanyProvide;
use App\Models\CompanyEmployee;
use App\Models\CompanyDescription;
use Illuminate\Support\Facades\View;

class CompanyController extends Controller
{
    function index()
    {

        $company_user_id = User::getCompanyUserId();
        $companyId = $company_user_id[0]->id;
        $response = '';
        $companyDetails = Company::where('id', $companyId)->get()->first();
        $employees = CompanyEmployee::where('company_id', $companyId)->get();
        $provides = CompanyProvide::where('company_id', $companyId)->get();
        $galarries = CompanyGallary::where('company_id', $companyId)->get();
        $compnayDescription = CompanyDescription::where('company_id', $companyId)->get();
        $response .= View::make("components.jobs_page_company_content")->with([
            'company_details' => $companyDetails,
            'employees' => $employees,
            'provides' => $provides,
            'galarries' => $galarries,
            'compnay_description' => $compnayDescription
        ])->render();
        echo json_encode($response);
    }
    function edit(Request $request)
    {
        $response = '';
        $companyBasicInfo = Company::where('id', $request->companyId)->update([
            'name' => $request->companyName,
            'short_desc' => $request->companyDesc,
            'location_city' => $request->locationCity,
            'location_state' => $request->locationState,
            'total_employees' => $request->totalEmp,
            'establishment' => $request->establishment,
            'curaworks_profile_link' => $request->curaworksLink,
            'website_link' => $request->website,
            'facebook_link' => $request->facebook,
            'instagram_link' => $request->instagram,
        ]);
        echo json_encode($response);
    }
    function editCompanyDesc(Request $request)
    {
        $response = '';
        $total_title = count($request->title);
        for ($i = 0; $i < $total_title; $i++) {
            if (!isset($request->desctiption_id[$i]) == '') {
                $compnayDescription = CompanyDescription::where('id', $request->desctiption_id[$i])->update([
                    'title' => $request->title[$i],
                    'text' => $request->description_text[$i],
                    'company_id' => $request->companyId,
                ]);
            }else{
                $compnayDescription = CompanyDescription::create([
                    'title' => $request->title[$i],
                    'text' => $request->description_text[$i],
                    'company_id' =>$request->companyId,
                     
                ]);

            }
        }
        echo json_encode($response);
    }
    function deleteCompanyDesc(Request $request){
        $response = '';
        $delete_doc = CompanyDescription::where('id',$request->description_id)->delete();
        echo json_encode($response);
    }

    function editCompanyEmp(Request $request)
    {
        $response = '';
        $total_name = count($request->name);
        for ($i = 0; $i < $total_name; $i++) {
            if (!isset($request->emp_id[$i]) == '') {
                $compnayEmp = CompanyEmployee::where('id', $request->emp_id[$i])->update([
                    'name' => $request->name[$i],
                    'position' => $request->position[$i],
                    'company_id' => $request->companyId,
                ]);
            }else{
                $compnayEmp = CompanyEmployee::create([
                    'name' => $request->name[$i],
                    'position' => $request->position[$i],
                    'company_id' =>$request->companyId,
                     
                ]);

            }
        }
        echo json_encode($response);
    }
    function deleteCompanyEmp(Request $request){
        $response = '';
        $delete_emp = CompanyEmployee::where('id',$request->emp_id)->delete();
        echo json_encode($response);
    }
    function editCompanyPro(Request $request)
    {
        $response = '';
        $total_provide_name = count($request->provide_name);
        for ($i = 0; $i < $total_provide_name; $i++) {
            if (!isset($request->pro_id[$i]) == '') {
                $compnayPro = CompanyProvide::where('id', $request->pro_id[$i])->update([
                    'name' => $request->provide_name[$i], 
                    'company_id' => $request->companyId,
                ]);
            }else{
                $compnayPro = CompanyProvide::create([
                    'name' => $request->provide_name[$i], 
                    'company_id' =>$request->companyId,
                     
                ]);

            }
        }
        echo json_encode($response);
    }
    function deleteCompanyPro(Request $request){
        $response = '';
        $delete_pro = CompanyProvide::where('id',$request->pro_id)->delete();
        echo json_encode($response);
    }

}
