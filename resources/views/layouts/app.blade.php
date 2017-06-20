@include('layouts.head')
@include('layouts.header')
@include('layouts.navbar')
@include('layouts.phone.mainMenu')

@if(!isset($car['id']))
	@include('layouts.leftSidebarCar')
	@yield('content')
@else
	@include('layouts.leftSideBarCategoties', array('carName' => $car['title']))
	@yield('content')
@endif


@include('layouts.footer')
@include('layouts.scripts')
