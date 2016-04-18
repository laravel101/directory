@extends("frontend.layout.default")

@section("content")
    <div class="row">
        @if(session("success"))
            <div class="col-md-12">
                <div class="alert alert-success">
                    <p>{{ session("success") }}</p>
                </div>
            </div>
        @endif
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans("contact.info") }}
                </div>
                <div class="panel-body">
                    <p>
                        <i class="fa fa-phone"></i> <a href="tel:">{{ trans("contact.phone", ["phone" => "0 (123) 456 78 90"]) }}</a><br>
                        <i class="fa fa-fax"></i> {{ trans("contact.fax", ["fax" => "0 (123) 456 78 90"]) }}<br>
                        <i class="fa fa-envelope"></i> <a href="mailto:">{{ trans("contact.email", ["email" => "mail@mail.com"]) }}</a><br>
                        <i class="fa fa-map-marker"></i> {{ trans("contact.address", ["address" => "Address Information"]) }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    {{ trans("contact.form") }}
                </div>
                <div class="panel-body">
                    {!! Form::open(["route" => "frontend.contact.send"]) !!}
                    <div class="form-group">
                        {!! Form::label("name", trans("contact.form-name")) !!}
                        {!! Form::text("name", old("name"), ["class" => "form-control"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label("email", trans("contact.form-email")) !!}
                        {!! Form::email("email", old("email"), ["class" => "form-control"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label("phone", trans("contact.form-phone")) !!}
                        {!! Form::text("phone", old("phone"), ["class" => "form-control", "type" => "phone"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label("message", trans("contact.form-message")) !!}
                        {!! Form::textarea("message", old("message"), ["class" => "form-control"]) !!}
                    </div>
                    <div class="text-center">
                        {!! Form::submit(trans("contact.form-send"), ["class" => "btn btn-primary"]) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop