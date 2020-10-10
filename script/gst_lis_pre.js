$(document).ready(function() {
	// 	$(".eliminar").on('click',  function(event) {
	// 	var value = $(this).val();
	//     alert(value);
	// });


$('button[class=eliminar]').click(function(){
    var value =  $(this).attr('value'); 
    alert(value);
});


});