@extends("frontend.layout.default")

@section("content")
    <div class="panel panel-success hasoption">
        <div class="panel-heading">
            <h3 class="panel-title">
                {{ trans("company.brand-companies") }}
                <a href="{{ route('frontend.company.brand') }}" class="btn btn-xs btn-primary pull-right">{{ trans("company.all-brand-companies") }}</a>
            </h3>
        </div>
        <div class="panel-body">
            @if($brands->count() > 0)
                <div class="row">
                    @foreach($brands as $brand)
                        <div class="col-md-4">
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
            @else
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            <p>{{ trans("company.no-brand") }}</p>
                        </div>
                    </div>
                </div>
            @endif
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
            @if($companies->count() > 0)
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
            @else
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            <p>{{ trans('company.no-company') }}</p>
                        </div>
                    </div>
                </div>
            @endif
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
                    <div class="col-md-3">
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
@stop