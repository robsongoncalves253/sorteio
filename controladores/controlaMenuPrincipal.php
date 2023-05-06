<?php
    if (isset($_POST['areaCliente'])) {
        include ("../views/loginCliente.php");
    }

    if (isset($_POST['areaADM'])) {
        include ("../views/loginAdm.php");
    }
?>