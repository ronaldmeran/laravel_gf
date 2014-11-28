@section('navigation')
    <nav class="navbar navbar-static">
        <div class="navbar-collapse collase">
          <ul class="nav navbar-nav" roll="menu">
            <li>{{ HTML::link('home/dashboard', 'Home') }}</li>
            @foreach ($nav as $navi)

               <li class="dropdown">
                  {{ $navi->hasChild($navi->id,$navi->url) }}
                  {{ $navi->name }}&nbsp;</a>
                  {{ $navi->generateChildNavigation($navi->id)}}
              </li>

            @endforeach
          </ul>
          <ul class="nav navbar-right navbar-nav">
            <li><span style="position:relative;display:block;padding:15px 15px;line-height:20px;">Welcome, {{ Session::get('username') }} </span></li>
            <li><a href="/logout" class="pull-right">Logout</a></li>
          </ul>
        </div>
    </nav>
@stop