@extends('layouts.master')
@extends('layouts.navigation')
@section('content')
@extends('layouts.breadcrumbs')

<div class="col-lg-10 col-lg-offset-1">
 
    <h1><i class="fa fa-users"></i> Manage Modules </h1>
    <div><a href="/admin/manage_modules/create" class="btn btn-success">Add Module</a></div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
 
            <thead>
                <tr>
                    <th>Name</th>
                    <th>URL</th>
                    <th></th>
                </tr>
            </thead>
 
            <tbody>
                @foreach ($app_module as $app_modules)
                <tr>
                    <td>{{ $app_modules->name }}</td>
                    <td>{{ $app_modules->url }}</td>
                    <td>
                        <a href="/admin/manage_modules/{{ $app_modules->id }}/edit" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
                        {{ Form::open(['url' => '/admin/manage_modules/' . $app_modules->id, 'method' => 'DELETE']) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {{ Form::close() }}
                    </td>
                </tr>
                @endforeach
            </tbody>
 
        </table>
    </div>
    <div>{{$app_module->links()}}</div>
</div>
 
@stop
