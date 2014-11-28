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
 
    <h1><i class='fa fa-user'></i> Edit Module</h1>
 
    {{ Form::model($app_module, ['role' => 'form', 'url' => '/admin/manage_modules/' . $app_module->id, 'method' => 'PUT']) }}
 
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
            @foreach($app_modules->getActiveModules() as $modules)
                <option value='{{$modules->id}}' @if($modules->id == $app_modules->getParentLink($app_module->id)) selected @endif>{{$modules->name}}</option> 
            @endforeach
        </select>
    </div>
 
    <div class='form-group'>
        {{ Form::label('is_active', 'Status') }}
        <select name="is_active" class="form-control">
                <option value="1" @if($app_modules->getStatus($app_module->id) == 1) selected @endif>Yes</option>
                <option value="0" @if($app_modules->getStatus($app_module->id) == 0) selected @endif>No</option>
        </select>
    </div>
    <div class='form-group'>
        {{ Form::label('role', 'Assigned Role') }}
        <select name="role[]" class="form-control" multiple>
            <option value=""></option>
            @foreach($role as $roles)
                <option value='{{$roles->id}}' @if(in_array($roles->id,$app_role->getModuleAccessRoles($app_module->id))) selected @endif>{{$roles->name}}</option> 
            @endforeach
        </select>
    </div>
     <div class='form-group'>
        {{ Form::label('module_order', 'Link Order') }}
        <select name="module_order" class="form-control">
			
			
            <option value="1" @if($app_modules->getModuleOrder($app_module->id) == 1) selected @endif>1</option>
            <option value="2" @if($app_modules->getModuleOrder($app_module->id) == 2) selected @endif>2</option>
            <option value="3" @if($app_modules->getModuleOrder($app_module->id) == 3) selected @endif>3</option>
            <option value="4" @if($app_modules->getModuleOrder($app_module->id) == 4) selected @endif>4</option>
            <option value="5" @if($app_modules->getModuleOrder($app_module->id) == 5) selected @endif>5</option>
            <option value="6" @if($app_modules->getModuleOrder($app_module->id) == 6) selected @endif>6</option>
            <option value="7" @if($app_modules->getModuleOrder($app_module->id) == 7) selected @endif>7</option>
            <option value="8" @if($app_modules->getModuleOrder($app_module->id) == 8) selected @endif>8</option>
            <option value="9" @if($app_modules->getModuleOrder($app_module->id) == 9) selected @endif>9</option>
            <option value="10" @if($app_modules->getModuleOrder($app_module->id) == 10) selected @endif>10</option>
			
			
        </select>
    </div> 
    <div class='form-group'>
        {{ Form::label('model_file', 'Model') }}
        <p>/app/models/[file_name]</p>
        {{ Form::text('model_file',null, ['placeholder' => 'Model', 'class' => 'form-control']) }}

    </div>

    <div class='form-group'>
        {{ Form::label('view_file', 'View') }}
        <p>/app/views/[folder_name]/[file_name]</p>
        {{ Form::text('view_file',null, ['placeholder' => 'View', 'class' => 'form-control']) }}
    </div>

    <div class='form-group'>
        {{ Form::label('controller_file', 'Controller') }}
        <p>/app/controllers/[folder_name]/[file_name]</p>
        {{ Form::text('controller_file',null, ['placeholder' => 'Controller', 'class' => 'form-control']) }}
    </div>

    <div class='form-group'>
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>
 
    {{ Form::close() }}
 
</div>
 
@stop