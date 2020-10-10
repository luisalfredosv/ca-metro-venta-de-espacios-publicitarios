<?php
	
	require_once("conexion.php");
$tabla ="";
$sql = "SELECT * FROM anunciantes";

	if($resultado = $mysqli->query($sql)) {
		$row_cnt = mysqli_num_rows($resultado);
		if ($row_cnt> 0){

			while($row = $resultado->fetch_array()) {


if ($row['est']==1) {
	$estado="Activo";
}elseif ($row['est']==0) {
	$estado="Inactivo";
}

// $opcion = '<a href=\"gestionar_anunciantes.php?c='.base64_encode($row['cod']).'\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Detalles\" class=\"btn btn-primary btn-sm\">Detalles<i class=\"\" aria-hidden=\"true\"></i></a>';

					$tabla.='{
					"cod":"'.($row['cod']).'",
					"nom":"'.($row['nom']).'",
					"dir":"'.($row['dir']).'",
					"tel1":"'.($row['tel1']).'",
					"rif":"'.($row['tip']).($row['rif']).'",
					"cor1":"'.($row['cor1']).'",
					"ddc":"'.($row['ddc']).'",
					"tdc":"'.($row['tdc']).'",
					"est":"'.($estado).'"
					
				},';

				
			}

		}

	}$mysqli->close();
				
				//	"acciones":"'.utf8_encode($detalles).'"
	

	//eliminamos la coma que sobra
	$tabla = substr($tabla,0, strlen($tabla) - 1);

	echo '{"data":['.$tabla.']}';	

?>



