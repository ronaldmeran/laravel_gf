@extends('layouts.master')
@extends('layouts.navigation')
@section('content')
@extends('layouts.breadcrumbs')

<div class="col-lg-10 col-lg-offset-1">
 
    <h1><i class="fa fa-users"></i> Manage Roles </h1>
     <a href="/admin/manage_roles/create" class="btn btn-success">Add Role</a>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
 
            <thead>
                <tr>
                    <th>Name</th>
                    <th></th>
                </tr>
            </thead>
 
            <tbody>
                @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>
                        <a href="/admin/manage_roles/{{ $role->id }}/edit" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
                        {{ Form::open(['url' => '/admin/manage_roles/' . $role->id, 'method' => 'DELETE']) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {{ Form::close() }}
                    </td>
                </tr>
                @endforeach
            </tbody>
 
        </table>
    </div>
 <div>{{$roles->links()}}</div>
   
 
</div>
 
@stop
