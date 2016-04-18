@extends("frontend.layout.default")

@section("content")
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ $news->name }}
            <span class="pull-right label label-primary"><i class="fa fa-eye"></i> &nbsp; {{ $news->views }}</span>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    @if($news->image)
                        <div class="text-center">
                            <img src="{{ asset($news->image) }}" alt="{{ $news->name }}" class="img-responsive img-thumbnail">
                        </div>
                    @endif
                    {!! $news->content !!}
                </div>
            </div>
        </div>
    </div>
@stop