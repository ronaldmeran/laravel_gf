@extends('layouts.master')
@extends('layouts.navigation')
@section('title') Create User @stop
 
@section('content')
@extends('layouts.breadcrumbs')
 
<div class='col-lg-4 col-lg-offset-4'>
 
    @if ($errors->has())
        @foreach ($errors->all() as $error)
            <div class='bg-danger alert'>{{ $error }}</div>
        @endforeach
    @endif
 
    <h1><i class='fa fa-user'></i> Edit User</h1>
 
    {{ Form::model($user, ['role' => 'form', 'url' => '/admin/manage_user/' . $user->id, 'method' => 'PUT']) }}
 
    <div class='form-group'>
        {{ Form::label('first_name', 'First Name') }}
        {{ Form::text('first_name', null, ['placeholder' => 'First Name', 'class' => 'form-control']) }}
    </div>
 
    <div class='form-group'>
        {{ Form::label('last_name', 'Last Name') }}
        {{ Form::text('last_name', null, ['placeholder' => 'Last Name', 'class' => 'form-control']) }}
    </div>
 
    <div class='form-group'>
        {{ Form::label('username', 'Username') }}
        {{ Form::text('username', null, ['placeholder' => 'Username', 'class' => 'form-control']) }}
    </div>
 
    <div class='form-group'>
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) }}
    </div>
    
    <div class='form-group'>
        {{ Form::label('role', 'Role') }}
        <select name="role" class="form-control">
            <option value="0">Select Role</option>
            @foreach($app_role->generateRoles() as $roles)                
                <option value='{{$roles->id}}' @if($roles->id == $app_role->getRoles($user->id)) selected @endif >{{$roles->name}}</option>
            @endforeach
        </select>
    </div>
    <div class='form-group'>
        {{ Form::label('is_active', 'Status') }}
        <select name="is_active" class="form-control">
                <option value="1" @if($users->getStatus($user->id) == 1) selected @endif>Active</option>
                <option value="0" @if($users->getStatus($user->id) == 0) selected @endif>Inactive</option>
        </select>
    </div>
 
    <div class='form-group'>
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) }}
    </div>
 
    <div class='form-group'>
        {{ Form::label('password_confirmation', 'Confirm Password') }}
        {{ Form::password('password_confirmation', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) }}
    </div>
 
    <div class='form-group'>
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>
 
    {{ Form::close() }}
 
</div>
 
@stop