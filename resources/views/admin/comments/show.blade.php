@extends('admin.app')
@section('content')
    @include('admin.partials.flash')
    <h1 class="page-header">Блок ожидающих одобрения комментариев</h1>

    <div class=bs-example data-example-id=striped-table>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Комментарий</th>
                <th class="tableCenter">Дата написания</th>
                <th class="tableCenter">Действие</th>
            </tr>
            </thead>
            @foreach($comments as $comment)
                <tbody>
                <tr>
                    <td><strong>{{$comment->id}}</strong></td>
                    <td><strong>{{$comment->message}}</strong></td>
                    <td align="center"><strong>{{$comment->created_at}}</strong></td>
                    <td align="center">
                        <a href="{{asset('admin/comments')}}/{{$comment->id}}/edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a href="{{asset('admin/comments')}}/{{$comment->id}}/delete" onclick="return confirmDelete('отзыв')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    </td>
                </tr>
                </tbody>
            @endforeach
        </table>
    </div>
    @include('partials.pagination', ['paginate' => $comments])

@endsection