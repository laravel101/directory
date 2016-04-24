@extends("backend.layout.page")

@section("content")
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(["route" => "backend.company.store", "class" => "form-horizontal", "files" => true]) !!}
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title">Create New Company</h3>
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
                            {!! Form::text("name", old("name"), ["class" => "form-control", "placeholder" => "Company name..."]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("slug", "Slug", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            {!! Form::text("slug", old("slug"), ["class" => "form-control", "placeholder" => "Company slug..."]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("sector_id", "Sector", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            {!! Form::select("sector_id", App\Sector::lists("name", "id")->toArray(), old("sector_id"), ["class" => "form-control"]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("city_id", "City/Town", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-5">
                            {!! Form::select("city_id", App\City::lists("name", "id")->toArray(), old("city_id"), ["class" => "form-control"]) !!}
                        </div>
                        <div class="col-md-5">
                            {!! Form::select("town_id", App\City::first()->towns()->lists("name", "id")->toArray(), old("town_id"), ["class" => "form-control", "data-old" => old("town_id")]) !!}
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
                    <div class="form-group">
                        {!! Form::label("tags", "Tags", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            {!! Form::text("tags", old("tags"), ["class" => "form-control tagsinput"]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("phone", "Phone", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            {!! Form::text("phone", old("phone"), ["class" => "form-control", "placeholder" => "Phone"]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("fax", "Fax", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            {!! Form::text("fax", old("fax"), ["class" => "form-control", "placeholder" => "Fax"]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("email", "E-Mail", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            {!! Form::text("email", old("email"), ["class" => "form-control", "placeholder" => "E-Mail"]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("website", "Website", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            {!! Form::text("website", old("website"), ["class" => "form-control", "placeholder" => "Website"]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("facebook", "Facebook", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            {!! Form::text("facebook", old("facebook"), ["class" => "form-control", "placeholder" => "Facebook"]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("twitter", "Twitter", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            {!! Form::text("twitter", old("twitter"), ["class" => "form-control", "placeholder" => "Twitter"]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("google", "Google+", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            {!! Form::text("google", old("google"), ["class" => "form-control", "placeholder" => "Google+"]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("latitude", "Coordinates", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-5">
                            {!! Form::text("latitude", old("latitude"), ["class" => "form-control", "placeholder" => "Latitude"]) !!}
                        </div>
                        <div class="col-md-5">
                            {!! Form::text("longitude", old("longitude"), ["class" => "form-control", "placeholder" => "Longitude"]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("is_brand", "Is Brand?", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            <label class="check">
                                {!! Form::checkbox("is_brand", true, old("is_brand"), ["class" => "icheckbox"]) !!}
                                Set brand for this company
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("is_active", "Is Active?", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            <label class="check">
                                {!! Form::checkbox("is_active", true, old("is_active"), ["class" => "icheckbox"]) !!}
                                Active this company
                            </label>
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-right">
                    <a href="{{ route('backend.company.index') }}" class="btn btn-default">Back</a>
                    {!! Form::submit("Create New Company", ["class" => "btn btn-success"]) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section("page.plugins")
    @parent
    <script type="text/javascript" src="{{ asset("backend/js/plugins/tagsinput/jquery.tagsinput.min.js") }}"></script>
@stop

@section("page.js")
    @parent
@stop