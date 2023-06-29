<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Requests\CompanyRequest;
use App\Interfaces\CompanyInterface;

class CompanyController extends Controller
{
    protected $companyInterface;

    public function __construct(CompanyInterface $companyInterface)
    {
        $this->companyInterface = $companyInterface;
    }
    
    public function store(CompanyRequest $request)
    {
        return $this->companyInterface->requestCompany($request);
    }
}