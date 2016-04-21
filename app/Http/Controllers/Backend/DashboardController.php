<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\SearchRequest;

class DashboardController extends BackendController
{
    public function index()
    {
        return view("backend.dashboard.index");
    }
}
