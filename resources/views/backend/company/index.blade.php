@extends("backend.layout.page")

@section("content")
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{ route('backend.company.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> New Company</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title">Companies</h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    </ul>
                </div>
                @if($companies->count() > 0)
                    <div class="panel-body panel-body-table">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th class="text-center">Sector</th>
                                <th class="text-center">Views</th>
                                <th class="text-center">Is Brand</th>
                                <th class="text-center">Is Active</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($companies as $company)
                                <tr>
                                    <td>{{ $company->id }}</td>
                                    <td>{{ $company->name }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('backend.sector.edit', $company->sector->slug) }}" class="btn btn-xs btn-primary">{{ $company->sector->name }}</a>
                                    </td>
                                    <td class="text-center">
                                        <span class="label label-primary">{{ $company->views }} Views</span>
                                    </td>
                                    <td class="text-center">
                                        @if($company->is_brand)
                                            <a href="{{ route('backend.company.brand', $company->slug) }}" class="btn btn-xs btn-success"><i class="fa fa-check"></i> Brand</a>
                                        @else
                                            <a href="{{ route('backend.company.brand', $company->slug) }}" class="btn btn-xs btn-danger"><i class="fa fa-times"></i> Not Brand</a>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($company->is_active)
                                            <a href="{{ route('backend.company.active', $company->slug) }}" class="btn btn-xs btn-success"><i class="fa fa-check"></i> Active</a>
                                        @else
                                            <a href="{{ route('backend.company.active', $company->slug) }}" class="btn btn-xs btn-danger"><i class="fa fa-times"></i> Not Active</a>
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ route('backend.company.edit', $company->slug) }}" title="{{ $company->name }}" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                                        <a href="{{ route('backend.company.destroy', $company->slug) }}" title="{{ $company->name }}" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i> Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if($companies->render())
                        <div class="panel-footer">
                            {!! $companies->render() !!}
                        </div>
                    @endif
                @else
                    <div class="panel-body">
                        <div class="alert alert-danger">
                            <p>There is no company.</p>
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