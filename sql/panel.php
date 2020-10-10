<?php 

if ($_POST["accion"]=="crear_panel") {


$month = str_pad($_POST["month"], 2, "0", STR_PAD_LEFT);

$year = $_POST["year"];

$newFech = $year."-".$month;

require_once("conexion.php");
$sql="SELECT  a.cod_contrato, a.cod_anunciante, a.presupuesto, 
b.cod, b.mcuota, date_format(b.mesdpago,'%m-%Y') AS mesdpago, 
c.cod, c.nom, c.cor1, c.tel1, c.exp
FROM
espacios_publicitarios.anunciantes AS c 
INNER JOIN espacios_publicitarios.contratos AS a ON a.cod_anunciante = c.cod
INNER JOIN espacios_publicitarios.ppto_cuotas AS b ON a.presupuesto = b.cod
LEFT JOIN espacios_publicitarios.pagos AS d ON d.contrato = a.cod_contrato  
WHERE 
b.mesdpago  LIKE '%$newFech%' AND a.estado!='0' OR 
date_format(d.fec_pag,'%m-%Y') != date_format(b.mesdpago,'%m-%Y')";

 $tabla = "";
	if($resultado = $mysqli->query($sql)) {
	    $row_cnt = mysqli_num_rows($resultado);
	    if ($row_cnt> 0){
	    
	    $tabla = "";
	    $rows= 1;
	    
	        while($row = $resultado->fetch_array()) {
			 

				$tabla.="<tr>";
				$tabla.="<td>".$rows++."</td>";	
				$tabla.="<td>".($row["nom"])."</td>"; 				//anunciante
				$tabla.="<td>".($row["cod_contrato"])."</td>";      //contrato
				$tabla.="<td>".($row["presupuesto"])."</td>";       // ppto
				$tabla.="<td>".($row["cor1"])."</td>";  			//correo
				$tabla.="<td>".(str_pad($row["tel1"], 11, "0", STR_PAD_LEFT))."</td>"; 	 // telf
				$tabla.="<td>".($row["exp"])."</td>";               // exp
				$tabla.="<td>".($row["mesdpago"])."</td>";          // fecha
				$tabla.="<td style='text-align: right'>".number_format($row["mcuota"], 2, ',', '.')." Bs</td>";   // fecha
				$tabla.="</tr>";

	        }

	    }else{

	    	$tabla.="<tr><th colspan='9' style='text-align: center'>No hay datos para mostrar...</th></tr>";
	   
	    }

	}
 echo utf8_decode($tabla);
}





# SCRIPT de liberacion de bienes, verifica que al cumplirse los meses corespondientes del contrato el bien este disponible!

	require_once("conexion.php");

	$sql2 = "SELECT a.presupuesto, b.meses FROM espacios_publicitarios.contratos AS a, espacios_publicitarios.ppto_detalles AS b WHERE a.presupuesto = b.codigo";

		if($resultado2 = $mysqli->query($sql2)) {
			$row_cnt2 = mysqli_num_rows($resultado2);
			if ($row_cnt2> 0){
			
				while($row2 = $resultado2->fetch_array()) {

				$presupuesto = $row2['presupuesto'];
				$duracion = $row2['meses'];

				$fecha = date('Y-m-d');
				$nuevafecha = strtotime ( '-'.$duracion.' month' , strtotime ( $fecha ) ) ;
				$nuevafecha = date ( 'Y-m-d' , $nuevafecha );

				require_once("conexion.php");
				$sql3 = "SELECT b.cod_bien, b.meses FROM espacios_publicitarios.contratos AS a, espacios_publicitarios.ppto_detalles AS b WHERE a.presupuesto = b.codigo AND a.fecha LIKE '$nuevafecha' ";

					if($resultado3 = $mysqli->query($sql3)) {
						$row_cnt3 = mysqli_num_rows($resultado3);
						if ($row_cnt3> 0){
						
							while($row3 = $resultado3->fetch_array()) {

								$cod_bien =  $row3['cod_bien'];
								require_once('conexion.php');
								$quer = "UPDATE bienes
								SET 
								est = '1'
								WHERE cod='$cod_bien'";	
								if ($mysqli->query($quer) === TRUE) {
									
									
								} else {
									echo "ERROR";
								}

							}

						}else{

							echo "ERROR";
						}
					

					}

				}

			}

		}$mysqli->close();


?>