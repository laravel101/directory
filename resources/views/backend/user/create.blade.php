@extends("backend.layout.page")

@section("content")
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(["route" => "backend.user.store", "class" => "form-horizontal", "files" => true]) !!}
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title">Create New User</h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    @if($errors->has())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    <div class="form-group">
                        {!! Form::label("name", "Name", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            {!! Form::text("name", old("name"), ["class" => "form-control", "placeholder" => "User first and last name..."]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("email", "E-Mail", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            {!! Form::email("email", old("email"), ["class" => "form-control", "placeholder" => "User email..."]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("username", "Username", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            {!! Form::text("username", old("username"), ["class" => "form-control", "placeholder" => "Username..."]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("password", "Password", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-5">
                            {!! Form::password("password", ["class" => "form-control", "placeholder" => "Password..."]) !!}
                        </div>
                        <div class="col-md-5">
                            {!! Form::password("password_confirmation", ["class" => "form-control", "placeholder" => "Password Confirmation..."]) !!}
                        </div>
                    </div>
                        <div class="form-group">
                            {!! Form::label("is_admin", "Is Admin?", ["class" => "col-md-2 control-label"]) !!}
                            <div class="col-md-10">
                                <label class="check">
                                    {!! Form::checkbox("is_admin", true, old("is_admin"), ["class" => "icheckbox"]) !!}
                                    Set admin privileges for this user
                                </label>
                            </div>
                        </div>
                </div>
                <div class="panel-footer text-right">
                    <a href="{{ route('backend.user.index') }}" class="btn btn-default">Back</a>
                    {!! Form::submit("Create New User", ["class" => "btn btn-success"]) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section("page.plugins")
    @parent
@stop

@section("page.js")
    @parent
@stop