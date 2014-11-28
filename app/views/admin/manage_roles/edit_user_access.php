@extends('layouts.master')
@extends('layouts.navigation')
@section('content')
@extends('layouts.breadcrumbs')


<div class="col-lg-10 col-lg-offset-1">
 
    <h1><i class="fa fa-users"></i> Manage User Access </h1>
     <!--a href="/admin/manage_roles/create" class="btn btn-success">Add Role</a-->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
 
            <thead>
                <tr>
                    <th>Name</th>
                    <th></th>
                </tr>
            </thead>
 
            <tbody>
                
                <tr>
                    <td></td>
                    <td>
						User access
                    </td>
                </tr>
   
            </tbody>
 
        </table>
    </div>
 <!--div>{{$roles->links()}}</div-->
   
 
</div>
 
@stop
