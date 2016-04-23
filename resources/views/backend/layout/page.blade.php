@extends("backend.layout.master")

@section("body")
<!-- START PAGE CONTAINER -->
<div class="page-container">

    <!-- START PAGE SIDEBAR -->
    <div class="page-sidebar">
        <!-- START X-NAVIGATION -->
        <ul class="x-navigation">
            <li class="xn-logo">
                <a href="{{ route("backend.dashboard.index") }}">{{ config("app.name") }}</a>
                <a href="#" class="x-navigation-control"></a>
            </li>
            <li class="xn-profile">
                <a href="#" class="profile-mini">
                    <img src="{{ asset('backend/assets/images/users/avatar.jpg') }}" alt="{{ auth()->user()->name }}"/>
                </a>
                <div class="profile">
                    <div class="profile-image">
                        <img src="{{ asset('backend/assets/images/users/avatar.jpg') }}" alt="{{ auth()->user()->name }}"/>
                    </div>
                    <div class="profile-data">
                        <div class="profile-data-name">{{ auth()->user()->name }}</div>
                        <div class="profile-data-title">{{ auth()->user()->email }}</div>
                    </div>
                </div>
            </li>
            <li @if(Request::is(config('app.backend'))) class="active" @endif>
                <a href="{{ route('backend.dashboard.index') }}"><span class="fa fa-desktop"></span> <span class="xn-text">{{ trans("backend.nav.dashboard") }}</span></a>
            </li>
            <li @if(Request::is(config('app.backend')."/sector*")) class="active" @endif>
                <a href="{{ route('backend.sector.index') }}"><span class="fa fa-bars"></span> <span class="xn-text">{{ trans("backend.nav.sectors") }}</span></a>
            </li>
            <li @if(Request::is(config('app.backend')."/company*")) class="active" @endif>
                <a href="{{ route('backend.company.index') }}"><span class="fa fa-building"></span> <span class="xn-text">{{ trans("backend.nav.companies") }}</span></a>
            </li>
            <li @if(Request::is(config('app.backend')."/news*")) class="active" @endif>
                <a href="{{ route('backend.news.index') }}"><span class="fa fa-file-text-o"></span> <span class="xn-text">{{ trans("backend.nav.news") }}</span></a>
            </li>
        </ul>
        <!-- END X-NAVIGATION -->
    </div>
    <!-- END PAGE SIDEBAR -->

    <!-- PAGE CONTENT -->
    <div class="page-content">

        <!-- START X-NAVIGATION VERTICAL -->
        <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
            <!-- TOGGLE NAVIGATION -->
            <li class="xn-icon-button">
                <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
            </li>
            <!-- END TOGGLE NAVIGATION -->
            <!-- SIGN OUT -->
            <li class="xn-icon-button pull-right">
                <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
            </li>
            <!-- END SIGN OUT -->
        </ul>
        <!-- END X-NAVIGATION VERTICAL -->

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="{{ route("backend.dashboard.index") }}">{{ config("app.name") }}</a></li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">

            @yield("content")

        </div>
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

@include("backend.include.logout")
@stop

@section("preloads")
<!-- START PRELOADS -->
<audio id="audio-alert" src="{{ asset('backend/audio/alert.mp3') }}" preload="auto"></audio>
<audio id="audio-fail" src="{{ asset('backend/audio/fail.mp3') }}" preload="auto"></audio>
<!-- END PRELOADS -->
@stop

@section("page.plugins")
    <script type='text/javascript' src='{{ asset('backend/js/plugins/icheck/icheck.min.js') }}'></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/scrolltotop/scrolltopcontrol.js') }}"></script>
@stop

@section("page.js")
    <script type="text/javascript" src="{{ asset('backend/js/plugins.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/actions.js') }}"></script>
@stop