<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="author" content="LabKod">
    <!-- Bootstrap -->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap-lumen.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <!-- Main Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('assets/images/logo.png') }}" class="img-responsive logo">
            </div>
            <div class="col-md-8">
                <img src="{{ asset('assets/images/reklam.png') }}" class="img-responsive ads ads-header">
            </div>
        </div>
    </div>
</header>

<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#primary-menu" aria-expanded="false">
                <span class="sr-only">{{ trans('navbar.toggle-navigation') }}</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="primary-menu">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{ route('frontend.home.index') }}"><i class="fa fa-home"></i> {{ trans('navbar.homepage') }}</a></li>
                <li><a href="{{ route('frontend.sector.index') }}"><i class="fa fa-briefcase"></i> {{ trans('navbar.sectors') }}</a></li>
                <li><a href="{{ route('frontend.brand.index') }}"><i class="fa fa-star"></i> {{ trans('navbar.brand') }}</a></li>
                <li><a href="{{ route('frontend.company.index') }}"><i class="fa fa-building"></i> {{ trans('navbar.companies') }}</a></li>
                <li><a href="{{ route('frontend.news.index') }}"><i class="fa fa-newspaper-o"></i> {{ trans('navbar.news') }}</a></li>
                <li><a href="{{ route('frontend.contact.show') }}"><i class="fa fa-phone"></i> {{ trans('navbar.contact') }}</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

@yield('body')

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="text-muted">{{ trans('footer.copyright') }}</p>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery-1.11.3.js') }}"></script>

<!-- Bootstrap -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.js') }}"></script>

<!-- Javascript -->
<script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>