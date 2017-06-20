@extends('admin.app')
@section('content')
    <h1 class="page-header">Бренди</h1>
    @include('admin.partials.flash')

    <div class=bs-example data-example-id=striped-table>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Название</th>
                <th class="tableCenter parent_id">Описание</th>
                <th class="tableCenter">Страна изготовления</th>
                <th class="tableCenter">Действия</th>
            </tr>
            </thead>
    @foreach($brands as $brand)
            <tbody>
                <tr>
                    <td>
						<div>
							<strong>{{$brand->id}}</strong></td>
						</div>
                    <td><strong>{{$brand->name}}</strong></td>   
					<td><strong>{{$brand->description}}
					</strong></td>                   
					<td align="center"><strong>{{$brand->country}}</strong></td>
                    <td align="center">
                        <a href="{{asset('admin/brands')}}/{{$brand->id}}/edit" title="редактировать"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a href="{{asset('admin/brands')}}/{{$brand->id}}/delete" onclick="return confirmDelete('бренд')" title="удалить"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    </td>
                </tr>
            </tbody>
    @endforeach
        </table>
    </div>
@endsection