@extends("frontend.layout.default")

@section("content")
    <div class="panel panel-default hasoption">
        <div class="panel-heading">
            <h3 class="panel-title">
                <i class="{{ $sector->icon }}"></i> &nbsp; {{ trans('sector.companies', ['sector' => $sector->name, 'companies' => $sector->companies->count()]) }}
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
                <div class="row">
                    <div class="col-md-12 text-center">
                        {!! $companies->render() !!}
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            <p>{{ trans('sector.no-company', ['sector' => $sector->name]) }}</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@stop