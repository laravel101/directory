<?php

namespace App\Http\Controllers\Frontend;

use App\Inbox;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ContactSendRequest;

class ContactController extends FrontendController
{
    public function show()
    {
        return view("frontend.contact.show");
    }

    public function send(ContactSendRequest $request)
    {
        $inbox = new Inbox();
        $inbox->subject = "Contact Message";
        $inbox->name = $request->get("name");
        $inbox->email = $request->get("email");
        $inbox->phone = $request->get("phone");
        $inbox->content = $request->get("message");
        $inbox->type = "contact";
        $inbox->save();

        return redirect()->route("frontend.contact.show")->with("success", trans("contact.sended"));
    }
}
