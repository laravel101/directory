<?php

namespace App\Http\Controllers\Backend;

use App\City;
use Illuminate\Http\Request;
use App\Http\Requests;

class CityController extends BackendController
{
    public function towns(Request $request)
    {
        $city = City::find($request->get("city"));
        return $city->towns;
    }
}
