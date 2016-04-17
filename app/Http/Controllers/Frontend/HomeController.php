<?php

namespace App\Http\Controllers\Frontend;

use App\Company;
use App\Sector;
use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends FrontendController
{
    public function index()
    {
        $brands = Company::where("is_brand", true)->where("is_active", true)->latest()->take(4)->get();
        $companies = Company::where("is_active", true)->latest()->take(9)->get();
        $sectors = Sector::whereNull("parent_id")->latest()->get();
        return view("frontend.home.index", [
            "brands" => $brands,
            "companies" => $companies,
            "sectors" => $sectors,
        ]);
    }
}
