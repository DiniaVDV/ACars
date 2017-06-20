@extends('admin.app')
@section('content')
    <h1 class="page-header">Випадающее меню</h1>
    @include('admin.partials.flash')
    <div class=bs-example data-example-id=striped-table>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Название</th>
                <th>Для незарегистированых пльзователей</th>
                <th>Для зарегистированых пльзователей</th>
                <th>Для модератора</th>
                <th class="tableCenter">Для админа</th>
                <th class="tableCenter">Действие</th>
            </tr>
            </thead>
    @foreach($dropdowns as $dropdown)
            <tbody>
                <tr>
                    <td><strong>{{$dropdown->id}}</strong></td>
                    <td><strong>{{$dropdown->title}}</strong></td>
                    <td><strong>{{$dropdown->for_unreg_users}}</strong></td>
                    <td align="center"><strong>{{$dropdown->for_reg_users}}</strong></td>
                    <td align="center"><strong>{{$dropdown->for_moderator}}</strong></td>
                    <td align="center"><strong>{{$dropdown->for_admin}}</strong></td>
                    <td align="center">
                        <a href="{{asset('admin_panel/dropdown')}}/{{$dropdown->id}}/edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a href="{{asset('admin_panel/dropdown')}}/{{$dropdown->id}}/delete" onclick="return confirmDelete('пункт')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    </td>
                </tr>
            </tbody>
    @endforeach
        </table>
    </div>

@endsection