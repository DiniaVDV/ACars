
  	<script> 
		var listOfCarBrands = <?=json_encode($listOfCarBrand)?>;
		var categories = <?=json_encode($categories)?>;

	</script>
  <script src="{{ asset('js/cars.js') }}" type="text/javascript"></script>
   <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>

</body>
</html>