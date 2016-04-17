@extends("frontend.layout.default")

@section("content")
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ $company->name }}
            <span class="pull-right label label-primary"><i class="fa fa-eye"></i> &nbsp; {{ $company->views }}</span>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <p><img src="{{ asset($company->image) }}" class="img-responsive img-thumbnail" alt="{{ $company->name }}" /></p>
                </div>
                <div class="col-md-12">
                    <ul class="list-group">
                        <li class="list-group-item"><i class="fa fa-briefcase text-primary"></i> &nbsp; {{ $company->sector->name }}</li>
                        <li class="list-group-item"><i class="fa fa-globe text-primary"></i> &nbsp; {{ $company->town->city->name }}, {{ $company->town->name }}</li>
                        @if($company->phone)
                        <li class="list-group-item"><i class="fa fa-phone text-primary"></i> &nbsp; <a href="tel:{{ $company->phone }}">{{ $company->phone }}</a></li>
                        @endif
                        @if($company->fax)
                        <li class="list-group-item"><i class="fa fa-fax text-primary"></i> &nbsp; {{ $company->fax }}</li>
                        @endif
                        @if($company->email)
                        <li class="list-group-item"><i class="fa fa-envelope-o text-primary"></i> &nbsp; <a href="mailto:{{ $company->email }}">{{ $company->email }}</a></li>
                        @endif
                        @if($company->website)
                        <li class="list-group-item"><i class="fa fa-chrome text-primary"></i> &nbsp; <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a></li>
                        @endif
                        <li class="list-group-item">
                            @if($company->facebook)
                            <a href="{{ $company->facebook }}" target="_blank"><i class="fa fa-facebook-square fa-2x social-facebook"></i></a>
                            @endif
                            @if($company->twitter)
                            <a href="{{ $company->twitter }}" target="_blank"><i class="fa fa-twitter-square fa-2x social-twitter"></i></a>
                            @endif
                            @if($company->google)
                            <a href="{{ $company->google }}" target="_blank"><i class="fa fa-google-plus-square fa-2x social-google-plus"></i></a>
                            @endif
                        </li>
                    </ul>
                </div>
                <div class="col-md-12">
                    {!! $company->content !!}
                </div>
                <div class="col-md-12">
                    @foreach($company->tags as $tag)
                    <span class="label label-default">{{ $tag->name }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop