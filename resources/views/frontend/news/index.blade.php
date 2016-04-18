@extends("frontend.layout.default")

@section("content")
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ trans("news.all-news") }}
        </div>
        <div class="panel-body">
            <div class="row">
                @foreach($news as $item)
                    <div class="col-md-12">
                        <div class="well well-sm">
                            <div class="row">
                                @if($item->image)
                                    <div class="col-md-4 col-sm-12 text-center">
                                        <a href="{{ route('frontend.news.show', $item->slug) }}">
                                            <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" class="img-responsive img-thumbnail">
                                        </a>
                                    </div>
                                    <div class="col-md-8 col-sm-12">
                                @else
                                    <div class="col-md-12">
                                @endif
                                    <h4><a href="{{ route('frontend.news.show', $item->slug) }}">{{ $item->name }}</a></h4>
                                    <p class="text-muted"><small>{{ trans("news.date", ["date" => $item->created_at->format("d.m.Y")]) }}</small></p>
                                    <p>{{ strip_tags($item->content) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop