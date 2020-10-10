<?php include("cnc_ses.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />


   <title>Sistema de Espacios Publicitarios</title>

<link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
<link rel="stylesheet" href="css/jquery-ui.min.css">
<link rel="stylesheet" href="css/jquery-ui.structure.min.css">
<link rel="stylesheet" href="css/jquery-ui.theme.min.css">

<!-- Datatables -->

<link rel="stylesheet" href="DataTables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">

</head>

<body class="bg-light">

<?php include("nav/nav.php"); ?>


<div >
<!-- <div> -->
    <div class="card card-nav-tabs col-lg-12">
<!--       <div class="card-header card-header-primary">
        Featured  
      </div> -->
            <div class="card-body">
            <h2 class="card-title">Listado de Contratos</h2>
            <p class="card-text"></p>


<div class="col-md-12"> 
    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" style="font-size: 11px;" >
        <thead>
        <tr>
            <th>Contrato</th>
            <th>Fecha Contrato</th>
            <th>Nombre Anunciante</th>
            <th>RIF</th>
            <th>Expediente</th>
            <th>Presupuesto</th>
            <th>Fecha Presupuesto</th>
            <th>Duración</th>
            <th>Estado</th>
            <th>Opción</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
        <tr>
            <th>Contrato</th>
            <th>Fecha Contrato</th>
            <th>Nombre Anunciante</th>
            <th>RIF</th>
            <th>Expediente</th>
            <th>Presupuesto</th>
            <th>Fecha Presupuesto</th>
            <th>Duración</th>
            <th>Estado</th>
            <th>Opción</th>
        </tr>
        </tfoot>
    </table>        
</div>



            
        </div>



    </div>
</div>




  <script defer src="js/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
  <script defer src="js/popper.min.js" crossorigin="anonymous"></script>
  <script defer src="js/bootstrap.min.js" crossorigin="anonymous"></script>

    <script defer src="js/fontawesome-all.min.js"></script>

    <!-- Librerias datatables y js -->



    <script defer src="DataTables/DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
    <script defer src="DataTables/datatables.min.js"></script>

    <script defer src="DataTables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>

    <!-- script ajax datatable-->
    <script defer src="script/datatable_lis_cont.js"></script>  



</body>

</html>