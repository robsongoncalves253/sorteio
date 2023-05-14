<?php
    include("../alerta.php");
?>
<html>
    <head>
        <title>
        Sorteio Shopping Independência - Cadastro de clientes
        </title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../estilos/estilo.css">
    </head>    
    <body>
        <div style = "background-image: linear-gradient(to left, LightSkyBlue, aliceblue)">
        <br>
        <h1> Cadastro de clientes</h1>
        <br>
        </div>
        <br><br><br>
        <form id="cadastro" name="cadastro" action="../controladores/controlaCadastroCliente.php" method="post">
        
            <label>CPF</label>
            <input name="cpf"  id="cpf" type="text" size="30" maxlength="100">
            <br><br>
            
            <label>Nome</label>
            <input name="nome"  id="nome" type="text" size="30" maxlength="100">
            <br><br>

            <label>Data de Nascimento</label>
            <input name="dataNascimento" id="dataNascimento" type="date">
            <br><br>

            <Label> Sexo</label>
            <select name="sexo">
                <option value="Masculino" selected>Masculino</option>
                <option value="Feminino">Feminino</option>    
            </select>
                    
            <br><br>
            <label>Senha</label>
            <input name="senha" id="senha" type="password">
            
            <br><br>
            <input type="submit" id="cadastrarCliente" name="cadastrarCliente" value="Cadastrar">
            <br><br>

            <input type="submit" id="voltar" name="voltar" value="Voltar">
            <br><br>
        </form>
    </body>
</html>    