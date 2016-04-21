@extends("backend.layout.page")

@section("content")
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(["route" => ["backend.sector.update", $sector->slug], "method" => "PUT", "class" => "form-horizontal"]) !!}
            {!! Form::hidden("id", $sector->id) !!}
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title">Edit Sector '{{ $sector->name }}'</h3>
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
                            {!! Form::text("name", $sector->name, ["class" => "form-control", "placeholder" => "Sector name..."]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("slug", "Sector Slug", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            {!! Form::text("slug", $sector->slug, ["class" => "form-control", "placeholder" => "Sector slug..."]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("icon", "Sector Icon", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            {!! Form::text("icon", $sector->icon, ["class" => "form-control", "placeholder" => "Sector icon..."]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("parent_id", "Sector Parent Category", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            {!! Form::select("parent_id", [0 => "- Main Sector -"] + App\Sector::whereNull("parent_id")->lists("name", "id")->toArray(), $sector->parent_id == null ? 0 : $sector->parent_id, ["class" => "form-control"]) !!}
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-right">
                    {!! Form::submit("Edit Sector", ["class" => "btn btn-info"]) !!}
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