<?php

namespace App\Http\Controllers\Frontend;

use App\Sector;
use Illuminate\Http\Request;

use App\Http\Requests;

class SectorController extends FrontendController
{
    public function index()
    {
        return view("frontend.sector.index", [
            "sectors" => Sector::latest()->paginate(12)
        ]);
    }

    public function show(Sector $sector)
    {
        return view("frontend.sector.show", [
            "sector"    => $sector,
            "companies" => $sector->companies()->latest()->paginate(9),
        ]);
    }
}
