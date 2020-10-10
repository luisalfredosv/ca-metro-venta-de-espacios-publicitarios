<?php
session_start(); 
 
    unset($_SESSION['id_usr']); 
    if(session_destroy()) {
    header("Location:index.php"); 
    }

?>