@extends('layouts.appWithoutSidebar')

@section('content')
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <div class="panel panel-default auth">
            <div class="authHead panel-heading"><h4>Повторная отправка письма для подтверджения регистрации</h4></div>

            @if(Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {!!Session::get('message')!!}
                </div>
            @endif

            <div class="panel-body">
                <form role="form" method="POST" action="{{ asset('repeat_confirm') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label">E-Mail:</label>
                        <input id="email" type="email" placeholder="Введите e-mail" class="form-control" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn authButton">
                                Запрос
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection