
<div class="panel panel-default auth">
	<div class="authHead panel-heading"><h4>Без регистрации</h4></div>
	<div class="panel-body">
		<form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
			{{ csrf_field() }}

			<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
				<label for="name" class="col-md-6 pull-left">Имя</label>

				<div class="col-md-6">
					<input id="name" type="text" placeholder="Введите имя" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

					@if ($errors->has('name'))
						<span class="help-block">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
				<label for="email" class="col-md-4 control-label">E-Mail</label>

				<div class="col-md-6">
					<input id="email" type="email" placeholder="Введите e-mail" class="form-control" name="email" value="{{ old('email') }}" required>

					@if ($errors->has('email'))
						<span class="help-block">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
					@endif
				</div>
			</div>

			<div class="form-group">
				<label for="password-confirm" class="col-md-4 control-label">Подтверджение пароля</label>

				<div class="col-md-6">
					<input id="password-confirm" type="password" placeholder="Введите пароль еще раз" class="form-control" name="password_confirmation" required>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-6 col-md-offset-4">
					<button type="submit" class="btn authButton">
						Купить
					</button>
				</div>
			</div>
		</form>
	</div>
</div>

