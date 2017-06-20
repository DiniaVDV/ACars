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
				var id = (atrId.substr(9, 5));					
				$('#id_' + id).prop('checked', 'checked');
				$('.parentId_' + id).prop('disabled', false);
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
