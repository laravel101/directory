<?php

namespace App\Http\Controllers\Backend;

use App\Inbox;
use App\News;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\Backend\NewsCreateRequest;
use App\Http\Requests\Backend\NewsEditRequest;

class InboxController extends BackendController
{
    public function index($type = null)
    {
        $inbox = $type ? Inbox::where("type", $type)->latest()->paginate(20) : Inbox::latest()->paginate(20);
        $unread = $type ? Inbox::where("type", $type)->where("is_read", 0)->count() : Inbox::where("is_read", 0)->count();
        return view("backend.inbox.index", [
            "type"  => $type,
            "inbox" => $inbox,
            "unread" => $unread,
        ]);
    }

    public function show($type, Inbox $inbox)
    {
        $inbox->is_read = true;
        $inbox->save();

        return view("backend.inbox.show", [
            "inbox" => $inbox,
            "type"  => $inbox->type
        ]);
    }

    public function destroy($type, Inbox $inbox)
    {
        $inbox->delete();

        return redirect()->route("backend.inbox.index", $type);
    }

}
