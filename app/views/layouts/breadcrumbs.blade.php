@section('breadcrumbs')
	@foreach ($nav as $navi)
		{{$navi->bread_menu()}}
   	@endforeach
@stop