

$('.brands').append("<option></option>");	
$('.years').prop('disabled', true);
$('.models').prop('disabled', true);
$('.engines').prop('disabled', true);
for(var i = 0; i < listOfCarBrands.length; i++){
	if($(window).width() >= ''){
		$('.brands').append("<option value='"+ listOfCarBrands[i] +"'>" + listOfCarBrands[i] + "</option>");
	}
}

function getYears(data){
    var brand = data.options[data.selectedIndex].value;
	if(brand){
		$('.models').empty();
		$('.engines').empty();
		$.ajax({
			type: "GET",
			url: "get_years",
			data:  {brand : brand},
			success: function (years) {
						$('.years').prop('disabled', false);
						$('.years').empty();
						$('.years').append("<option></option>");
						for(var i = 0; i < years.length; i++){
							$('.years').append("<option value='"+ years[i] +"'>" + years[i] + "</option>");
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
		$('.engines').empty();
		$.ajax({
			type: "GET",
			url: "get_models",
			data: {year: year},
			success: function (models) {
						$('.models').prop('disabled', false);
						$('.models').empty();
						$('.models').append("<option></option>");
						for(var i = 0; i < models.length; i++){
							$('.models').append("<option value='"+ models[i] +"'>" + models[i] + "</option>");
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
			url: "get_engines",
			data:{model : model},
			success: function(engines){
						$('.engines').prop('disabled', false);
						$('.engines').empty();
						$('.engines').append("<option></option>");
						for(var i = 0; i < engines[0].length; i++){
							$('.engines').append("<option value='" + engines[1][i] +"'>" + engines[0][i] + "</option>");
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
		document.location.href = "cars/"+alias;
	}

}
/*************************Sort Items**************************************/
var arrayOfItemsBackup = $('.itemBasicOnList');
function typeSort(data){
	var typeSort = parseInt(data.options[data.selectedIndex].value);
	var arrayOfItems = $('.itemBasicOnList');
	var count = 0;
	arrayOfItems.sort(function(a,b){
		if(typeSort == 1){
			a = parseInt($(a).find('.priceOnList > strong').prop('innerHTML'));
			b = parseInt($(b).find('.priceOnList > strong').prop('innerHTML'));
			count += 2;
			if(a > b){
				return 1;
			}else if(a < b){
				return -1;
			}else{
				return 0;
			}
		}else if(typeSort == 2){
			a = $(a).find('.itemHeadOnList > .title').prop('innerHTML');
			b = $(b).find('.itemHeadOnList > .title').prop('innerHTML');
			count += 2;
			if(a > b){
				return 1;
			}else if(a < b){
				return -1;
			}else{
				return 0;
			}
		}	
	});
	$('.itemBasicOnList').parent('.row').append(arrayOfItems)
	if(typeSort == 0){
		$('.itemBasicOnList').parent('.row').append(arrayOfItemsBackup);
	}
}

function brandSort(data){
	var brandId = parseInt(data.options[data.selectedIndex].value);

	if(brandId == 0){
		$('.itemBasicOnList').show();
	}else{
		$('.itemBasicOnList:not(#' + brandId + ')').hide();
		$('#' + brandId).show();
	}
}

/***************************************************************************/
// $(document).ready(function(){
		// var check = $('.buyOnList').click(function(){

		// });	
		// console.log(check);
// });

/*--------------ADD TO CART---------------------------------------------------------------------------*/

function addToCart(item_id){
	if(item_id){
		
			$.ajax({
				type:"GET",
				url: "add_to_cart/"+item_id,
				data:{item_id : item_id},
				success: function(item){
					console.log(item);
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


