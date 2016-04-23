@extends("backend.layout.page")

@section("content")
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(["route" => ["backend.news.update", $news->slug], "method" => "PUT", "class" => "form-horizontal", "files" => true]) !!}
            {!! Form::hidden("id", $news->id) !!}
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title">Edit News '{{ $news->name }}'</h3>
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
                            {!! Form::text("name", $news->name, ["class" => "form-control", "placeholder" => "News name..."]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("slug", "Slug", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            {!! Form::text("slug", $news->slug, ["class" => "form-control", "placeholder" => "News slug..."]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("image", "Image", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-8">
                            {!! Form::file("image", ["class" => "form-control"]) !!}
                        </div>
                        <div class="col-md-2">
                            <img src="{{ asset($news->image) }}" class="img-thumbnail img-responsive">
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("content", "Content", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            {!! Form::textarea("content", $news->content, ["class" => "form-control"]) !!}
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-right">
                    <a href="{{ route('backend.news.index') }}" class="btn btn-default">Back</a>
                    {!! Form::submit("Edit News", ["class" => "btn btn-success"]) !!}
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