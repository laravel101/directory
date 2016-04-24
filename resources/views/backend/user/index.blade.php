@extends("backend.layout.page")

@section("content")
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{ route('backend.user.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Create New User</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title">Users</h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    </ul>
                </div>
                @if($users->count() > 0)
                    <div class="panel-body panel-body-table">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>E-Mail</th>
                                <th>Username</th>
                                <th class="text-center">Is Admin?</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td class="text-center">
                                        @if($user->is_admin)
                                            <span class="label label-success">Admin</span>
                                        @else
                                            <span class="label label-danger">User</span>
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ route('backend.user.edit', $user->username) }}" title="{{ $user->name }}" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                                        <a href="{{ route('backend.user.destroy', $user->username) }}" title="{{ $user->name }}" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i> Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if($users->render())
                        <div class="panel-footer">
                            {!! $users->render() !!}
                        </div>
                    @endif
                @else
                    <div class="panel-body">
                        <div class="alert alert-danger">
                            <p>There is no user.</p>
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