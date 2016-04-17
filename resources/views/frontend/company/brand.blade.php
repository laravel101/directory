@extends("frontend.layout.default")

@section("content")
    <div class="panel panel-success hasoption">
        <div class="panel-heading">
            <h3 class="panel-title">
                {{ trans('company.all-brand-companies') }}
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
                            <div class="work-sector"><span class="label label-primary">{{ $brand->sector->name }}</span></div>
                        </div>
                        <div class="work-body">
                            <h4 class="text-center"><a href="{{ route('frontend.company.show', $brand->slug) }}">{{ $brand->name }}</a></h4>
                            <p class="text-center text-muted">({{ $brand->town->city->name }}, {{ $brand->town->name }})</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        {!! $brands->render() !!}
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            <p>{{ trans('company.no-brand') }}</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@stop