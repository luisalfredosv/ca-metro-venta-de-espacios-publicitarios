$(document).ready(function() {

// $('#gst_usr').attr('autocomplete', 'off');

	$("#fec").datepicker({
		minDate: -0,
		dateFormat: "dd-mm-yy"
		// maxDate: "+1M"
	});


	$("#save").click(function(event) {
		var accion = "save";

		    swal({
			title: "Notificación",
			text: "Esta seguro de registrar el usuario?",
			icon: "warning",
			buttons: true,
			dangerMode: false,
    })
    .then((willDelete) => {
     	if (willDelete) {
		//OK
		send(accion)
      	} else {
		//FAIL
		}
    });


		
	});

	$("#update").click(function(event) {
		var accion = "update";
		    swal({
			title: "Notificación",
			text: "Esta seguro de registrar el usuario?",
			icon: "warning",
			buttons: true,
			dangerMode: false,
		    })
		    .then((willDelete) => {
		     	if (willDelete) {
				//OK
				send(accion)
		      	} else {
				//FAIL
				}
			});

	});

	function send(accion){

	var error = 0;

	if ($("#ced").val() == "") {
	error = error + 1
	} else {
	var ced = $("#ced").val()
	}

	if ($("#usr1").val() == "") {
	error = error + 1
	} else {
	var usr1 = $("#usr1").val()
	}

	if ($("#niv").val() == "") {
	error = error + 1
	} else {
	var niv = $("#niv").val()
	}

	if ($("#nom").val() == "") {
	error = error + 1
	} else {
	var nom = $("#nom").val()
	}

	if ($("#ape").val() == "") {
	error = error + 1
	} else {
	var ape = $("#ape").val()
	}

	if ($("#fec").val() == "") {
	error = error + 1
	} else {
	var fec = $("#fec").val()
	}

	if ($("#pas").val() == "") {
	error = error + 1
	} else {
	var pas = $("#pas").val()
	}

	if ($("#est").val() == "") {
	error = error + 1
	} else {
	var est = $("#est").val()
	}

//alert("cedula "+ced+ "usr "+usr1+" niv"+niv+ "nom" +nom+ "ape"+ ape + "fec" +fec+ "pas"+ pas+ "est"+ est);
		if ( error == 0) {

			$.ajax({
				url: 'sql/gst_usr.php',
				type: 'POST',
				dataType: 'json',
				data: {
					accion:accion ,
					ced:ced ,
					usr1:usr1 ,
					niv:niv ,
					nom:nom ,
					ape:ape ,
					fec:fec ,
					pas:pas ,
					est:est
				},
			})
			.done(function(data) {
			var result = (data.result);
			if (result == 1) { 

				swal("Notificación!","Se guardo! correctamente el usuario","success").then((value) => {
				});
				gen_tab()

			}else if (result == 2) {
				if (error=1062) {
					swal("Error!", "No se pudo guardar, el registro ya existe!", "error");
				}else{
					swal("Error!", "No se pudo guardar!", "error");
				}
			}else if(result == 3){
				swal("Notificación!","Se actualizó! correctamente el usuario","success").then((value) => {
				});
				gen_tab()
			}else{
				swal("Error!", "Ocurrio un error!", "error");
			}

			})
			.fail(function() {
				console.log("error gst_usr");
			})
			.always(function() {
				console.log("complete gst_usr");
			});
			

		}else{
			swal({
                title: "Error",
                text: "Haz dejado "+error+" campos vacios verifique e intente de nuevo",
                icon: "warning",
                buttons: false,
            });
        }

	}

$("#clean").click(function(event) {
	$('#gst_usr')[0].reset();	
	$("#save").removeAttr('disabled');
});


    $("#usr1").autocomplete({
		source: "sql/gst_usr.php?accion=list",
		select: function( event, ui ) {
		$( "#usr1" ) .val( ui.item.label );
		var term = $("#usr1").val();
		var accion = "con_usr";
			$.ajax({
			    type: "POST",
			    url: "sql/gst_usr.php",
			    dataType: "json",
			    data:{
			    	term:term,
			    	accion:accion
			    },
			}).done(function(data) {
			  var result = (data.result);
			    if (result == 1) {
					$("#pas").val(data.pas);
					$("#niv").val(data.niv);
					$("#ced").val(data.ced);
					$("#nom").val(data.nom);
					$("#ape").val(data.ape);
					$("#fec").val(data.fec);
					$("#est").val(data.est);
					$("#save").attr('disabled', 'true');
					$("#update").removeAttr('disabled');


			    }
			});

		}

    });


gen_tab()
function gen_tab(){
	var accion ="gen_tab";
	$.ajax({
	    type: "POST",
	    url: "sql/gst_usr.php",
	    data:{
	    	accion:accion
	    },
	    success: function(data){
	    	//$('#guardar').removeAttr('disabled');
	        $('#tab tbody').html(data);
	    }
	});	
}


$("#ced").change(function(event) {
var ced = $("#ced").val();
var accion = "buscar_emp";
$.ajax({
	url: 'sql/gst_usr.php',
	type: 'POST',
	dataType: 'json',
	data: {
			ced:ced,
			accion:accion
	},
})
.done(function(data) {
	var result = (data.result);
	if (result==1) {
		$("#nom").val(data.nom).attr('disabled', 'true');
		$("#ape").val(data.ape).attr('disabled', 'true');
	}else{
		$("#nom").val("").removeAttr('disabled');
		$("#ape").val("").removeAttr('disabled');
	}
})
.fail(function() {
	console.log("error");
})
.always(function() {
	console.log("complete");
});



});


$( "button[name|='edit']" ).on('click', function(event) {
	alert("HI");
});
	

});