<?php
include("cnc_ses.php");
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

<?php include("nav/nav.php");?>


<!-- <div class="container"> -->

  <!--   <div class="card card-nav-tabs col-lg-12"> -->
<!--       <div class="card-header card-header-primary">
        Featured  
      </div> -->
            <div class="card-body">
            <h2 class="card-title">Gestión de Pagos</h2>
            <p class="card-text">REGISTRO, ACTUALIZACIÓN Y VERIFICACIÓN DE TODOS LOS PAGOS DE LOS ANUNCIANTES .</p>


            <form action="#" id="gst_pag">

            <div class="row">
                <div class="form-group col-lg-5">
                <label  for="buscador">Buscar</label>
                  <div class="input-group">
                  <input type="text" class="form-control form-control-sm alfa" id="buscador" placeholder="Buscar Anunciante">
                  <button class="btn btn-danger btn-sm" id="limpiar">Limpiar</button>
                  </div>
              </div>


             
<div class="form-group col-lg-2">

   <label for="precio">Precio del contrato Bs.: </label>
  <input type="text" id="precio" class="form-control form-control-sm" style="text-align: right;" disabled>
</div>


<div class="form-group col-lg-2">
  <label for="pagado">Total pagado Bs.: </label>
  <input type="text" id="pagado" class="form-control form-control-sm" style="text-align: right;" disabled>
</div>


<div class="form-group col-lg-2">
  <label for="xpagar">Total por pagar Bs.: </label>
  <input type="text" id="xpagar" class="form-control form-control-sm" style="text-align: right;" disabled>
</div>

            </div>

<div class="row" id="tablas">
<!--   <div class="col-lg-5"  style="overflow:scroll;height:300px">
    <table class="table" style="font-size: 11px; width: 100%;" id="tab" > 
      <caption>Cronograma de pago de cuotas</caption>
      <thead class="thead-dark">
        <tr>
          <th width="1rem">Item</th>
          <th width="6rem" >Concepto</th>
          <th width="10rem" >Fecha de cuota</th>
          <th width="10rem"  style='text-align: left'>Cuota</th>
        </tr>
      </thead>
      <tbody>
        
      </tbody>




    </table>

  </div>


  <div class="col-lg-7" style="overflow:scroll;height:300px" >
    <table class="table" style="font-size: 11px; width: 100%" id="pag" >
      <caption>Pagos Registrados</caption>
      <thead class="thead-dark">
        <tr>
          <th width="1rem">N°</th>
          <th width="1rem">Tipo</th>
          <th width="1rem"  style='text-align: left;'>Fecha</th>
          <th width="1rem">Referencia</th>
          <th width="1rem" style='text-align: left'>Pago</th>
          <th width="1rem">Opción</th>
        </tr>
      </thead>
      <tbody>
        
      </tbody>
    </table>
  </div> -->
</div>

<hr>
<div class="row">

<div class="form-group col-lg-2">
<label  for="id_pag">ID</label>
  <div class="input-group">
    <input type="text" class="form-control form-control-sm" id="id_pag" placeholder="ID de pago" disabled>
  </div>
</div>


<div class="form-group col-lg-3">
<label  for="for_pag">* Forma de pago</label>
  <div class="input-group">
         <select name="" id="for_pag" class="form-control form-control-sm"></select>
  </div>
</div>


<div class="form-group col-lg-2">
<label  for="fec_pag">* Fecha</label>
  <div class="input-group">
    <input type="text" class="form-control form-control-sm alfa" id="fec_pag" placeholder="Fecha de pago">
  </div>
</div>

<div class="form-group col-lg-2">
<label  for="ref_pag">* Referencia</label>
  <div class="input-group">
    <input type="text" class="form-control form-control-sm numero" id="ref_pag" placeholder="Referencia de pago" >
  </div>
</div>


<div class="form-group col-lg-3">
<label  for="mon_pag">* Monto de pago</label>
  <div class="input-group">
    <input type="text" class="form-control form-control-sm dinero" id="mon_pag" style="text-align: right;" placeholder="Monto de pago">
    <!-- <button class="btn btn-primary btn-sm" id="">Guardar Pago</button> -->
  </div>
</div>

<input type="hidden" class="form-control form-control-sm col-lg-2" id="mon_pag_act" disabled>

              <h6 style="margin-left: 1.5%">Los campos marcados con (*) son obligatorios</h6>
            </div>
            </form>
            <!-- <button class="btn btn-info" id="buscar">Buscar</button> -->
            <button class="btn btn-success" id="guardar" disabled>Guardar</button>
            <button class="btn btn-info" id="actualizar" disabled>Actualizar</button>
            <button class="btn btn-danger" id="cls">Limpiar</button>
            <!-- <a href="listar_anunciantes" class="btn btn-secondary">Mostar todo</a> -->

            
        </div>



    </div>
</div>



 


  <script defer src="js/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
  <script defer src="js/popper.min.js" crossorigin="anonymous"></script>
  <script defer src="js/bootstrap.min.js" crossorigin="anonymous"></script>
  <script defer src="js/fontawesome-all.min.js"></script>
  <script defer src="js/sweetalert.min.js"></script>
 
  <script defer src="script/validador.js"></script>
  <script defer src="js/jquery-ui.min.js"></script>

<script defer src="js/datepicker_esp.js"></script>

  <script defer src="script/gst_pag.js"></script>


    

    

</body>

</html>