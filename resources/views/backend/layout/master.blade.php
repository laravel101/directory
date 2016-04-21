<!DOCTYPE html>
<html lang="en" class="body-full-height">
<head>
    <title>@yield('title')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />

    <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('backend/css/theme-default.css') }}"/>
</head>
<body>

@yield('body')

<!-- START PRELOADS -->
@yield("preloads")
<!-- END PRELOADS -->

<!-- START PLUGINS -->
<script type="text/javascript" src="{{ asset('backend/js/plugins/jquery/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/js/plugins/jquery/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/js/plugins/bootstrap/bootstrap.min.js') }}"></script>
<script type='text/javascript' src='{{ asset('backend/js/plugins/noty/jquery.noty.js') }}'></script>
<script type='text/javascript' src='{{ asset('backend/js/plugins/noty/layouts/topRight.js') }}'></script>
<script type='text/javascript' src='{{ asset('backend/js/plugins/noty/themes/default.js') }}'></script>
<!-- END PLUGINS -->

@yield("page.plugins")

@yield("page.js")

@if(session("success"))
    <script>
        noty({
            text: '{{ session('success') }}',
            layout: 'topRight',
            type: 'success'
        });
    </script>
@endif
</body>
</html>