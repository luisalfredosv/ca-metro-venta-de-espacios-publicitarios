<?php
$server_bd = "localhost";
$user_bd = "root";
$pass_bd = "kilo*sargento56";
$bd = "empleados";
$port_bd = "";


//$data = new stdClass();

$mysqli = new mysqli($server_bd, $user_bd, $pass_bd, $bd);
if ($mysqli->connect_errno) {
    
   // $data-> mysqli = $mysqli->connect_errno ." ". $mysqli->connect_error;
}
$mysqli->set_charset("utf8");

// $data-> mysqli = $mysqli->host_info;
//  echo json_encode($data);
?>

