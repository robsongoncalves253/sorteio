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
        <div class=tela>
            <div style = "background-image: linear-gradient(to left, LightSkyBlue, aliceblue)">
            <br>
            <h1> Login </h1>
            <br>
            </div>
            <br><br><br>
            <form class="login" id="Log" name="Log" action="../controladores/controlaLoginCliente.php" method="post">
                <br><br>
                <input name="CPF" placeholder="CPF" id="CPF" type="text" size="30">
                <br><br>

                <input name="senha" placeholder="Senha" id="senha" type="password" size="30">
                <br><br>

                <input type="submit" id="logarSistemaCliente" name="logarSistemaCliente" value="Entrar">
                <br><br>
                <br><br>
                <label>Ainda não possui Cadastro? </label>
                <br>
                <input type="submit" id="criarConta" name="criarConta" value="Criar conta">
                <br><br>
            </form>
            <form  id="geraCadastro" name="geraCadastro" action="controlaCadastroCliente.php" method="post">
                
            </form>
        </div>
    
    </body>
</html>