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
</script>