@extends("backend.layout.page")

@section("content")
<!-- START CONTENT FRAME -->
<div class="content-frame">
    <!-- START CONTENT FRAME TOP -->
    <div class="content-frame-top">
        <div class="page-title">
            <h2><span class="fa fa-file-text"></span> Inbox</h2>
        </div>

        <div class="pull-right">
            <button class="btn btn-default content-frame-left-toggle"><span class="fa fa-bars"></span></button>
        </div>
    </div>
    <!-- END CONTENT FRAME TOP -->

    <!-- START CONTENT FRAME LEFT -->
    <div class="content-frame-left">
        @include("backend.include.inbox-sidebar")
    </div>
    <!-- END CONTENT FRAME LEFT -->

    <!-- START CONTENT FRAME BODY -->
    <div class="content-frame-body">

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="pull-left">
                    <h3 class="panel-title">{{ $inbox->name }} <small>{{ $inbox->email }}</small></h3>
                </div>
                <div class="pull-right">
                    <a href="{{ route("backend.inbox.destroy", [$inbox->type, $inbox->id]) }}" class="btn btn-default"><span class="fa fa-trash-o"></span></a>
                </div>
            </div>
            <div class="panel-body">
                <h3>{{ $inbox->subject }} <small class="pull-right text-muted"><span class="fa fa-clock-o"></span> {{ $inbox->created_at->format("d.m.Y H:i") }}</small></h3>
                {{ $inbox->content }}
            </div>
        </div>
    </div>
    <!-- END CONTENT FRAME BODY -->
</div>
<!-- END CONTENT FRAME -->
@stop

@section("page.plugins")
    @parent
@stop

@section("page.js")
    @parent
@stop