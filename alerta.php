<?php
    $tituloMensagem = '';
    $mensagem = '';
    
    if (isset($_GET['sucesso'])) {
        $tituloMensagem = "Não foi possível concluir essa ação!";
        $mensagem = $_GET['mensagem'];
    
        if ($_GET['sucesso']) {
            $tituloMensagem = "Sucesso!";
        }
    }
?>
<html>
    <head>
        <title>
        </title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="estilos/estilo.css">
    </head>

    <body>
        <div class='alerta'>
        <span><b> <?php echo $tituloMensagem ?></b> </span>
        <span> <?php echo $mensagem ?> </span>
        </div>
    </body>
</html>    

