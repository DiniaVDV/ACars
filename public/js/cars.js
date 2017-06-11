

$('#brands').append("<option></option>");	
// console.log(listOfBrands);
for(var i = 0; i < listOfCarBrands.length; i++){
    $('#brands').append("<option value='"+ listOfCarBrands[i] +"'>" + listOfCarBrands[i] + "</option>");
}

function getYears(data){
    var brand = data.options[data.selectedIndex].value;
	if(brand){
		$('#models').empty();
		$('#engines').empty();
		$.ajax({
			type: "GET",
			url: "/Acars.xxx/shop/public/get_years",
			data:  {brand : brand},
			success: function (years) {
						// console.log(years);
						$('#years').empty();
						$('#years').append("<option></option>");
						for(var i = 0; i < years.length; i++){
							$('#years').append("<option value='"+ years[i] +"'>" + years[i] + "</option>");
						}
					},
			error: function(data){
					console.log(data);
				}
		});
	}
}

function getModels(data){
	var year = data.options[data.selectedIndex].value;
	if(year){
		$('#engines').empty();
		$.ajax({
			type: "GET",
			url: "/Acars.xxx/shop/public/get_models",
			data: {year: year},
			success: function (models) {
						// console.log(models);
						$('#models').empty();
						$('#models').append("<option></option>");
						for(var i = 0; i < models.length; i++){
							$('#models').append("<option value='"+ models[i] +"'>" + models[i] + "</option>");
						}
					},
			error: function(data){
						console.log(data);
				   }			
		});
	}
}

function getEngines(data){
	var model = data.options[data.selectedIndex].value;
	if(model){
		$.ajax({
			type:"GET",
			url: "/Acars.xxx/shop/public/get_engines",
			data:{model : model},
			success: function(engines){
						// console.log(engines);
						$('#engines').empty();
						$('#engines').append("<option></option>");
						for(var i = 0; i < engines[0].length; i++){
							$('#engines').append("<option value='" + engines[1][i] +"'>" + engines[0][i] + "</option>");
						}
					},
			error: function(data){
						console.log(data);
				   }
		});
		
	}
}

function chosenCar(data){
	var alias = data.options[data.selectedIndex].value;
	if(alias){
		document.location.href = "/Acars.xxx/shop/public/cars/"+alias;
	}

}


// $(document).ready(function(){
		// var check = $('.buyOnList').click(function(){

		// });	
		// console.log(check);
// });

/*--------------ADD TO CART---------------------------------------------------------------------------*/

function addToCart(item_id){
	if(item_id){
		console.log(item_id);
			$.ajax({
				type:"GET",
				url: "/Acars.xxx/shop/public/add_to_cart/"+item_id,
				data:{item_id : item_id},
				success: function(item){
					
					var totalQty = parseInt(document.getElementById('totalQty').innerHTML);
					totalQty++;
					document.getElementById('totalQty').innerHTML = totalQty;
	   
				},
				error: function(data){
					console.log(data);
				}
			});

		}
	}



/*------------------------------------------------------------------------------------------------------*/


