<?php
    include("../alerta.php");
?>
<html>
    <head>
        <title>
            Sorteio Shopping Independência - Sortear
        </title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../estilos/estilo.css">
    </head>    
    <body>
        <h3> Clique em sortear para realizar o sorteio</h3>.
        <br>
        <h3> Ao concluir esta ação, nenhum cliente poderá cadastrar mais cupons!</h3>
        <form id="opcaoLog" name="opcaoLog" action="../controladores/controlaMenuAdm.php" method="post">
            <br><br>
            <input type="submit" id="sortear" name="sortear" value="Sortear"> 
            <br><br>
            <input type="submit" id="voltar" name="voltar" value="Voltar">
            <br><br>
        </form>
    </body>
</html>    