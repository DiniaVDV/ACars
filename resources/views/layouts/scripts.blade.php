
    <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.maskedinput.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/basic.js') }}" type="text/javascript"></script>
  	<script> 
		var listOfCarBrands = <?=json_encode($listOfCarBrand)?>;
		var categories = <?=json_encode($categories)?>;
		var items = <?=json_encode(!empty($items) ? $items : null)?>;
		var brands = <?=json_encode(!empty($brands) ? $brands : null)?>;

	</script>
    <script src="{{ asset('js/cars.js') }}" type="text/javascript"></script>

</body>
</html>