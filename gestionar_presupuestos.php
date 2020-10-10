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


<style>
  
div{

}

</style>



</head>
<body class="bg-light" id="target">

<?php include("nav/nav.php"); ?>


<!-- <div class="container" id="container"> -->

    <div class="card card-nav-tabs">
    <!--       <div class="card-header card-header-primary">
        Featured  
      </div> -->

    


        <div class="card-body">
            <div class="row">
  <div class="col-lg-4">       
        <h2 class="card-title">Gestión de presupuestos</h2>
</div> 
  <div class="col-lg-8"> 
                <div class="alert alert-warning alert-dismissible fade show " role="alert" style="font-size: 11px">
          <strong>Notificación!</strong> Todos los campos marcados con (*) son obligatorios y los montos pueden ser expresados con o sin separadores de miles (.) y para referirse a los decimales es necesario usar (,) -Ejemplo 1.200,33 ó 1200,33 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
</div>
        <p class="card-text"> <!-- Nombre --> </p>

           </div> 
            <form action="#"  accept-charset="utf-8" id="gst_pre">
                <div class="row">
                <div class="form-group col-lg-2">
                <label  for="buscador">Buscar Anunciante</label>
                  <div class="input-group">
                  <input type="text" class="form-control form-control-sm buscador" id="buscador" placeholder="Buscar Anunciante">
                  </div>
              </div>
              <div class="form-group col-lg-3">
                <label  for="cod">* Código</label>
                <input type="text" class="form-control form-control-sm codigo" id="cod" placeholder="Código del presupuesto" disabled>
              </div>



                

              
                 <div class="form-group col-lg-2">
                <label  for="nom">* Anunciante</label>
                <input type="text" class="form-control form-control-sm codigo" id="nom" placeholder="Nombre del anunciante" disabled>
              </div>

              <div class="form-group col-lg-2">
                <label  for="rif">* RIF</label>
                <input type="text" class="form-control form-control-sm codigo" id="rif" placeholder="Rif" disabled>
              </div>


                            <div class="form-group col">
                <label  for="dur">* Duración</label>
                <!-- <input type="text" class="form-control form-control-sm" id="dur" placeholder="Lapso de negociación"> -->
                <select name="" id="lap_neg" class="form-control form-control-sm">
                  
                </select>
              </div>



                            <div class="form-group col">
                <label  for="fecha">* Fecha</label>
                <input type="text" class="form-control form-control-sm" id="fecha"  placeholder="Elaboración">
              </div>

<!--               <div class="form-group col-lg-2">
                <label  for="exp">* Exp</label>
                <input type="text" class="form-control form-control-sm codigo" id="exp" placeholder="Código del expediente" disabled>
              </div>

              <div class="form-group col-lg-2">
                <label  for="cod_int">* Codigo</label>-->
                <input type="hidden" class="form-control form-control-sm codigo" id="cod_int" placeholder="Código del expediente" disabled>
         <!--       </div> -->

                </div>
            
   </form>
 
        <table class="table table-sm table-bordered" style="font-size: 11px; margin-top: -10px" id="tab_pre">
          <thead class="thead-dark">
            <tr>
              <th scope="col" width="1%">Check</th>
              <th scope="col" width="2%">#</th>
              <th scope="col" width="12%">Ubicación</th>
              <th scope="col" width="12%">Código del bien</th>
              <th scope="col" width="3%">Cantidad</th>
              <th scope="col" width="10%">Descripción</th>
              <th scope="col" width="12%">Material a utilizar</th>
              <th scope="col" width="5%">Ancho (M)</th>
              <th scope="col" width="5%">Alto (M)</th>
              <th scope="col" width="12%">Precio Mensual Bs.S</th>
              <th scope="col" width="5%">Meses a Exhibir</th>
              <th scope="col" width="15%">Total Bs.S</th>
<!--               <th>Hidden</th> -->
            </tr>
          </thead>
