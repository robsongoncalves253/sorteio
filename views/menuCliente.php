<?php
    include("../verificaClienteLogado.php");
    include("../alerta.php");
?>
<html>
    <head>
        <title>
            Menu Cliente
        </title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../estilos/estilo.css">
    </head>    
    <body>
        <div style = "background-image: linear-gradient(to left, LightSkyBlue, aliceblue)">
        <br>
        <h1> Menu Cliente</h1>
        <br>
        </div>
        <br><br><br>
        <form id="opcaoLog" name="opcaoLog" action="../controladores/controlaMenuCliente.php" method="post">
            <br><br>
            <input name="cadastrarCupom" id="cadastrarCupom" type="submit" value="Cadastrar Cupom">
            <br><br>
            <input name="MeusNum" id="MeusNum" type="submit" value="Meus Números da sorte">
            <br><br>
            <input name="sair" id="sair" type="submit" value="Sair">
            <br><br>
        </form>
<html>    