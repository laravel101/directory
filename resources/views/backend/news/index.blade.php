@extends("backend.layout.page")

@section("content")
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{ route('backend.news.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Create News</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title">News</h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    </ul>
                </div>
                @if($news->count() > 0)
                    <div class="panel-body panel-body-table">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th class="text-center">Views</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($news as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td class="text-center">
                                        <span class="label label-primary">{{ $item->views }} Views</span>
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ route('backend.news.edit', $item->slug) }}" title="{{ $item->name }}" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                                        <a href="{{ route('backend.news.destroy', $item->slug) }}" title="{{ $item->name }}" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i> Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if($news->render())
                        <div class="panel-footer">
                            {!! $news->render() !!}
                        </div>
                    @endif
                @else
                    <div class="panel-body">
                        <div class="alert alert-danger">
                            <p>There is no news.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@stop

@section("page.plugins")
    @parent
@stop

@section("page.js")
    @parent
@stop