@include('layouts.head')
@include('layouts.header')
@include('layouts.navbar')
@include('layouts.phone.choseCarMenu')
@include('layouts.phone.mainMenu')


@if(!isset($car_id))
	@include('layouts.leftSidebarCar')
	@yield('content')
@else
	@include('layouts.leftSideBarCategoties')
	@yield('content')
@endif


@include('layouts.footer')
@include('layouts.scripts')
