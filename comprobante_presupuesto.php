<?php 
include("cnc_ses.php");
ob_start();
// $codigo = $_GET["c"];
$codigo = substr(strrchr($_GET["c"], "GMC"), 0);
require_once("sql/conexion.php");

$sql = "SELECT * FROM anunciantes AS anu INNER JOIN ppto_informacion AS info ON anu.cod = info.cod_int WHERE info.codigo = '$codigo'";

$resultado = $mysqli->query($sql);
$row_cnt = mysqli_num_rows($resultado);
if ($row_cnt> 0){


require_once("sql/conexion.php");

$sql = "SELECT * FROM anunciantes AS anu INNER JOIN ppto_informacion AS info ON anu.cod = info.cod_int WHERE info.codigo = '$codigo'";

  if($resultado = $mysqli->query($sql)) {
      $row_cnt = mysqli_num_rows($resultado);
      if ($row_cnt> 0){
      
        while($row = $resultado->fetch_array()) {
        $codigo = ($row['codigo']);
        $import_let = ($row['import_let']);
        $nom = $row['nom'];
        $rif = $row['tip'].$row['rif'];
        $duracion = $row['duracion'] ." MESES";
        $fecha_ad = date("d-m-Y", strtotime($row['fecha_ad']));
        $exp = $row['exp'];
        $st = $row["sub_total"];
        $r_sub_total = number_format($st, 2, ',', '.');
        $r_porcentaje = $row['p_desc'];
        $r_descuento = number_format($row["descuento"], 2, ',', '.');
        $r_total = number_format($row["total"], 2, ',', '.');
        $elab_by = $row['elab_by'];
        $revi_by = $row['revi_by'];
        $apro_by = $row['apro_by'];

        }
      }
  }
// $sql = "SELECT * FROM pres_det AS det INNER JOIN pres_info AS info ON det.codigo = info.codigo INNER JOIN pres_cuo AS cuo ON cuo.cod = info.codigo WHERE info.codigo = 'GMC-MV-PPTO-00001-2018' AND info.estatus='1'";
// id  cod   nom   tip_anu   exp   dir   tel1  tel2  tip   rif   cor1  cor2  cor3  ddc   tdc   cdc   est   id  codigo  fecha_ad  duracion  cod_int   sub_total   p_desc  descuento   total   import_let  fecha_in  forma_pago  n_cuotas  mont_cuotas   elab_by   revi_by   apro_by   estatus 

?>

<?php $html="
<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Presupuesto</title>

<style>


table {
  margin-top: 1em;
}

thead {
  background-color: #eeeeee;
}

tbody {
  background-color: #FBFBFB;
}

th,td {
  padding: 1pt;
  align-content: center;
}

table.separate {
  border-collapse: separate;
  border-spacing: 5pt;
  border: 3pt solid #33d;
}

table.separate td {
  border: 2pt solid #33d;

}

table.collapse {
  border-collapse: collapse;
  border: 0.5pt solid black;  
}

table.collapse td, th {
  border: 0.6pt solid black;
    font-size: 6px;
}

table#list{
  font-size: 5px
}

table{
  margin-left: 12px;
  width: 580px;
}

body,td,tr{
   font-size: 7px; 
}

body{
  font-family: sans-serif;
}


th{
  font-size: 8px; 
}

table#pie{
  border-collapse: separate;
  border-spacing: 10px;
  border: hidden;

}


.cargo{
  font-size: 6px;
  text-align:center;
}

.nombres{
  font-size: 8px;
  text-align:center;
}

.right{
  text-align: right;
}

.left{
  text-align: left;
}

.center{
  text-align: center;
}

hr{
page-break-after: always;
border: 0;
margin: 0;
padding: 0;
}

.header{
  text-align: center;
  font-size: 12px;
}

</style>

</head>

<body>

