<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if(!isset($_SESSION['logadoAdm'])){

        $url = "Location: principal.php";
    
        header($url);
    
    }
?>
