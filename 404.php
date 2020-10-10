<?php header("Content-Type: text/html;charset=utf-8"); ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Error 404</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body  class="bg-light">

 <main role="main" class="container col-lg-4 " style="margin-top: 20%;">
  <div class="my-3 p-3 bg-white rounded box-shadow">
        <!-- <h3 class="border-bottom border-gray pb-2 mb-0">Sistema de Información</h3> -->

         
   

<form>
 <div class="alert alert-danger" role="alert">
  <h4 class="alert-heading"><i class='fas fa-exclamation-triangle'></i> Notificación!</h4>
  <h2>Error 404 </h2>
  <p>La pagina a la que intentas acceder no existe!</p>
  <hr>
  <p class="mb-0">Verifique la dirección e intente nuevamente</p>
  <hr>
  <a href="inicio" class="btn btn-success btn-sm">Página de inicio</a>
</div> 

  
</form>


  </div>
        <div class="footer">
            Copyright &copy; 2018 &mdash; LASV
          </div>
</main>



<script defer src="js/jquery-3.3.1.min.js"></script>
<script defer src="js/bootstrap.min.js"></script>

<script defer src="js/fontawesome-all.min.js"></script>

<script defer src="script/val_log.js"></script>
</body>
</html>