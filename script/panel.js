$(document).ready(function() {

var d = new Date();
var month = d.getMonth()+1;
var year= d.getFullYear();



// alert(mes);
listar(month,year);

$("#mes").val(month);

$("#mes").change(function(event) {
	var month = $("#mes").val();
	listar(month,year);
});

	function listar(month,year){

		var accion = "crear_panel";
		$.ajax({
			url: 'sql/panel.php',
			type: 'POST',
			data: {
				accion:accion,
				month:month,
				year:year
			},
		})
		.done(function(data) {

		// var result = (data.result);
		// if (result == 1) {
		$("#panel_tbody").html(data);

		// }else{

		// }

		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	}

});