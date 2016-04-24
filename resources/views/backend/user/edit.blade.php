@extends("backend.layout.page")

@section("content")
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(["route" => ["backend.user.update", $user->username], "method" => "PUT", "class" => "form-horizontal", "files" => true]) !!}
            {!! Form::hidden("id", $user->id) !!}
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title">Edit User '{{ $user->name }}'</h3>
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
                            {!! Form::text("name", $user->name, ["class" => "form-control", "placeholder" => "User first and last name..."]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("email", "E-Mail", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            {!! Form::email("email", $user->email, ["class" => "form-control", "placeholder" => "User email..."]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("username", "Username", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            {!! Form::text("username", $user->username, ["class" => "form-control", "placeholder" => "Username..."]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("password", "Password", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-5">
                            {!! Form::password("password", ["class" => "form-control", "placeholder" => "Password..."]) !!}
                            <span class="help-block">Leave empty if you don't want change password.</span>
                        </div>
                        <div class="col-md-5">
                            {!! Form::password("password_confirmation", ["class" => "form-control", "placeholder" => "Password Confirmation..."]) !!}
                            <span class="help-block">Leave empty if you don't want change password.</span>
                        </div>
                    </div>
                        <div class="form-group">
                            {!! Form::label("is_admin", "Is Admin?", ["class" => "col-md-2 control-label"]) !!}
                            <div class="col-md-10">
                                <label class="check">
                                    {!! Form::checkbox("is_admin", true, $user->is_admin, ["class" => "icheckbox"]) !!}
                                    Set admin privileges for this user
                                </label>
                            </div>
                        </div>
                </div>
                <div class="panel-footer text-right">
                    <a href="{{ route('backend.user.index') }}" class="btn btn-default">Back</a>
                    {!! Form::submit("Edit User", ["class" => "btn btn-success"]) !!}
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