<table class='collapse' style='margin-top: 50px;'>

      <tr>
        <th rowspan='4'>




        
        <img src='http://localhost/espacios_publicitarios/img/logo-med.jpg' style='margin-top: 15%'>
        </th>
        <th rowspan='2' class='font-weight-bold text-center'>MANUAL DE NORMAS Y PROCEDIMIENTOS DE GESTION DE LA GERENCIA DE MERCADEO Y COMERCIONALIZACIÓN </th>
        <td class='table-active' colspan='2'>CODIGO</td>
      </tr>
        <tr>
          <th colspan='2'>MV-GMC-FR-003</th>
      </tr>
      <tr>
        <td class='table-active'>TITULO</td>
        <td class='table-active'>N° DE EDICION</td>
        <td class='table-active'>ACTUALIZACION</td>
      </tr>
      <tr>
        <th>PRESUPUESTO ARRENDAMIENTO DE ESPACIOS PUBLICITARIOS Y AREAS COMERCIALES</th>
        <th>1</th>
        <th>0</th>
      </tr>

  </table>

<table class='collapse header'>
  <tbody>
    <tr>

      <th class='text-left' width='18.5rem'>NOMBRE DE LA EMPRESA</th>
      <th class='text-left' width='8rem'>RIF</th>
      <th width='8rem'>".("LAPSO DE NEGOCIACIÓN")."</th>
      <th width='8rem'>".("FECHA DE ELABORACIÓN")."</th>
      <th width='8rem'>EXPEDIENTE</th>

    <th class='text-left' width='18.5rem'>".("PRESUPUESTO N°")."</th>
    </tr>
    <tr>

        <td>".utf8_decode($nom)."</td>
        <td>".utf8_decode($rif)."</td>
        <td>".utf8_decode($duracion)."</td>
        <td>".utf8_decode($fecha_ad)."</td>
        <td>".utf8_decode($exp)."</td>
        <td>".utf8_decode($codigo)."</td>

    </tr>
  </tbody>
</table>
<!-- htmlentities($nom, ENT_QUOTES | ENT_IGNORE, 'UTF-8'); -->

  <table class='collapse'>
    <tr>
      <th rowspan='2' width='1rem'>ITEM</th>
      <th rowspan='2' width='9rem'>UBICACION</th>
      <th rowspan='2' width='10rem'>CODIGO DEL BIEN</th>
      <th rowspan='2' width='5rem'>CANTIDAD</th>
      <th rowspan='2' width='5rem'>DESCRIPCION</th>
      <th rowspan='2' width='2rem'>MATERIAL</th>
      <th colspan='2'>MEDIDAS (cm)</th>
      <th rowspan='2' width='7rem' id='mont'>PRECIO POR MES</th>
      <th rowspan='2' width='6rem' >MESES A EXHIBIR</th>
      <th rowspan='2' id='mont' width='7.6rem'>TOTAL</th>
    </tr>
    <tr>

      <th width='4rem'>Ancho</th>
      <th width='4rem'>Alto &nbsp;</th>
    </tr>
"; ?>
<?php 
$can_tot = 0;
require_once("sql/conexion.php");
$sql2="SELECT * FROM ppto_detalles as det INNER JOIN bienes AS bien ON det.cod_bien = bien.cod  WHERE codigo = '$codigo' ORDER By det.item";
  if($resultado2 = $mysqli->query($sql2)) {
      $row_cnt2 = mysqli_num_rows($resultado2);
      if ($row_cnt2> 0){
      
        while($row2 = $resultado2->fetch_array()) {
          $can_tot = $can_tot + $row2["cantidad"];
          $html .='  
            <tr>
              <td class="center">'.$row2["item"].'</td>
              <td class="left">'.$row2["ubicacion"].'</td>
              <td>'.$row2["cod_bien"].'</td> 
              <td class="center">'.$row2["cantidad"].'</td>
              <td>'.$row2["descripcion"].'</td>
              <td class="center">'.$row2["material"].'</td>
              <td class="center">'.$row2["anc"].'</td>
              <td class="center">'.$row2["alt"].'</td>
              <td class="right">'.number_format($row2["montoxmes"], 2, ',', '.').' Bs</td>
              <td class="center">'.$row2["meses"].'</td>
              <td class="right">'.number_format($row2["total"], 2, ',', '.').' Bs</td>
            </tr>
          ';

        }
      }
  }


 $html .='
