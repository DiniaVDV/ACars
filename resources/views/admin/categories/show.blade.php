@extends('admin.app')
@section('content')
    <h1 class="page-header">Категории</h1>
    @include('admin.partials.flash')

    <div class=bs-example data-example-id=striped-table>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Название</th>
                <th class="tableCenter has_child">Наличие подпунктов</th>
                <th class="tableCenter parent_id">Входит в категорию</th>
                <th class="tableCenter">Входит в еще одну категорию</th>
                <th class="tableCenter">Действия</th>
            </tr>
            </thead>
    @foreach($categories as $category)
            <tbody>
                <tr>
                    <td>
						<div>
							<strong>{{$category->id}}</strong></td>
						</div>
                    <td><strong>{{$category->title}}</strong></td>
                    <td align="center has_child">
						<div class="checkbox">
                           <label>
								{!! Form::checkbox('has_child', $category->has_child, ($category->has_child == 1) ? true : false, ['id' => $category->id, 'class' => 'has_child actioned']) !!} 
							</label>
                        </div>
					</td>
                    <td align="center">
						<div class="checkbox col-md-1">
                           <label>
								{!! Form::checkbox('status', false, false, ['id' => 'id_1_' . $category->id,'class' => 'statusParent']) !!}
							</label>
						</div>
						<fieldset class="parentId_1_{{$category->id}}" disabled>	
								<?php				$categoriesParentFor = clone $categoriesParent;
								unset($categoriesParentFor[$category->id]);
								?>
								{!! Form::select('parent_id', $categoriesParentFor, !empty($category->parent_id) ? $category->parent_id : null, ['class' => 'form-control parent_id col-md-11', 'placeholder' => 'Выберите категорию']) !!}				
						</fieldset>
					</td>
					<td align="center">
						<div class="checkbox col-md-1">
                           <label>
								{!! Form::checkbox('status', false, false, ['id' => 'id_2_' . $category->id,'class' => 'statusParent']) !!}
							</label>
						</div>
						<fieldset class="parentId_2_{{$category->id}}" disabled>						
								{!! Form::select('parent_id_2', $categoriesParentFor, !empty($category->parent_id_2) ? $category->parent_id_2 : null, ['class' => 'form-control parent_id col-md-11', 'placeholder' => 'Выберите категорию']) !!}				
						</fieldset>
					</td>
                    <td align="center">
                        <a href="{{asset('admin/category')}}/{{$category->id}}/edit" title="редактировать"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a href="{{asset('admin/category')}}/{{$category->id}}/delete" onclick="return confirmDelete('категорию')" title="удалить"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    </td>
                </tr>
            </tbody>
    @endforeach
        </table>
    </div>
@endsection