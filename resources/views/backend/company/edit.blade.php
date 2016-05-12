@extends("backend.layout.page")

@section("content")
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(["route" => ["backend.company.update", $company->slug], "method" => "PUT", "class" => "form-horizontal", "files" => true]) !!}
            {!! Form::hidden("id", $company->id) !!}
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title">Edit Company '{{ $company->name }}'</h3>
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
                            {!! Form::text("name", $company->name, ["class" => "form-control", "placeholder" => "Company name..."]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("slug", "Slug", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            {!! Form::text("slug", $company->slug, ["class" => "form-control", "placeholder" => "Company slug..."]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("sector_id", "Sector", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            {!! Form::select("sector_id", App\Sector::lists("name", "id")->toArray(), $company->sector_id, ["class" => "form-control"]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("city_id", "City/Town", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-5">
                            {!! Form::select("city_id", App\City::lists("name", "id")->toArray(), $company->city_id, ["class" => "form-control"]) !!}
                        </div>
                        <div class="col-md-5">
                            {!! Form::select("town_id", App\City::first()->towns()->lists("name", "id")->toArray(), old("town_id") ? old("town_id") : $company->town_id, ["class" => "form-control", "data-old" => old("town_id") ? old("town_id") : $company->town_id]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("image", "Image", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-8">
                            {!! Form::file("image", ["class" => "form-control"]) !!}
                        </div>
                        <div class="col-md-2">
                            <img src="{{ asset($company->image) }}" class="img-thumbnail img-responsive">
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("content", "Content", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            {!! Form::textarea("content", $company->content, ["class" => "form-control"]) !!}
                        </div>
                    </div>
                        <div class="form-group">
                            {!! Form::label("tags", "Tags", ["class" => "col-md-2 control-label"]) !!}
                            <div class="col-md-10">
                                {!! Form::text("tags", $tags, ["class" => "form-control tagsinput"]) !!}
                            </div>
                        </div>
                    <div class="form-group">
                        {!! Form::label("phone", "Phone", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            {!! Form::text("phone", $company->phone, ["class" => "form-control", "placeholder" => "Phone"]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("fax", "Fax", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            {!! Form::text("fax", $company->fax, ["class" => "form-control", "placeholder" => "Fax"]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("email", "E-Mail", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            {!! Form::text("email", $company->email, ["class" => "form-control", "placeholder" => "E-Mail"]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("website", "Website", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            {!! Form::text("website", $company->website, ["class" => "form-control", "placeholder" => "Website"]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("facebook", "Facebook", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            {!! Form::text("facebook", $company->facebook, ["class" => "form-control", "placeholder" => "Facebook"]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("twitter", "Twitter", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            {!! Form::text("twitter", $company->twitter, ["class" => "form-control", "placeholder" => "Twitter"]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("google", "Google+", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            {!! Form::text("google", $company->google, ["class" => "form-control", "placeholder" => "Google+"]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("latitude", "Coordinates", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-5">
                            {!! Form::text("latitude", $company->latitude, ["class" => "form-control", "placeholder" => "Latitude"]) !!}
                        </div>
                        <div class="col-md-5">
                            {!! Form::text("longitude", $company->longitude, ["class" => "form-control", "placeholder" => "Longitude"]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("is_brand", "Is Brand?", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            <label class="check">
                                {!! Form::checkbox("is_brand", true, $company->is_brand, ["class" => "icheckbox"]) !!}
                                Set brand for this company
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("is_active", "Is Active?", ["class" => "col-md-2 control-label"]) !!}
                        <div class="col-md-10">
                            <label class="check">
                                {!! Form::checkbox("is_active", true, $company->is_active, ["class" => "icheckbox"]) !!}
                                Active this company
                            </label>
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-right">
                    <a href="{{ route('backend.company.index') }}" class="btn btn-default">Back</a>
                    {!! Form::submit("Edit Company", ["class" => "btn btn-info"]) !!}
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
    <script>
        var formCity = $("#form-city");
        var formTown = $("#form-town");

        formCity.change(function(){
            console.log("changing");
            formCity.attr("disabled", "disabled");
            formTown.attr("disabled", "disabled");

            formTown.html("<option>İlçeler Yükleniyor...</option>");
            $.ajax({
                method: "GET",
                data: "city="+$(this).val(),
                dataType: "JSON",
                url: "{{ route('backend.city.towns') }}"
            }).done(function(data){
                formTown.html("");
                $.each(data, function(i, town){
                    formTown.append("<option value='"+town.id+"'>"+town.name+"</option>");
                });
                formCity.removeAttr("disabled");
                formTown.removeAttr("disabled");
            });
        });
    </script>
@stop