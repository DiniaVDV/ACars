@extends('layouts.appWithoutSidebar')

@section('content')
<div class="panel panel-default auth">
	<div class="panel-heading authHead"><h4>Вход</h4></div>
	<div class="panel-body">
		<form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
			{{ csrf_field() }}

			<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
				<label for="email" class="col-md-4 control-label">E-Mail</label>

				<div class="col-md-6">
					<input id="email" type="email" placeholder="Введите e-mail" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

					@if ($errors->has('email'))
						<span class="help-block">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
				<label for="password" class="col-md-4 control-label">Пароль</label>

				<div class="col-md-6">
					<input id="password" type="password" placeholder="Введите пароль" class="form-control" name="password" required>

					@if ($errors->has('password'))
						<span class="help-block">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
					@endif
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-6 col-md-offset-4">
					<div class="checkbox">
						<label>
							<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Запомнить меня
						</label>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-8 col-md-offset-4">
					<button type="submit" class="btn authButton">
						Войти
					</button>

					<a class="btn" href="{{ route('password.request') }}" style="color: #e3ebee;">
						Забыл пароль?
					</a>
				</div>
			</div>
		</form>
	</div>
</div>

@endsection
