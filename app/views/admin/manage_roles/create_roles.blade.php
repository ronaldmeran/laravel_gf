@extends('layouts.master')
@extends('layouts.navigation')
@section('title') Create Role @stop
 
@section('content')
@extends('layouts.breadcrumbs')
 
<div class='col-lg-4 col-lg-offset-4'>
 
    @if ($errors->has())
        @foreach ($errors->all() as $error)
            <div class='bg-danger alert'>{{ $error }}</div>
        @endforeach
    @endif
 
    <h1><i class='fa fa-user'></i> Add Role</h1>
 
    {{ Form::open(['role' => 'form', 'url' => '/admin/manage_roles']) }}
 
    <div class='form-group'>
        {{ Form::label('name', 'Role Name') }}
        {{ Form::text('name', null, ['placeholder' => 'Role Name', 'class' => 'form-control']) }}
    </div>
 
    <div class='form-group'>
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>
 
    {{ Form::close() }}
 
</div>
 
@stop