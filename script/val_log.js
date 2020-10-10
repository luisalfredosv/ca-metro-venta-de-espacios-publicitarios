$(document).ready(function() {
$('body').keyup(function(e) {
    if(e.keyCode == 13) {
       login()
    }
});
	$("#iniciar").click(function(event) {
		login()
	});

function login(){
	$("#alerta").hide();
	var user = $("#user").val();
	var password = $("#password").val();

	var error = 0;
	if (user=="") {error =  error=error+1;}
	if (password=="") {error =  error=error+1;}

	if (error<=0) {
		jQuery.ajax({
		  url: 'sql/val_log.php',
		  type: 'POST',
		  dataType: 'json',
		  data: {
		  	password:password,user:user

		  },
		  complete: function(xhr, textStatus) {
		    //called when complete
		  },
		  success: function(data, textStatus, xhr) {
		  	var result= (data.result);
		  		if(result==1){	//OK	 

				$("#iniciar").html('&nbsp; Iniciando ...');
				//auditoria();
				setTimeout(' window.location.href = "inicio.php"; ',500);
				}else if(result==2 || result==3){ // DATOS INCORRECTOS

				var etiqueta = "Notificación";
				var msj ="Los datos ingresados son incorrectos";
				alerta(etiqueta,msj);

				}else if (result==4) { 				// INACTIVO

				var etiqueta = "Notificación";
				var msj ="Su usuario esta inactivo";
				alerta(etiqueta,msj);
				
				}else if (result==5) { 				// BLOQUEADO
				var etiqueta = "Notificación";
				var msj ="Su usuario ha sido bloqueado";
				alerta(etiqueta,msj);

				
				}else if (result==6) { 				// VENCIDO
				var etiqueta = "Notificación";
				var msj ="Su usuario y contraseña estan caducados.";
				alerta(etiqueta,msj);

				}



		  },
		  error: function(xhr, textStatus, errorThrown) {	// SIN CONEXION A LA BASE DE DATOS
		  	
		   	var etiqueta = "Notificación";
		    var msj ="No hay conexión con la base de datos, Notifique al administrador del sistema";
		    alerta(etiqueta,msj);

		    
		  }
		});	
	}else{                                             // CAMPOS VACIOS
		var etiqueta = "Alerta!";			
		var msj ="No dejes los campos vacios";
		alerta(etiqueta,msj);

	}
		
}	


function alerta(etiqueta,msj){
	$("#alerta strong").html(etiqueta);
    $("#alerta div").html(msj);
	$("#alerta").show('slow/400/fast');

}
	// function auditoria() {
	// var user = $("#user").val();
	// var accion = "EN";

	// 	jQuery.ajax({
	// 		  url: 'sql/auditoria.php',
	// 		  type: 'POST',
	// 		  dataType: 'json',
	// 		  data: {
	// 		  	user:user,accion:accion
	// 			},
	// 			complete: function(xhr, textStatus) {
	// 			//called when complete
	// 			},
	// 			success: function(data, textStatus, xhr) {
	// 			},
	// 			error: function(xhr, textStatus, errorThrown) {
	// 			}
	// 		});
	// }


});