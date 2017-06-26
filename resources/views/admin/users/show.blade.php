@extends('admin.app')
@section('content')

    <h1 class="page-header">Пользователи</h1>
    @include('admin.partials.flash')
    <div class=bs-example data-example-id=striped-table>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Имя пользователя</th>
                <th class="tableCenter">Email</th>
                <th>Роли</th>
                <th class="tableCenter tableAction">Действия</th>
            </tr>
            </thead>
    @foreach($users as $user)
            <tbody>
                <tr>
                    <td><strong>{{$user->id}}</strong></td>
                    <td><strong>{{$user->name}}</strong></td>
                    <td align="center"><strong>{{$user->email}}</strong></td>
                    <td>
                        <strong>
                            @foreach($allRoles as $allRole)
                                <?php $flag = false;?>
                                @foreach($roles as $role)
                                    @if($role->pivot->user_id == $user->id && $role->pivot->role_id == $allRole->id)
                                        {{ Form::checkbox('role[]', $user->id . '_' . $role->id, array('role->id', 'allRolesId'), ['class' => 'role'])  }}
                                        {{ Form::label('role', $role->title) }}<br>
                                       <?php $flag = true;?>
                                    @endif
                                @endforeach
                                @if(!$flag)
                                    {{ Form::checkbox('role[]', $user->id . '_' . $allRole->id, false, ['class' => 'role']) }}
                                    {{ Form::label('role', $allRole->title) }}<br>
                                @endif
                            @endforeach
                        </strong>
                    </td>
                    <td align="center">
                        <ul class="nav navbar-top-links">
                            <li class="actioned">
                                <a href="{{asset('admin/users')}}/{{$user->id}}/edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            </li>
                            <li class="actioned">
                                <a href="{{asset('admin/users')}}/{{$user->id}}/delete" onclick="return confirmDelete('пользователя')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </td>
                </tr>
            </tbody>
    @endforeach
        </table>
    </div>
    @include('partials.pagination', ['paginate' => $users])
    <script>


    </script>
@endsection