<?php
    include("../alerta.php");
?>
<html>
    <head>
        <title>
            Login
        </title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../estilos/estilo.css">
    </head>    
    <body>
        <div style = "background-image: linear-gradient(to left, LightSkyBlue, aliceblue)">
        <br>
        <h1>Login</h1>
        <br>
        </div>
        <br><br><br>
        <form id="LogAdm" name="LogAdm" action="../controladores/controlaLoginAdm.php" method="post">
            <br><br>
            <input name="login" placeholder="Login" id="login" type="text" size="30">
            <br><br>

            <input name="senha" id="senha" placeholder="Senha" type="password" size="30">
            <br><br>

            <input type="submit" id="logarSistemaAdm" name="logarSistemaAdm" value="Entrar">
            <br><br>

        </form>
    </body>    
</html>    