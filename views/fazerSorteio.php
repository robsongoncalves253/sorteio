<?php
    include("../alerta.php");
?>
<html>
    <head>
        <title>
            Sortear
        </title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../estilos/estilo.css">
    </head>    
    <body>
        <div style = "background-image: linear-gradient(to left, LightSkyBlue, aliceblue)">
        <br>
        <h1>Sortear</h1>.
        <br>
        </div>
        <br><br>
        <h3> Ao concluir esta ação, nenhum cliente poderá cadastrar mais cupons!</h3>
        <br><br>
        <form id="opcaoLog" name="opcaoLog" action="../controladores/controlaMenuAdm.php" method="post">
            <br><br>
            <input type="submit" id="sortear" name="sortear" value="Sortear"> 
            <br><br>
            <input type="submit" id="voltar" name="voltar" value="Voltar">
            <br><br>
        </form>
    </body>
</html>    