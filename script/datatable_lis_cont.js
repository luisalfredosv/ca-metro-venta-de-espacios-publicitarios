$(document).ready(function() {		


		$('#example').DataTable( {	
			"bDeferRender": true,			
			"sPaginationType": "full_numbers",
				"ajax": {
				"url": "sql/datatable_lis_cont.php",
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
                        columns: [0,1,2,3,4,5,6,7,8] //Aca puedo definir cuales columnas incluir y cuales no.
                    },
                    title: 'Listado_de_contratos',
                },
                {
                    text: 'Excel',
                    extend: 'excelHtml5',
                    className: 'xlsExportButton hideButton btn btn-success',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,7,8] //Aca puedo definir cuales columnas incluir y cuales no.
                    },
                    title: 'Listado_de_contratos',
                    extension: '.xlsx'
                },
                {	
                	text: 'PDF',
                    extend: 'pdfHtml5',
                    className: 'pdfExportButton hideButton btn btn-danger ',
                    orientation: 'landscape',
               		pageSize: 'LETTER',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,7,8] //Aca puedo definir cuales columnas incluir y cuales no.
                    },
                    title: 'Listado_de_contratos',
                },

            ],

			"columns": [

					{ "data": "contrato" },
					{ "data": "f_contrato" },
					{ "data": "nom" },
					{ "data": "rif" },
					{ "data": "exp" },
					{ "data": "presupuesto" },
					{ "data": "f_contrato" },
					{ "data": "duracion" },
					{ "data": "estado" },
					{ "data": "acciones" }

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



		//$("#example_first").addClass('btn btn-primary btn-sm');
});