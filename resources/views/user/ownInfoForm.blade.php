<form role="form" method="POST" action="{{ asset('user') . '/' . Auth::user()->name . '/store'}}">
		{{ csrf_field() }}
	<div class="form-group">
		<label for="first_name">Имя:</label>
		<input type="text" id="first_name" name="first_name" value="" class="form-control">
	</div>
	<div class="form-group">
		<label for="second_name">Фамилия:</label>
		<input type="text" id="second_name" name="second_name" class="form-control" value=""/>
	</div>
	<div class="form-group">
		<label for="phone_number">Номер телефона:</label>
		<input type="text" id="phone_number" name="phone_number" class="form-control" value=""/>
	</div>	
	<div class="form-group">
		<label for="city">Город:</label>
		<input type="text" id="city" name="city" value="" class="form-control">
	</div>
	<div class="form-group">
		<label for="street">Улица:</label>
		<input type="text" id="street" name="street" class="form-control" value=""/>
	</div>
	<div class="form-group">
		<label for="house_number">Номер дома:</label>
		<input type="text" id="house_number" name="house_number" class="form-control" value=""/>
	</div>
	<div class="form-group">
		<label for="flat_number">Номер квартиры:</label>
		<input type="text" id="flat_number" name="flat_number" class="form-control" value=""/>
	</div>

	<input type="submit" class="btn btn-success" value="Ok"/>
</form>