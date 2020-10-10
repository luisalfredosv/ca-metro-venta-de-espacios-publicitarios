$(function() {
	
	
 
$("#dir").change(function(event) {
if ($("#nom").val()!="" && $("#tip_anu").val()!="" && $("#exp").val()!="" && $("#dir").val()!="") {

	accion="cod_reg";
	$.ajax({
		url: 'sql/gst_anu.php',
		type: 'POST',
		dataType: 'json',
		data: {
			accion:accion
		},
	})
	.done(function(data) {
		var codigo = (data.codigo);
		$("#cod").val(codigo).attr('disabled', 'disabled');
		
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});


}

	

});


 $("#gst_anu").on('submit', function(evt){
    evt.preventDefault();  
    // tu codigo aqui
 });


$("#gst_anu").keypress(function(e) {
        if (e.which == 13) {
            return false;
        }
    });

$("#guardar").click(function(event) {
var accion = "guardar";
var	er=0;

	if ($("#cod").val()==""){ er=er+1 }else{ var cod = $("#cod").val(); }
	if ($("#nom").val()==""){ er=er+1 }else{ var nom = $("#nom").val(); }
	if ($("#dir").val()==""){ er=er+1 }else{ var dir = $("#dir").val(); }
	if ($("#tel1").val()==""){ er=er+1 }else{ var tel1 = $("#tel1").val(); }
	if ($("#tel2").val()==""){ var tel2=""; }else{ var tel2 = $("#tel2").val(); }
	if ($("#tip").val()==""){ er=er+1 }else{ var tip = $("#tip").val(); }
	if ($("#rif").val()==""){ er=er+1 }else{ var rif = $("#rif").val(); }
	if ($("#cor1").val()==""){ er=er+1 }else{ var cor1 = $("#cor1").val(); }
	if ($("#cor2").val()==""){ var cor2=""; }else{ var cor2 = $("#cor2").val(); }
	if ($("#cor3").val()==""){ var cor3=""; }else{ var cor3 = $("#cor3").val(); }
	if ($("#ddc").val()==""){ er=er+1 }else{ var ddc = $("#ddc").val(); }
	if ($("#tdc").val()==""){ er=er+1 }else{ var tdc = $("#tdc").val(); }
	if ($("#est").val()==""){ er=er+1 }else{ var est = $("#est").val(); }

	if ($("#tip_anu").val()==""){ er=er+1 }else{ var tip_anu = $("#tip_anu").val(); }
	if ($("#cdc").val()==""){ er=er+1 }else{ var cdc = $("#cdc").val(); }
	if ($("#exp").val()==""){ er=er+1 }else{ var exp = $("#exp").val(); }

		if (er==0) {

			$.ajax({
				url: 'sql/gst_anu.php',
				type: 'POST',
				dataType: 'json',
				data: {
					accion:accion,
					cod:cod,
					nom:nom,
					dir:dir,
					tel1:tel1,
					tel2:tel2,
					tip:tip,
					rif:rif,
					cor1:cor1,
					cor2:cor2,
					cor3:cor3,
					ddc:ddc,
					tdc:tdc,
					est:est,
					tip_anu:tip_anu,
					cdc:cdc,
					exp:exp
				},
			})
			.done(function(data) {
				var result = (data.result);
				if (result==1) {
					swal("Notificación!", "Se guardó correctamente!", "success").then((value) => { 
						 $('#gst_anu')[0].reset();
						 //$(".form-control").removeAttr('disabled');
						 $("#cod").attr('disabled', 'disabled');

					});
				}else if(result==2){
					if (error=1062) {
						swal("Error!", "No se pudo guardar, el registro ya existe!", "error");
					}else{
						swal("Error!", "No se pudo guardar!", "error");
					}
				}else if(result==3){
					swal("Error!", "No se pudo guardar, haz dejado algunos campos vacios", "error");
				}

			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		}else{
			swal("Notificación!", "haz dejado algunos campos vacios!"+er, "error");
		}

	});


// if ($("#varurl")!="") {
// var cod = $("#varurl").val();
// accion="buscar";
// buscar(cod,accion);
// }


	//  var cod = $( "#buscador" ).val();    
	//   $( function() {
	//     function log( message ) {
	//       $( "<div>" ).text( message ).prependTo( "#log" );
	//       $( "#log" ).scrollTop( 0 );
	//     }
	 
	//     $("#buscador").autocomplete({
	//       source: function( request, response ) {
	//         $.ajax( {
	//           url: "sql/autocomplete_anun.php",
	//           dataType: "json",
	//           data: {
	//             term: request.term
	//           },
	//           success: function( data ) {
	//             response( data );
	//           }
	//         } );
	//       },
	//       /*minLength: 2,*/
	//       select: function( event, ui ) {
	//         log( "Selected: " + ui.item.value + " aka " + ui.item.id );
	//       }
	//     });
	// });




    $("#buscador").autocomplete({
                source: "sql/gst_anu.php?accion=anunciante",

                select: function( event, ui ) {
                 
				$( "#buscador" ) .val( ui.item.label );                  
				var term = $("#buscador").val();

				accion="buscar";
				arreglo = $("#buscador").val();
				var arreglo = arreglo.split("|");
				var cod = arreglo[0];
				var newurl = window.location.href.split('.php?')[0];
				history.pushState(null, "", newurl);

                      	if (cod!="" && cod!="null") {
							$.ajax({
								url: 'sql/gst_anu.php',
								type: 'POST',
								dataType: 'json',
								data: {
									cod:cod,
									accion:accion
								},
							})
							.done(function(data) {
								var result = (data.result);
								if (result==1) {
									$("#buscador").val("");
									$("#cod").val(data.cod).attr('disabled', 'disabled');
									$("#nom").val(data.nom).attr('disabled', 'disabled');
									$("#dir").val(data.dir).attr('disabled', 'disabled');
									$("#tel1").val(data.tel1);
									$("#tel2").val(data.tel2);
									$("#tip").val(data.tip).attr('disabled', 'disabled');
									$("#rif").val(data.rif).attr('disabled', 'disabled');
									$("#cor1").val(data.cor1);
									$("#cor2").val(data.cor2);
									$("#cor3").val(data.cor3);
									$("#ddc").val(data.ddc);
									$("#tdc").val(data.tdc);
									$("#est").val(data.est);
									$("#tip_anu").val(data.tip_anu);
									$("#cdc").val(data.cdc);
									$("#exp").val(data.exp).attr('disabled', 'disabled');
									$("#guardar").attr('disabled', 'disabled');
									$("#actualizar").removeAttr('disabled');
								}else if (result==2) {
									swal("Error!", "No existe una empresa registrada con el código: "+cod, "error");
								}else if (result==3){
									swal("Notificación!", "Introduzca el código para realizar la busqueda!", "error");
								}

							});
                       
                       return false; 
                }

           }
    });



// $("#buscar").click(function(event) {
// 	accion="buscar";
// 	arreglo = $("#buscador").val();
// 	var arreglo = arreglo.split("|");
// 	var cod = arreglo[0];
// 	buscar(cod,accion);
// });

// function buscar(cod,accion){
// var newurl = window.location.href.split('.php?')[0];
// history.pushState(null, "", newurl);

// 	if (cod!="" && cod!="null") {
// 		$.ajax({
// 			url: 'sql/gst_anu.php',
// 			type: 'POST',
// 			dataType: 'json',
// 			data: {
// 				cod:cod,
// 				accion:accion
// 			},
// 		})
// 		.done(function(data) {
// 			var result = (data.result);
// 			if (result==1) {
// 				$("#buscador").val("");
// 				$("#cod").val(data.cod).attr('disabled', 'disabled');
// 				$("#nom").val(data.nom).attr('disabled', 'disabled');
// 				$("#dir").val(data.dir).attr('disabled', 'disabled');
// 				$("#tel1").val(data.tel1);
// 				$("#tel2").val(data.tel2);
// 				$("#tip").val(data.tip).attr('disabled', 'disabled');
// 				$("#rif").val(data.rif).attr('disabled', 'disabled');
// 				$("#cor1").val(data.cor1);
// 				$("#cor2").val(data.cor2);
// 				$("#cor3").val(data.cor3);
// 				$("#ddc").val(data.ddc);
// 				$("#tdc").val(data.tdc);
// 				$("#est").val(data.est);
// 				$("#tip_anu").val(data.tip_anu);
// 				$("#cdc").val(data.cdc);
// 				$("#exp").val(data.exp).attr('disabled', 'disabled');
// 				$("#guardar").attr('disabled', 'disabled');
// 				$("#actualizar").removeAttr('disabled');
// 			}else if (result==2) {
// 				swal("Error!", "No existe una empresa registrada con el código: "+cod, "error");
// 			}else if (result==3){
// 				swal("Notificación!", "Introduzca el código para realizar la busqueda!", "error");
// 			}

// 		})
// 		.fail(function() {
// 			console.log("error");
// 		})
// 		.always(function() {
// 			console.log("complete");
// 		});
// 	}
// }


$("#actualizar").click(function(event) {
var accion = "actualizar";
var er=0;
	if ($("#cod").val()==""){ er=er+1 }else{ var cod = $("#cod").val(); }
	// if ($("#nom").val()==""){ er=er+1 }else{ var nom = $("#nom").val(); }
	// if ($("#dir").val()==""){ er=er+1 }else{ var dir = $("#dir").val(); }
	if ($("#tel1").val()==""){ er=er+1 }else{ var tel1 = $("#tel1").val(); }
	if ($("#tel2").val()==""){var tel2=""; }else{ var tel2 = $("#tel2").val(); }
	// if ($("#rif").val()==""){ er=er+1 }else{ var rif = $("#rif").val(); }
	if ($("#cor1").val()==""){ er=er+1 }else{ var cor1 = $("#cor1").val(); }
	if ($("#cor2").val()==""){ var cor2=""; }else{ var cor2 = $("#cor2").val(); }
	if ($("#cor3").val()==""){ var cor3=""; }else{ var cor3 = $("#cor3").val(); }
	if ($("#ddc").val()==""){ er=er+1 }else{ var ddc = $("#ddc").val(); }
	if ($("#tdc").val()==""){ er=er+1 }else{ var tdc = $("#tdc").val(); }
	if ($("#est").val()==""){ er=er+1 }else{ var est = $("#est").val(); }
	if ($("#tip_anu").val()==""){ er=er+1 }else{ var tip_anu = $("#tip_anu").val(); }
	if ($("#cdc").val()==""){ er=er+1 }else{ var cdc = $("#cdc").val(); }
	//if ($("#exp").val()==""){ er=er+1 }else{ var exp = $("#exp").val(); }

		if (er==0) {

			$.ajax({
				url: 'sql/gst_anu.php',
				type: 'POST',
				dataType: 'json',
				data: {
					accion:accion,
					cod:cod,
					// nom:nom,
					// dir:dir,
					tel1:tel1,
					tel2:tel2,
					// rif:rif,
					cor1:cor1,
					cor2:cor2,
					cor3:cor3,
					ddc:ddc,
					tdc:tdc,
					est:est,
					cdc:cdc,
					tip_anu:tip_anu
				},
			})
			.done(function(data) {
				var result = (data.result);
				if (result==1) {
					swal("Notificación!", "Se Actualizó correctamente!", "success").then((value) => { 
						 $('#gst_anu')[0].reset();
						 $(".form-control").removeAttr('disabled');
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
			swal("Notificación!", "haz dejado algunos campos vacios!", "error");
		}

	});

$("#limpiar").click(function(event) {
	$('#gst_anu')[0].reset();	
	$(".form-control").removeAttr('disabled');
	$("#guardar").removeAttr('disabled');
	$("#actualizar").attr('disabled', 'disabled');
	$("#cod").attr('disabled', 'disabled');


});

});	