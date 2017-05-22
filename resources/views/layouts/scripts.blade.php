  <script>
	alert(123);
  </script>
  	<script> 
		var cars = <?=json_encode($cars);?>;
		
	</script>
   <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/cars.js') }}" type="text/javascript"></script>
</body>
</html>