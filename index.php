<?php header("Content-Type: text/html;charset=utf-8"); ?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>Sistema de Espacios Publicitarios</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/floating-labels.css" rel="stylesheet">
  </head>

  <body>
    <form class="form-signin" autocomplete="off" id="form-login">
      <div class="text-center mb-4">
        <img class="mb-4 rounded" src="img/logo-grand.png" alt="" width="78" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Sistema de Espacios Publicitarios</h1>
        <p><!-- Build form controls with floating labels via the  --><code>Gerencia de Mercadeo y Comercionalización</code><!--  pseudo-element. <a href="https://caniuse.com/#feat=css-placeholder-shown">Works in latest Chrome, Safari, and Firefox.</a></p> -->
        <p>Control de Acceso</p>
      </div>

       <div id="alert">
  <div id="alerta" class="alert alert-warning alert-dismissible fade show" role="alert"  style="display:none;">
   <strong></strong><div id="mensaje"></div>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>
       </div>

      <div class="form-label-group">
        <input type="text" id="user" class="form-control " placeholder="Nombre de usuario" required>
        <label for="user">Usuario</label>
      </div>


      <div class="form-label-group">
        <input type="password" id="password" class="form-control " placeholder="Contraseña" required>
        <label for="password">Contraseña</label>
      </div>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Recordar datos
        </label>
      </div>
      <button type="button" class="btn btn-lg btn-primary btn-block" id="iniciar">Acceder</button>

      <p class="mt-5 mb-3 text-muted text-center">&copy; 2018</p>
    </form>
    <script src="js/jquery-3.3.1.min.js" charset="utf-8" defer></script>

   <!--  <script src="js/bootstrap.min.js"></script> -->
    
    <script src="script/val_log.js" charset="utf-8" defer></script>
  </body>
</html>
