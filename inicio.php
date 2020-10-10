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
</head>

<body class="index-page">

<?php include("nav/nav.php"); ?>

<div class="jumbotron">
  <h1 class="display-3">Hola, <?php echo $_SESSION['nom_usr']." ".$_SESSION['ape_usr'] ?></h1>
  <p class="lead">Bienvenido al Sistema de Espacios Publicitarios de la C.A. Metro de Valencia</p>
  <hr class="my-4">
  <div class="card text-center">
  <div class="card-header">
    
<div class="row">
  <div class="col input-group">
     Listado de Anunciantes sin pago en el mes de &nbsp;

    <select class="col-sm-2 form-control form-control-sm" name="" id="mes">
      <option value="1">Enero</option>
      <option value="2">Febrero</option>
      <option value="3">Marzo</option>
      <option value="4">Abril</option>
      <option value="5">Mayo</option>
      <option value="6">Junio</option>
      <option value="7">Julio</option>
      <option value="8">Agosto</option>
      <option value="9">Septiembre</option>
      <option value="10">Octubre</option>
      <option value="11">Noviembre</option>
      <option value="12">Diciembre</option>
    </select>
  </div>


</div>
    
  </div>
<!--   <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div> -->




<table class="table table-hover" id="panel" style="font-size: 11px">
  <thead>

    <tr>
      <th scope="col">#</th>
      <th scope="col">Anunciante</th>
      <th scope="col">Contrato N°</th>
      <th scope="col">Presupuesto N°</th>
      <th scope="col">Correo principal</th>
      <th scope="col">Teléfono</th>
      <th scope="col">Exp N°</th>
      <th scope="col">Fecha</th>
      <th scope="col">Monto</th>
    </tr>
  </thead>
  <tbody id="panel_tbody">

  </tbody>
</table>



  <!--  <div class="card-footer text-muted">
   2 days ago
  </div> -->
</div>
<!--   <p class="lead">
    <a class="btn btn-primary" href="#" role="button">Leer mas</a>
  </p> -->
</div>

<!-- <footer class="footer">
      <div class="container">
        <span class="text-muted">Desarrollorrado por la Gerencia de Tecnología y Telecomunicaciones</span>
      </div>
    </footer>
 -->
<footer class="container">
        <p class="float-right"><a class="btn btn-sm btn-danger " href="log_out.php">Salir</a></p>
        <p>© 2018 Gerencia de Tecnología y Telecomunicaciones - Oficina de desarrollo de sistemas de información<!-- <a href="#">Privacy</a> · <a href="#">Terms</a> --></p>
      </footer>


<!-- <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#">Back to top</a>
        </p>
        <p>Album example is © Bootstrap, but please download and customize it for yourself!</p>
        <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
      </div>
    </footer> -->

<!-- 
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Fluid jumbotron</h1>
    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
  </div>
</div> -->



  <script defer src="js/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
  <script defer src="js/popper.min.js" crossorigin="anonymous"></script>
  <script defer src="js/bootstrap.min.js" crossorigin="anonymous"></script>
  <script defer src="js/fontawesome-all.min.js"></script>
  <script defer src="script/panel.js"></script>

</body>

</html>