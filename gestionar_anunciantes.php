<?php 
include("cnc_ses.php");
// $c =  isset($_GET['c']) ?  $_GET['c'] : NULL;
// $c = base64_decode($c);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- Favicons -->
<!--     <link rel="apple-touch-icon" href="./assets/img/kit/free/apple-icon.png">
    <link rel="icon" href="./assets/img/kit/free/favicon.png"> -->
   <title>Sistema de Espacios Publicitarios</title>
    <!--     Fonts and icons     -->


<link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
<link rel="stylesheet" href="css/jquery-ui.min.css">
<link rel="stylesheet" href="css/jquery-ui.structure.min.css">
<link rel="stylesheet" href="css/jquery-ui.theme.min.css">

</head>
<body class="bg-light">

<?php include("nav/nav.php"); ?>


<div class="container">

    <div class="card card-nav-tabs col-lg-12">
<!--       <div class="card-header card-header-primary">
        Featured  
      </div> -->
            <div class="card-body">
            <h2 class="card-title">Gestión de fichas tecnicas</h2>
            <p class="card-text">FICHA TECNICA DE EMPRESA ANUNCIANTE Y/O AGENCIA PUBLICITARIA.</p>


            <form action="#" id="gst_anu">
              <input type="hidden" id="varurl" class="form-control form-control-sm" value="<?php echo $c ?>">
            <div class="row">
                <div class="form-group col-lg-4">
                <label  for="buscador">Buscar</label>
                  <div class="input-group">
                  <input type="text" class="form-control form-control-sm alfa" id="buscador" placeholder="Buscar Anunciante">
                  <!-- <button class="btn btn-primary btn-sm" id="buscar">Buscar</button> -->
                  </div>
              </div>
              <div class="form-group col-lg-3">
                <label  for="cod">* Código</label>
                <input type="text" class="form-control form-control-sm codigo" id="cod" placeholder="Código del anunciante" disabled>
              </div>
              <div class="form-group col-lg-5">
                <label  for="nom">* Nombre</label>
                <input type="text" class="form-control form-control-sm alfa" id="nom" placeholder="Nombre del anunciante o agencia">
              </div>
              <div class="form-group col-lg-2">
                <label for="tip_anu">* Tipo de anunciante</label>
                <select class="form-control form-control-sm" id="tip_anu">
                </select>
              </div>

              <div class="form-group col-lg-3">
                <label  for="exp">* N° de expediente</label>
                <input type="text" class="form-control form-control-sm alfa" id="exp" placeholder="N° de expediente">
              </div>

              <div class="form-group col-lg-7">
                <label  for="dir">* Dirección</label>
                <input type="text" class="form-control form-control-sm alfa" id="dir" placeholder="Dirección del anunciante">
              </div>
              <div class="form-group col-lg-4">
                <label  for="tel1">* Teléfono #1</label>
                <input type="number" class="form-control form-control-sm telf" id="tel1" placeholder="">
              </div>
              <div class="form-group col-lg-4">
                <label  for="tel2">Teléfono #2</label>
                <input type="number" class="form-control form-control-sm telf" id="tel2" placeholder="">
              </div>
              <div class="form-group col-lg-1">
                <label for="tip">* Tipo</label>
                <select class="form-control form-control-sm" id="tip">

                </select>
              </div>
              <div class="form-group col-lg-3">
                <label  for="rif">* RIF</label>
                <input type="number" class="form-control form-control-sm rif" id="rif" placeholder="RIF del anunciante" >
              </div>
              <div class="form-group col-lg-4">
                <label  for="cor1">* Correo #1</label>
                <input type="mail" class="form-control form-control-sm correo" id="cor1" placeholder="">
              </div>
              <div class="form-group col-lg-4">
                <label  for="cor2">Correo #2</label>
                <input type="mail" class="form-control form-control-sm correo" id="cor2" placeholder="">
              </div>
              <div class="form-group col-lg-4">
                <label  for="cor3">Correo #3</label>
                <input type="mail" class="form-control form-control-sm correo" id="cor3" placeholder="">
              </div>
              <div class="form-group col-lg-4">
                <label for="ddc">* Datos del contacto</label>
                <input type="text" class="form-control form-control-sm letras" id="ddc" placeholder="Nombre y apellido del contacto">
              </div>
              <div class="form-group col-lg-3">
                <label for="ced">* Cédula</label>
                <input type="number" class="form-control form-control-sm numero" id="cdc" placeholder="cedula del contacto">
              </div>
              <div class="form-group col-lg-3">
                <label for="tdc">* Teléfono</label>
                <input type="number" class="form-control form-control-sm telf" id="tdc" placeholder="">
              </div>
              <div class="form-group col-lg-2">
                <label for="est">* Estado</label>
                <select class="form-control form-control-sm" id="est">
                  <option value="1">Activo</option>
                  <option value="0">Inactivo</option>

                </select>
              </div>
              <h6 style="margin-left: 1.5%">Los campos marcados con (*) son obligatorios</h6>
            </div>
            </form>
            <!-- <button class="btn btn-info" id="buscar">Buscar</button> -->
            <button class="btn btn-success" id="guardar">Guardar</button>
            <button class="btn btn-info" id="actualizar" disabled>Actualizar</button>
            <button class="btn btn-danger" id="limpiar">Limpiar</button>
            <a href="listar_anunciantes.php" class="btn btn-secondary">Mostar todo</a>

            
        </div>



    </div>
</div>



 


  <script defer src="js/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
  <script defer src="js/popper.min.js" crossorigin="anonymous"></script>
  <script defer src="js/bootstrap.min.js" crossorigin="anonymous"></script>
  <script defer src="js/fontawesome-all.min.js"></script>
  <script defer src="js/sweetalert.min.js"></script>
  <script defer src="script/gst_anu.js"></script>
  <script defer src="script/validador.js"></script>
  <script defer src="script/select.js"></script>
<!--   <script defer src="js/datepicker_esp.js"></script> -->
  <script defer src="js/jquery-ui.min.js"></script>


    

    

</body>

</html>