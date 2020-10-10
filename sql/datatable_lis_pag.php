<?php
	
	require_once("conexion.php");
$tabla ="";
$sql = "SELECT a.id_pag, a.contrato, date_format(a.fec_pag,'%d-%m-%Y') AS fec_pag, a.ref_pag, a.mon_pag, a.est_pag, b.tipo FROM espacios_publicitarios.pagos AS a, espacios_publicitarios.select_for_pag AS b WHERE a.for_pag = b.id ORDER BY a.id_pag ASC ";

	if($resultado = $mysqli->query($sql)) {
		$row_cnt = mysqli_num_rows($resultado);
		if ($row_cnt> 0){

			while($row = $resultado->fetch_array()) {


// if ($row['est']==1) {
// 	$estado="Activo";
// }elseif ($row['est']==0) {
// 	$estado="Inactivo";
// }

// $opcion = '<a href=\"gestionar_anunciantes.php?c='.base64_encode($row['cod']).'\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Detalles\" class=\"btn btn-primary btn-sm\">Detalles<i class=\"\" aria-hidden=\"true\"></i></a>';

					$tabla.='{
					"id_pag":"'.($row['id_pag']).'",
					"contrato":"'.($row['contrato']).'",
					"fec_pag":"'.($row['fec_pag']).'",
					"ref_pag":"'.($row['ref_pag']).'",
					"tipo":"'.($row['tipo']).'",
					"mon_pag":"'.number_format($row["mon_pag"], 2, ',', '.').'"
					
				},';

				
			}

		}

	}$mysqli->close();
				
				//	"acciones":"'.($detalles).'"
	

	//eliminamos la coma que sobra
	$tabla = substr($tabla,0, strlen($tabla) - 1);

	echo '{"data":['.$tabla.']}';	

?>



