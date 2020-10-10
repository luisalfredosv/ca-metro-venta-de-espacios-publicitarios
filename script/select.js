$(document).ready(function() {
	$("#tip").val("");
		var select = "tipo_rif";
		$.ajax({
		 url:"sql/select.php",
		 type:'POST',
		 dataType:'json',
		 data: {select:select},
		 success: function(response)
		 {
		   $('#tip').html(response);
		 }
	});


	$("#tip_anu").val("");
		var select = "tipo_anu";
		$.ajax({
		 url:"sql/select.php",
		 type:'POST',
		 dataType:'json',
		 data: {select:select},
		 success: function(response)
		 {
		   $('#tip_anu').html(response);
		 }
	});

});

