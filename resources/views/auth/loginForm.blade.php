<div class="panel panel-default auth">
	<div class="panel-heading authHead"><h4>Вход</h4></div>
	<div class="panel-body">
		@if(Session::has('message'))
			<div class="alert alert-success" role="alert">
				{{Session::get('message')}}
			</div>

		@endif
<form role="form" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="control-label">E-Mail:</label>
        <input id="email" type="email" placeholder="Введите e-mail" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
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
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Запомнить меня
                </label>
            </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn authButton">
            Войти
        </button>

        <a class="btn" href="{{ route('password.request') }}" style="color: #e3ebee;">
            Забыл пароль?
        </a>
    </div>
</form>
</div>
</div>
