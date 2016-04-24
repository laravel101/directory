@extends("backend.layout.page")

@section("content")
<!-- START CONTENT FRAME -->
<div class="content-frame">
    <!-- START CONTENT FRAME TOP -->
    <div class="content-frame-top">
        <div class="page-title">
            <h2><span class="fa fa-inbox"></span> Inbox @if($type) - {{ $type }} @endif <small>({{ $unread }} unread)</small></h2>
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
            <div class="panel-body mail">
                @foreach($inbox as $message)
                <div class="mail-item mail-unread mail-info">
                    <div class="mail-user">{{ $message->name }}</div>
                    <a href="{{ route('backend.inbox.show', [$message->type, $message->id]) }}" class="mail-text">{{ $message->subject }}</a>
                    <div class="mail-date">{{ $message->created_at->format("d.m.Y H:i") }}</div>
                </div>
                @endforeach

            </div>
            @if($inbox->render())
            <div class="panel-footer">
                {!! $inbox->render() !!}
            </div>
            @endif
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