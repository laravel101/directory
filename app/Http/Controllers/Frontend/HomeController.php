<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends FrontendController
{
    public function index()
    {
        $brands = [];
        $companies = [];
        return view("frontend.home.index", [
            "brands" => $brands,
            "companies" => $companies,
            "sectors" => [],
            "allSectors" => [],
            "news" => [],
        ]);
    }
}
