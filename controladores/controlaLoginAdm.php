<?php
    session_start();

    if((isset($_POST['logarSistemaAdm']))){
        $retorno= logarSistemaAdm();
        $sucesso  = $retorno['sucesso'];
        $mensagem = $retorno['mensagem'];
        if($sucesso == false){
            $url = "Location: ../views/loginAdm.php?sucesso=$sucesso&mensagem=$mensagem";

            header($url);
        }    

    }
    function logarSistemaAdm(): array{
        global $conexao;

        $login = isset($_POST['login']) ? $_POST['login'] : null;
        $senha = isset($_POST['senha']) ? $_POST['senha'] : null;

        if($login ="admin" && $senha == "admin"){
            $_SESSION['logadoAdm']='OK';
            include ("../views/menuAdm.php");
            return [
                "sucesso" => true,
                "mensagem" => "" 
            ]; 
        }else{
            return [
                "sucesso" => false,
                "mensagem" => "Usuário ou senha incorretos" 
            ]; 
        }

    }
?>