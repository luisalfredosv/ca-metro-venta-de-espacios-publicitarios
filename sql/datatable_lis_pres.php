<?php
	
require_once("conexion.php");
$tabla ="";
//$sql = "SELECT p.id, p.codigo, date_format(p.fecha_ad,'%d-%m-%Y') as fecha , p.duracion, p.cod_int, a.cod, a.nom, a.exp, a.tip, a.rif FROM ppto_informacion as p INNER JOIN anunciantes a ON p.cod_int = a.cod";
$sql = "SELECT p.codigo, date_format(p.fecha_ad,'%d-%m-%Y') as fecha , p.duracion, p.cod_int, a.cod, a.nom, a.exp, a.tip, a.rif FROM ppto_informacion as p INNER JOIN anunciantes a ON p.cod_int = a.cod WHERE  p.estatus != '0'";
$estado = "";
	if($resultado = $mysqli->query($sql)) {
		$row_cnt = mysqli_num_rows($resultado);
		if ($row_cnt> 0){

			while($row = $resultado->fetch_array()) {

			$ppto =  $row['codigo'];

				require_once("conexion.php");
				$sql2 = "SELECT presupuesto  FROM contratos WHERE presupuesto = '$ppto'";

				if($resultado2 = $mysqli->query($sql2)) {
					$row_cnt2 = mysqli_num_rows($resultado2);
					if ($row_cnt2> 0){
					
						// while($row2 = $resultado2->fetch_array()) {
							$estado = "Activo";

						// }

					}else{
					$estado = "Inactivo";
					}

				}


$cod = urlencode($row['codigo']);
// $id = urlencode($row['id']);

 $opcion = '<a href=\"comprobante_presupuesto.php?c='.$cod.'\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Detalles\" class=\"btn btn-danger btn-sm\"><i class=\"far fa-file-pdf\"></i> Detalles</a>';


 // $accion = '<button class=\"btn btn-danger btn-sm\" name=\"eliminar\" onclick=\"msjbox('.$id.')\" ><i class=\"far fa-trash-alt\" ></i> Eliminar</button>';



					$tabla.='{
					"cod":"'.($row['codigo']).'",
					"nom":"'.($row['nom']).'",
					"rif":"'.($row['tip']).($row['rif']).'",
					"exp":"'.($row['exp']).'",
					"fec":"'.($row['fecha']).'",
					"dur":"'.($row['duracion'])." Meses".'",
					"estado":"'.$estado.'",
					"acciones":"'.($opcion).'"

				},';

				
			}

		}

	}$mysqli->close();
				
				//	"acciones":"'.utf8_encode($detalles).'"
	

	//eliminamos la coma que sobra
	$tabla = substr($tabla,0, strlen($tabla) - 1);

	echo '{"data":['.$tabla.']}';	

?>

