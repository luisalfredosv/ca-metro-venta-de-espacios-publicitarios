<?php  
$accion = $_POST['accion'];

if ($accion=="obtener_id") {
		include ('conexion.php');
		$sql2 = "SELECT MAX(id_pag) as id_pag FROM pagos WHERE 1";
		//$cod = isset($_REQUEST['cod']) ? $_REQUEST['cod'] : NULL;
	if ($resultado2 = $mysqli->query($sql2)) {
		$data = new stdClass();
	   
	    while ($row2 = $resultado2->fetch_array()) {
	    $hi=$row2['id_pag'];
	    //$hi=intval(preg_replace('/[^0-9]+/', '', $hi), 10); 
		$hi=$hi+1;
		//$hi=str_pad($hi, 0, "0", STR_PAD_LEFT );
		$hi=$hi;
		$data->id_pag = $hi;
		
	    }

		echo json_encode($data);
	    //$resultado->close();
	}

}

if ($accion=="guardar_pag") {

$for_pag = $_POST['for_pag'];
$fec_pag = $_POST['fec_pag'];
$ref_pag = $_POST['ref_pag'];
$mon_pag = str_replace(".", "", $_POST['mon_pag']);

$mon_pag = str_replace(",", ".", $mon_pag);

$id_pag = $_POST['id_pag'];

$contrat = explode(" ",$_POST['contrato']);
$contrat = $contrat[0];

$data = new stdClass();

require_once("conexion.php");
$sql="	
SELECT ROUND(SUM(mon_pag) , 2 ) AS pagado FROM espacios_publicitarios.ppto_informacion AS a, espacios_publicitarios.contratos AS b, espacios_publicitarios.pagos AS c WHERE b.cod_contrato = '$contrat' AND b.presupuesto = a.codigo AND c.contrato = b.cod_contrato"; 

$data = new stdClass();
$pagado = 0;
if($resultado = $mysqli->query($sql)) {
 $row_cnt = mysqli_num_rows($resultado);
	    if ($row_cnt> 0){
			 while($row = $resultado->fetch_array()) {

			
			$pagado = $row["pagado"];

			 }

 		}

}//$mysqli->close();







require_once("conexion.php");

$sql="SELECT ROUND(a.total,2) AS precio FROM espacios_publicitarios.ppto_informacion AS a, espacios_publicitarios.contratos AS b WHERE b.cod_contrato = '$contrat' AND b.presupuesto = a.codigo" ;

$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$monto = $row["precio"];
	}
}

$rest = ($monto - $pagado);

	if ($rest==0) { // innabilitar registro de pagos
		
		$data->result = 3; // el contrato esta solvente

	}else{		

	$for_pag = $_POST['for_pag'];
	$fec_pag = $_POST['fec_pag'];
	$ref_pag = $_POST['ref_pag'];
	$mon_pag = str_replace(".", "", $_POST['mon_pag']);
	$mon_pag = str_replace(",", ".", $mon_pag);
	$id_pag = $_POST['id_pag'];

		if ($mon_pag > $rest) {
			
			$data->result = 4; // el monto de pago excede el restante 
			 
		}else{

			require_once('conexion.php');

			$query ="INSERT INTO pagos (id_pag,contrato,for_pag,fec_pag,ref_pag,mon_pag) 
			VALUES ('$id_pag', '$contrat', '$for_pag', STR_TO_DATE('$fec_pag', '%d-%m-%Y'), '$ref_pag', '$mon_pag')";


		    if ($mysqli->query($query) === TRUE) {

		    	$data->result = 1; //OK

		    } else {

			   $data->result = 2; //ERROR
			   //$data->query = $query;
		    


		    } 

		}
	
	}//$mysqli->close();


echo json_encode($data);
}





