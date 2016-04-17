@extends("frontend.layout.default")

@section("content")
    <div class="panel panel-default hasoption">
        <div class="panel-heading">
            <h3 class="panel-title">
                {{ trans('sector.sectors') }}
            </h3>
        </div>
        <div class="panel-body">
            @if($sectors->count() > 0)
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
                <div class="row">
                    <div class="col-md-12 text-center">
                        {!! $sectors->render() !!}
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            <p>{{ trans('sector.no-sector') }}</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@stop