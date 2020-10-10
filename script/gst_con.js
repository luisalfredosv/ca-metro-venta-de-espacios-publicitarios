$(document).ready(function() {


// boton limpiar
$("#btn-limpiar").click(function(event) {
	$('#gst_con')[0].reset();	
	// $(".form-control").removeAttr('disabled');
	// $("#guardar").removeAttr('disabled');
	$("#btn-actualizar").attr('disabled', 'disabled');
	$("#btn-pdf").attr('disabled', 'disabled');


});


//  limpiar campos especificos
$("#clean_anu").click(function(event) {
	$("#presupuesto").val("");
	$("#rif_anu").val("");
	$("#tel_one").val("");
	$("#tel_two").val("");
	$("#correo" ).val("");
    $("#fec_pre").val("");
    $("#dur_con").val("");
    $("#cod_con").val("");
});



// datepicker
    $("#fec_con").datepicker({
        minDate: -0,
        maxDate: "+1M",
        dateFormat: "dd-mm-yy"
    }).attr('readonly','readonly' );



// select cargo
    $("#cargo").val("");
    var select = "cargo";
	$.ajax({
        url: 'sql/select.php',
        type: 'POST',
        dataType: 'json',
        data: {
            select:select
        },
    })
    .done(function(data) {
        $("#cargo").html(data);
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });

// buscar presupuesto
    $("#presupuesto").autocomplete({
                source: "sql/autocomplete_presupuesto.php?accion=presupuesto_det",

                select: function( event, ui ) {
                 
                  $( "#presupuesto" ) .val( ui.item.label );
                  
                  var term = $("#presupuesto").val();
                       $.ajax({
                        url: "sql/autocomplete_presupuesto.php?accion=dat_presupuesto_det",
                        type:'POST',
                        dataType:'json',
                        data:{ 
                                term:term
                             }
                      }).done(function(data){
                        var result = (data.result);
                        if (result==1){
                        
                        $("#cod_int").val(data.cod_int);
                        $("#fec_pre").val(data.fecha_ad);
                        $("#rif_anu").val(data.tip+data.rif);
                        $("#tel_one").val(data.tel1);
                        $("#tel_two").val(data.tel2);
                        $("#correo").val(data.cor1);
                        $("#dur_con").val(data.lap);
                        //$("#btn-guardar").attr('disabled', 'true');
                        }else{
                        //$("#apro_car").val("");
                        }
                              
                      }).fail(function() {
                        console.log("error en autocomplete");
                      });
                       
                       return false;
                }
            });


// comprobar disponibilidad de codigo de contrato
$("#cod_con").blur(function(event) {
var accion = "consultar_disp_cod";
    $.ajax({
        url: 'sql/gst_con.php',
        type: 'POST',
        dataType: 'json',
        data: {
            accion:accion,
            cod_con: $("#cod_con").val()

        },
    })
    .done(function(data) {
        var result = (data.result);
        if (result==1) {
            swal("Notificación!", "Este código ya fue usado, ingrese uno distinto!", "error");

        }
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });
    
});



// select tipo de ci

    $("#tipo").val("");
    var select = "tipo_ci";
    $.ajax({
        url: 'sql/select.php',
        type: 'POST',
        dataType: 'json',
        data: {
            select:select
        },
    })
    .done(function(data) {
        $("#tipo").html(data);
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });

// select tipo de sexo

    $("#tipo").val("");
    var select = "tipo_sexo";
    $.ajax({
        url: 'sql/select.php',
        type: 'POST',
        dataType: 'json',
        data: {
            select:select
        },
    })
    .done(function(data) {
        $("#sexo").html(data);
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });


$("#btn-guardar").click(function(event) {
    swal({
          title: "Notificación",
          text: "Esta seguro de guardar el contrato?",
          icon: "warning",
          buttons: true,
          dangerMode: false,
        })
        .then((willDelete) => {
          if (willDelete) {

            procesar_presupuesto()
            
          } else {
            
          }
    });
});

      var cod = $( "#nacionalidad" ).val();    
      $( function() {
        function log( message ) {
          $( "<div>" ).text( message ).prependTo( "#log" );
          $( "#log" ).scrollTop( 0 );
        }
     
        $("#nacionalidad").autocomplete({
          source: function( request, response ) {

            $.ajax( {
              url: "sql/gst_con.php?accion=nacionalidad",
              dataType: "json",
              data: {
                term: request.term
              },
              success: function( data ) {
                response( data );
              }
            } );
          },
          /*minLength: 2,*/
          select: function( event, ui ) {
            log( "Selected: " + ui.item.value + " aka " + ui.item.id );
          }
        });
    });



function procesar_presupuesto(){

    // presupuesto
    // fec_con
    // cod_con
    // dir_rif
    // reg_merc
    // tipo
    // cedula
    // nombres
    // apellidos
    // cargo
    // estado
    var error = 0;
    if ($("#presupuesto").val() == "") { error = error + 1 } else { var presupuesto = $("#presupuesto").val() }
    if ($("#fec_con").val() == "") { error = error + 1 } else { var fec_con = $("#fec_con").val() }
    if ($("#cod_con").val() == "") { error = error + 1 } else { var cod_con = $("#cod_con").val() }

    if ($("#dir_rif").val() == "") { error = error + 1 } else { var dir_rif = $("#dir_rif").val() }
    if ($("#cod_int").val() == "") { error = error + 1 } else { var cod_int = $("#cod_int").val() }
    if ($("#reg_merc").val() == "") { error = error + 1 } else { var reg_merc = $("#reg_merc").val() }

    if ($("#tipo").val() == "") { error = error + 1 } else { var tipo = $("#tipo").val() }
    if ($("#cedula").val() == "") { error = error + 1 } else { var cedula = $("#cedula").val() }
    if ($("#nombres").val() == "") { error = error + 1 } else { var nombres = $("#nombres").val() }
    if ($("#apellidos").val() == "") { error = error + 1 } else { var apellidos = $("#apellidos").val() }
    if ($("#cargo").val() == "") { error = error + 1 } else { var cargo = $("#cargo").val() }
    if ($("#estado").val() == "") { error = error + 1 } else { var estado = $("#estado").val() }
    if ($("#tip_reg").val() == "") { error = error + 1 } else { var tip_reg = $("#tip_reg").val() }
    if ($("#nacionalidad").val() == "") { error = error + 1 } else { var nacionalidad = $("#nacionalidad").val() }
    if ($("#sexo").val() == "") { error = error + 1 } else { var sexo = $("#sexo").val() }    

    if (error == 0) {
        var accion = "guardar_contrato";
            $.ajax({
            url: 'sql/gst_con.php',
            type: 'POST',
            dataType: 'json',
            data: {
                accion:accion,
                presupuesto:presupuesto,
                fec_con:fec_con,
                cod_con:cod_con,
                cod_int:cod_int,
                reg_merc:reg_merc,
                dir_rif:dir_rif,
                tipo:tipo,
                cedula:cedula,
                nombres:nombres,
                apellidos:apellidos,
                cargo:cargo,
                tip_reg:tip_reg,
                estado:estado,
                sexo:sexo,
                nacionalidad:nacionalidad
                
            },
        })
        .done(function(data) {
                        var result = (data.result);
                        var cod_con = (data.cod_con);
                        if (result == 4) {
                            swal("Notificación","Se guardó correctamente el contrato!\n N° "+cod_con+"", "success", {
                              buttons: {

                                catch: {
                                  text: "PDF",
                                  value: "PDF"
                                },
                                defeat: {
                                    text: "Regresar",
                                    value: "true",
                                }
                              },
                            })
                            .then((value) => {
                              switch (value) {
                             
                                case "defeat":
                                    location.reload();
                                    break;
                             
                                case "PDF":
                                    window.open("comprobante_contrato?c="+cod_con, "Comprobante de Contrato", "width=900, height=800");
                                    location.reload();
                                    break;
                             
                                default:
                                location.reload();

                              }
                            });
                        }else{
                             var error = (data.error);
                            swal("Notificación!","No se puedo guardar!","warning").then((value) => {
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
        swal("Notificación!","No se pudo guardar haz dejado campos vacíos!","warning").then((value) => { });
    }


}


// buscar contrato
    $("#codigo").autocomplete({
                source: "sql/autocomplete_presupuesto.php?accion=contratos",

                select: function( event, ui ) {
                 
                  $( "#codigo" ) .val( ui.item.label );                  
                  var term = $("#codigo").val();
                       $.ajax({
                        url: "sql/autocomplete_presupuesto.php?accion=contratos_dat",
                        type:'POST',
                        dataType:'json',
                        data:{ 
                                term:term
                             }
                      }).done(function(data){
                        var result = (data.result);
                        if (result==1){

                            $("#rif_anu").val(data.tip+data.rif);
                            $("#correo").val(data.cor1);
                            $("#tel_one").val(data.tel1);
                            $("#tel_two").val(data.tel2);
                            $("#dur_con").val(data.duracion+ " Meses");
                            $("#fec_pre").val(data.fecha_pre);
                            $("#presupuesto").val(data.nom+" "+data.codigo);
                            
                            //$("#codigo").val(data.codigo);

                            $("#pres_ant").val(data.codigo);

                            $("#fec_con").val(data.fecha);
                            $("#cod_con").val(data.cod_contrato).attr('disabled', 'true');
                            $("#dir_rif").val(data.dir_rif);
                            $("#cod_int").val(data.cod_anunciante);
                            $("#reg_merc").val(data.reg_mercantil);
                            $("#tipo").val(data.tip_ci);
                            $("#cedula").val(data.cedula);
                            $("#nombres").val(data.nombres);
                            $("#apellidos").val(data.apellidos); 
                            $("#cargo").val(data.cargo);
                            $("#estado").val(data.estado);
                            $("#tip_reg").val(data.tip_reg);

                            $("#nacionalidad").val(data.nacionalidad);
                            $("#sexo").val(data.sexo);

                            $("#btn-guardar").attr('disabled', 'true');
                            $("#btn-actualizar").removeAttr('disabled');

                            if ((data.tip_reg)==1) {
                                $("#btn-pdf").removeAttr('disabled');
                            }else{
                                $("#btn-pdf").attr('disabled', 'disabled');
                            }

                        }else{
                        //$("#apro_car").val("");
                        }
                              
                      });
                       
                       return false; 
                }
    });



    $("#estado").change(function(event) { 

        if ($("#estado").val()==0 && $("#codigo").val()!="") {
            swal("Notificación!","Estás por eliminar el contrato, presiona el boton actualizar para actualizar el estado del contrato!", "warning").then((value) => {
            // location.reload();
            $("#btn-actualizar").focus();
            });
        }      

    });

    $("#btn-pdf").click(function(event) {
        var cod_con = $("#codigo").val();
       window.open("comprobante_contrato.php?c="+cod_con, "Comprobante de Contrato", "width=900, height=800");
    });


$("#btn-actualizar").click(function(event) {
    swal({
          title: "Notificación",
          text: "Esta seguro de actualizar el contrato?",
          icon: "warning",
          buttons: true,
          dangerMode: false,
        })
        .then((willDelete) => {
          if (willDelete) {

            procesar_presupuesto_act()
            
          } else {
            
          }
    });
});

function procesar_presupuesto_act(){

    var error = 0;
    if ($("#presupuesto").val() == "") { error = error + 1 } else { var presupuesto = $("#presupuesto").val() }
    if ($("#fec_con").val() == "") { error = error + 1 } else { var fec_con = $("#fec_con").val() }
    if ($("#cod_con").val() == "") { error = error + 1 } else { var cod_con = $("#cod_con").val() }

    if ($("#dir_rif").val() == "") { error = error + 1 } else { var dir_rif = $("#dir_rif").val() }
    if ($("#cod_int").val() == "") { error = error + 1 } else { var cod_int = $("#cod_int").val() }
    if ($("#reg_merc").val() == "") { error = error + 1 } else { var reg_merc = $("#reg_merc").val() }

    if ($("#tipo").val() == "") { error = error + 1 } else { var tipo = $("#tipo").val() }
    if ($("#cedula").val() == "") { error = error + 1 } else { var cedula = $("#cedula").val() }
    if ($("#nombres").val() == "") { error = error + 1 } else { var nombres = $("#nombres").val() }
    if ($("#apellidos").val() == "") { error = error + 1 } else { var apellidos = $("#apellidos").val() }
    if ($("#cargo").val() == "") { error = error + 1 } else { var cargo = $("#cargo").val() }
    if ($("#estado").val() == "") { error = error + 1 } else { var estado = $("#estado").val() }
    
    if ($("#pres_ant").val() == "") { error = error + 1 } else { var pres_ant = $("#pres_ant").val() }
    if ($("#tip_reg").val() == "") { error = error + 1 } else { var tip_reg = $("#tip_reg").val() }
    if ($("#nacionalidad").val() == "") { error = error + 1 } else { var nacionalidad = $("#nacionalidad").val() }
    if ($("#sexo").val() == "") { error = error + 1 } else { var sexo = $("#sexo").val() }  

    if (error == 0) {
        var accion = "actualizar_contrato";
            $.ajax({
            url: 'sql/gst_con.php',
            type: 'POST',
            dataType: 'json',
            data: {
                accion:accion,
                presupuesto:presupuesto,
                fec_con:fec_con,
                cod_con:cod_con,
                cod_int:cod_int,
                reg_merc:reg_merc,
                dir_rif:dir_rif,
                tipo:tipo,
                cedula:cedula,
                nombres:nombres,
                apellidos:apellidos,
                cargo:cargo,
                pres_ant:pres_ant,
                tip_reg:tip_reg,
                estado:estado,
                sexo:sexo,
                nacionalidad:nacionalidad
                
            },
        })
        .done(function(data) {
            var result = (data.result);
            var estatus = (data.estatus);
            var cod_con = (data.cod_con);
            //  var dat = (data.var);

             // alert("result: "+result+ "estatus: "+estatus );


            if (result == 1) {
                swal("Notificación","Se actualizó correctamente el contrato!\n N° "+cod_con+"", "success", {
                  buttons: {

                    catch: {
                      text: "PDF",
                      value: "PDF"
                    },
                    defeat: {
                        text: "Regresar",
                        value: "true",
                    }
                  },
                })
                .then((value) => {
                    switch (value) {

                    case "defeat":
                        location.reload();
                        break;

                    case "PDF":
                        window.open("comprobante_contrato?c="+cod_con, "Comprobante de Contrato", "width=900, height=800");
                        location.reload();
                        break;

                    default:
                    location.reload();

                    }
                });
            }else if(result == 3 && estatus != 5){

                swal("Notificación!","El cambio de presupuesto se realizo conrrectamente, pero ocurrio un error! notifica al administrador del sistema ", "success").then((value) => {
                // location.reload();
                });
                
            }else if(result == 3 && estatus == 5){
                swal("Notificación","Se actualizó correctamente el contrato!\n N° "+cod_con+" y se realizó el cambio de presupuesto", "success", {
                  buttons: {

                        catch: {
                          text: "PDF",
                          value: "PDF"
                        },
                        defeat: {
                            text: "Regresar",
                            value: "true",
                        }
                  },
                })
                .then((value) => {
                  switch (value) {
                 
                    case "defeat":
                        location.reload();
                        break;
                 
                    case "PDF":
                        window.open("comprobante_contrato?c="+cod_con, "Comprobante de Contrato", "width=900, height=800");
                        location.reload();
                        break;
                 
                    default:
                    location.reload();

                  }
                });

            }else{
                 var error = (data.error);
                swal("Notificación!","No se pudo actualizar! Notifique al administrador del sistema","warning").then((value) => {
                   // location.reload();
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
        swal("Notificación!","No se pudo guardar haz dejado "+error+" campos vacíos!","warning").then((value) => { });
    }


}

});