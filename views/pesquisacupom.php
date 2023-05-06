<?php
    include("../verificaAdmLogado.php");
    include("../alerta.php")
?>
<html>
    <head>
        <title>
            Sorteio Shopping Independência - Administrador
        </title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../estilos/estilo.css">
    </head>    
    <body>
        <h1>Busca de Cupons</h1>
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