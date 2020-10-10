<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if(!isset($_SESSION['id_usr'])){
    header("Location: index.php");
}

    
// include_once 'sql/conexion.php';
// $id = $_SESSION['id_usr'];
// $query = "SELECT a.id, a.user, a.password FROM comerc_public.usuarios as a WHERE a.id='$id' ";
// $resultado = $mysqli->query($query); 
// $row = $resultado->fetch_array();



//Comprobamos si esta definida la sesión 'tiempo'.
if(isset($_SESSION['tiempo_usr'])){


    //Tiempo en segundos para dar vida a la sesión.
    $inactivo = 10500; // tiempo en segundos

    //Calculamos tiempo de vida inactivo.
    $vida_session = time() - $_SESSION['tiempo_usr'];

        //Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
        if($vida_session > $inactivo)
        {
            //Removemos sesión.
            session_unset();
            //Destruimos sesión.
            session_destroy();              
            //Redirigimos pagina.
            header("Location: index.php");
            exit();
        }
}else{
    //Activamos sesion tiempo.
    $_SESSION['tiempo_usr'] = time();
}

?>