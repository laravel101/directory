@extends("backend.layout.page")

@section("content")
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(["route" => "backend.sector.store", "class" => "form-horizontal"]) !!}
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title">Create New Sector</h3>
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
                        {!! Form::label("name", "Sector Name", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            {!! Form::text("name", old("name"), ["class" => "form-control", "placeholder" => "Sector name..."]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("slug", "Sector Slug", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            {!! Form::text("slug", old("slug"), ["class" => "form-control", "placeholder" => "Sector slug..."]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("icon", "Sector Icon", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            {!! Form::text("icon", old("icon"), ["class" => "form-control", "placeholder" => "Sector icon..."]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("parent_id", "Sector Parent Category", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            {!! Form::select("parent_id", [0 => "- Main Sector -"] + App\Sector::whereNull("parent_id")->lists("name", "id")->toArray(),old("parent_id") ? old("parent_id") : $parent ? $parent->id : null, ["class" => "form-control"]) !!}
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-right">
                    <a href="{{ route('backend.sector.index', $parent ? $parent->slug : 0) }}" class="btn btn-default">Back</a>
                    {!! Form::submit("Create New Sector", ["class" => "btn btn-success"]) !!}
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