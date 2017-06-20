<div class="panel panel-default auth">
	<div class="authHead panel-heading"><h4>Регистрация</h4></div>
	<div class="panel-body">
		<form role="form" method="POST" action="{{ route('register') }}">
			{{ csrf_field() }}

			<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
				<label for="name" class="control-label">Имя:</label>
				<input id="name" type="text" placeholder="Введите имя" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

					@if ($errors->has('name'))
						<span class="help-block">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
					@endif

			</div>
			<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
				<label for="email" class="control-label">E-Mail:</label>
				<input id="email" type="email" placeholder="Введите e-mail" class="form-control" name="email" value="{{ old('email') }}" required>

					@if ($errors->has('email'))
						<span class="help-block">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
					@endif
			</div>	
			<div class="form-group{{ $errors->has('phoneNumber') ? ' has-error' : '' }}">
				<label for="email" class="control-label">Номер телефона:</label>
				<input id="phoneNumber" type="text" placeholder="Введите номер телефона" class="form-control" name="phoneNumber" value="{{ old('phoneNumber') }}" required>
					@if ($errors->has('phoneNumber'))
						<span class="help-block">
							<strong>{{ $errors->first('phoneNumber') }}</strong>
						</span>
					@endif
			</div>

			<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
				<label for="password" class="control-label">Пароль:</label>
				<input id="password" type="password" placeholder="Введите пароль" class="form-control" name="password" required>
					@if ($errors->has('password'))
						<span class="help-block">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
					@endif
			</div>

			<div class="form-group">
				<label for="password-confirm" class="control-label">Подтвердите пароля:</label>
				<input id="password-confirm" type="password" placeholder="Введите пароль еще раз" class="form-control" name="password_confirmation" required>
			</div>
			<div class="form-group">
				<div class="col-md-6 col-md-offset-4">
					<button type="submit" class="btn authButton">
						Регистрация
					</button>
				</div>
			</div>
		</form>
	</div>
</div>



