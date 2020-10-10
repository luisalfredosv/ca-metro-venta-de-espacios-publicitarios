$(document).ready(function() {



$("#check_inic_mont").click(function(event) {

    // Si esta seleccionado (si la propiedad checked es igual a true)
    if ($(this).prop('checked')) {
        // Selecciona cada input que tenga la clase .checar
      $("#inic_mont").prop('disabled', false);
      //alert($("#check_inic_mont").prop('checked'));
    } else {
        // Deselecciona cada input que tenga la clase .checar
      $("#inic_mont").prop('disabled', true).val("");
     // alert($("#check_inic_mont").prop('checked'));
    }
});


$("#btn-limpiar").click(function(event) {
    $('#gst_pre')[0].reset();
    $('#gest_pres tbody tr').remove();
    $('#pagos tbody tr').remove();
});




//  generar codigo
function generear_cod(){
    var accion = "gen_cod";
    $.ajax({
        url: 'sql/gst_pre.php',
        type: 'POST',
        dataType: 'json',
        data: {
            accion:accion
        },
    })
    .done(function(data) {
        var result = (data.result);
        if (result == 1) {
            $("#cod").val(data.cod);
            if ($("#cod").val()!="") {
                procesar_p()
            }
        }
    })
    .fail(function() {
        console.log("error no se pudo generar el codigo");

        $('#container').find('input, textarea, button, select').attr('disabled','disabled');


            swal({
              title: "Error de conexión",
              text: "Por favor recargue la pagina e intente nuevamente!",
              icon: "warning",
              dangerMode: true,
              buttons: {
                inicio: {
                  text: "ir a inicio",
                  value: "inicio",
                },
                recargar: {
                  text: "Recargar Pagina",
                  value: "recargar",
                },

                }
            }).then((value) => {
              switch (value) {
             
                case "inicio":
                   window.location.href = "inicio.php";
                  break;
             
                case "recargar":
                  location.reload();
                  break;

              }
              
            });

    })
    .always(function() {
        console.log("complete");
    });

}

        $("#fecha").datepicker({
            minDate: -0,
            maxDate: "+1M"
        }).attr('readonly','readonly' );

        $("#fech_inic").datepicker({
            minDate: -0,
            maxDate: "+2M"
        }).attr('readonly','readonly' );

         

// select lapso de negociacions


$("#lap_neg").val("");
    var select = "lap_neg";
$.ajax({
        url: 'sql/select.php',
        type: 'POST',
        dataType: 'json',
        data: {
            select:select
        },
    })
    .done(function(data) {
        $("#lap_neg").html(data);
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });





function lap_neg() {
     $("#meex").val($("#lap_neg").val());
}

// select ubicacion

            $("#ubic").val("");
            var select = "estaciones";
            $.ajax({
                url: "sql/select.php",
                type: 'POST',
                dataType: 'json',
                data: {
                    select: select
                },
                success: function(response) {
                    $("#ubic").html(response);

                }

            });

// select materiales

            $("#mat").val("");
            var select = "materiales";
            $.ajax({
                url: "sql/select.php",
                type: 'POST',
                dataType: 'json',
                data: {
                    select: select
                },
                success: function(response) {
                    $("#mat").html(response);

                }

            });


// autocomplete ubicacion 
            $(function() {
                function log(message) {
                    $("<div>").text(message).prependTo("#log");
                    $("#log").scrollTop(0);
                }

                $("#codb").autocomplete({
                    source: function(request, response) {
                        var ubic = $("#ubic").val();
                        var regex = /(\d+)/g;
                        var ubic = (ubic.match(regex));
                        var dat = ubic[0];
                        $.ajax({
                            url: "sql/autocomplete_bienes.php",
                            dataType: "json",
                            data: {
                                term: request.term,
                                dat: dat
                            },
                            success: function(data) {
                                response(data);
                            }
                        });
                    },
                    /*minLength: 2,*/
                    select: function(event, ui) {
                        log("Selected: " + ui.item.value + " aka " + ui.item.id);
                    }
                });
            });

//  ELABORADO POR

                        
            $("#elab_by").autocomplete({
                source: "sql/autocomplete_emp_comerc.php?accion=autocomplete",

                select: function( event, ui ) {
                  //$("#reg_usuario").attr('disabled', 'disabled');
                  $( "#elab_by" ) .val( ui.item.label );
                  //var accion = "cons_info";3
                  var emp = $("#elab_by").val();
                       $.ajax({
                        url: "sql/autocomplete_emp_comerc.php?accion=cons_info",
                        type:'POST',
                        dataType:'json',
                        data:{ 
                                emp:emp
                             }
                      }).done(function(data){
                        var result = (data.result);
                        if (result==1){
                        $("#elab_car").val(data.cargo);
                        $("#elab_ci").val(data.ci);
                        }else{
                        $("#elab_car").val("");
                        }
                              
                      }).fail(function() {
                        console.log("error en autocomplete");
                      });
                       
                       return false;
                }
            });


            $("#elab_by").change(function(event) {
                var elab_by = $("#elab_by").val();
                var cargo = $("#elab_car").val();
                if (elab_by=="") {
                    $("#elab_car").val("");
                    $("#elab_ci").val("");

                }

            });

// REVISADO POR  

            $("#revi_by").autocomplete({
                source: "sql/autocomplete_emp_comerc.php?accion=autocomplete",

                select: function( event, ui ) {
                  //$("#reg_usuario").attr('disabled', 'disabled');
                  $( "#revi_by" ) .val( ui.item.label );
                  //var accion = "cons_info";3
                  var emp = $("#revi_by").val();
                       $.ajax({
                        url: "sql/autocomplete_emp_comerc.php?accion=cons_info",
                        type:'POST',
                        dataType:'json',
                        data:{ 
                                emp:emp
                             }
                      }).done(function(data){
                        var result = (data.result);
                        if (result==1){
                        $("#revi_car").val(data.cargo);
                        $("#revi_ci").val(data.ci);
                        }else{
                        $("#revi_car").val("");
                        }
                              
                      }).fail(function() {
                        console.log("error en autocomplete");
                      });
                       
                       return false;
                }
            });


            $("#revi_by").change(function(event) {
                var revi_by = $("#revi_by").val();
                var cargo = $("#revi_car").val();
                if (revi_by=="") {
                    $("#revi_car").val("");
                    $("#revi_ci").val("");

                }

            });



// APROBADO POR  

            $("#apro_by").autocomplete({
                source: "sql/autocomplete_emp_comerc.php?accion=autocomplete",

                select: function( event, ui ) {
                  //$("#reg_usuario").attr('disabled', 'disabled');
                  $( "#apro_by" ) .val( ui.item.label );
                  //var accion = "cons_info";3
                  var emp = $("#apro_by").val();
                       $.ajax({
                        url: "sql/autocomplete_emp_comerc.php?accion=cons_info",
                        type:'POST',
                        dataType:'json',
                        data:{ 
                                emp:emp
                             }
                      }).done(function(data){
                        var result = (data.result);
                        if (result==1){
                        $("#apro_car").val(data.cargo);
                        $("#apro_ci").val(data.ci);
                        }else{
                        $("#apro_car").val("");
                        }
                              
                      }).fail(function() {
                        console.log("error en autocomplete");
                      });
                       
                       return false;
                }
            });


            $("#apro_by").change(function(event) {
                var apro_by = $("#apro_by").val();
                var cargo = $("#apro_car").val();
                if (apro_by=="") {
                    $("#apro_car").val("");
                    $("#apro_ci").val("");

                }

            });

// datos del bien 

            $("#codb").change(function(event) {
                var accion = "buscar_bien";
                var bien = $("#codb").val();
                $.ajax({
                        url: 'sql/gst_pre.php',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            bien: bien,
                            accion: accion
                        },
                    })
                    .done(function(data) {
                        if ((data.result) = 1) {
                            $("#anc").val(data.anc);
                            $("#alt").val(data.alt);
                            $("#desc").val(data.desc);
                            $("#cant").val("1");
                        }
                    })
                    .fail(function() {
                        console.log("error");
                    })
                    .always(function() {
                        console.log("complete");
                    });

            });


// convertir monto en letras

function imp_let() {
    //var imp_let = $("#imp_let").val();
    // en subtotal se envia el montototal  
    var subtotal =  $("#montototal").val();

    if (subtotal!="" && subtotal!=0) {

        $.ajax({
            url: 'sql/CifrasEnLetras.php',
            type: 'POST',
            dataType: 'json',
            data: {
                subtotal:subtotal
            },
        })
        .done(function(data) {
        var result = (data.result);
        var monto = (data.monto);
            if (result == 1) {
                $("#imp_let").val(monto);
                //alert(monto);
            }
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
    
    }

}




// Guardar presupuesto


$("#btn-guardar").click(function(event) {

    swal({
      title: "Notificación",
      text: "Esta seguro de guardar el presupuesto?",
      icon: "warning",
      buttons: true,
      dangerMode: false,
    })
    .then((willDelete) => {
      if (willDelete) {

        // swal("Poof! Your imaginary file has been deleted!", {
        //   icon: "success",
        // });
    generear_cod()
       
      } else {
        // swal("Your imaginary file is safe!");
      }
    });
}); 


    function procesar_p(){
        


        var table_pres = $('#gest_pres').tableToJSON({
        ignoreColumns: [0, 7, 8]
        });
        var tab_pre = JSON.stringify(table_pres);

        //alert(tab_pre);

        var table_pago = $('#pagos').tableToJSON({
             ignoreColumns: [5]
        });
        var tab_pag = JSON.stringify(table_pago);

       // alert(tab_pag);

        var error = 0;

        if (tab_pre == "") {
        error = error + 1
        }
        if (tab_pag == "") {
        error = error + 1
        }
        if ($("#cod").val() == "") {
        error = error + 1
        } else {
        var cod = $("#cod").val()
        }
        if ($("#fecha").val() == "") {
        error = error + 1
        } else {
        var fecha = $("#fecha").val()
        }
        if ($("#lap_neg").val() == "") {
        error = error + 1
        } else {
        var lap_neg = $("#lap_neg").val()
        }
        // if ($("#rif").val() == "") {
        //  error = error + 1
        // } else {
        //  var rif = $("#rif").val()
        // }
        if ($("#obs").val() == "") {
        var obs = ""
        } else {
        var obs = $("#obs").val()
        }
        if ($("#imp_let").val() == "") {
        error = error + 1
        } else {
        var imp_let = $("#imp_let").val()
        }
        if ($("#fech_inic").val() == "") {
        error = error + 1
        } else {
        var fech_inic = $("#fech_inic").val()
        }
        if ($("#fpago").val() == "") {
        error = error + 1
        } else {
        var fpago = $("#fpago").val()
        }
        if ($("#cuotas").val() == "") {
        error = error + 1
        } else {
        var cuotas = $("#cuotas").val()
        }
        if ($("#elab_ci").val() == "") {
        error = error + 1
        } else {
        var elab_by = $("#elab_ci").val()
        }
        if ($("#revi_ci").val() == "") {
        error = error + 1
        } else {
        var revi_by = $("#revi_ci").val()
        }
        if ($("#apro_ci").val() == "") {
        error = error + 1
        } else {
        var apro_by = $("#apro_ci").val()
        }
        if ($("#cod_int").val() == "") {
        error = error + 1
        } else {
        var cod_int = $("#cod_int").val()
        }
        if ($("#sub-total").val() == "") {
        error = error + 1
        } else {
        var sub_total = $("#sub-total").val()
        }
        if ($("#porcentaje").val() == "") {
        error = error + 1
        } else {
        var porcentaje = $("#porcentaje").val()
        }
        if ($("#descuento").val() == "") {
        error = error + 1
        } else {
        var descuento = $("#descuento").val()
        }
        if ($("#montototal").val() == "") {
        error = error + 1
        } else {
        var montototal = $("#montototal").val()
        }

        if ($("#import_cuo").val() == "") {
        error = error + 1
        } else {
        var import_cuo = $("#import_cuo").val()
        }

        if ($("#tip_reg").val() == "") {
        error = error + 1
        } else {
        var tip_reg = $("#tip_reg").val()
        }


        if($("#check_inic_mont").prop('checked')){
            if ($("#inic_mont").val() == "" && $("#inic_mont").val() == "0") {
            error = error + 1
            } else {
            var inic_mont = $("#inic_mont").val()
            }
        } else {
            var inic_mont =0
        }


            if (error==0) {
            
            var accion = "g_presupuesto";
                    $.ajax({
                        url: 'sql/gst_pre.php',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            accion:accion,
                            cod:cod,
                            fecha:fecha,
                            lap_neg:lap_neg,
                            obs:obs,
                            imp_let:imp_let,
                            tab_pre:tab_pre,
                            tab_pag:tab_pag,
                            fech_inic:fech_inic,
                            fpago:fpago,
                            cuotas:cuotas,
                            elab_by:elab_by,
                            revi_by:revi_by,
                            apro_by:apro_by,
                            cod_int:cod_int,
                            sub_total:sub_total,
                            porcentaje:porcentaje,
                            descuento:descuento,
                            montototal:montototal,
                            import_cuo:import_cuo,
                            tip_reg:tip_reg,
                            inic_mont:inic_mont

                        },
                    })
                    .done(function(data) {
                        var result = (data.result);
                        if (result == 1) {
                            var codigo = (data.codigo);
                            var c = encodeURI(codigo);
                            swal("Notificación","Se guardó correctamente el presupuesto!\n N° "+codigo+"", "success", {
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
                                    window.open("comprobante_presupuesto.php?c="+c+"", "Comprobante de Presupuesto", "width=900, height=800");
                                    location.reload();
                                    break;
                             
                                default:
                                location.reload();

                              }
                            });
                        }else if (result == 2){

                            swal("Notificación!","No se puedo guardar, contacte! al administrador del sistema","warning").then((value) => {
                                //location.reload();
                            });
                        }else{
                            swal("Notificación!","No se puedo guardar! verifique los datos e intente de nuevo","warning").then((value) => {
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
                        text: "Haz dejado campos "+error+" vacios verifique e intente de nuevo",
                        icon: "warning",
                        buttons: false,
                    });
            }
    }

// fin de guardado de presupuesto



// calculo de precio meses de exhibicion x precio
 
    $("#lap_neg").change(function(event) {
        $("#meex").val($("#lap_neg").val());
        //var meses = $("#meex").val();
        montoxmes();
        selectfpago();
    });




    $("#meex").change(function(event) {
        //var meses = $("#meex").val();
        montoxmes();
    });

    $("#pre").change(function(event) {
       
        montoxmes();
    }); 

    function montoxmes(){

        var meses = $("#meex").val();
        var precio = $("#pre").val();
        var pre = precio.split('.').join('').split(',').join('.');
        var resultado = (meses * pre);
        var total = accounting.formatMoney(resultado,"", 2, ".", ",");
        $("#total").val(total);
        $("#tot").val(resultado);
        
    }


// Agregar filas a la lista del presupuesto

            $("#add").click(function() {
                // && $("#desc").val()!=""
                if ($("#lap_neg").val() != "" && $("#ubic").val() != ""  && $("#codb").val() != "" 
                    && $("#cant").val() != "" && $("#mat").val() != "" && $("#pre").val() != "" 
                    && $("#meex").val() != "" && $("#total").val() != "") {

                //if ($("#lap_neg").val() != "" && $("#ubic").val() != "" && $("#codb").val() != "" && $("#cant").val() != "" && $("#mat").val() != "" && $("#anc").val() != "" && $("#alt").val() != "" && $("#pre").val() != "" && $("#meex").val() != "" && $("#total").val() != "") {
                
                    //var meses = $("#meex").val();
                    montoxmes();                    
                    addData();
                    calcular();
                    lap_neg();
                    $("#lap_neg").attr('disabled', 'true');
                } else {
                    swal("Error!", "Para poder agregar un registro es necesario \n No dejar campos vacios", "error");
                }

            });

$("#ubic").change(function(event) {
    if ($("#codb").val()!="") {
        $("#codb").val("");
        $("#cant").val("");
        $("#desc").val("");  
        $("#anc").val("");
        $("#alt").val("");
        $("#pre").val("");
        $("#total").val(""); 
    }
});

            function addData() {
                var tds = $("#gest_pres tr:first td").length;
                var trs = $("#gest_pres tr").length;
                //var sum= 0;
                var suma = 0;
                var n = trs ;
                trs = trs - 2;

                var markup = "<tr id='tr" + n + "'>";

                var dat = $("#ubic").val();

                var ubic =  dat.replace(/(\d+)/g, "");

                var codb = $("#codb").val();
                var cant = $("#cant").val();
                var desc = $("#desc").val();

                var mat = $("#mat").val();
                mat = mat.replace(/(\d+)/g, "");

                var anc = $("#anc").val();
                var alt = $("#alt").val();
                var pre = $("#pre").val().split('.').join('').split(',').join('.');
                var meex = $("#meex").val();
                var total = $("#total").val();
                var tot = $("#tot").val();
                var tot = meex * pre; 
                var totalx = tot.toFixed(2);

                //var cantidad = accounting.formatMoney(cant, "Bs.S ", 2, ".", ",");

                markup += "<td width='41.85rem'><input type='checkbox' class='form-control' name='record'></td>";
                markup += "<td width='24.8833rem'>" + n + "</td>";
                markup += "<td width='149.3rem'>" + ubic + "</td>";
                markup += "<td width='149.3rem'>" + codb + "</td>";
                markup += "<td width='58.33rem' class='cant'>" + cant + "</td>";
                markup += "<td width='124.4rem'>" + desc + "</td>";
                markup += "<td width='149.3rem'>" + mat + "</td>";
                markup += "<td width='62.21rem'>" + anc + "</td>";
                markup += "<td width='62.21rem'>" + alt + "</td>";
                markup += "<td width='149.3rem' class='text-right'>" + accounting.formatMoney(pre,"", 2, ".", ",") + "</td>";
                markup += "<td width='62.21rem'>" + meex + "</td>";
                markup += "<td width='186.63' class='total text-right'>" + total + "</td>";
                // markup += "<td width='62.21rem' style='' class='total'>" +  totalx + "</td>";
                markup += "</tr>";

                $("#gest_pres tbody").append(markup);
                for (var i = 0; i < n; i++) {

                    $("#ubic").val("");
                    $("#codb").val("");
                    $("#cant").val("");
                    $("#desc").val("");
                    $("#mat").val("");
                    $("#anc").val("");
                    $("#alt").val("");
                    $("#pre").val("");
                    $("#meex").val("");
                    $("#total").val("");
                    $("#tot").val("");
                }

                
                // $("#pres_tot tfoot").show();
                    descuento();
                    //cantidad();
                    imp_let();
                    calcularcuotas();
               }



// suma de la columna de montos
                function calcular() {

                    var suma = 0;
                    $(".total").each(function() {
                    //suma += parseFloat($(this).html().slice(5).replace(".","").replace(",",".")) || 0;
                    suma += parseFloat($(this).html().split('.').join('').split(',').join('.')) || 0;
                    //var sumador = ($(this).html().split('.').join('').split(',').join('.')) || 0;
                    // suma += (sumador);
                    });

                    $("#sub-total").val(accounting.formatMoney(suma,"",2, ".", ","));

                    
                    //$("#montototal2").val(suma);
                    
                    descuento();
                    cantidad();
                    imp_let();
                    calcularcuotas();
                 }


// cantidad de items
                function cantidad() {

                    var suma = 0;
                    $(".cant").each(function() {
                        suma += parseFloat($(this).html()) || 0;
                    });
                    $("#cantidad").val(suma);
                }

// eliminar filas del presupuesto
                $("#rmv").click(function() {
                    $("#gest_pres tbody").find('input[name="record"]').each(function() {
                        if ($(this).is(":checked")) {
                            $(this).parents("tr").remove();
                        }
                    });

                var trs = $("#pres_tot tr").length;
                trs = trs - 1
                if (trs==0) {
                   $("#pres_tot tfoot").hide();
                }

                    calcular();
                });
// porcentaje de descuento
                $("#porcentaje").change(function(event) {
                    descuento();
                    cantidad();
                    imp_let();
                    calcularcuotas();
                });

                
                function descuento(){
// .slice(5).replace(".","").replace(",",".")
// accounting.formatMoney(suma, "Bs.S ", 2, ".", ",")

                    var sub_total =  $("#sub-total").val().split('.').join('').split(',').join('.');
                    var porcentaje = $("#porcentaje").val();
            
                    var resdesc = (sub_total * porcentaje) / 100;
                    var total = (sub_total) - resdesc;
                    var total2 = accounting.formatMoney(total,"", 2, ".", ",");
                    var resdesc2 = accounting.formatMoney(resdesc,"", 2, ".", ",");
                    $("#descuento").val(resdesc2);
                    //alert("monto"+total);
                    $("#montototal").val(total2);
                }

                
                $("#fech_inic").change(function() {
                    calcularcuotas();
                });


                $("#fpago").change(function(event) {
                    calcularcuotas();
                });


                $("#montototal").change(function(event) {
                    calcularcuotas();
                });


                $("#inic_mont").change(function(event) {
                    calcularcuotas();
                });

                $("#check_inic_mont").change(function(event) {
                    calcularcuotas();
                });




//  calcular cuotas montos y fecha
                function calcularcuotas(fpago) {

                    var fpago = $("#fpago").val();

                    if (fpago==1){
                    fpago=01;
                    }else if (fpago==2){
                    fpago=02; 
                    }else if (fpago==3){
                    fpago=03; 
                    }else if (fpago==6){
                    fpago=06; 
                    }

                    $("#pagos tbody tr").remove();


// .slice(5).replace(".","").replace(",",".")
// accounting.formatMoney(suma, "Bs.S ", 2, ".", ",")

                    var cuotas = $("#cuotas").val();
                    var montototal = $("#montototal").val().split('.').join('').split(',').join('.');


                    var inic_mont = $("#inic_mont").val();

                        // if ($("#check_inic_mont").prop('checked')=="true"){

                        // var rest = montototal - inic_mont;
                        // var resul = rest / cuotas;
                        // alert(rest)

                        // }else{

                        // var resul = montototal / cuotas;  

                        // }


                    if($("#check_inic_mont").prop('checked') && $("#inic_mont").val()!=0 && $("#inic_mont").val()!=""){
                    var rest = montototal - inic_mont;
                    var resul = rest / cuotas;
                    } else {
                    var resul = montototal / cuotas
                    }

                    var fech_inic = $("#fech_inic").val();

                    var fech_arrey = fech_inic.split("/") 
                    var year = parseInt(fech_arrey[2]); 
                    var month = parseInt(fech_arrey[1]-1); 
                    var day = parseInt(fech_arrey[0]); 


                    for (var i = 0; i < cuotas; i++) {

                       
                        month = month + fpago;
                        if (month>12) {
                          month = month - 12;
                          year=year + 1; 
                          //alert(month) 
                        }
                        // conversion de numero de mes a mes en letras
                        var meslet ="";
                        if (month==1) {meslet="ENERO"}
                            else if (month==2) {meslet="FEBRERO"}
                                else if(month==3){meslet="MARZO"}
                                    else if (month==4) {meslet="ABRIL"}
                                        else if (month==5) {meslet="MAYO"}
                                            else if (month==6) {meslet="JUNIO"}
                                                else if (month==7) {meslet="JULIO"}
                                                    else if (month==8) {meslet="AGOSTO"}
                                                        else if (month==9) {meslet="SEPTIEMBRE"}
                                                            else if (month==10) {meslet="OCTUBRE"}
                                                                else if (month==11) {meslet="NOVIEMBRE"}
                                                                    else if (month==12) {meslet="DICIEMBRE"}
                        var fecha_dat = day+"-"+month+"-"+year;
                        var fecha = month;

                        var res = montototal - resul * (i + 1);
                       // resul = accounting.formatMoney(resul, "Bs.S ", 2, ".", ",")

                        var row = "<tr>";
                        row += "<td width='61rem' class='text-center'>" + (i + 1) + "</td>";
                        row += "<td width='244rem' class='text-center'>Cuota " + (i + 1) + " de " + cuotas + "</td>";

                        

                        row += "<td width='244rem' class='text-center'>" + accounting.formatMoney(resul,"", 2, ".", ",") + "</td>";
                        row += "<td width='230.9rem' class='text-center'>" + accounting.formatMoney(res,"", 2, ".", ",") + "</td>";
                        /*  COLUMNA OCULTA DE FECHA */                       
                        row += "<td style='display: none'>"+fecha_dat+"</td>";
                        row += "<td width='440.1rem' class='text-center'>"+meslet+" "+year+"</td>";
                        row += "</tr>";

                        $("#resul").val(accounting.formatMoney(resul, "", 2, ".", ","));
                        $("#pagos tbody").append(row);

                        var cuota = accounting.formatMoney(resul,"", 2, ".", ",");
                        
                    }
                    imp_let_cuo(cuota);
                }


                $("#cuotas").change(function(event) {
                    calcularcuotas();
                });





//  SELECT DEPENDIENTES

$("#fpago").change(function(event) {
    selectccuotas();
    $("#cuotas").val();
    $("#pagos tbody tr").remove();
});

function selectfpago(){
    $("#fpago").val("");
    var select = "fpago";
    var lap_neg = $("#lap_neg").val();
    $.ajax({
        url: 'sql/select.php',
        type: 'POST',
        dataType: 'json',
        data: {
            select:select,
            lap_neg:lap_neg
        },
    })
    .done(function(data) {
        $("#fpago").html(data);
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });
}


function selectccuotas(){
    $("#cuotas").val("");
    var select = "ccuotas";
    var fpago = $("#fpago").val();
    var lap_neg = $("#lap_neg").val();
    $.ajax({
        url: 'sql/select.php',
        type: 'POST',
        dataType: 'json',
        data: {
            select:select,
            fpago:fpago,
            lap_neg:lap_neg
        },
    })
    .done(function(data) {
        $("#cuotas").html(data);
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });
}


// buscador de anunciantes


            $("#buscador").autocomplete({
                source: "sql/autocomplete_anun_pre.php?accion=autocomplete",

                select: function( event, ui ) {
                  //$("#reg_usuario").attr('disabled', 'disabled');
                  $( "#buscador" ) .val( ui.item.label );
                  //var accion = "cons_info";3
                  var term = $("#buscador").val();
                       $.ajax({
                        url: "sql/autocomplete_anun_pre.php?accion=consultar",
                        type:'POST',
                        dataType:'json',
                        data:{ 
                                term:term
                             }
                      }).done(function(data){
                        var result = (data.result);
                        if (result==1){
                        $("#nom").val(data.nom);
                        $("#rif").val(data.tip+data.rif);
                        $("#exp").val(data.exp);
                        $("#buscador").val("");
                        $("#cod_int").val(data.cod_int);
                        }else{
                        //$("#apro_car").val("");
                        }
                              
                      }).fail(function() {
                        console.log("error en autocomplete");
                      });
                       
                       return false;
                }
            });


// monto en letras de cuotas

 // $("#resul").change(function(event) {
 //    imp_let_cuo()
 // });


function imp_let_cuo(cuota) {

    // var subtotal =$("#montototal").val();

    // if (subtotal!="" && subtotal!=0) {
if (cuota!="" && cuota!=0) {
        $.ajax({
            url: 'sql/CifrasEnLetras.php',
            type: 'POST',
            dataType: 'json',
            data: {
                subtotal:cuota
            },
        })
        .done(function(data) {
        var result = (data.result);
        var monto = (data.monto);
            if (result == 1) {
                $("#import_cuo").val(monto);
                //alert(monto);
            }
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
    
    }
    
}






});