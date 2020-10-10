<?php include("cnc_ses.php"); ?>
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

<body class="index-page">

<?php include("nav/nav.php"); ?>

<div class="container">

    <div class="card card-nav-tabs col-lg-12">
     <!--  <div class="card-header card-header-primary">
        Featured  
      </div> -->
        <div class="card-body">
        <h2 class="card-title">Gestión de usuarios</h2>
        <!-- <p class="card-text">DATOS DE CONTRATO</p> -->

 <form action="#" id="gst_usr">
<div class="row">
  
<div class="col-lg-6">
  <div class="card">
  <div class="card-body">
    <h5 class="card-title">Datos de usuario</h5>
    <p class="card-text">Registro y actualización.</p>
    <div class="row">


<!-- 
        <div class="form-group col-lg-6">
            <label  for="usr">* Usuario</label>
            <input type="text"  id="usr" class="form-control form-control-sm letras" >
          </div> -->


          <div class="form-group col-lg-6">
            <label  for="usr1">* Usuario</label>
            <input type="text"  id="usr1" class="form-control form-control-sm">
          </div>

 
          <div class="form-group col-lg-6">
            <label  for="ced">* Cedula</label>
            <input type="text"  id="ced" class="form-control form-control-sm numero">
          </div>


          <div class="form-group col-lg-6">
            <label  for="niv">* Nivel</label>
            <select name="" id="niv" class="form-control form-control-sm">
              <!-- <option value="1" disabled>Administrador</option> -->
              <option value="2">Gestor</option>
              <option value="3">Operador</option>
            </select>
          </div>

          <div class="form-group col-lg-6">
            <label  for="nom">* Nombres</label>
            <input type="text"  id="nom" class="form-control form-control-sm letras" >
          </div>

          <div class="form-group col-lg-6">
            <label  for="ape">* Apellidos</label>
            <input type="text"  id="ape" class="form-control form-control-sm letras" >
          </div>



          <div class="form-group col-lg-6">
            <label  for="fec">* Fecha de vencimiento</label>
            <input type="text"  id="fec" class="form-control form-control-sm">
          </div>


          <div class="form-group col-lg-6">
            <label  for="pas">* Contraseña</label>
            <input type="password"  id="pas" class="form-control form-control-sm">
          </div>


          <div class="form-group col-lg-6">
            <label  for="est">* Estatus</label>
            <select name="" id="est" class="form-control form-control-sm">
              <option value="1">Activo</option>
              <option value="0">Inactivo</option>
            </select>
          </div>


    </div>
    <button class="btn btn-success" id="save" autocomplete="off">Guardar</button>
    <button class="btn btn-primary" id="update" autocomplete="off" disabled>Actualizar</button>
    <button class="btn btn-danger" id="clean" autocomplete="off">Limpiar</button>
  </div>
</div>

</div>
</form>


<div class="col-lg-6">
    <div class="card">
  <div class="card-body">
    <h5 class="card-title">Usuarios registrados</h5>
    <p class="card-text">Lista</p>
    <div class="row"  style="overflow:scroll;height:354px">
    <table class="table table-borderless" id="tab" >
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Usuario</th>
          <th scope="col">Nivel</th>
          <th scope="col">Estado</th>
          <!-- <th scope="col">Opción</th> -->
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>




    </div>

  </div>
</div>
</div>

</div>




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

  <script defer src="script/gst_usr.js"></script>

</body>

</html>