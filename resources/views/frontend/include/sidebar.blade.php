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

@if(!auth()->check())
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
@endif

<div class="widget widget-sectors panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">
            {{ trans('sector.sectors') }}
            <a href="{{ route('frontend.sector.index') }}" class="btn btn-primary btn-xs pull-right">{{ trans('sector.all-sectors') }}</a>
        </h3>
    </div>
    <div class="panel-body">
        @foreach(\App\Sector::whereNull("parent_id")->latest()->get() as $sector)
            <div class="list-group">
                <a href="{{ route('frontend.sector.show', $sector->slug) }}" class="list-group-item"><i class="{{ $sector->icon }}"></i> &nbsp; {{ $sector->name }}</a>
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
        @foreach(\App\News::latest()->take(5)->get() as $item)
            <div class="row">
                @if($item->image)
                    <div class="col-xs-3">
                        <a href="{{ route('frontend.news.show', $item->slug) }}"><img src="{{ asset($item->image) }}" class="img-thumbnail img-responsive"></a>
                    </div>
                    <div class="col-xs-9">
                @else
                    <div class="col-xs-12">
                @endif
                    <h4><a href="{{ route('frontend.news.show', $item->slug) }}">{{ $item->name }}</a></h4>
                    <p class="text-muted">{{ trans('news.date', ['date' => $item->created_at->format('d.m.Y')]) }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>