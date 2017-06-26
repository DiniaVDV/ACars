<script type="text/javascript">

$('div.alert').not('.alert-important').delay(3000).slideUp(300);

function confirmDelete(name){
    if(confirm('Вы действительно хотите удалить ' + name + '?')){
        return true;
    }else {
        return false;
    }
}

$(document).ready(function() {
    $(".js-example-basic-single").select2();
});


/**************Checked comments***********************************/

$(".status").change(function() {
    if(this.checked) {
       console.log();
        alert('Комментарий опубликован!');
        var commId = $(this).attr('id');
        $.ajax({
            type:"GET",
            url: 'comments/' + commId + '/checked',
            data: commId,
            success: function (data) {
                console.log(data);
                location.reload();
            },
            error: function (data) {
                console.log(data);
            }

        });
    }
});
/*******************************************************************/

/**********************preloader animation**********************************/
// $(window).on('load', function(){
	// var $preloader = $('$prldr'), $svg_nam = $preloader.find('.svg_anm');
	// $svg_anm.fadeOut();
	// $preloader.delay(500).slideUp(300);		
// });
/******************************************************************/
/*********************Change has child for categories in DB**************/
$('.has_child').change(function(){
	var categoryId = $(this).prop('id');
	if(this.checked){
		var flag = true;
	}
	if(!this.checked){
		var flag = false;	
	}
	$.ajax({
		type:"GET",
		url:"{{asset('/admin/categories/change_has_child')}}",
		data:{
			categoryId: categoryId,
			flag: flag,
		},
		success: function(data){
			console.log(data);
		},
		error: function(data){
			console.log(data);
		},
	});
});
/**************************************************************/
/*************Check chosen parent category*********************/
$(function(){
	$('option').each(function(){
		if($(this).attr('selected')){
			if(!$(this).attr('disabled')){
				var atrId = $(this).parent().parent().attr('class');
				if(atrId){
					var id = (atrId.substr(9, 5));					
					$('#id_' + id).prop('checked', 'checked');
					$('.parentId_' + id).prop('disabled', false);
				}
			}
		}
		
	})
});
/***************************************************************/
$('.statusParent').change(function(){
	if(this.checked){
		var atrId = $(this).attr('id');
		var parent_id = (atrId.substr(3, 5));
		$('.parentId_' + parent_id).prop('disabled', false);
	}
	if(!this.checked){
		var flag = false;
		var atrId = $(this).attr('id');
		var categoryId = (atrId.substr(3, 5));
		$('.parentId_' + categoryId).prop('disabled', true);
		var cc = $('.parentId_' + categoryId).children('.parent_id').find("option:first").prop('selected', true);
		$.ajax({
			type:"GET",
			url:"{{asset('/admin/categories/change_parent_category')}}",
			data:{
				categoryId: categoryId,
				flag: flag,
			},
			success: function(data){
				
			},
			error: function(data){
				console.log(data);
			},
		});
	}
});
/****************change in DB***************************/
$('.parent_id').change(function(){
	var flag = true;
	var categoryId = ($(this).parent().prop('class')).substr(9, 5);
	var parentId = ($(this).prop('value'));
	$.ajax({
		type:"GET",
		url:"{{asset('/admin/categories/change_parent_category')}}",
		data:{
			parentId: parentId,
			categoryId: categoryId,
			flag: flag,
		},
		success: function(data){
			
		},
		error: function(data){
			console.log(data);
		},
	});

});
/********************************************************/

$('.type_of_delivery_id').change(function(){
	var type_of_delivery_id = $(this).prop('value');
	var order_id = $(this).parent().parent().prop('class');
	$.ajax({
		type:"GET",
		url:"{{asset('/admin/orders/change_type_of_delivery')}}",
		data:{type_of_delivery_id: type_of_delivery_id,
			  order_id: order_id,
		},
		success: function(data){
			console.log(data);
		},
		error: function(data){
			console.log(data);
		},
	});
	
});
$('.type_of_payment_id').change(function(){
	var type_of_payment_id = $(this).prop('value');
	var order_id = $(this).parent().parent().prop('class');
	$.ajax({
		type:"GET",
		url:"{{asset('/admin/orders/change_type_of_payment')}}",
		data:{type_of_payment_id: type_of_payment_id,
			  order_id: order_id,
		},
		success: function(data){
			console.log(data);
		},
		error: function(data){
			console.log(data);
		},
	});
});
$('.status_id').change(function(){
	var status_id = $(this).prop('value');
	var order_id = $(this).parent().parent().prop('class');
	$.ajax({
		type:"GET",
		url:"{{asset('/admin/orders/change_status')}}",
		data:{status_id: status_id,
			  order_id: order_id,
		},
		success: function(data){
			if(data){
				location.reload();
			}
		},
		error: function(data){
			console.log(data);
		},
	});
});

$('.qty').change(function(){
	var qty = parseInt($(this).prop('value'));
	if(typeof qty === 'number'){
		var item_id = $(this).parent().parent().parent().prop('class')	
		var price = $('.' + item_id).children('.price').children().prop('innerHTML');
		var sumOld = $('.' + item_id).children('.sum').children().prop('innerHTML'); 
		console.log(sumOld);
		var sum = qty * price;
		var order_id = $('.page-header').prop('id');
		$('.' + item_id).children('.sum').children().prop('innerHTML', sum);
		var totalPrice = $('#totalPrice').children().prop('innerHTML') - sumOld + sum ;
		$('#totalPrice').children().prop('innerHTML', totalPrice)
		$.ajax({
			type:"POST",
			url:"{{url()->current()}}/" + item_id,
			data:{
				qty: qty,
				total_price: totalPrice,
				},
			success: function(data){
				console.log(data);
			},
			error: function(data){
				console.log(data);
			},		
		});
	}else{
		alert("Введите число!");
	}


});

/***************Change user role********************************************/

$('.role').change(function(){
    var userRole = $(this).attr('value');
    console.log(userRole);
    if(this.checked){
        $.ajax({
            type:"GET",
            url: '{{asset('/admin_panel/changeRole')}}',
            data:{
                userRole: userRole,
                status: true,
            },
            success: function (data) {
                console.log(data);
            },
            error: function (data) {
                console.log(data);
            }
        });
    }else{
        $.ajax({
            type: "GET",
            url: '{{asset('admin_panel/changeRole')}}',
            data:{
                userRole: userRole,
                status: false,
            },
            success: function (data) {
                console.log(data);
            },
            error: function (data) {
                console.log(data);
            }
        });
    }
});

/***************************************************************************/

/*******For select2******************************************************/
$('#role_list').select2({
    placeholder: 'Выберите роль',
});
/***************************************************************************/
</script>