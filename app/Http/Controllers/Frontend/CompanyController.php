<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Company;
use App\Http\Requests;
use App\Http\Requests\SearchRequest;

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

    public function search(SearchRequest $request)
    {
        $q = $request->get("q");

        $companies = Company::where("is_active", true)->latest()->take(12)->paginate();
        return view("frontend.company.search", [
            'companies' => $companies,
            "query"     => $q,
            "total"     => 0,
        ]);
    }
}
