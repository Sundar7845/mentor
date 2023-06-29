<?php

namespace App\Repositories;

use App\Http\Requests\CompanyRequest;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\CompanyInterface;
// use App\Traits\ResponseAPI;
use App\Models\Company;
use Illuminate\Support\Facades\Validator;
use DB;

class CompanyRepository implements CompanyInterface
{
    // Use ResponseAPI Trait in this repository
    // use ResponseAPI;

    public function requestCompany(CompanyRequest $request, $id = null)
    {
        DB::beginTransaction();

        $validator = validator::make($request->all(), [
            'company_name' => 'required|max:255',
            'logo' => 'required',
            'description' => 'required|max:255',
        ]);

        $file = $request->file('logo');
        $input['logo'] = time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = storage_path('public/logo/');
        $file->move($destinationPath, $input['logo']);

        $id = $request->id;

        $company = Company::updateOrCreate([
            'id' => $id,
        ], [
            'company_name' => $request->company_name,
            'user_id' => Auth::user()->id,
            'logo' => $input['logo'],
            'description' => $request->description,
            'created_by' => Auth::user()->id,
        ]);

        $logo = url('/api/image/' . $company->id);

        DB::commit();
            $responseData['status']=true;
            $responseData['message']='Successful';
            $companyCollection = array("id" => $company['id'], "logo" => $logo, "name" => $company->name, "description" => $company->description);
            $responseData['data']=$companyCollection;
            return response()->json($responseData);
    }
}