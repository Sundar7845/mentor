<?php

namespace App\Interfaces;

use App\Http\Requests\CompanyRequest;

interface CompanyInterface
{
    // Get all companies

   // public function getAllcompanies();

    // Get company By ID

   // public function getCompanyById($id);

    // Create | Update company

    public function requestCompany(CompanyRequest $request, $id = null);

    // Delete company

    // public function deleteCompany($id);
}