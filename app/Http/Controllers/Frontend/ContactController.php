<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;

class ContactController extends FrontendController
{
    public function show()
    {
        return view("frontend.contact.show");
    }
}
