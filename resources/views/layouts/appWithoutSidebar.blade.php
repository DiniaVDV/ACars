@include('layouts.head')
@include('layouts.header')
@include('layouts.navbar')


<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 content">
@yield('content')

@include('layouts.footer')
@include('layouts.scripts')
