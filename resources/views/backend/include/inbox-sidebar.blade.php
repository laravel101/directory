<div class="block">
    <div class="list-group border-bottom">
        <a href="{{ route('backend.inbox.index') }}" class="list-group-item @if(!$type) active @endif"><span class="fa fa-inbox"></span> All Inbox <span class="badge badge-success">{{ \App\Inbox::where("is_read", 0)->count() }}</span></a>
        <a href="{{ route('backend.inbox.index', "contact") }}" class="list-group-item @if($type == "contact") active @endif"><span class="fa fa-inbox"></span> Contact Messages <span class="badge badge-success">{{ \App\Inbox::where("type", "contact")->where("is_read", 0)->count() }}</span></a>
    </div>
</div>