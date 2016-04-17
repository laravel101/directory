@extends("frontend.layout.default")

@section("container")
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-success hasoption">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        {{ trans("company.brand-companies") }}
                        <a href="{{ route('frontend.brand.index') }}" class="btn btn-xs btn-primary pull-right">{{ trans("company.all-brand-companies") }}</a>
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        @foreach($brands as $brand)
                        <div class="col-md-3">
                            <div class="work">
                                <div class="work-head">
                                    <a href="{{ route('frontend.company.show', $brand->slug) }}"><img src="{{ asset($brand->image) }}" class="img-responsive"></a>
                                    <div class="work-sector"><span class="label label-success">{{ $brand->sector->name }}</span></div>
                                </div>
                                <div class="work-body">
                                    <h4 class="text-center"><a href="{{ route('frontend.company.show', $brand->slug) }}">{{ $brand->name }}</a></h4>
                                    <p class="text-center text-muted">({{ $brand->town->city->name }}, {{ $brand->town->name }})</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="panel panel-default hasoption">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        {{ trans("company.new-companies") }}
                        <a href="{{ route('frontend.company.index') }}" class="btn btn-xs btn-primary pull-right">{{ trans("company.all-companies") }}</a>
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        @foreach($companies as $company)
                        <div class="col-md-4">
                            <div class="work">
                                <div class="work-head">
                                    <a href="{{ route('frontend.company.show', $company->slug) }}"><img src="{{ asset($company->image) }}" class="img-responsive"></a>
                                    <div class="work-sector"><span class="label label-primary">{{ $company->sector->name }}</span></div>
                                </div>
                                <div class="work-body">
                                    <h4 class="text-center"><a href="{{ route('frontend.company.show', $company->slug) }}">{{ $company->name }}</a></h4>
                                    <p class="text-center text-muted">({{ $company->town->city->name }}, {{ $company->town->name }})</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="panel panel-default hasoption">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        {{ trans('sector.sectors') }}
                        <a href="{{ route('frontend.sector.index') }}" class="btn btn-xs btn-default pull-right">{{ trans('sector.all-sectors') }}</a>
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        @foreach($sectors as $sector)
                        <div class="col-md-4">
                            <div class="sector-box">
                                <h4>
                                    <a href="{{ route('frontend.sector.show', $sector->slug) }}">
                                        <i class="{{ $sector->icon }}"></i>
                                        {{ $sector->name }}
                                    </a>
                                </h4>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="widget widget-search panel panel-default">
                {!! Form::open(["route" => 'frontend.company.search', "method" => 'GET']) !!}
                    <div class="panel-body">
                        <div class="input-group">
                            {!! Form::text('q', old('q'), ["class" => "form-control", "placeholder" => trans('company.search')]) !!}
                            <span class="input-group-btn">
                                {!! Form::button('<i class="fa fa-search"></i>', ['type' => "submit", 'class' => "btn btn-primary"]) !!}
                            </span>
                        </div>
                        <!-- /input-group -->
                    </div>
                {!! Form::close() !!}
            </div>

            <div class="widget widget-login panel panel-primary">
                {!! Form::open(['route' => 'frontend.user.login']) !!}
                <div class="panel-heading">
                    <h3 class="panel-title">{{ trans('login.login') }}</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        {!! Form::label('username', trans("user.username")) !!}
                        {!! Form::text("username", old("username"), ["class" => "form-control", "placeholder" => trans('user.username')]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('password', trans("user.password")) !!}
                        {!! Form::password('password', ["class" => "form-control", "placeholder" => trans('user.password')]) !!}
                        <a href="{{ route('frontend.user.reset.email') }}" class="passwordreset">{{ trans('login.forgotten-password') }}</a>
                    </div>
                </div>
                <div class="panel-footer text-right">
                    {!! Form::button(trans('login.login').' <i class="fa fa-sign-in"></i>', ["class" => "btn btn-primary", "type" => "submit"]) !!}
                </div>
                {!! Form::close() !!}
            </div>

            <div class="widget widget-sectors panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        {{ trans('sector.sectors') }}
                        <a href="{{ route('frontend.sector.index') }}" class="btn btn-primary btn-xs pull-right">{{ trans('sector.all-sectors') }}</a>
                    </h3>
                </div>
                <div class="panel-body">
                    @foreach($allSectors as $sector)
                    <div class="list-group">
                        <a href="{{ route('frontend.sector.show', $sector->slug) }}>" class="list-group-item"><i class="{{ $sector->icon }}"></i> &nbsp; {{ $sector->name }}</a>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="widget widget-ads panel panel-default">
                <div class="panel-body">
                    <img src="http://placehold.it/358x250" class="img-responsive">
                </div>
            </div>

            <div class="widget widget-news panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        {{ trans("news.news") }}
                        <a href="{{ route('frontend.news.index') }}" class="btn btn-primary btn-xs pull-right">{{ trans('news.all-news') }}</a>
                    </h3>
                </div>
                <div class="panel-body">
                    @foreach($news as $item)
                    <div class="row">
                        <div class="col-xs-3">
                            <img src="{{ asset($item->image) }}" class="img-thumbnail img-responsive">
                        </div>
                        <div class="col-xs-9">
                            <h4>{{ $item->name }}</h4>
                            <p class="text-muted">{{ trans('news.date', ['date' => $item->created_at->format('d.m.Y')]) }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@stop