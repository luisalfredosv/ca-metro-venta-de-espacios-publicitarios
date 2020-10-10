$(document).ready(function() {

// $("#tablas").hide();
// $("#result").hide();

$("#limpiar").click(function(event) {

	//$("#tablas").hide();
	$("div #tablas").empty();
	$('#tab tbody tr').remove();
	$('#pag tbody tr').remove();
	//$("#result").hide();

	$("#buscador").val("");
	$('#guardar').attr('disabled', 'disabled');


	$("#precio").val("");
	$("#pagado").val("");
	$("#xpagar").val("");

	cls()

});


$("#cls").click(function(event) {
cls()
});


function cls(){

	$("#for_pag").val("");
	$("#fec_pag").val("");
	$("#ref_pag").val("");
	$("#mon_pag").val("");
	$("#id_pag").val("");
	$("#mon_pag_act").val("");
	$('#guardar').removeAttr('disabled');
	$("#actualizar").attr('disabled', 'disabled');

}


    $("#fec_pag").datepicker({
        minDate: -30,
        maxDate: "+1M",
        dateFormat: "dd-mm-yy"
    }).attr('readonly','readonly' );



    $("#buscador").autocomplete({
		source: "sql/autocomplete_presupuesto.php?accion=contratos_nom",
		select: function( event, ui ) {
		$( "#buscador" ) .val( ui.item.label );
		var term = $("#buscador").val();
		var accion = "contratos_list";
			$.ajax({
			    type: "POST",
			    url: "sql/gst_pag.php",
			    data:{
			    	term:term,
			    	accion:accion
			    },
			    success: function(data){
			    	//$('#tablas').show();
			    	create_tablas()

			    	$('#guardar').removeAttr('disabled');
			        $('#tab tbody').html(data);
			        lis_pag()
			        cls()
			        calcular()
			        //$("#result").show();
			    }
			});
		}

    });


function create_tablas(){
	$("div #tablas").empty();
	$("div #tablas").append("<div class='col-lg-5'><table class='table' style='font-size: 11px; width: 100%;' id='tab' ><caption>Cronograma de pago de cuotas</caption><thead class='thead-dark'><tr><th width='1rem'>Item</th><th width='6rem'>Concepto</th><th width='10rem' >Fecha de cuota</th><th width='10rem' style='text-align: left'>Cuota</th></tr></thead><tbody> </tbody></table></div><div class='col-lg-7'><table class='table' style='font-size: 11px; width: 100%' id='pag'><caption>Pagos Registrados</caption><thead class='thead-dark'><tr><th width='1rem'>N°</th><th width='1rem'>Tipo</th><th width='1rem' style='text-align: left;'>Fecha</th><th width='1rem'>Referencia</th><th width='1rem' style='text-align: left'>Pago</th><th width='1rem'>Opción</th></tr></thead><tbody></tbody></table></div>");
	//$("div #tablas").append("<div class='col-lg-5' style='overflow:scroll;height:300px'><table class='table' style='font-size: 11px; width: 100%;' id='tab' ><caption>Cronograma de pago de cuotas</caption><thead class='thead-dark'><tr><th width='1rem'>Item</th><th width='6rem'>Concepto</th><th width='10rem' >Fecha de cuota</th><th width='10rem' style='text-align: left'>Cuota</th></tr></thead><tbody> </tbody></table></div><div class='col-lg-7' style='overflow:scroll;height:300px'><table class='table' style='font-size: 11px; width: 100%' id='pag'><caption>Pagos Registrados</caption><thead class='thead-dark'><tr><th width='1rem'>N°</th><th width='1rem'>Tipo</th><th width='1rem' style='text-align: left;'>Fecha</th><th width='1rem'>Referencia</th><th width='1rem' style='text-align: left'>Pago</th><th width='1rem'>Opción</th></tr></thead><tbody></tbody></table></div>");
	
}		

    $("#for_pag").val("");
    var select = "for_pag";
	$.ajax({
        url: 'sql/select.php',
        type: 'POST',
        dataType: 'json',
        data: {
            select:select
        },
    })
    .done(function(data) {
        $("#for_pag").html(data);
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });


function gen_cod(){
	if (($("#for_pag").val()!="") && ($("#fec_pag").val()!="") && ($("#ref_pag").val()!="") && ($("#mon_pag").val()!="")) {

		var accion = "obtener_id";
		$.ajax({
			url: 'sql/gst_pag.php',
			type: 'POST',
			dataType: 'json',
			data: {
				accion: accion
			},
		})
		.done(function(data) {
				$("#id_pag").val(data.id_pag);
			
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});

	}
}





$("#guardar").click(function(event) {
gen_cod()
    swal({
			title: "Notificación",
			text: "Esta seguro de guardar el pago?",
			icon: "warning",
			buttons: true,
			dangerMode: false,
    })
    .then((willDelete) => {
     	if (willDelete) {
		//OK
			if ($("#mon_pag").val()>0) {
				procesar_p()
			}else{
				swal("Notificación!","No se puede guardar, porque el monto no puede ser (0) cero ó inferior!","warning").then((value) => {
			            //location.reload();
			    });
			}
		
      	} else {
		//FAIL
		}
    });
});




function procesar_p(){

var error = 0;

if ($("#buscador").val() == "") {
error = error + 1
} else {
var buscador = $("#buscador").val()
}

if ($("#for_pag").val() == "") {
error = error + 1
} else {
var for_pag = $("#for_pag").val()
}

if ($("#fec_pag").val() == "") {
error = error + 1
} else {
var fec_pag = $("#fec_pag").val()
}

if ($("#ref_pag").val() == "") {
//error = error + 1
$("#ref_pag").val("0");
} else {
var ref_pag = $("#ref_pag").val()
}

if ($("#mon_pag").val() == "") {
error = error + 1
} else {
var mon_pag = $("#mon_pag").val()
}

if ($("#id_pag").val() == "") {
error = error + 1
} else {
var id_pag = $("#id_pag").val()
}

	if (error==0) {
   
var accion = "guardar_pag";
        $.ajax({
            url: 'sql/gst_pag.php',
            type: 'POST',
            dataType: 'json',
            data: {
                accion:accion,
				contrato:buscador,
				for_pag:for_pag,
				fec_pag:fec_pag,
				ref_pag:ref_pag,
				mon_pag:mon_pag,
				id_pag:id_pag

            },
        })
        .done(function(data) {
            var result = (data.result);
            //var query = (data.query);
			if (result == 1) {
				swal("Notificación!","Se guardo! correctamente el pago","success").then((value) => {
		            //location.reload();
		        lis_pag()
		        cls()
		        calcular()
		        });
		       
		    }else if (result == 2) {
		        swal("Notificación!","No se puedo guardar!","warning").then((value) => {
		            //location.reload();
		        });
		    }else if(result == 3){
		        swal("Notificación!","No se puedo guardar el pago porque el Anunciante está solvente! contacte al administrador del sistema!","warning").then((value) => {
		            //location.reload();
		        });
		    }else if(result == 4){
		        swal("Notificación!","No se puedo guardar, porque el pago excede lo que debe el Anunciante!","warning").then((value) => {
		            //location.reload();
		        });
		    }


		})
		.fail(function() {
		    console.log("error");
		})
		.always(function() {
		    console.log("complete");
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




function lis_pag(){
var error = 0;

if ($("#buscador").val() == "") {
error = error + 1
} else {
var buscador = $("#buscador").val()
}

	if (error==0) {
		var accion ="list_pag";
		$.ajax({
		    type: "POST",
		    url: "sql/gst_pag.php",
		    data:{
		    	buscador:buscador,
		    	accion:accion
		    },
				})
				.done(function(data) {
					//$('#pag tbody tr');
					$('#pag tbody').html(data);
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});


		    // success: function(data){
		    // 	//$('#guardar').removeAttr('disabled');
		    //     $('#pag tbody').html(data);
		    // }
		}	
	
}







	$(document).on('click', '.edit', function(){

	$("#guardar").attr('disabled', 'disabled');
	$("#actualizar").removeAttr('disabled');

		var id=$(this).val();
		var pag=$('#pag'+id).text();
		var tip=$('#tip'+id).text();
		var fec=$('#fec'+id).text();
		var mon=$('#mon'+id).text();
	
		// tip = parseInt(tip, 10);

		$("#for_pag").val(pag);

		$("#fec_pag").val(fec);
		$("#ref_pag").val(id);
		$("#mon_pag").val(mon.split(" ", 1));
		$("#id_pag").val(id);
		$("#mon_pag_act").val(mon.split(" ", 1));

	});


$("#actualizar").click(function(event) {

    swal({
			title: "Notificación",
			text: "Esta seguro de actualizar el pago?",
			icon: "warning",
			buttons: true,
			dangerMode: false,
    })
    .then((willDelete) => {
     	if (willDelete) {
		//OK
		comprobar_montos()
      	} else {
		//FAIL
		}
    });
});

function comprobar_montos(){
var mon_pag = $("#mon_pag").val().split('.').join('').split(',').join('.');              // monto registrado a actualizar
// var mon_pag_act = $("#mon_pag_act").val().split('.').join('').split(',').join('.');		// copia del monto registrado
// var precio = $("#precio").val().split('.').join('').split(',').join('.'); 				// precio del contrato
// var pagado = $("#pagado").val().split('.').join('').split(',').join('.');				// total pagado

// 	if (mon_pag !="" && mon_pag_act !="" && precio !="" && pagado !="" ) {
// 	var restul = (pagado - mon_pag_act);
// 	var rest = (precio - restul);
// 		if (mon_pag > rest) {
// 				swal("Notificación!","No se puedo actualizar, porque el pago excede lo que debe el Anunciante!","warning").then((value) => {
// 		            //location.reload();
// 		        });
		//}else{

			if((mon_pag == "0") ||( mon_pag == "0.0") ||( mon_pag == "0.00") || (mon_pag == "00.00") || (mon_pag < "0")){
					swal("Notificación!","No se puede actualizar, porque el monto no puede ser (0) cero ó inferior!","warning").then((value) => {
			            //location.reload();
			        });
			}else{
			 	procesar_a()	
			}
	
		//}

	//}
}



function procesar_a(){
var error = 0;
if ($("#buscador").val() == "") {
error = error + 1
} else {
var buscador = $("#buscador").val()
}

if ($("#for_pag").val() == "") {
error = error + 1
} else {
var for_pag = $("#for_pag").val()
}

if ($("#fec_pag").val() == "") {
error = error + 1
} else {
var fec_pag = $("#fec_pag").val()
}

if ($("#ref_pag").val() == "") {
error = error + 1
} else {
var ref_pag = $("#ref_pag").val()
}

if ($("#mon_pag").val() == "") {
error = error + 1
} else {
var mon_pag = $("#mon_pag").val()
}

if ($("#id_pag").val() == "") {
error = error + 1
} else {
var id_pag = $("#id_pag").val()
}

if ($("#mon_pag_act").val() == "") {
error = error + 1
} else {
var mon_pag_act = $("#mon_pag_act").val()
}





if (error==0) {
   
var accion = "actualizar_pag";
        $.ajax({
            url: 'sql/gst_pag.php',
            type: 'POST',
            dataType: 'json',
            data: {
                accion:accion,
                buscador:buscador,
				for_pag:for_pag,
				fec_pag:fec_pag,
				ref_pag:ref_pag,
				mon_pag:mon_pag,
				id_pag:id_pag,
				mon_pag_act:mon_pag_act

            },
        })
        .done(function(data) {
            var result = (data.result);
            //var query = (data.query);
			if (result == 1) {
				swal("Notificación!","Se actualizó! correctamente el pago","success").then((value) => {
		            //location.reload();
		        lis_pag()
		        cls()
		        calcular()
		        $("#guardar").removeAttr('disabled');
				$("#actualizar").attr('disabled', 'disabled');
		        
		        });
		       
		    }else if(result == 2){
		        swal("Notificación!","No se pudo actualizar el pago!","warning").then((value) => {
		            //location.reload();
		        });
		    }else if(result == 3){
		        swal("Notificación!","El monto registrado mas el pagado excede el monto del contrato! contacte al administrador del sistema!","warning").then((value) => {
		            //location.reload();
		        });
		    // }else if(result == 4){
		    //     swal("Notificación!","No se puedo actualizar, porque el pago excede lo que debe el Anunciante!","warning").then((value) => {
		    //         //location.reload();
		    //     });
		    }


		})
		.fail(function() {
		    console.log("error");
		})
		.always(function() {
		    console.log("complete");
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


// precio
// pagado
// xpagar

function calcular(){

var accion = "calcular";
if ($("#buscador").val() == "") {
error = error + 1
} else {
var buscador = $("#buscador").val()
}

$.ajax({
	url: 'sql/gst_pag.php',
	type: 'POST',
	dataType: 'json',
	data: {
		accion:accion,
		buscador:buscador
	},
})
.done(function(data) {
	var result = (data.result);
	var opcion = (data.opcion);
	if (result == 1) {
		if (opcion == 0) {
			// $("#guardar").attr('disabled', 'disabled');
			// $("#for_pag").attr('disabled', 'disabled');
			// $("#fec_pag").attr('disabled', 'disabled');
			// $("#ref_pag").attr('disabled', 'disabled');
			// $("#mon_pag").attr('disabled', 'disabled');
		}
		$("#precio").val(data.monto);
		$("#pagado").val(data.pagado);
		$("#xpagar").val(data.rest);


	}	
})
.fail(function() {
	console.log("error");
})
.always(function() {
	console.log("complete");
});


}

});