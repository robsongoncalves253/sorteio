<?php
    session_start();

    require_once("../inc/conecta.php");

    if((isset($_POST['logarSistemaCliente']))){
        $retorno= logarSistemaCliente();
        $sucesso  = $retorno['sucesso'];
        $mensagem = $retorno['mensagem'];
        if($sucesso == false){
            $url = "Location: ../views/loginCliente.php?sucesso=$sucesso&mensagem=$mensagem";

            header($url);
        }    

    }

    
    if((isset($_POST['criarConta']))){
        include ("../views/cadastraCliente.php");
    }

     
    if((isset($_POST['cadastrarCliente']))){
        $retorno =cadastraCliente();
        $sucesso  = $retorno['sucesso'];
        $mensagem = $retorno['mensagem'];
        $url = "Location: ../views/cadastraCliente.php?sucesso=$sucesso&mensagem=$mensagem";

        header($url);
    }

    function logarSistemaCliente(){
        global $conexao;

        $cpf = isset($_POST['CPF']) ? $_POST['CPF'] : null;
        $senha = isset($_POST['senha']) ? $_POST['senha'] : null;

        //consultar pessoa
        $sql = "SELECT * FROM cliente WHERE CPF = '$cpf' AND SENHA = '$senha'";
        $consulta = mysqli_query($conexao, $sql);
        $qtdPessoas = mysqli_num_rows($consulta);

        if ($qtdPessoas > 0){
            
            $_SESSION['logado']='OK';
            $_SESSION['cpf']=$cpf;
            include ("../views/menuCliente.php");
            return [
                "sucesso" => true,
                "mensagem" => "" 
            ]; 
            
        }else{
            return [
                "sucesso" => false,
                "mensagem" => "Usuário ou senha inválidos" 
            ]; 
        }

    }

    function cadastraCliente() :array{
        global $conexao;
    
        $sqlSort = "SELECT NUMERO FROM numerodasorte WHERE STATUS = 'sorteado'";
        $consultaSort = mysqli_query($conexao, $sqlSort);
        $qtdNumSorteado = mysqli_num_rows($consultaSort);

        if($qtdNumSorteado>0){
            return [
                "sucesso" => false,
                "mensagem" => "O sorteio já foi realizado."
            ]; 
        }
        
        if (!isset($_POST['cpf']) || !isset($_POST['nome']) || !isset($_POST['dataNascimento']) || !isset($_POST['sexo']) || !isset($_POST['senha'])) {
            return [
                "sucesso" => false,
                "mensagem" => "Dados informados incompletos."
            ];    
        }
        
        if (empty($_POST['cpf']) || empty($_POST['nome']) || empty($_POST['dataNascimento']) || empty($_POST['sexo']) || empty($_POST['senha'])) {
            return [
                "sucesso" => false,
                "mensagem" => "Dados informados incompletos."
            ];    
        }
        
        $cpf  = $_POST['cpf'];
        $nome =  $_POST['nome'];
        $dataNascimento = $_POST['dataNascimento'];
        $sexo =  $_POST['sexo'];
        $senha = $_POST['senha'];
    
        
        
        //consultar pessoa
        $sql = "SELECT NOME FROM cliente WHERE CPF = '$cpf'";
        $consulta = mysqli_query($conexao, $sql);
        $qtdPessoas = mysqli_num_rows($consulta);
        
        if ($qtdPessoas > 0) {
            return [
                "sucesso" => false,
                "mensagem" => "Essa pessoa já existe no registro."
            ];
    
        }
        
        
        //cadastro
        try {
            $sql = "INSERT INTO cliente (CPF, NOME, SEXO, DATANASC, SENHA) 
                                 VALUES ('$cpf', '$nome', '$sexo', '$dataNascimento', '$senha')";
            $insert = mysqli_query($conexao, $sql);
        
            if (!$insert) {
                throw new Exception(mysqli_error($conexao));
            }
        } catch (Exception $e) {
            return [
                "sucesso" => false,
                "mensagem" => $e->getMessage()
            ];
        }
        
        return [
            "sucesso" => true,
            "mensagem" => "Pessoa cadastrada com sucesso."
        ];
    }





   

    
        
?>