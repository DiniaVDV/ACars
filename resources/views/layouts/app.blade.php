@include('layouts.head')
@include('layouts.header')
@include('layouts.navbar')


@if(!isset($car['id']))
	@include('layouts.leftSidebarCar')
	@yield('content')
@else
	@include('layouts.leftSideBarCategoties', array('car' => $car['alias']))
	@yield('content')
@endif


@include('layouts.footer')
@include('layouts.scripts')