<table class="collapse">
  <tr>
    <th width="20%">IMPORTE TOTAL EN LETRAS</th>
    <td>'.$import_let.'</td>
  </tr>
</table>



    <tr>
      <th colspan="3">CANTIDAD</th>
      <td class="center">'.$can_tot.'</td>
      <td colspan="5"></td>
      <th>SUB-TOTAL</th>
       <td class="right">'.$r_sub_total.' Bs</td>
      
    </tr>

'; 
if ($r_porcentaje>0) {
   $html .='
    <tr>

      <td colspan="9"></td>
      <th>DESCUENTO '.$r_porcentaje.'%</th>
      <td class="right">'.$r_descuento.' Bs</td>
      
    </tr>';
}


$html .='
    <tr>

      <td colspan="9"></td>
      <th>TOTAL</th>
      <td class="right">'.$r_total.' Bs</td>
      
    </tr>
  </table>


<table class="collapse">
  <tbody>
    <tr>
      <th width="2rem">ITEM</th>
      <th width="14rem" id="center">CONCEPTO</th>
      <th width="14rem" id="monto">MONTO</th>
      <th width="14rem" id="monto">MONTO RESTANTE</th>
      <th width="24.9rem" id="center">FECHA CORRESPONDIENTE DE PAGO</th>
    </tr>';


require_once("sql/conexion.php");
$sql3="SELECT cuo.item, cuo.concepto, cuo.mcuota, cuo.mrest, date_format(cuo.mesdpago,'%d-%m-%Y') AS mesdpago  FROM ppto_informacion as info INNER JOIN ppto_cuotas AS cuo ON info.codigo = cuo.cod WHERE info.codigo = '$codigo'";

// cod  item  concepto  mcuota  mrest   mesdpago  estatus
  if($resultado3 = $mysqli->query($sql3)) {
      $row_cnt3 = mysqli_num_rows($resultado3);
      if ($row_cnt3> 0){
      
        while($row3 = $resultado3->fetch_array()) {

$mesdpago = explode("-", $row3["mesdpago"]);
//$dia =  $mesdpago[0]; 
$mes= $mesdpago[1]; 
$ano = $mesdpago[2];


    if ($mes==01) {$meslet="ENERO";}
elseif ($mes==02) {$meslet="FEBRERO";}
elseif ($mes==03) {$meslet="MARZO";}
elseif ($mes==04) {$meslet="ABRIL";}
elseif ($mes==05) {$meslet="MAYO";}
elseif ($mes==06) {$meslet="JUNIO";}
elseif ($mes==07) {$meslet="JULIO";}
elseif ($mes==08) {$meslet="AGOSTO";}
elseif ($mes==09) {$meslet="SEPTIEMBRE";}
elseif ($mes==10) {$meslet="OCTUBRE";}
elseif ($mes==11) {$meslet="NOVIEMBRE";}
elseif ($mes==12) {$meslet="DICIEMBRE";}

          $html.=' 
              <tr>
                <td>'.$row3["item"].'</td>
                <td class="center">'.$row3["concepto"].'</td>
                <td class="right">'.number_format($row3["mcuota"], 2, ',', '.').' Bs</td>
                <td class="right">'.number_format($row3["mrest"], 2, ',', '.').' Bs</td>
                <td class="center">'.$meslet.' '.$ano.'</td>
              </tr>';

        }
      }
  }


require_once("sql/conexion_emp.php");
$sql4="SELECT nombre, apellido, cargo FROM empleado  WHERE cedula = '$elab_by'";
  if($resultado4 = $mysqli->query($sql4)) {
      $row_cnt4 = mysqli_num_rows($resultado4);
      if ($row_cnt4> 0){
      
        while($row4 = $resultado4->fetch_array()) {
        $e_nom_ape = ($row4["nombre"])." ".($row4["apellido"]);
        $e_cargo = ($row4["cargo"]);
        }
      }
  }

