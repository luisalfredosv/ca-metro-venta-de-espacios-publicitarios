<?php include("cnc_ses.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
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
        <h2 class="card-title">Gestión de Contratos</h2>
        <p class="card-text">DATOS DE CONTRATO</p>

		<form action="#" id="gst_con">
		<div class="row">

        <div class="form-group col-lg-3">
        <label  for="codigo"> Buscar contrato</label>
          <div class="input-group">
          <input type="text" class="form-control form-control-sm" id="codigo" placeholder="Buscar contrato">
        <!-- s -->
          </div>
     	 </div>



        <div class="form-group col-lg-5">
        <label  for="presupuesto">* Presupuesto</label>
          <div class="input-group">
          <input type="text" class="form-control form-control-sm" id="presupuesto" placeholder="Buscar presupuesto">
         <!--  <button class="btn btn-danger btn-sm" id="clean_anu">Borrar</button> -->
          </div>
     	 </div>

          <div class="form-group col-lg-2">
            <label  for="fec_pre">F/C Presupuesto</label>
            <input type="text" class="form-control form-control-sm" id="fec_pre" placeholder="Fecha de contrato" disabled>
          </div>

 		     <div class="form-group col-lg-2">
            <label  for="dur_con">* Duración</label>
            <input type="text"  id="dur_con" class="form-control form-control-sm" disabled>
          </div>


          <div class="form-group col-lg-2">
            <label  for="rif_anu">RIF de Anunciante</label>
            <input type="text" class="form-control form-control-sm" id="rif_anu" placeholder="Rif del anunciante"  disabled>
          </div>

          <div class="form-group col-lg-2">
            <label  for="tel_one">Teléfono #1</label>
            <input type="text" class="form-control form-control-sm" id="tel_one" placeholder="Teléfono #1" disabled>
          </div>

         <div class="form-group col-lg-2">
            <label  for="tel_two">Teléfono #2</label>
            <input type="text" class="form-control form-control-sm" id="tel_two" placeholder="Teléfono #2" disabled>
          </div>


          <div class="form-group col-lg-4">
            <label  for="correo">Correo Principal</label>
            <input type="text" class="form-control form-control-sm" id="correo" placeholder="Correo" disabled>
          </div>
          

        <div class="form-group col-lg-2">
          <label  for="cod_int">Código de empresa</label>
          <input type="text" class="form-control form-control-sm" id="cod_int" placeholder="Código de empresa" disabled>
        </div>


        <div class="form-group col-lg-2">
          <label  for="fec_con">Fecha de contrato</label>
          <input type="text" class="form-control form-control-sm" id="fec_con" placeholder="Fecha de contrato">
        </div>


          <div class="form-group col-lg-3">
            <label  for="cod_con">N° de contrato</label>
            <input type="text" class="codigo form-control form-control-sm codigo" id="cod_con" placeholder="N° de contrato">
          </div>

          <div class="form-group col-lg-2">
            <label  for="estado">* Estado</label>
            <select class="form-control form-control-sm" id="estado">
              <option value="1">Activo</option>
              <option value="0">Eliminar</option>
            </select>
          </div>

          <div class="form-group col-lg-2">
            <label  for="tip_reg">* Tipo de registro</label>
            <select class="form-control form-control-sm" id="tip_reg">
              <!-- <option value="" > Seleccione </option> -->
              <option value="1"selected>Automático</option>
              <option value="0">Manual</option>
            </select>
          </div>

        <input type="hidden" class="" id="pres_ant" placeholder="" disabled>

          <div class="form-group col-lg-12">
            <label  for="dir_rif">* Dirección RIF</label>
            <textarea name="" id="dir_rif"  class="form-control form-control-sm alfa" cols="30" rows="2" placeholder="Ingrese la dirección del domicilio fiscal"></textarea>
          

            <div class="alert alert-primary" role="alert" style="font-size: 11px">
             * Ej: avenida Montes de Oca Nivel PB Local 000 Centro de Valencia Carabobo Zona Postal 0000, Municipio Valencia, del Estado Carabobo
            </div>
          </div>

          <div class="form-group col-lg-12" >
            <label  for="reg_merc">* Registro Mercantil</label>
            <textarea name="" class="form-control form-control-sm alfa" id="reg_merc" cols="30" rows="2" placeholder="Ingrese la informacion del Registro Mercantil"></textarea>
            
            <div class="alert alert-primary" role="alert" style="font-size: 11px">
             * Ej: inscrita ante la oficina del Registro Mercantil Segundo del estado Carabobo, en fecha 00 de enero del año 0000, bajo el N° 0, Tomo 000-A 000
            </div>
          </div>
		</div>
	</div>
</div>	


<div class="card card-nav-tabs col-lg-12">
<div class="card-body">
    <p class="card-text">DATOS DEL PRESIDENTE DE LA EMPRESA ANUNCIANTE</p>
		<div class="row">
  

      <div class="form-group col-lg-1">
         <label  for="tipo">* Tipo</label>
         <select name="" id="tipo" class="form-control form-control-sm"></select>
      </div>
                 
      <div class="form-group col-lg-3">
          <label  for="cedula">* Cédula</label>
          <input type="text" class="form-control form-control-sm numero" id="cedula" placeholder="Cédula">
      </div>

      <div class="form-group col-lg-4">
        <label  for="nombres">* Nombres</label>
        <input type="text" class="form-control form-control-sm letras" id="nombres" placeholder="Nombres">
      </div>

  		<div class="form-group col-lg-4">
        <label  for="apellidos">* Apellidos</label>
        <input type="text" class="form-control form-control-sm letras" id="apellidos" placeholder="Apellidos">
      </div>



      <div class="form-group col-lg-3">
        <label  for="nacionalidad">* Nacionalidad</label>
        <input type="text" class="form-control form-control-sm letras" id="nacionalidad" placeholder="Nacionalidad">
      </div>

      <div class="form-group col-lg-2">
        <label  for="cargo">* Cargo</label>
        <select name="" id="cargo" class="form-control form-control-sm"></select>  
      </div>

      <div class="form-group col-lg-2">
         <label  for="tipo">* Sexo</label>
         <select name="" id="sexo" class="form-control form-control-sm"></select>
      </div>

		</div>

		<div>
			<button class="btn btn-success" id="btn-guardar">Guardar</button>
      <button class="btn btn-info" id="btn-actualizar" disabled>Actualizar</button>
      <button class="btn btn-default" id="btn-limpiar">Limpiar</button>
      <button class="btn btn-danger" id="btn-pdf" disabled>PDF</button>
      <a href="listar_contratos.php" class="btn btn-secondary">Listar Contratos</a>
		</div>
	</div>
</div>

</form>
</body>

<script defer src="js/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
<script defer src="js/jquery-ui.min.js"></script>
<script defer src="js/popper.min.js" crossorigin="anonymous"></script>
<script defer src="js/bootstrap.min.js" crossorigin="anonymous"></script>
<script defer src="js/fontawesome-all.min.js"></script>
<script defer src="js/sweetalert.min.js"></script>
<script defer src="script/validador.js"></script>


<script defer src="script/gst_con.js"></script>

</html>