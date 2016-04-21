@extends("backend.layout.master")

@section("body")
    <div class="login-container">
        <div class="login-box animated fadeInDown">
            <div class="login-logo"></div>
            <div class="login-body">
                <div class="login-title">{{ trans('login.please-login') }}</div>
                {!! Form::open(["route" => "backend.user.login", "class" => "form-horizontal"]) !!}
                @if($errors->has())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text("username", old("username"), ["class" => "form-control", "placeholder" => trans("user.username")]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::password("password", ["class" => "form-control", "placeholder" => trans("user.password")]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::submit(trans("login.login"), ["class" => "btn btn-info btn-block"]) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="login-footer">
                {!! trans("backend.copyright", ["year" => date("Y"), "app" => config("app.name"), "provider" => '<a href="'.config("app.provider.url").'" title="'.config("app.provider.name").'">'.config("app.provider.name").'</a>']) !!}
            </div>
        </div>
    </div>
@stop