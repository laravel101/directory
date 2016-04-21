@extends("backend.layout.page")

@section("content")
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{ route('backend.sector.create', $parent == null ? 0 : $parent->slug) }}" class="btn btn-success"><i class="fa fa-plus"></i> New Sector</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title">@if($parent) {{ $parent->name }} Sub Sectors @else Sectors @endif</h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    </ul>
                </div>
                @if($sectors->count() > 0)
                    <div class="panel-body panel-body-table">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th class="text-center">Company</th>
                                <th class="text-center">Sub Sectors</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sectors as $sector)
                                <tr>
                                    <td>{{ $sector->id }}</td>
                                    <td>@if($sector->icon) <i class="{{ $sector->icon }}"></i> @endif {{ $sector->name }}</td>
                                    <td class="text-center"><span class="label label-primary">{{ $sector->companies->count() }} Company</span></td>
                                    <td class="text-center"><a href="{{ route('backend.sector.index', $sector->slug) }}" class="btn btn-xs btn-info">{{ $sector->subs->count() }} Sub Sectors</a></td>
                                    <td class="text-right">
                                        <a href="{{ route('backend.sector.edit', $sector->slug) }}" title="{{ $sector->name }}" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                                        <a href="{{ route('backend.sector.destroy', $sector->slug) }}" title="{{ $sector->name }}" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i> Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if($sectors->render())
                        <div class="panel-footer">
                            {!! $sectors->render() !!}
                        </div>
                    @endif
                @else
                    <div class="panel-body">
                        <div class="alert alert-danger">
                            <p>There is no sector.</p>
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