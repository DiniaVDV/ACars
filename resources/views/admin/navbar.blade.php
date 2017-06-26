
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"><strong><a href="{{asset('')}}">На главную</a></strong></a>
        </div>
        <ul class="nav navbar-top-links navbar-right">

                <!-- /.dropdown-messages -->
    
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>{{Auth::user()->name}} <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="{{asset('profile')}}"><i class="fa fa-user fa-fw"></i>Профиль</a>
                    </li>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{asset('logout')}}"><i class="fa fa-sign-out fa-fw"></i>Выйти</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="tables.html"><i class="fa fa-table fa-fw"></i> Категории<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ asset('admin/categories')}}"><i class="fa fa-edit fa-fw"></i>Редактировать</a>
                            </li>
                            <li>
                                <a href="{{ asset('admin/category/create')}}">Добавить</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="tables.html"><i class="fa fa-table fa-fw"></i>Автомобили<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ asset('admin/cars') }}"><i class="fa fa-edit fa-fw"></i>Редактировать</a>
                            </li>
                            <li>
                                <a href="{{ asset('admin/cars/create') }}">Добавить</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="forms.html"><i class="fa fa-edit fa-fw"></i>Бренди<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ asset('admin/brands') }}"><i class="fa fa-edit fa-fw"></i>Редактировать</a>
                            </li>
                            <li>
                                <a href="{{ asset('admin/brands/create') }}">Добавить</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-dashboard fa-fw"></i>Товари<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ asset('admin/items') }}"><i class="fa fa-edit fa-fw"></i>Редактировать</a>
                            </li>
                            <li>
                                <a href="{{ asset('admin/items/create') }}">Добавить</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-dashboard fa-fw"></i>Комментарии<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ asset('admin/comments') }}"><i class="fa fa-edit fa-fw"></i>Редактировать</a>
                            </li>
                            <li>
                                <a href="{{ asset('admin/comments/create') }}">Добавить</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-dashboard fa-fw"></i>Заказы<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ asset('admin/orders/waiting') }}"><i class="fa fa-edit fa-fw"></i>Не обработанные заказы</a>
                            </li>
                            <li>
                                <a href="{{ asset('admin/orders') }}">История заказов</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-dashboard fa-fw"></i>Пользователи<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ asset('admin/users') }}"><i class="fa fa-edit fa-fw"></i>Редактировать</a>
                            </li>
                            <li>
                                <a href="{{ asset('admin/users/create') }}">Добавить</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>	
                    <li>
                        <a href="#"><i class="fa fa-dashboard fa-fw"></i>Главное меню<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ asset('admin/main_menu') }}"><i class="fa fa-edit fa-fw"></i>Редактировать</a>
                            </li>
                            <li>
                                <a href="{{ asset('admin/main_menu/create') }}">Добавить</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>						

                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
    </nav>

