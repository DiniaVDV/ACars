@extends('layouts.appWithoutSidebar')

@section('content')
	<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		@include('auth.loginForm')
	</div>
@endsection
