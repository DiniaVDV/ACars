@extends('layouts.appWithoutSidebar')

@section('content')
<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3 authTable">
	<div class="panel panel-default auth">
		<div class="panel-heading authHead"><h4>Востановить пароль</h4></div>
		<div class="panel-body">
			@if (session('status'))
				<div class="alert alert-success">
					{{ session('status') }}
				</div>
			@endif

			<form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
				{{ csrf_field() }}

				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					<label for="email" class="col-md-4 control-label">Введите свой email:</label>

					<div class="col-md-6">
						<input id="email" type="email" placeholder="example@gmail.com" class="form-control" name="email" value="{{ old('email') }}" required>

						@if ($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
						@endif
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn authButton">
							Востановить пароль
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection
