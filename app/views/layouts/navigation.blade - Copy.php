@section('navigation')
<div>
    <nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li>{{ HTML::link('home/dashboard', 'Home') }}</li>   
          <li>{{ HTML::link('admin/manage_user', 'Manage Users') }}</li>
          <li>{{ HTML::link('admin/manage_roles', 'Manage Roles') }}</li>
          <li>{{ HTML::link('admin/manage_modules', 'Manage Modules') }}</li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Setup<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Manage Users</a></li>
              <li><a href="#">Manage Roles</a></li>
              <li><a href="#">Manage Modules</a></li>
            </ul>
          </li>
          <li><a href="/logout" class="pull-right">Logout</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
</div>