if ($accion=="list_pag") {
$contrat = explode(" ",$_POST['buscador']);
$contrat = $contrat[0];


require_once("conexion.php");
$sql3="SELECT a.id_pag, a.contrato, date_format(a.fec_pag,'%d-%m-%Y') as fecha, a.ref_pag, a.mon_pag, a.for_pag, b.tipo FROM espacios_publicitarios.pagos AS a, espacios_publicitarios.select_for_pag AS b WHERE a.for_pag = b.id AND contrato = '$contrat' AND a.est_pag ='1' ORDER BY id_pag ASC";

	if($resultado3 = $mysqli->query($sql3)) {
	    $row_cnt3 = mysqli_num_rows($resultado3);
	    if ($row_cnt3> 0){
	    
	    $tabla = "";
	    $row_cnt = 1;
	        while($row3 = $resultado3->fetch_array()) {
			 
				$tabla.="<tr>";
				$tabla.="<td>".$row_cnt++."</td>";
				// $tabla.="<td><span id='pag".$row3["id_pag"]."''>".$row3["id_pag"]."</span></td>";
				$tabla.="<td style='display: none' ><span id='pag".$row3["id_pag"]."''>".$row3["for_pag"]."</span></td>";		
				$tabla.="<td><span id='tip".$row3["id_pag"]."''>".($row3["tipo"])."</span></td>";
				$tabla.="<td><span id='fec".$row3["id_pag"]."''>".$row3["fecha"]."</span></td>";
				$tabla.="<td><span id='fec".$row3["id_pag"]."''>".$row3["ref_pag"]."</span></td>";
				$tabla.="<td><span style='text-align: rigth' id='mon".$row3["id_pag"]."''>".number_format($row3["mon_pag"], 2, ',', '.')." Bs</span></td>";
				$tabla.="<td><button type='button' style='padding: .10rem .5rem; display: flex; align-items: center; margin:-5px; justify-content: center;' class='btn btn-sm btn-primary edit' value='".$row3['id_pag']."'>Editar</button></td>";
				$tabla.="</tr>";

	        }

		require_once("conexion.php");
		$sql4="
		SELECT SUM(mon_pag) total_pag FROM pagos WHERE est_pag = '1' AND contrato = '$contrat'";

		if($resultado4 = $mysqli->query($sql4)) {
		 $row_cnt4 = mysqli_num_rows($resultado4);
			    if ($row_cnt4> 0){
					 while($row4 = $resultado4->fetch_array()) {

					$total = $row4["total_pag"];

					 }

		 		}

		}
	       
	        $tabla.="<th colspan='' rowspan='' headers='' scope=''></th>";
	        $tabla.="<th colspan='' rowspan='' headers='' scope=''></th>";
	        $tabla.="<th colspan='' rowspan='' headers='' scope=''></th>";
	        $tabla.="<th colspan='' rowspan='' headers='' scope='' style='text-align: right'>TOTAL PAGADO:</th>";
	        $tabla.="<th colspan='' rowspan='' headers='' scope='' style='text-align: rigth'>".number_format($total, 2, ',', '.')." Bs</th>";
	         $tabla.="<th colspan='' rowspan='' headers='' scope=''></th>";


 		echo $tabla;
	    }
	}
}





if ($accion=="actualizar_pag") {


$data = new stdClass();

$contrat = explode(" ",$_POST['buscador']);
$contrat = $contrat[0];

require_once("conexion.php");
$sql="	
SELECT ROUND(SUM(mon_pag) , 2 ) AS pagado FROM espacios_publicitarios.ppto_informacion AS a, espacios_publicitarios.contratos AS b, espacios_publicitarios.pagos AS c WHERE b.cod_contrato = '$contrat' AND b.presupuesto = a.codigo AND c.contrato = b.cod_contrato"; 

$data = new stdClass();
$pagado = 0;
if($resultado = $mysqli->query($sql)) {
 $row_cnt = mysqli_num_rows($resultado);
	    if ($row_cnt> 0){
			 while($row = $resultado->fetch_array()) {

			
			$pagado = $row["pagado"];

			 }

 		}

}//$mysqli->close();



$mon_pag = str_replace(".", "", $_POST['mon_pag']);
$mon_pag = str_replace(",", ".", $mon_pag);

$mon_pag_act = str_replace(".", "", $_POST['mon_pag_act']);
$mon_pag_act = str_replace(",", ".", $mon_pag_act);



require_once("conexion.php");

$sql="SELECT ROUND(a.total,2) AS precio FROM espacios_publicitarios.ppto_informacion AS a, espacios_publicitarios.contratos AS b WHERE b.cod_contrato = '$contrat' AND b.presupuesto = a.codigo" ;

$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$monto = $row["precio"];
	}
}

//$pag =  ($pagado - $mon_pag_act);

$rest = ($pagado - $mon_pag_act) + $mon_pag;

	if ($rest > $monto) { // innabilitar registro de pagos
		
		$data->result = 3; // el monto pagado excede lo que debe el cliente

	}elseif ($rest <= $monto){		

	$for_pag = $_POST['for_pag'];
	$fec_pag = $_POST['fec_pag'];
	$ref_pag = $_POST['ref_pag'];

	$id_pag = $_POST['id_pag'];

		// if ($mon_pag > $rest) {
			
		// 	$data->result = 4; // el monto de pago excede el restante 
			 
		//}else{
			require_once('conexion.php');
			$query = "UPDATE pagos
			SET 
			for_pag = '$for_pag', 	
			fec_pag =  STR_TO_DATE('$fec_pag', '%d-%m-%Y'), 	
			ref_pag = '$ref_pag', 	
			mon_pag = '$mon_pag'
			WHERE id_pag='$id_pag'";		



				if ($mysqli->query($query) === TRUE) {
					$data->result = 1; // guardo pago
				} else {
					$data->result = 2; // ocurrio un error
				}
				$mysqli->close();		
		//}
	

	}


