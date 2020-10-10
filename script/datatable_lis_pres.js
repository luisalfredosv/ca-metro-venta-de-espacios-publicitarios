$(document).ready(function() {
	listar();
});

// $("#btn-listar").on('click', function(event) {
// 	listar();
// });

var listar = function(){
	var table = $('#example').DataTable({
			"destroy": true,
			"bDeferRender": true,			
			"sPaginationType": "full_numbers",
				"ajax": {
				"url": "sql/datatable_lis_pres.php",
	        	"type": "POST"
			},		

			dom: 'Bfrtip',
				    // "dom": 'Brt<"bottom"ip><"clear">',
            buttons: [

                {	
                	text: 'Copiar',
                    extend: 'copyHtml5',
                    className: 'copyExportButton hideButton btn btn-info',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6] //Aca puedo definir cuales columnas incluir y cuales no.
                    },
                    title: 'Listado_de_presupuestos',
                },
                {
                    text: 'Excel',
                    extend: 'excelHtml5',
                    className: 'xlsExportButton hideButton btn btn-success',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6] //Aca puedo definir cuales columnas incluir y cuales no.
                    },
                    title: 'Listado_de_presupuestos',
                    extension: '.xlsx'
                },
                {	
                	text: 'PDF',
                    extend: 'pdfHtml5',
                    className: 'pdfExportButton hideButton btn btn-danger ',
                 //    orientation: 'landscape',
               		// pageSize: 'LEGAL',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6] //Aca puedo definir cuales columnas incluir y cuales no.
                    },
                    title: 'Listado_de_presupuestos',
                },

            ],

"columns": [
	{ "data": "cod" },
	{ "data": "nom" },
	{ "data": "rif" },
	{ "data": "exp" },
	{ "data": "fec" },
	{ "data": "dur" },
	{ "data": "estado"},
	{ "data": "acciones"},
	{ "defaultContent": "<button  class='eliminar btn btn-danger btn-sm'><i class='far fa-trash-alt'></i> Eliminar</button>"}


	],


			"oLanguage": {
				
	            "sProcessing":     "Procesando...",
			    "sLengthMenu": 'Mostrar <select class="form-control">'+
			        '<option value="10">10</option>'+
			        '<option value="20">20</option>'+
			        '<option value="30">30</option>'+
			        '<option value="40">40</option>'+
			        '<option value="50">50</option>'+
			        '<option value="-1">Todos</option>'+
			        '</select> registros',    
			    "sZeroRecords":    "No se encontraron resultados",
			    "sEmptyTable":     "Ningún dato disponible en esta tabla",
			    "sInfo":           "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
			    "sInfoEmpty":      "Mostrando del 0 al 0 de un total de 0 registros",
			    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			    "sInfoPostFix":    "",
			    "sSearch":         "Filtrar:",
			    "sUrl":            "",
			    "sInfoThousands":  ",",
			    "sLoadingRecords": "Por favor espere - cargando...",
			    "oPaginate": {
			        "sFirst":    "Primero",
			        "sLast":     "Último",
			        "sNext":     "Siguiente",
			        "sPrevious": "Anterior"
			    },

			    
			    "oAria": {
			        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
			    }
	        }


		});
	obtener_data("#example tbody", table);
}


var obtener_data = function(tbody, table){
	$(tbody).on('click', 'button.eliminar', function() {
		var data = table.row( $(this).parents("tr") ).data();
		var ppto = (data.cod);
		var emp = (data.nom);
		var est = (data.estado);
		eliminar_ppto(ppto, emp, est)
	});
}

function eliminar_ppto(ppto, emp, est){
	var accion = "eliminar_ppto";

	if (est != "Activo") {
				swal({
			  title: "Notificación",
			  text: "Estas por eliminar el ppto N° "+ppto+" creado para "+emp+" estas seguro de eliminarlo? tenga en cuenta que una vez eliminado no podras recuperalo!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {

					$.ajax({
						url: 'sql/gst_pre.php',
						type: 'POST',
						dataType: 'json',
						data: {
							accion:accion,
							ppto:ppto
						},
					})
					.done(function(data) {
					var result = (data.result);	 

						if (result == 1) {
							swal("Haz eliminado el ppto correctamente!", {
								 title: "Notificación",
					     		icon: "success",
					    	});

					    	listar();

						}else if(result == 2){
							swal("No se eliminó el ppto correctamente!", {
								 title: "Notificación",
					     		icon: "warning",
							});
						}else if(result == 3){
							swal("No se puede el ppto porque esta enlazado a un contrato!", {
								 title: "Notificación",
								icon: "warning",
							});
						}

					})
					.fail(function() {
						console.log("error");
					});
				}else{

				}
			});

		}else{
			swal("No se puede el ppto porque esta enlazado a un contrato!", {
				 title: "Notificación",
				icon: "warning",
			});
		}
	}


