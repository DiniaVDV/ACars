function show(state){
	document.getElementById('window').style.display = state;			
	document.getElementById('wrap').style.display = state; 
}
jQuery(function($){
    $("#phone_number").mask("+38(099) 999-99-99");
});