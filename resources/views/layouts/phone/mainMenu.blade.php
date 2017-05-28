<div class="dropdown visible-xs pull-right">
        <button class="btn btn-default btn-sm dropdown-toggle" type="button" id="buttonMenu" data-toggle="dropdown">
            <span class="glyphicon glyphicon-align-justify smenu" aria-hidden="true"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="buttonMenu">
            <li><a href="#">Главная</a></li>
            <li><a href="#">О компании</a></li>
            <li><a href="#">Оплата и доставка</a></li>
            <li><a href="#">Контакты</a></li>
			<li role="separator" class="divider"></li>
			@if (Auth::guest())
				<li><a href="route('login') ">Войти</a></li>
				<li><a href="route('register') ">Регистрация</a></li>
			@else
				<li><a href="#">Личный кабинет</a></li>
				<li>
					<a href=" route('logout') "
						onclick="event.preventDefault();
								 document.getElementById('logout-form').submit();">
						Выйти
					</a>

					<form id="logout-form" action=" route('logout') " method="POST" style="display: none;">
						{{ csrf_field() }}
					</form>
				</li>
			@endif		
        </ul>
</div>
