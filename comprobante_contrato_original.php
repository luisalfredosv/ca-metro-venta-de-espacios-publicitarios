<?php
include("cnc_ses.php");
// $contrato ="CJ-AEPC-18-001";
$contrat = $_GET['c'];



require_once("sql/conexion.php");
$sql="SELECT cod_contrato FROM contratos WHERE cod_contrato = '$contrat' AND presupuesto !='' AND estado='1' AND  tip_reg ='1'";
$resultado = $mysqli->query($sql);
$row_cnt = mysqli_num_rows($resultado);
if ($row_cnt> 0){

    require_once("sql/conexion.php");
    $sql2="SELECT a.cod_contrato, a.cod_anunciante, a.presupuesto, a.dir_rif, a.reg_mercantil, date_format(a.fecha,'%d-%m-%Y') AS fecha_contrato, a.tip_ci, a.cedula, a.nombres, a.apellidos, a.estado, a.cargo,
    b.cod, b.nom, b.tel1, b.tel2, b.tip, b.rif, b.cor1, b.est,
    c.nombre AS carg,
    d.p_desc,   d.descuento, d.forma_pago, d.sub_total, d.total, date_format(d.fecha_ad,'%d-%m-%Y') AS fecha_presupuesto,
    e.nombre AS tip_pago,
    f.cod, f.item, COUNT(f.cod) AS res_cuo
    FROM 
    espacios_publicitarios.contratos AS a,
    espacios_publicitarios.anunciantes AS b,
    espacios_publicitarios.select_cargo AS c,
    espacios_publicitarios.ppto_informacion AS d,
    espacios_publicitarios.select_pago AS e,
    espacios_publicitarios.ppto_cuotas AS f
    WHERE 
    cod_contrato = '$contrat' 
    AND estado = '1'
    AND a.cod_anunciante = b.cod
    AND b.est = '1'
    AND a.cargo = c.cod
    AND d.codigo =  a.presupuesto
    AND e.cod = d.forma_pago
    AND f.cod = a.presupuesto";

        $resultado2 = $mysqli->query($sql2);
        $row_cnt2 = mysqli_num_rows($resultado2);
        if ($row_cnt2> 0){
            while($row2 = $resultado2->fetch_array()) {

                $contrato = $row2["cod_contrato"];
                $pre_codigo = $row2["presupuesto"];
                
                $dir_rif = $row2["dir_rif"];
                $reg_mercantil = $row2["reg_mercantil"];
                $fecha_contrato = $row2["fecha_contrato"];
                $tip_ci = $row2["tip_ci"];
                $cedula = $row2["cedula"];
                $nombres = $row2["nombres"];
                $apellidos = $row2["apellidos"];
                $cargo = $row2["carg"];

                $nom = $row2["nom"]; //anunciante
                $tel1 = $row2["tel1"];
                $tel2 = $row2["tel2"];
                $rif = $row2["rif"];
                $cor1 = $row2["cor1"];

                $total = $row2["total"]; // monto total

                $desc_p = $row2["descuento"]; //monto de descuento
     
                $porcentaje = $row2["p_desc"]; // % de descuento

                $sub_total = $row2["sub_total"]; // monto subtotal

                $fecha_presupuesto = $row2["fecha_presupuesto"];

                $tip_pago = $row2["forma_pago"]; // tipo de pago numero
                $tip_pago_nom = $row2["tip_pago"]; // tipo de pago nombre

                $res_cuo = $row2["res_cuo"];
                

            }
        }
      

    require_once("sql/conexion.php");
    $sql3 = "SELECT nombres_p, apellidos_p, nacionalidad_p, cedula_p, numero_resolucion, date_format(fecha_resolucion,'%d-%m-%Y') AS fecha_resolucion, numero_gaceta, MAX(date_format(fecha_gaceta,'%d-%m-%Y')) AS fecha_gaceta FROM mv_detalles WHERE cargo LIKE '%pres%'";

     $res = $mysqli->query($sql3);
        $row_con3 = mysqli_num_rows($res);
        if ($row_con3> 0){
            while($row3 = $res->fetch_array()) {
                $nombres_p = $row3["nombres_p"];
                $apellidos_p = $row3["apellidos_p"];
                $nacionalidad_p = $row3["nacionalidad_p"];
                $cedula_p = $row3["cedula_p"];

                $numero_resolucion = $row3["numero_resolucion"];
                $fecha_resolucion = $row3["fecha_resolucion"];

                $numero_gaceta = $row3["numero_gaceta"];
                $fecha_gaceta = $row3["fecha_gaceta"];
            
            }
        }



    require_once("sql/conexion.php");
    $sqlc = "SELECT nombres_p, apellidos_p, nacionalidad_p, cedula_p, numero_resolucion, MAX(date_format(fecha_resolucion,'%d-%m-%Y')) AS fecha_resolucion FROM mv_detalles WHERE cargo LIKE '%cons%'";

     $resc = $mysqli->query($sqlc);
        $row_conc = mysqli_num_rows($resc);
        if ($row_conc> 0){
            while($rowc = $resc->fetch_array()) {
                $nombres_c = $rowc["nombres_p"];
                $apellidos_c = $rowc["apellidos_p"];

            
            }
        }


    $correos_mv = "consultoriajuridicametrovalencia@gmail.com, gmercadeomv@gmail.com,";
    $telefono_mv = "(0241) 874-0401";
    $ext_consul_juridica = "1191";
    $ext_comerc = "1027";

    $rif = "G-20008023-0"; 
    $cedula = $cedula_p;

    $nom_ape = strtoupper($nombres_p." ".$apellidos_p);

    // resolucion donde el ministerio nombra al presidente de la EMPRESA en la base de datos espacios_publicitarios.mv_detalles
    // se encuentran los datos del presidente y el consultor juridico de la empresa
    $n_resolucion = $numero_resolucion;
    $f_resolucion = $fecha_resolucion;


    $n_decreto = $numero_gaceta;
    $f_decreto = $fecha_gaceta;

    $n_gaceta = "41.356";
    $f_gaceta ="2017-11-9";

    $nombre_anunciante = strtoupper($nom);
    $rif_anun ="J-408660822";

    $leycontrapub ='siendo este acto de los exceptuados de la aplicación del Decreto Nº 1.399, de fecha 13 de noviembre de 2014, con Rango, Valor y Fuerza de Ley de Contrataciones Públicas, publicado en la Gaceta Oficial de la República Bolivariana de Venezuela Nº 6.154 Extraordinario, de fecha 19 de noviembre de 2014, según el numeral 4, del artículo 4º de dicha norma, y suficientemente autorizada para este acto por el literal "b" del artículo 23 de los estatutos de la empresa, quien a los efectos del presente Contrato se denominará "LA ARRENDADORA", por una parte';

    $registro_mercantil = $reg_mercantil;

    $emp_num_clau ="décimo novena";
    $emp_num_titulo="VII";

    $direccionrif = ucwords($dir_rif);

    $emp_rep_nom_ape =strtoupper($nombres." ".$apellidos);

    $emp_rep_ced  = $cedula;
    $emp_rep_carg =strtoupper($cargo);

    $emp_correo = $cor1;
    $emp_tel =$tel1." ".$tel2;

    $tipo_pub =ucwords("carteleras publicitarias");

    $pre_fecha = $fecha_presupuesto;

    $consultor_nom_ape = strtoupper($nombres_c." ".$apellidos_c);
    $consultor_carg ="CONSULTOR JURIDICO (E)";

    $fecha_contrato =  $fecha_contrato ;



    function fechlet($fecha){

    list($dia, $mes,  $anio) = explode("-",$fecha); 


        $mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
        $mes = $mes[(date('m', strtotime($fecha))*1)-1];
        return $dia.' de '.$mes.' de '.$anio;
    }

    $f_resolucion = fechlet($f_resolucion);
    $f_decreto = fechlet($f_decreto);
    $f_gaceta = fechlet($f_gaceta);

    function obtenerFechaEnLetra($fecha){

    list($dia, $mes, $anio) = explode("-",$fecha); 


        $mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
        $mes = $mes[(date('m', strtotime($fecha))*1)-1];
        return 'los '.$dia.' dias del mes de '.$mes.' del año '.$anio;
    }


    $fech_pre = obtenerFechaEnLetra($fecha_contrato);




    require_once("sql/conexion.php");
    $sql = "SELECT det.item, det.ubicacion, info.total, info.codigo, info.import_let, info.import_cuo, info.n_cuotas, info.mont_cuotas FROM espacios_publicitarios.ppto_detalles AS det, espacios_publicitarios.ppto_informacion as info WHERE det.codigo='$pre_codigo' AND info.codigo = det.codigo";
    if($resultado = $mysqli->query($sql)) {
    $row_cnt = mysqli_num_rows($resultado);
    $estaciones ="";
    $cadena_estaciones ="";
    	if ($row_cnt> 0){
    		while($row = $resultado->fetch_array()) {
    			$item = $row['item'];
    			$estaciones .= str_replace("Est.", "",$row['ubicacion'].",");
    			$cadena_estaciones .="una cartelera que forma parte de la Estación ".str_replace("Est.", "", $row['ubicacion'].", "); 

    			//$total = number_format($row["total"], 2, ',', '.');
    			$impor_let = $row["import_let"];
    			$n_cuotas = $row["n_cuotas"];
    			$import_cuo = $row["import_cuo"];
    			$mont_cuotas = number_format($row["mont_cuotas"], 2, ',', '.');


    		}
    	}
    }



    error_reporting(E_ALL);
    set_time_limit(1800);
    set_include_path('pdf-php-0.12.45/src/'.PATH_SEPARATOR.get_include_path());

    include 'Cezpdf.php';

    class Creport extends Cezpdf
    {
        public function Creport($p, $o)
        {
            $this->__construct($p, $o, 'none', array());
        }
    }
    $pdf = new Creport('letter', 'portrait');
    $full = array("justification" => 'full');
    $center = array("justification" => 'center');
    $right = array("justification" => 'right');
    $left = array("justification" => 'left');

    // IMPORTANT: In version >= 0.12.0 it is required to allow custom tags (by using $pdf->allowedTags) before using it
    $pdf->allowedTags .= '|comment:.*?';

    // $pdf->ezImage("img/cintillo.jpg", 0,300,200, 'center');
    $pdf->ezSetMargins(20, 30, 30, 30);
    $pdf->ezStartPageNumbers(553,20,10,'','',1);
    //$pdf->ezImage('img/cintillo.png', 0, 0, 'none', 'left');

    $pdf->ezImage('img/cintillo.png', 5, 100, 'full', 'center', array('color'=> array(0.2, 0.4, 0.4), 'width'=> 2, 'cap'=>'round'));

    $pdf->ezText("<b>CONTRATO DE ARRENDAMIENTO DE ESPACIOS PUBLICITARIOS, SUSCRITO ENTRE LA C.A. METRO DE VALENCIA Y $nombre_anunciante</b>\n", "", $center);

    $pdf->ezText("N° ".$contrato, "", $right);

    $coloptions3 = array('name' => array('justification' => 'full'));

    $text = utf8_encode(utf8_decode("\nEntre <b>C.A. METRO DE VALENCIA</b>, decretada su creación el  31 de mayo de 1991, mediante Decreto Municipal Nº 27/91, de fecha 10 de mayo de 1991, del Alcalde del Municipio de Valencia, publicado en la Gaceta Municipal de Valencia Nº 1.107, de fecha 31 de mayo de 1991, inscrita su Acta Constitutiva y Estatutaria, por ante la Oficina del Registro Mercantil Segundo de la Circunscripción Judicial del Estado Carabobo, en fecha 12 de agosto de 1991, bajo el Nº 17, Tomo 8-A, cuyas últimas reformas estatutarias constan de documentos inscritos ante el mismo Registro Mercantil, en fecha 23 de febrero de 2006, bajo el N° 56, Tomo 8-A, publicado en la Gaceta Oficial de la República Bolivariana de Venezuela N° 38.396, del 13 de marzo de 2006; el inscrito el 11 de abril de 2007, bajo el Nº 26, Tomo 17-A, publicado en la Gaceta Oficial de la República Bolivariana de Venezuela N° 38.664, del 16 de abril de 2007, y el inscrito 26 de marzo de 2012, bajo el N° 17, Tomo 56-A, publicado en la Gaceta Oficial de la República Bolivariana de Venezuela N° 39.895 de fecha 30 de marzo de 2012, adscrita al Ministerio del Poder Popular para Transporte Terrestre en razón del artículo 5º numeral 5, del Decreto Nº 8.559 de fecha 01 de noviembre de 2011, publicado en la Gaceta Oficial de la República Bolivariana de Venezuela Nº 39.791, del 02 de noviembre de 2011; domiciliada en la ciudad de Valencia, estado Carabobo, ubicada en Valencia Sur, Avenida Sesquicentenaria, Parque Recreacional Sur, Parte Sur Oeste, Parroquia Miguel Peña, Municipio Valencia de ese estado, inscrita en el Registro de Información Fiscal <b>(R.I.F) N° $rif</b>, representada en este acto por su Presidente Encargado, ciudadano (a) <b>$nom_ape</b>, de nacionalidad venezolana, mayor de edad, titular de la cédula de identidad número $cedula , designado (a) como tal por el Ministerio del Poder Popular para el Transporte, mediante Resolución N° $n_resolucion, de fecha $f_resolucion siendo este acto de los exceptuados de la aplicación del Decreto Nº $n_decreto de fecha $f_decreto; $leycontrapub; y por la empresa <b>$nombre_anunciante</b>, $registro_mercantil, con Registro de Información <b>Fiscal (R.I.F) Nº $rif_anun</b> y con domicilio fiscal en, $direccionrif representada en este acto por <b> el (la) ciudadano (a) $emp_rep_nom_ape</b> venezolano (a),mayor de edad, titular de la Cédula de Identidad <b>$emp_rep_ced </b>designado (a) en el cargo de Presidente, conforme a la <b>CLÁUSULA:</b> $emp_num_clau <b>TíTULO:</b> $emp_num_titulo, del documento constitutivo estatuario de su representada, y quien a los efectos del presente documento se denominará como 'EL ARRENDATARIO' y cuando se trate de ambos se denominarán 'LAS PARTES', se ha convenido en celebrar el presente 'CONTRATO DE ARRENDAMIENTO' de $item $tipo_pub que forman parte de las Estaciones $estaciones de conformidad con las convenciones dispuestas en este instrumento, las cuales son del tenor siguiente:\n"));
    $pdf->ezText($text, "", $full);


    $pdf->ezText("<b>DEL OBJETO</b>\n", "", $center);



    $text2 = utf8_encode(utf8_decode("<b>CLÁUSULA PRIMERA:'LA ARRENDADORA'</b>, da en Arrendamiento a <b>'EL ARRENDATARIO'</b>, $cadena_estaciones propiedad de <b>'LA ARRENDADORA'</b>, para que <b>'EL/LA ARRENDATARIO(A)'</b>, promocione en él, los productos, servicios, marcas, conceptos y/o mensajes aprobados previamente por <b>'LA ARRENDADORA'</b>, conforme a lo que las cláusulas siguientes, disponen."));


    $pdf->ezText($text2,"", $full);

    $text3 = utf8_encode(utf8_decode("<b>CLÁUSULA SEGUNDA:</b> Este contrato se celebra únicamente, en cuanto a <b>'EL ARRENDATARIO'</b>, para que éste (a) efectúe la promoción publicitaria de productos, servicios, marcas, conceptos y/o mensajes aprabados previamente por <b>'LA ARRENDADORA'</b>. Cualquier otro destino distinto, que <b>'EL/LA ARRENDATARIO(A)'</b> dé al espacio que se le arrienda, será causal de terminación anticipada de este contrato, dando derecho a <b>'EL/LA ARRENDATARIO(A)'</b>, de exigir las indemnizaciones que por daños y perjuicios y lucro cesante, tuvieren lugar.\n"));

    $pdf->ezText($text3, "", $full);

    $text4 =utf8_encode(utf8_decode("<b>DE LAS DEFINICIONES CONTRACTUALES</b>\n"));

    $pdf->ezText($text4, "", $center);

    $pdf->ezText("<b>CLÁUSULA TERCERA:</b> A los efectos del presente contrato y sus anexos o accesorios, se entiende por:\n", "", $full);
    $cols4 = array('num' => '', 'name' => '');
    $data = array(
     array('num' => "•", 'name' => '<b>PROMOCIÓN DE PRODUCTOS:</b> Técnica de mercadeo para dar a conocer un producto y/o servicio ofertado por una empresa; la cual es sumamente necesaria para consolidar las ventas y posicionamiento de la marca.'),
    );

    $pdf->ezTable($data, $cols4, '', array('showHeadings' => 0, 'shaded' => 0, 'showLines' => 0));




    // pagina 1 fin
    $pdf->ezNewPage();
    $pdf->ezImage('img/cintillo.png', 5, 100, 'full', 'center', array('color'=> array(0.2, 0.4, 0.4), 'width'=> 2, 'cap'=>'round'));

    $pdf->ezText("<b>CONTRATO DE ARRENDAMIENTO DE ESPACIOS PUBLICITARIOS, SUSCRITO ENTRE LA C.A. METRO DE VALENCIA Y $nombre_anunciante</b>\n", "", $center);

    $pdf->ezText("N° ".$contrato, "", $right);


    $data = array(
     array('num' => "•", 'name' => '<b>ÁREA COMERCIAL:</b> Espacio delimitado, definido por coordenadas dentro de cada Estación del Metro de Valencia para la promoción de productos y/o servicios.'),

     array('num' => "•", 'name' => '<b>ÁREA COMERCIAL:</b> Espacio delimitado, definido por coordenadas dentro de cada Estación del Metro de Valencia para la promoción de productos y/o servicios.'),

     array('num' => "•", 'name' => '<b>ARTES PUBLICITARIOS:</b> Diseño publicitario totalmente acabado y listo para su reproducción.'),

     array('num' => "•", 'name' => '<b>MARCA:</b> Denominación comercial verbal, distintivo gráfico o una combinación de ambos elementos, que define un producto o servicio.'),

     array('num' => "•", 'name' => '<b>ANUNCIANTE: </b>Aquella persona Natural o Jurídica que requiere el servicio de promoción de productos, marcas, conceptos y/o mensajes. '),

     array('num' => "•", 'name' => '<b>VAGÓN:</b> Unidad rodante diferenciada que conforma los trenes.'),

     array('num' => "•", 'name' => '<b>TRENES:</b> Serie de vagones conectados que circulan sobre rieles, para el transporte de pasajeros de un lugar a otro.'),

     array('num' => "•", 'name' => '<b>ESPACIOS PUBLICITARIOS:</b> Son áreas o espacios en que las formas de comunicación intentan incrementar el consumo de un producto o servicio insertar una nueva marca o producto dentro del mercado de consumo, mejorar la imagen de una marca o posicionar un producto o marca en la mente de un consumidor.'),

     //array('num' => "•", 'name' => 'gandalf'),

    );




    $pdf->ezTable($data, $cols4, '', array('showHeadings' => 0, 'shaded' => 0, 'showLines' => 0));


    $pdf->ezText("\n<b>DOCUMENTOS CONTRACTUALES</b>\n", "", $center);

    $pdf->ezText("<b>CLÁUSULA CUARTA:</b> Se consideran como integrando el presente instrumento, los siguientes documentos: Presupuesto de Contratación Publicitaria Nº $pre_codigo de fecha $pre_fecha, identificado como ANEXO 1. Normativas Propias del Procedimiento con relación a la Instalación o Desinstalación  de Espacios Publicitarios de la C.A. Metro de Valencia, identificado como ANEXO 2. Acuerdos y Pactos Accesorios o Modificatorios que celebren <b>'LAS PARTES'</b>, con posterioridad a la firma del Contrato. Cualquier garantía que se constituya para garantizar la ejecución del presente contrato y sus adendas. Las notificaciones, autorizaciones y actas suscritas por <b>'LAS PARTES'</b>, en ejecución del presente contrato o de sus adendas. La política comunicacional de la <b>'LA ARRENDADORA'</b>, de sus accionistas, y de su Ministerio de Adscripción. Cualquier otro contrato de naturaleza distinta, que se suscriba en razón del presente.\n", "", $full);

    $text5 = utf8_encode(utf8_decode("<b>DE LA UBICACIÓN, PRECIO, ARRENDAMIENTO Y ESPACIOS PUBLICITARIOS</b>\n"));

    $pdf->ezText($text5, "", $center);


    if ($item > 1) {
    $tipo_pub =("carteleras publicitarias");
    $text = "que forman parte de las Estaciones";  
    }else{
    $tipo_pub =("cartelera publicitaria");  
    $text = "que forma parte de la Estacion";  
    }



    include_once ("sql/CifrasEnLetras2.php");
    $itemtxt = CifrasEnLetras::convertirNumeroEnLetras($item);


    $pdf->ezText("<b>CLÁUSULA QUINTA:</b> Los espacios contratados corresponden a $itemtxt ($item) $tipo_pub $text $estaciones propiedad de <b>'LA ARRENDADORA'</b>, ubicado en la zona Anden de dichas estaciones, que tendrán un precio según resumen y denominaciones que se indican en el siguiente cuadro y se detallan con mayor amplitud en el <b>ANEXO 1.</b>\n", "", $full);




    // '' comillas
    $can_tot = 0;
    $data ="";
    require_once("sql/conexion.php");
    $sql2="SELECT * FROM ppto_detalles as det INNER JOIN bienes AS bien ON det.cod_bien = bien.cod  WHERE codigo = '$pre_codigo' ORDER By det.item";
        $resultado2 = $mysqli->query($sql2);
        $row_cnt2 = mysqli_num_rows($resultado2);
        if ($row_cnt2> 0){
    		$data = array();
            while($row2 = $resultado2->fetch_array()) {
              //$can_tot = $can_tot + $row2["total"];
           

           array_push($data,array('prod'=>$tipo_pub." ".$row2["ubicacion"],'cant'=>$row2["cantidad"],'meses'=>$row2["meses"],'tot'=>number_format($row2["total"], 2, ',', '.')) );


            	}
        }
      



    $coloptions = array('prod' => array('justification' => 'left'), 'cant' => array('justification' => 'center'), 'meses' => array('justification' => 'center'), 'tot' => array('justification' => 'right'));


    $cols = array('prod' => 'PRODUCTO', 'cant' => 'CANTIDAD', 'meses' => 'DURACIÓN', 'tot' => 'PRECIO TOTAL (Bs)');


    $pdf->ezTable($data, $cols, '', array(
    	'showHeadings' => 0.5, 
    	'shaded' => 0, 
    	// 'gridlines' => $i, 
    	'width'=>'550',
    	'cols' => $coloptions, 
    	'innerLineThickness' => 0.5, 
    	'outerLineThickness' => 0.5));



    // if ($porcentaje > 0) {

    //   //  $descuento = ($total * $porcentaje) / 100;

    // $total = $sub_total - $descuento


    //    // $subtotal = ($total - $descuento);

    // }else{
        
    // }



    $total = str_replace(".", "", $total);
    $total = str_replace(",", ".", $total);
    $total = number_format($total, 2, ',', '.');

    $desc_p = str_replace(".", "", $desc_p);
    $desc_p = str_replace(",", ".", $desc_p);
    $desc_p = number_format($desc_p, 2, ',', '.');

    $sub_total = str_replace(".", "", $sub_total);
    $sub_total = str_replace(",", ".", $sub_total);
    $sub_total = number_format($sub_total, 2, ',', '.');




    $coloptions9 = array('text' => array('justification' => 'right'));

    $data9 = array(
        array('text'=>"<b>SUB-TOTAL Bs:    $sub_total</b>"),
        array('text'=>"<b>DESC $porcentaje% Bs:        -".$desc_p."</b>"),
        array('text'=>"<b>TOTAL Bs:         $total</b>\n"),
    );

    $cols9 = array('text' =>"");

    $pdf->ezTable($data9, $cols9, '', array('showHeadings' => 0, 'shaded' => 0, 'showLines' => 0, 'cols' => $coloptions9,'width'=>'550'));


    $pdf->ezText("<b>NOTA: NO SE INCLUYEN AQUÍ GASTOS DE PRODUCCIÓN, INSTALACION, MATENIMIENTO, DESINSTALACIÓN NI TRANSPORTE.</b>\n", "10", $center);

    // pagina 2 fin







    $pdf->ezNewPage();
    $pdf->ezImage('img/cintillo.png', 5, 100, 'full', 'center', array('color'=> array(0.2, 0.4, 0.4), 'width'=> 2, 'cap'=>'round'));

    $pdf->ezText("<b>CONTRATO DE ARRENDAMIENTO DE ESPACIOS PUBLICITARIOS, SUSCRITO ENTRE LA C.A. METRO DE VALENCIA Y $nombre_anunciante</b>\n", "", $center);

    $pdf->ezText("N° ".$contrato, "", $right);



    $pdf->ezText("<b>FORMA DE PAGO</b>\n", "", $center);




    $tip_pago_nom = Strtolower($tip_pago_nom);


    if ($tip_pago==1) {         // mensual

        if ($res_cuo == 1) {
           $text_cuotas ="";
        }else if($res_cuo == 2){
           $text_cuotas ="y la otra cuota el mes siguiente.";
        }else{
            $text_cuotas ="y las demás cuotas los meses correspondientes de forma ".$tip_pago_nom.".";
        }

    }else if($tip_pago==2) {  // bimensual

        if ($res_cuo == 1) {
           $text_cuotas ="";
        }else if($res_cuo == 2){
           $text_cuotas ="y la otra cuota dentro de dos (2) meses.";
        }else{
            $text_cuotas ="y las demás cuotas los meses correspondientes de forma ".$tip_pago_nom.".";
        }

    }else if($tip_pago==3) {  // trimestral

        if ($res_cuo == 1) {
           $text_cuotas ="";
        }else if($res_cuo == 2){
           $text_cuotas ="y la otra cuota dentro de tres (3) meses.";
        }else{
            $text_cuotas ="y las demás cuotas los meses correspondientes de forma ".$tip_pago_nom.".";
        }

    }else if($tip_pago==6) {  // semestral

        if ($res_cuo == 1) {
           $text_cuotas ="";
        }else if($res_cuo == 2){
           $text_cuotas ="y la otra cuota dentro de seis (6) meses.";
        }else{
            $text_cuotas ="y las demás cuotas los meses correspondientes de forma ".$tip_pago_nom.".";
        }

    }



    include_once ("sql/CifrasEnLetras2.php");
    $n_cuotas_txt = CifrasEnLetras::convertirNumeroEnLetras($n_cuotas);

    $n_cuotas_txt = ucwords($n_cuotas_txt);

    $impor_let_may = strtoupper($impor_let);

    $impor_let_cuo = strtoupper($import_cuo);

    $pdf->ezText("<b>CLÁUSULA SEXTA: </b> El arrendamiento de $itemtxt ($item) $tipo_pub $text $estaciones es por un monto de <b> $impor_let_may (Bs $total)</b> sin incluir <b>el impuesto al valor agregado I.V.A</b>, que <b>'EL ARRENDATARIO'</b> se compromete a pagar a <b>'LA ARRENDADORA'</b>, previa presentación de factura por parte de la misma, en la forma siguiente:\n", "", $full);




    $data = array(
     array('num' => "•", 'name' => "$n_cuotas_txt ($n_cuotas) cuotas de <b>$impor_let_cuo</b> (Bs. $mont_cuotas), que debe ser pagada una cuota al momento de la suscripción del presente documento $text_cuotas"),
    );
    $cols4 = array('num' => '', 'name' => '');

    $pdf->ezTable($data, $cols4, '', array('showHeadings' => 0, 'shaded' => 0, 'showLines' => 0,'cols' => $coloptions3));


    $pdf->ezText("\n<b>DURACIÓN</b>\n", "", $center);

    $pdf->ezText("<b>CLÁUSULA SÉPTIMA:</b> El presente contrato tendrá una duración de seis (06) meses, contados a partir de la suscripción del presente instrumento contractual, pudiendo prorrogarse de mutuo acuerdo dado expresamente por escrito entre <b>'LAS PARTES'</b>, con veinte (20) días hábiles como mínimo, antes de su vencimiento. En el caso que se convenga alguna prórroga, el precio por los servicios de publicidad, será ajustado conforme a las tarifas vigentes de <b>'LA ARRENDADORA'</b>.\n<b>CLÁUSULA OCTAVA:</b> Serán por cuenta de <b>'EL ARRENDATARIO':</b>\n", "", $full);



    $data5 = array(
    array('num' => "•", 'name' => "El pago de los Tributos Municipales por Publicidad, calculados con base en los aforos y tarifas vigentes para la firma del presente contrato, los que se encuentran detallados en el cuadro previsto en la Cláusula Quinta del mismo; así como cualquier otro que determinen las autoridades competentes con posteridad a su firma."),

    array('num' => "•", 'name' => "Los costos de producción, transporte, instalación y demás relacionados con las Artes y Estructuras Publicitarias y los cambios de motivo que <b>'EL/LA ARRENDATARIO(A)'</b>desee realizar durante la contratación."),

    array('num' => "•", 'name' => "La desinstalación de las Artes y Estructuras Publicitarias, que deberá ser dentro de los cinco (05) días hábiles siguientes al vencimiento del contrato en caso de no renovarse. De no retirarse las artes en las fechas correspondientes, 'LA ARRENDADORA', tendrá derecho a desinstalar las artes por cuenta y riesgo de <b>'EL/LA ARRENDATARIO(A)'</b>, y en tal virtud, procederá a facturar el monto correspondiente al costo de la desinstalación y se procederá a cobrar el monto diario proporcional al valor de la cuota mensual, resultante de dividir dicho monto entre treinta (30) días, uno por cada día de retraso en la desinstalación."),

    array('num' => "•", 'name' => "Durante la vigencia de este contrato, <b>'LA ARRENDADORA'</b> podrá realizar labores periódicas de monitoreo al material publicitario y de encontrarse desperfectos en dicho material, notificará a <b>'EL/LA ARRENDATARIO(A)</b> para la reposición del material dañado o su retiro. Si <b>'EL/LA ARRENDATARIO(A)'</b>, hiciese caso omiso a la notificación enviada por <b>'LA ARRENDADORA'</b> y no desinstala en los cinco (05) días hábiles siguientes a la notificación, <b>'LA ARRENDADORA'</b> tendrá derecho a desinstalar las artes y procederá a cobrar a <b>'EL/LA ARRENDATARIO(A)'</b>, el monto correspondiente al costo de la desinstalación, además podrá seguir facturando el Arrendamiento sin que <b>'EL/LA ARRENDATARIO(A)'</b> pueda ejercer reclamación alguna."),

    //array('num' => "•", 'name' => ""),
    );
    $cols5 = array('num' => '', 'name' => '');
    $pdf->ezTable($data5, $cols5, '', array('showHeadings' => 0, 'shaded' => 0, 'showLines' => 0, 'cols' => $coloptions3,'width'=>'530'));


    $pdf->ezText("\n<b>PLAZO DE ENTREGA DE LAS ARTES FINALES E INSTALACIÓN DEL MATERIAL PUBLICITARIO</b>\n", "", $center);


    $text6 =utf8_encode(utf8_decode("<b>CLÁUSULA NOVENA:</b> La producción del material publicitario, será coordinada por <b>'EL/LA ARRENDATARIO(A)'</b> y deberá ser instalada dentro de los quince (15) días hábiles siguientes a la aprobación del arte digital; la instalación debe realizarse de acuerdo al cronograma operativo interno acordado entre <b>'LAS PARTES'</b>, siempre y cuando se haya cumplido con lo establecido en la Cláusula Sexta. Todo retraso en la instalación por causas ajenas a <b>'LA ARRENDADORA'</b>, será por cuenta, riesgo y responsabilidad de <b>'EL/LA ARRENDATARIO(A)'</b>, por lo que no podrá ejercer reclamación alguna por cualquier efecto adverso que pudiere derivarse de dicho retraso y todo el tiempo que dure el mismo, será imputado como parte del tiempo de vigencia del contrato.\n"));



    $pdf->ezText($text6, "", $full);

    // pagina 3 fin

    $pdf->ezNewPage();
    $pdf->ezImage('img/cintillo.png', 5, 100, 'full', 'center', array('color'=> array(0.2, 0.4, 0.4), 'width'=> 2, 'cap'=>'round'));

    $pdf->ezText("<b>CONTRATO DE ARRENDAMIENTO DE ESPACIOS PUBLICITARIOS, SUSCRITO ENTRE LA C.A. METRO DE VALENCIA Y $nombre_anunciante</b>\n", "", $center);

    $pdf->ezText("N° ".$contrato, "", $right);

    $pdf->ezText(utf8_encode(utf8_decode("<b>PARÁGRAFO PRIMERO: 'LAS PARTES'</b> cuidarán los criterios procedimentales en cuanto a mensaje, mantenimiento e instalación del material publicitario a los efectos de no vulnerar criterios éticos, operativos, estéticos, propagandísticos y de ambientación de 'LA ARRENDADORA'. Para tales fines, se establecen las siguientes normas, de manera enunciativa y no taxativa:\n")),"",$full);


    $data6 = array(
     array('num' => "•", 'name' => 'Tanto el mensaje publicitario como su diseño, deben ser elaborados conforme a las disposiciones establecidas en las Ordenanzas Municipales y otras leyes que regulen la materia de publicidad.'),

     array('num' => "•", 'name' => 'El contenido del mensaje publicitario debe ser actual, de interés general, con una redacción correcta, de clara expresión y en lenguaje castellano.'),

     array('num' => "•", 'name' => 'Queda expresamente prohibido, igualmente a título enunciativo y no taxativo, cualquier publicidad relativa a bebidas alcohólicas, cigarrillos, pornografía, objetos y actividades sexuales o relacionadas con éstas, de igual manera con contenidos racistas, xenófobos, discriminación de cualquier tipo, incitación a la violencia, odio, amarillismo, sensacionalismo, propaganda, publicidad subliminal referente a las materias antes mencionadas y en general cualquier asunto que transgreda el Ordenamiento Jurídico Venezolano Vigente relativo al contenido de la publicidad.'),

     array('num' => "•", 'name' => 'El mensaje publicitario no debe contravenir los principios de <b>"LA ARRENDADORA"</b>, ni su estrategia comunicacional.'),

     array('num' => "•", 'name' => 'En caso que la idea del mensaje comercial implique o requiera la asociación a la imagen corporativa de <b>"LA ARRENDADORA"</b>, tal asociación no se realizará en ningún caso, sin el previo consentimiento expreso y por escrito, <b>"LA ARRENDADORA"</b>, para lo cual se suscribirá un adenda redactado específicamente al efecto.'),

    );
    $cols6 = array('num' => '', 'name' => '');

    $pdf->ezTable($data6, $cols6, '', array('showHeadings' => 0, 'shaded' => 0, 'showLines' => 0));





    $text6 =utf8_encode(utf8_decode("\n<b>PARÁGRAFO SEGUNDO:</b> queda perfectamente entendido y acordado entre 'LAS PARTES', que la <b>'LA ARRENDADORA'</b>, no se hace responsable ni copartícipe, de los mensajes y la publicidad difundidos y promocionados por <b>'EL/LA ARRENDATARIO(A)'</b>, quien declara que son de su absoluta y exclusiva responsabilidad.\n
    <b>PARÁGRAFO TERCERO:</b> Los artes finales serán sometidos a la aprobación de <b>'LA ARRENDADORA'</b>, a través  de la Gerencia de Mercadeo y Comercialización, mediante comunicación escrita, conforme a la Cláusula Primera de este contrato. Queda entendido, que todo arte final, debe llevar impreso el número de aprobación asignado por <b>'LA ARRENDADORA'</b>, antes de producir e instalar la publicidad.\n"));


    $pdf->ezText($text6, "", $full);


    $pdf->ezText("<b>DAÑOS A TERCEROS O A LAS INSTALACIONES Y/O MATERIAL RODANTE</b>\n", "", $center);

    $text7 =utf8_encode(utf8_decode("<b>CLÁUSULA DÉCIMA: 'EL/LA ARRENDATARIO(A)'</b>, declara que asume la responsabilidad de cualquier daño, lesión, muerte, desmembramiento, incapacidad, deterioro o efectos indeseables similares, que pudiere sufrir un tercero, el personal de la <b>'LA ARRENDADORA'</b>, las instalaciones de esta empresa, sus bienes o su material rodante, o las instalaciones, locales o bienes de algún particular, que resulte de la incorrecta instalación, manipulación o por defecto de los materiales, del arte colocado en los espacios que por este contrato se arriendan; en consecuencia, 'LA ARRENDADORA' no se hará responsable por dichos resultados, y <b>'EL/LA ARRENDATARIO(A)'</b>, por esta vía, renuncia a reclamar judicial o extrajudicialmente, ninguna responsabilidad o indemnización por estos conceptos, a <b>'LA ARRENDADORA'</b>, y se compromete a indemnizar inmediatamente y sin mediar acciones judiciales o extrajudiciales, los daños, perjuicios y el lucro cesante consecuencia de estos hechos, a cualquier afectado. Bastará para esto, la simple notificación del suceso, hecha conforme a lo dispuesto en este contrato, acompañada por los documentos y elementos de convicción que posibiliten imputar el daño a la responsabilidad de <b>'EL/LA ARRENDATARIO(A)'</b>."));

    $pdf->ezText($text7, "", $full);



    $pdf->ezNewPage();
    $pdf->ezImage('img/cintillo.png', 5, 100, 'full', 'center', array('color'=> array(0.2, 0.4, 0.4), 'width'=> 2, 'cap'=>'round'));

    $pdf->ezText("<b>CONTRATO DE ARRENDAMIENTO DE ESPACIOS PUBLICITARIOS, SUSCRITO ENTRE LA C.A. METRO DE VALENCIA Y $nombre_anunciante</b>\n", "", $center);

    $pdf->ezText("N° ".$contrato, "", $right);



    $pdf->ezText("\n<b>DE LA TERMINACIÓN ANTICIPADA DEL CONTRATO</b>\n", "", $center);

    $text8 = utf8_encode(utf8_decode("<b>CLÁUSULA DÉCIMA PRIMERA: 'LA ARRENDADORA'</b>, podrá dar por terminado anticipadamente y de manera unilateral, el presente contrato en cualquier momento, sin necesidad de intervención  judicial y mediante una simple notificación por escrito a <b>'EL/LA ARRENDATARIO(A)'</b>, por cualquiera de las siguientes causas no taxativas:\n"));

    $pdf->ezText($text8, "", $full);



    $data7 = array(
     array('num' => "•", 'name' => 'Cuando <b>"LA ARRENDADORA"</b> lo considere necesario de acuerdo a sus intereses; sin que tenga responsabilidad alguna por los daños y perjuicios ni lucro cesante que <b>"EL/LA ARRENDATARIO(A)"</b> pudiere alegar haber sufrido, o que pudiere sufrir, por causa de dicha terminación y sin que se deba indemnización alguna por ello, quedando únicamente establecido que en caso de una terminación anticipada por parte de "LA ARRENDADORA", <b>"EL/LA ARRENDATARIO(A)"</b> no estará obligado a pagar las cuotas que para el momento de la terminación, estén pendientes por facturar, sin embargo, se compromete a pagar las cuotas insolutas hasta el día de la notificación, y aquellas que no se hubieren pagado por conducta imputable a su responsabilidad.'),

     array('num' => "•", 'name' => 'Por no cumplir <b>"EL/LA ARRENDATARIO(A)"</b>, con las Disposiciones del Ordenamiento Jurídico Venezolano Vigente y las Ordenanzas Municipales que rigen la materia de este Contrato.'),

     array('num' => "•", 'name' => 'Por incumplimiento de cualesquiera de las obligaciones que resulten a cargo de <b>"EL/LA ARRENDATARIO(A)"</b>, conforme al presente Contrato.'),

    );
    $cols7 = array('num' => '', 'name' => '');

    $pdf->ezTable($data7, $cols7, '', array('showHeadings' => 0, 'shaded' => 0, 'showLines' => 0));





    $pdf->ezText("\n<b>DE LA CONFIDENCIALIDAD DE LA INFORMACIÓN</b>\n", "", $center);

    $pdf->ezText(utf8_encode(utf8_decode("<b>CLÁUSULA DÉCIMA SEGUNDA:</b> Todas las informaciones relativas al presente Contrato, o recabadas por cualquiera de <b>'LAS PARTES'</b> sobre la otra, con ocasión del mismo, serán estrictamente confidenciales y reservadas, razón por la cual <b>'LAS PARTES'</b>, no podrán revelarlas a terceros, ni utilizarlas para finalidades diferentes al cumplimiento del mismo. Una vez  finalizada la presente relación contractual, <b>'LAS PARTES'</b> tampoco podrán revelar a terceros esta información, en todo o en parte,  salvo que medie autorización expresa y por escrito, de la otra parte, y solo podrá dar a conocer aquella parte de la información, que fue autorizada para revelar.")), "", $full);


    $pdf->ezText("\n<b>LEGISLACIÓN APLICABLE</b>\n", "", $center);

    $pdf->ezText(utf8_encode(utf8_decode("<b>CLÁUSULA DÉCIMA TERCERA:</b> Las dudas o controversias de cualquier naturaleza, que pudieran suscitarse con motivo de la interpretación o aplicación del presente Contrato, sus anexos y/o derivados, que no puedan resolverse amistosamente entre <b>'LAS PARTES'</b>, serán decididas por los Tribunales de la República Bolivariana de Venezuela, de conformidad con el Ordenamiento Jurídico vigente.")), "", $full);



    $pdf->ezText("\n<b>DEL DOMICILIO </b>\n", "", $center);

    $pdf->ezText(utf8_encode(utf8_decode("<b>CLÁUSULA DÉCIMA CUARTA:</b> Para todos los efectos y consecuencias que puedan derivarse del presente Contrato, <b>'LAS PARTES'</b> eligen como domicilio especial y exclusivo la ciudad de Valencia, Estado Carabobo, a la jurisdicción de cuyos tribunales declaran someterse.")), "", $full);




    $pdf->ezText("\n<b>NOTIFICACIONES</b>\n", "", $center);

    $pdf->ezText(utf8_encode(utf8_decode("<b>CLÁUSULA DÉCIMA QUINTA:</b> Todas las notificaciones entre 'LAS PARTES' deberán enviarse a los domicilios que a continuación se indican, obligándose a informar con quince (15) días continuos de anticiación, cualquier cambio del mismo:")), "", $full);

    $pdf->ezText(utf8_encode(utf8_decode("Para <b>'LA ARRENDADORA':</b> Avenida Sesquicentenaria Parque Recreacional Sur, Parte Sur Oeste Nro. S/N, Zona Valencia Sur, Edo. Carabobo. Correos electrónicos: $correos_mv Teléfono: $telefono_mv extensiones: Consultoria Jurídica: $ext_consul_juridica/ Gerencia de Mercadeo y Comercialización: $ext_comerc.")), "", $full);


    $pdf->ezText(utf8_encode(utf8_decode("Para <b>'EL/LA ARRENDATARIO(A)':</b> $direccionrif, correo electrónico: $emp_correo Teléfono: $emp_tel.\n")), "", $full);


    $pdf->ezText(utf8_encode(utf8_decode("<b>CLÁUSULA DÉCIMA SEXTA:</b> El presente Contrato rige las condiciones y estipulaciones entre <b>'LAS PARTES'</b> y en su defecto no se aceptará ningún otro convenio, disposición o modificación que no haya sido acordado previamente por la voluntad de <b>'LAS PARTES'</b> y conste por escrito.\n")), "", $full);




    $pdf->ezNewPage();
    $pdf->ezImage('img/cintillo.png', 5, 100, 'full', 'center', array('color'=> array(0.2, 0.4, 0.4), 'width'=> 2, 'cap'=>'round'));

    $pdf->ezText("<b>CONTRATO DE ARRENDAMIENTO DE ESPACIOS PUBLICITARIOS, SUSCRITO ENTRE LA C.A. METRO DE VALENCIA Y $nombre_anunciante</b>\n", "", $center);

    $pdf->ezText("N° ".$contrato, "", $right);





    $pdf->ezText(utf8_encode(utf8_decode("Se hace dos (2) ejemplares de un mismo tenor y a un solo efecto. En la cuidad de Valencia, Estado Carabobo, a $fech_pre.\n")),"",$full);

    $data10 = array(
    	array('t1'=>'<b>FIRMA DE LOS OTORGANTES</b>','t2'=>'<b>CONFORME DE REVISIÓN</b>'),
    );

    $cols10 = array('t1' =>"", 't2'=>"");

    $coloptions10 = array('t1' => array('justification' => 'center', 'width' => '366.5'), 't2' => array('justification' => 'center'));

    $pdf->ezTable($data10, $cols10, '', array('showHeadings' => 0, 'shaded' => 0, 'showLines' => 1, 'cols' => $coloptions10,'width'=>'550'));


    $data8 = array(
    	array('arrendataria'=>"<b>POR: 'LA ARRENDATARIA'</b> \n\n\n\n\n\n".$nom_ape."\n<b> PRESIDENTE (E)</b>" ,
    		'arrendatario'=>"<b>POR: 'EL/LA ARRENDATARIO(A)'</b>\n\n\n\n\n\n".$emp_rep_nom_ape." \n<b>".$emp_rep_carg."</b>",
    		'consultoria'=>"<b>CONSULTORÍA JURÍDICA DE C.A METRO DE VALENCIA</b>\n\n\n\n\n\n".$consultor_nom_ape."\n <b>".$consultor_carg."</b>"),
    	);


    $coloptions8 = array('arrendataria' => array('justification' => 'center', 'width'=>'183.5'), 
                         'arrendatario' => array('justification' => 'center','width'=>'183.5'), 
                         'consultoria' => array('justification' => 'center','width'=>'183.5'));




    $cols8 = array('arrendataria' =>"", 'arrendatario' =>"", 'consultoria' => "");

    $pdf->ezTable($data8, $cols8, '', array('showHeadings' => 0, 'shaded' => 0, 'showLines' => 1, 'cols' => $coloptions8));

    $coloptions9 = array('text' => array('justification' => 'center'));

    $data9 = array(
    	array('text'=>"<b>FECHA DE SUSCRIPCIÓN DEL CONTRATO: $fecha_contrato</b>"),
    );

    $cols9 = array('text' =>"");

    $pdf->ezTable($data9, $cols9, '', array('showHeadings' => 0, 'shaded' => 0, 'showLines' => 1, 'cols' => $coloptions9,'width'=>'550'));




    $pdf->ezText("\n", "", $center);





    // '' comillas
    $pdf->selectFont('Arial');

    // $config = array('Content-Disposition'=>'osciskcsknc.pdf');



    if (isset($_GET['d']) && $_GET['d']) {
        echo $pdf->ezOutput(true);
    } else {
        $pdf->ezStream(array('compress' => 1,'Content-Disposition'=>'CONTRATO-'.$contrato.'.pdf'));

    }


}else{
    ?>

<script>
    alert("Notificación: No se puede generar el PDF del contrato porque no existe ó fue cargado en el sistema de forma manual");
    window.location = "inicio";
</script>


    <?php 
}


?>
