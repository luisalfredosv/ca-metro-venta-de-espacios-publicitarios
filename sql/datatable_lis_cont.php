<?php
	
	require_once("conexion.php");
$tabla ="";
$sql = "SELECT 
a.cod_contrato, a.cod_anunciante, a.presupuesto, date_format(a.fecha,'%d-%m-%Y') AS f_contrato , a.estado, a.tip_reg,
b.cod, b.tip, b.rif, b.nom, b.exp,
c.codigo, date_format(c.fecha_ad,'%d-%m-%Y') AS f_presupuesto , c.duracion, c.cod_int, c.estatus 
FROM
espacios_publicitarios.contratos AS a,
espacios_publicitarios.anunciantes AS b,
espacios_publicitarios.ppto_informacion AS c
WHERE 
a.cod_anunciante = b.cod AND
a.presupuesto = c.codigo";

	if($resultado = $mysqli->query($sql)) {
		$row_cnt = mysqli_num_rows($resultado);
		if ($row_cnt> 0){

			while($row = $resultado->fetch_array()) {


				if ($row['estado']==1) {
					$estado="Activo";
				}elseif ($row['est']==0) {
					$estado="Inactivo";
				}


				if ($row['tip_reg']==1) {
				 $opcion = '<a href=\"comprobante_contrato.php?c='.urlencode($row['cod_contrato']).'\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Detalles\" class=\"btn btn-danger btn-sm\"><i class=\"far fa-file-pdf\"></i> Detalles</a>';
				}elseif ($row['tip_reg']==0) {
					$opcion="Registro manual";
				}


					$tabla.='{
					"contrato":"'.($row['cod_contrato']).'",
					"f_contrato":"'.($row['f_contrato']).'",
					"nom":"'.($row['nom']).'",
					"rif":"'.($row['tip']).($row['rif']).'",
					"exp":"'.($row['exp']).'",
					"presupuesto":"'.($row['presupuesto']).'",
					"f_contrato":"'.($row['f_presupuesto']).'",
					"duracion":"'.($row['duracion'])." Meses".'",
					"estado":"'.($estado).'",
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

