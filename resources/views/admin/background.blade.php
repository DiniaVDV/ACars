@extends('admin.app')
@section('content')
    {!! Form::model(['method' => 'PATCH', 'action' => ['Admin\AdminController@applyBackgroundBody'],  'files'=>true]) !!}
        <div class="form-group"  style="width: 20%">
            {!! Form::label('body_color', 'Выберите фон сайта:') !!}
            {!! Form::text('body_color', null, ['class' => 'form-control']) !!}
        </div>

    <input type="submit" class="btn btn-success" value="Ok"/>
    {!! Form::close() !!}

    {!! Form::model(['method' => 'PATCH', 'action' => ['Admin\AdminController@applyBackgroundBody'],  'files'=>true]) !!}
         <div class="form-group"  style="width: 20%">
            {!! Form::label('header_color', 'Выберите фон шапки:') !!}
            {!! Form::text('header_color', null, ['class' => 'form-control']) !!}
        </div>

        <input type="submit" class="btn btn-success" value="Ok"/>
    {!! Form::close() !!}
    <script src="{{ asset('/js/color-picker.min.js') }}"></script>
    <script>

        var picker = new CP(document.querySelector('#body_color'));
        var picker2 = new CP(document.querySelector('#header_color'));
        picker.on("change", function(color) {
            this.target.value = '#' + color;
        });
        picker2.on("change", function(color) {
            this.target.value = '#' + color;
        });
    </script>
@endsection