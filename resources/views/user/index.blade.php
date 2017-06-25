@extends('user.profile')
@section('content')		
	<h3>Личные данные</h3>
	@if(!empty($aboutUser))
		<table class="table">
			
		</table>
	@else
		@include('user.ownInfoForm')
	@endif
@endsection
