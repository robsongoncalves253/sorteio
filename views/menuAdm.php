<?php
    include("../verificaAdmLogado.php");
?>
<htmL>
    <head>
        <title>
            Sorteio Shopping Independência - Administrador
        </title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../estilos/estilo.css">
    </head>    
    <body>
        <h1> Menu Administrativo</h1>
    <form id="menuAdm" name="menuAdm" action="../controladores/controlaMenuAdm.php" method="post">
            <br><br>
            <input type="submit" id="listarCliente" name="listarCliente" value="Listar Clientes">
            <br><br>
            <input type="submit" id="verCupomCliente" name="verCupomCliente" value="Visualizar cupons de um cliente">
            <br> <br>
            <input type="submit" id="mostrarNumSorte" name="mostrarNumSorte" value="Visualizar números da sorte">
            <br><br>
            <input type="submit" id="fazerSorteio" name="fazerSorteio" value="Fazer o Sorteio">
            <br><br>
            <input type="submit" id="sair" name="sair" value="Sair">
            <br><br>  
        </form>
    </body>
</html>    