require_once("sql/conexion_emp.php");
$sql5="SELECT nombre, apellido, cargo FROM empleado  WHERE cedula = '$revi_by'";
  if($resultado5 = $mysqli->query($sql5)) {
      $row_cnt5 = mysqli_num_rows($resultado5);
      if ($row_cnt5> 0){
      
        while($row5 = $resultado5->fetch_array()) {
        $r_nom_ape = ($row5["nombre"])." ".($row5["apellido"]);
        $r_cargo = ($row5["cargo"]);
        }
      }
  }

  require_once("sql/conexion_emp.php");
$sql6="SELECT nombre, apellido, cargo FROM empleado  WHERE cedula = '$apro_by'";
  if($resultado6 = $mysqli->query($sql6)) {
      $row_cnt6 = mysqli_num_rows($resultado6);
      if ($row_cnt6> 0){
      
        while($row6 = $resultado6->fetch_array()) {
        $a_nom_ape = ($row6["nombre"])." ".($row6["apellido"]);
        $a_cargo = ($row6["cargo"]);
        }
      }
  }


$html.='
  </tbody>
</table>

<!-- <div style="page-break-after:always;"></div> -->

  <table id="pie">
    <tr>
      <td colspan="5" class="center"><b style="font-size: 12px">'.utf8_decode("NO INCLUYE IVA Y COSTOS DE PRODUCCIÓN").'</b></td>

    </tr>
    <tr>
      <td colspan="5" class="center"><p align="center" style="font-size: 9px">'.utf8_decode("Estos espacios están sujetos a cambios sin previo aviso").'</p></td>
    </tr>

    <tr>
      <td width="auto" class="nombres">Elaborado por:<br>'.$e_nom_ape.'</td>
      <td width="5%"></td>
      <td width="auto" class="nombres">Revisado por:<br>'.$r_nom_ape.'</td>
      <td width="5%"></td>
      <td width="auto" class="nombres">Aprobado por:<br>'.$a_nom_ape.'</td>
    </tr>

    <tr>
      <td class="cargo">______________________________________</td>
      <td></td>
      <td class="cargo">______________________________________</td>
      <td></td>
      <td class="cargo">______________________________________</td>

    </tr>


    <tr>
      <td class="cargo"><p style="font-size: 7px" align="center">'.$e_cargo.'</p></td>
      <td></td>
      <td class="cargo"><p style="font-size: 7px" align="center">'.$r_cargo.'</p></td>
      <td></td>
      <td class="cargo"><p style="font-size: 7px" align="center">'.$a_cargo.'</p></td>

    </tr>
    <tr>

      <td class="pie center" colspan="5"><p style="font-size: 8px">Av. Sesquicentenaria, Parque Recreacional Sur, Parte Sur Oeste S/N Zona V Estado Carabobo Venezuela, Telf. +58(241)8740400 al 8740410. www.metrovalencia.gob.ve </p></td>
    </tr>

  </table>

</body> 



</html>';


include("dompdf-0.5.1/dompdf_config.inc.php");
$dompdf = new DOMPDF();
// $dompdf->load_html(ob_get_clean());
$dompdf->load_html($html);


$dompdf->set_paper("letter", "portrait");
$dompdf->render();
$pdf = $dompdf->output();
$filename = "PRESUPUESTO-".$codigo.'.pdf';
//file_put_contents($filename, $pdf); // GENERA EL PDF EN EL SERVIDOR
// $dompdf->stream($filename);         // DESCARGA AUTOMATICAMENTE EL PDF SIN VISUALIZACION
$dompdf->stream($filename,array('Attachment'=>0));


}else{
?>

  <script>
      alert("Notificación: No se puede generar el PDF del presupuesto porque no existe verifique el código");
      window.location = "inicio.php";
  </script>


<?php 
}


 ?>