<!--             <tfoot>
              <tr>
                  <th colspan="4" class="text-right">TOTAL:</th>
                  <td>
                    <input type="text" id="" class="form-control form-control-sm" disabled>
                  </td>
                  <th colspan="6" class="text-right">SUB-TOTAL</th>
                  <td>
                    <input type="text" id="sub-total" class="form-control form-control-sm" disabled>
                  </td>
                </tr>
            </tfoot> -->
          <tbody>
            <tr>
              <th>
                <!-- <input type='checkbox' name='record'> -->
              </th>
              <th scope="row"></th>
              <td>
                  <select id="ubic" class="form-control form-control-sm"></select>
              </td>
              <td>
                  <input type="text" id="codb" class="form-control form-control-sm cod_bien">
              </td>
              <td>
                  <input type="text" id="cant" class="form-control form-control-sm" disabled>
              </td>
              <td>
                  <input type="text" id="desc" class="form-control form-control-sm" disabled>
              </td>
              <td>
                <select name="" id="mat" class="form-control form-control-sm">
                </select>
              </td>
              <td>
                <input type="text" id="anc" class="form-control form-control-sm" disabled>
              </td>
              <td>
                <input type="text" id="alt" class="form-control form-control-sm" disabled>
              </td>
              <td>
                <input type="text" id="pre" class="form-control form-control-sm text-right dinero" >
              </td>
              <td>
                <input type="text" min="1" max="12" id="meex" class="form-control form-control-sm numero" disabled>
              </td>
              <td>
                <input type="text" id="total" class="form-control form-control-sm text-right"  disabled>
              </td>

 <!--               <td>
                <input type="hidden" id="tot" disabled>
              </td> -->
            
            </tr>
          </tbody>
        </table>



        <table class="table table-sm table-bordered" style="font-size: 11px" id="gest_pres">
          <thead class="thead-dark" style="display: none">
            <tr>
              <th scope="col" width="4%">Check</th>
              <th scope="col">n</th>
              <th scope="col" width="15%">ubic</th>
              <th scope="col" width="14%">codi</th>
              <th scope="col" width="5%">cant</th>
              <th scope="col">desc</th>
              <th scope="col" width="15%">mate</th>
              <th scope="col">anch</th>
              <th scope="col">alt</th>
              <th scope="col" width="10%">pre</th>
              <th scope="col" width="5%">meeh</th>
              <th scope="col" width="10%">tota</th>
            </tr>
          </thead>
            <tbody>
              
            </tbody>
<style>
.tab td, th {
  padding: 0rem;
}
</style>
        </table>
          <table class="tab table table-sm table-bordered" style="font-size: 10px; " id="pres_tot">
            <tfoot>
              <tr>
                  <th width="365rem" class="text-right align-middle">TOTAL:</th>
                  <td width="57rem">
                    <input type="text" id="cantidad" class="form-control form-control-sm" disabled>
                  </td>
                  <th width="611rem"  class="text-right align-middle">SUB-TOTAL Bs.S</th>
                  <td>
                    <input type="text" id="sub-total" class="form-control form-control-sm text-right" disabled>
                  </td>
              </tr>
              <tr>
                <th width="611rem" colspan="3" class="text-right align-middle">DESCUENTO %</th>
                  <td>
                    <div class="input-group">
                    <input type="number" min="0" max="100" id="porcentaje" class="form-control col-sm-4 form-control-sm numero" value="0">
                    <input type="text" id="descuento" class="form-control form-control-sm text-right" value="0" disabled>
                    </div>                  
                  </td>
              </tr>
              <tr>
                <th width="611rem" colspan="3" class="text-right align-middle">TOTAL Bs.S</th>
                  <td>
                    <input type="text" id="montototal" class="form-control form-control-sm text-right" disabled>
                    <!-- <input type="text" id="montototal2" class="form-control form-control-sm text-right" disabled> -->
                  </td>
              </tr>
<!--  <tr>
    <th scope="row" width="34%" style="text-align: right;">TOTAL:  </th>
    <td width="5%">
      <input type="text" id="" class="form-control form-control-sm" disabled>
    </td>
    <th scope="row" width="50%"  style="text-align: right;">SUB-TOTAL:  </th>
    <td width="10%">
      <input type="text" id="sub-total" class="form-control form-control-sm" disabled>
    </td>
  </tr> -->
     
<!-- <style>
  .table-sm td, .table-sm th {
    padding: .1rem;
}
</style> -->


            </tfoot>
          </table>
        <div class="btn-group" style="margin-top: -20px">
          <button id="add" class="btn btn-primary btn-sm">Agregar</button>
          <button id="rmv" class="btn btn-danger btn-sm">Eliminar</button>
        </div>
<!--       <hr> -->
<!-- 
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Notificación!</strong> Los montos pueden ser expresados con o sin separadores de miles (.) y para referirse a los decimales es necesario usar (,) -Ejemplo 1.200,33 ó 1200,33 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Notificación!</strong> Los campos marcados con (*) son obligatorios
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> -->

<!--       <hr> -->
      <div class="row">
  <div class="col-lg-6">
          <label for="obs" >Observación  </label>
          <input type="text" id="obs" class="form-control form-control-sm buscador">
</div>
<!--           <hr> -->
  <div class="col-lg-6">  
              <label for="imp">Importe total en letras: </label>
              <textarea name="" id="imp_let" cols="" rows="" class="form-control form-control-sm" disabled></textarea>
              
 </div>           
      </div> 

       <!--     <hr> -->
