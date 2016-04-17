<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Company;
use App\Http\Requests;

class CompanyController extends FrontendController
{
    public function index()
    {
        return view("frontend.company.index", [
            'companies' => Company::where("is_active", true)->latest()->paginate(12),
        ]);
    }

    public function brand()
    {
        return view("frontend.company.brand", [
            'brands' => Company::where("is_active", true)->where("is_brand", true)->latest()->paginate(12),
        ]);
    }

    public function show(Company $company)
    {
        $company->views++;
        $company->save();
        return view("frontend.company.show", [
            'company' => $company,
        ]);
    }
}
