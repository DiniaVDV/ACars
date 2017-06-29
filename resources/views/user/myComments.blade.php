@extends('user.profile')
@section('content')
    <h3>История заказов</h3>
    @if(!empty($nameItems))
        <div class=bs-example data-example-id=striped-table>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Отзыв</th>
                    <th class="tableCenter">Дата</th>
                    <th class="tableCenter">Товар</th>
                </tr>
                </thead>
                <?php $i = 1;?>
                @foreach($comments as $comment)
                    <tbody>
                    <tr>
                        <td><strong>{{$i}}</strong></td>
                        <td><strong>{{$comment->message}}</strong></td>
                        <td align="center"><strong>{{$comment->created_at}}</strong></td>
                        <td align="center"><strong>{{ $nameItems[$comment->id]}}</strong></td>
                    </tr>
                    </tbody>
                    <?php $i++; ?>
                @endforeach
            </table>
        </div>
    @else
        <p>Вы не оставляли отзывы!</p>
    @endif
@endsection