echo json_encode($data);
}



if ($accion=="contratos_list") {
$searchTerm = $_POST['term'];
$c = explode(" ", $searchTerm);
$searchTerm = $c[0];

require_once("conexion.php");
$sql3="
SELECT 
a.fecha_ad, 
b.item, b.concepto, b.mcuota, b.mcuota AS total, b.mrest, b.mesdpago, b.estatus, 
c.cod_contrato, c.presupuesto, 
d.cod, d.nom 
FROM 
espacios_publicitarios.ppto_informacion AS a, 
espacios_publicitarios.ppto_cuotas AS b, 
espacios_publicitarios.contratos AS c, 
espacios_publicitarios.anunciantes AS d 
WHERE 
c.cod_contrato = '$searchTerm' AND 
a.codigo = b.cod AND c.presupuesto = b.cod 
AND c.cod_anunciante = d.cod 
ORDER BY b.item ASC";

	// cod  item  concepto  mcuota  mrest   mesdpago  estatus
	if($resultado3 = $mysqli->query($sql3)) {
	    $row_cnt3 = mysqli_num_rows($resultado3);
	    if ($row_cnt3> 0){
	    
	    $tabla = "";
	        while($row3 = $resultado3->fetch_array()) {
			 
			$tabla.="<tr>";
	        $tabla.="<td>".$row3["item"]."</td>";
	        $tabla.="<td>".$row3["concepto"]."</td>";
	        
	       // $tabla.="<td>".number_format($row3["mrest"], 2, ',', '.')." Bs.</td>";
	        $tabla.="<td>".$row3["mesdpago"]."</td>";
	        $tabla.="<td style='text-align: rigth'>".number_format($row3["mcuota"], 2, ',', '.')." Bs.</td>";
	        $tabla.="</tr>";

			

	        }


require_once("conexion.php");
$sql4="SELECT 
SUM(b.mcuota) AS total
FROM
espacios_publicitarios.contratos AS a,
espacios_publicitarios.ppto_cuotas AS b
WHERE 
a.cod_contrato = '$searchTerm' AND
a.presupuesto = b.cod";

if($resultado4 = $mysqli->query($sql4)) {
 $row_cnt4 = mysqli_num_rows($resultado4);
	    if ($row_cnt4> 0){
			 while($row4 = $resultado4->fetch_array()) {

			$total = $row4["total"];

			 }

 		}

}





	        $tabla.="<th colspan='' rowspan='' headers='' scope=''></th>";

			$tabla.="<th colspan='' rowspan='' headers='' scope=''></th>";
				        $tabla.="<th colspan='' rowspan='' headers='' scope='' style='text-align: right'>PRESUPUESTO TOTAL:</th>";
	        $tabla.="<th colspan='' rowspan='' headers='' scope='' style='text-align: rigth'>".number_format($total, 2, ',', '.')." Bs.</th>";
			// $tabla.="<th colspan='' rowspan='' headers='' scope=''></th>";


			 echo $tabla;
	    }
	}
}



if ($accion=="calcular") {
$contrat = explode(" ",$_POST['buscador']);
$contrat = $contrat[0];

require_once("conexion.php");
$sql="	
SELECT ROUND(SUM(mon_pag) , 2 ) AS pagado FROM espacios_publicitarios.ppto_informacion AS a, espacios_publicitarios.contratos AS b, espacios_publicitarios.pagos AS c WHERE b.cod_contrato = '$contrat' AND b.presupuesto = a.codigo AND c.contrato = b.cod_contrato"; 

$data = new stdClass();
$pagado = 0;
if($resultado = $mysqli->query($sql)) {
 $row_cnt = mysqli_num_rows($resultado);
	    if ($row_cnt> 0){
			 while($row = $resultado->fetch_array()) {

			
			$pagado = $row["pagado"];

			 }

 		}

}//$mysqli->close();







require_once("conexion.php");

$sql="SELECT ROUND(a.total,2) AS precio FROM espacios_publicitarios.ppto_informacion AS a, espacios_publicitarios.contratos AS b WHERE b.cod_contrato = '$contrat' AND b.presupuesto = a.codigo" ;

$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$monto = $row["precio"];
	}
}




$rest = ($monto - $pagado);

if ($rest==0) { // innabilitar registro de pagos
	$opcion = 0;
}else{
	$opcion = 1;
}


$rest = number_format($rest, 2, ',', '.');
$monto = number_format($monto, 2, ',', '.');
$pagado = number_format($pagado, 2, ',', '.');

$data -> opcion = $opcion;
$data -> result = 1;
$data -> monto = $monto;
$data -> pagado = $pagado;
$data -> rest = $rest;
	
echo json_encode($data);
}

?>