@extends("backend.layout.page")

@section("content")
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(["route" => "backend.news.store", "class" => "form-horizontal", "files" => true]) !!}
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title">Create News</h3>
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
                            {!! Form::text("name", old("name"), ["class" => "form-control", "placeholder" => "News name..."]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("slug", "Slug", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            {!! Form::text("slug", old("slug"), ["class" => "form-control", "placeholder" => "News slug..."]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("image", "Image", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            {!! Form::file("image", ["class" => "form-control"]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("content", "Content", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            {!! Form::textarea("content", old("content"), ["class" => "form-control"]) !!}
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-right">
                    <a href="{{ route('backend.news.index') }}" class="btn btn-default">Back</a>
                    {!! Form::submit("Create News", ["class" => "btn btn-success"]) !!}
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