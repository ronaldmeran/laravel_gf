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
 
    <h1><i class='fa fa-user'></i> Add Module</h1>
 
    {{ Form::open(['role' => 'form', 'url' => '/admin/manage_modules']) }}
 
    <div class='form-group'>
        {{ Form::label('name', 'Module Name') }}
        {{ Form::text('name', null, ['placeholder' => 'Module Name', 'class' => 'form-control']) }}
    </div>
 
    <div class='form-group'>
        {{ Form::label('url', 'URL') }}
        {{ Form::text('url', null, ['placeholder' => 'URL', 'class' => 'form-control']) }}
    </div>
 
    <div class='form-group'>
        {{ Form::label('parent', 'Parent Link') }}
        <select name="parent_id" class="form-control">
            <option value="0">Select Parent Link</option>
            @foreach($app_module as $modules)
                <option value='{{$modules->id}}'>{{$modules->name}}</option> 
            @endforeach
        </select>
    </div>
 
    <div class='form-group'>
        {{ Form::label('is_active', 'Status') }}
        <select name="is_active" class="form-control">
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>
    </div>

     <div class='form-group'>
        {{ Form::label('role', 'Assigned Role') }}
        <select name="role[]" class="form-control" multiple>
            <option value="0"></option>
            @foreach($role as $roles)
                <option value='{{$roles->id}}'>{{$roles->name}}</option> 
            @endforeach
        </select>
    </div>
    <div class='form-group'>
        {{ Form::label('module_order', 'Link Order') }}
        <select name="module_order" class="form-control">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
    </div> 
    <div class='form-group'>
        {{ Form::label('model_file', 'Model') }}
        <p>\app\models\[file_name]</p>
        {{ Form::text('model_file',null, ['placeholder' => 'Model', 'class' => 'form-control']) }}

    </div>

    <div class='form-group'>
        {{ Form::label('view_file', 'View') }}
        <p>\app\views\[folder_name]\[file_name]</p>
        {{ Form::text('view_file',null, ['placeholder' => 'View', 'class' => 'form-control']) }}
    </div>

    <div class='form-group'>
        {{ Form::label('controller_file', 'Controller') }}
        <p>\app\controllers\[file_name]</p>
        {{ Form::text('controller_file',null, ['placeholder' => 'Controller', 'class' => 'form-control']) }}
    </div>

    <div class='form-group'>
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>
 
    {{ Form::close() }}
 
</div>
 
@stop