<div class="col">
                <h6>Formas de pago del servicio:</h6>
              </div>
            <div class="row">
              <div class="form-group col-lg-3">
                 <label for="check_inic_mont">* Monto inicial Bs: </label>
      
              <div class="input-group mb-3">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <input type="checkbox" id="check_inic_mont" aria-label="Checkbox for following text input">
              </div>
            </div>
            <input type="text" id="inic_mont" class="form-control form-control-sm" aria-label="Text input with checkbox" disabled>
          </div>
        </div>

                


               <div class="form-group col-lg-3">
                <label for="fech_inic">* Fecha inicial: </label>
                <input type="text" id="fech_inic" class="form-control form-control-sm" placeholder="Fecha inicial">
                </div>

              <div class="form-group col-lg-3 ">
               
                  <label for="imp">* Forma de pago: </label>
                  <select name="" id="fpago" class="form-control form-control-sm">
                    <!-- <option value="" selected>seleccione</option> -->
                    
                  </select>
              </div>


              <div class="form-group col-lg-3 ">
               
                  <label for="imp">* Cantidad de cuotas: </label>
                  <select name="" id="cuotas" class="form-control form-control-sm">

                  </select>
              </div>
            </div>
            
            <table class="table table-sm table-bordered" id="" style="font-size: 11px" >
          <thead  class="thead-dark">
            <tr>
              <th scope="col" width="5%">#</th>
              <th scope="col" width="20%">Concepto</th>
              <th scope="col" width="20%">Monto de cuota</th>
              <th scope="col">Monto restante</th>
              <th scope="col">Fecha correspondiente de pago</th>
            </tr>
          </thead>

        </table>
        <table class="table table-sm table-bordered" id="pagos" style="font-size: 11px; " >
          <thead  class="thead-dark" style="display: none">
            <tr>
              <th scope="col" width="5%">id</th>
              <th scope="col" width="20%">concpt</th>
              <th scope="col" width="20%">monto_c</th>
              <th scope="col">monto_r</th>
              <th scope="col">fecha_p</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>




        <label for="import_cuo">Importe en letras de cuotas</label>
        <input type="text" id="import_cuo" class="form-control form-control-sm" disabled>
          <input type="hidden" id="resul" >
<!--             <div class="col-lg-auto text-center" style="font-size: 12px">
                NO INCLUYE IVA Y COSTOS DE PRODUCIÓN
               <br> Estos espacios están sujetos a cambio sin previo aviso                                      

            </div> -->
     <!--    <hr> -->
            <div class="row">
            <div class="col text-center" style="font-size: 12px">
              <label for="elab_by">* Elaborado por:</label>
               <input type="text" id="elab_by" class="form-control form-control-sm">
               <input type="hidden" id="elab_ci">
            <br>
             <input type="text" id="elab_car" class="form-control form-control-sm buscador" disabled>  
            </div>

            <div class="col text-center" style="font-size: 12px">
              <label for="revi_by">* Revisado por:</label>
               <input type="text" id="revi_by" class="form-control form-control-sm">
               <input type="hidden" id="revi_ci">
            <br> 
            <input type="text" id="revi_car" class="form-control form-control-sm buscador" disabled>            
            </div>

            <div class="col text-center" style="font-size: 12px">
              <label for="apro_by">* Aprobado por:</label>
               <input type="text" id="apro_by" class="form-control form-control-sm">
               <input type="hidden" id="apro_ci">
            <br>
             <input type="text" id="apro_car" class="form-control form-control-sm buscador" disabled>             
            </div>

             </div>
         <hr>
      
<!--              <div class="col-lg-auto text-center" style="font-size: 12px">
            Av. Sesquicentenaria, Parque Recreacional Sur, Parte Sur Oeste S/N Zona Valencia Sur, Estado Carabobo Venezuela, Telf. +58(241)8740400 al 8740410. www.metrovalencia.gob.ve                                             
                                                          
            </div> -->
          <!-- <div class="btn-group" align="center"> -->
            <button id="btn-guardar" class="btn btn-success ">Guardar</button>
             <button id="btn-limpiar" class="btn btn-danger ">Limpiar</button>
              <a href="listar_presupuestos.php" class="btn btn-secondary">Listar Presupuestos</a>
         <!--  </div> -->
        </div>


</div>



<script defer src="js/jquery-3.3.1.min.js" ></script>
<script defer src="js/jquery.tabletojson.min.js" ></script>

<script defer src="js/popper.min.js" ></script>
<script defer src="js/bootstrap.min.js" ></script>
<script defer src="js/fontawesome-all.min.js"></script>
<script defer src="js/sweetalert.min.js"></script>

<script defer src="script/validador.js"></script>
<script defer src="js/jquery-ui.min.js"></script>
<script defer src="js/datepicker_esp.js"></script>
<!-- <script defer src="js/NumeroALetras.js"></script> -->
<script defer src="js/accounting.min.js"></script>

<script defer src="script/gst_pre.js"></script>

    

</body>

</html>