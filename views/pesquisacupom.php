<?php
    include("../verificaAdmLogado.php");
    include("../alerta.php")
?>
<html>
    <head>
        <title>
            Administrador
        </title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../estilos/estilo.css">
    </head>    
    <body>
        <div style = "background-image: linear-gradient(to left, LightSkyBlue, aliceblue)">
        <br>
        <h1>Busca de Cupons</h1>
        <br>
        </div>
        <br><br><br>
        <form id="pesquisaCupom" name="pesquisaCupom" action="../controladores/controlaMenuAdm.php" method="post">
            <label>Digite o CPF do Cliente</label>
            <input type="text" id="cpfCliente" name="cpfCliente">
            <br>
            <input type="submit" id="buscar" name="buscar" value="Buscar">
            <br><br>
            <a href="../views/menuAdm.php">Voltar</a>
        </form>
    </body>
</html>    