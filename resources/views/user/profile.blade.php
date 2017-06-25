@include('layouts.head')
@include('layouts.header')
@include('layouts.navbar')
@include('layouts.phone.mainMenu')
@include('user.leftSidebar')
			@yield('content')
		</div>
	</div>
</div>
@include('layouts.footer')
@include('layouts.scripts')

