<?php
    include("../alerta.php");
    include("../verificaClienteLogado.php");
?>
<html>
    <head>
        <title>
            Sorteio Shopping Independência - Cadastro de Cupons
        </title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../estilos/estilo.css">
    </head>    
    <body>
        <h1> Cadastro de Cupons</h1>
        <form id="cadastro" name="cadastro" action="../controladores/controlaCadastroCupom.php" method="post">
            <br><br>
            <label>CPF </label>
            <input name="cpf" id="cpf" type="text" size="30" maxlength="100">
        
            <label>Código </label>
            <input name="codigo" id="codigo" type="text" size="30">
           
            <label>Loja </label>
             <input name="loja" id="loja" type="text" size="30">

            <label>Valor </label>
            <input name="valor" id="valor" type="text">
       
            <label>Data </label>
            <input name="data" id="data" type="date">

            <label>Hora </label>
            <input name="hora" id="hora" type="text">
            <br><br>
            <input type="submit" id="cadastrarCupom" name="cadastrarCupom" value="Cadastrar">
            <br><br>

            <input type="submit" id="voltar" name="voltar" value="voltar">
            <br><br>
        </form>
    </body>
</html>    