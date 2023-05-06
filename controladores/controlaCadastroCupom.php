<?php
session_start();
require_once("../inc/conecta.php");
function cadastraCupom() :array{
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
    
    
    if (!isset($_POST['cpf']) || !isset($_POST['codigo']) || !isset($_POST['loja']) || !isset($_POST['valor']) || !isset($_POST['data']) || !isset($_POST['hora'])) {
        return [
            "sucesso" => false,
            "mensagem" => "Dados informados incompletos."
        ]; 
            
    }
    
    if (empty($_POST['cpf']) || empty($_POST['codigo']) || empty($_POST['loja']) || empty($_POST['valor']) || empty($_POST['data']) || empty($_POST['hora'])) {
        return [
            "sucesso" => false,
            "mensagem" => "Dados informados incompletos."
        ]; 
    }
    
    $cpf  = $_POST['cpf'];
    $codigo =  $_POST['codigo'];
    $loja = $_POST['loja'];
    $valor =  $_POST['valor'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $dataHora = $data." ".$hora;
    $cpf_titular = $_SESSION['cpf'];
    $status = "aprovado";

    
    //consultar 
    $sql = "SELECT CODIGO FROM cupom WHERE CODIGO = '$codigo'";
    $consulta = mysqli_query($conexao, $sql);
    $qtdCodigo = mysqli_num_rows($consulta);

    if($cpf_titular != $cpf || $qtdCodigo>0){
        $status = "reprovado"; 
    }
    
    // if ($qtdPessoas > 0) {
    //     return [
    //         "sucesso" => false,
    //         "mensagem" => "Cupom não aprovado porque já foi cadastrado"
    //     ]; 

    // }
    
    
    //cadastro
    try {
            $sql = "INSERT INTO cupom (CPF_CUPOM, CODIGO, LOJA, VALOR, DATAHORA,STATUS, CPF_TITULAR) 
                             VALUES ('$cpf', '$codigo', '$loja', '$valor', '$dataHora','$status', '$cpf_titular')";
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

    //gerar numeros da sorte 


    //conta quantos numeros da sorte o cliente já tem
    $sqlUm = "SELECT NUMERO FROM numerodasorte WHERE CPF = '$cpf_titular'";
    $consultaUm = mysqli_query($conexao, $sqlUm);
    $qtdNumSorte = mysqli_num_rows($consultaUm);
        
    //soma o valor total dos cupons do cliente
    $sqlDois = "SELECT SUM(VALOR) AS 'total' FROM cupom WHERE CPF_CUPOM = '$cpf_titular' and STATUS ='aprovado'";
    $consultaDois = mysqli_query($conexao, $sqlDois);
    $result = mysqli_fetch_array($consultaDois);


    
    $qtdAGerar = intdiv($result['total'],300)-$qtdNumSorte;
    if($qtdAGerar==1){
        $retornoDois = " Você tem um novo número da sorte<br>";
    }
    if($qtdAGerar>1)
    $retornoDois = " Você tem ".$qtdAGerar. " novos números da sorte<br>";
    for($i=$qtdAGerar;$i>0;$i--){
        $qtd=1;
        while ($qtd != 0) {
            $numero=rand(1,100000);
            $sqlTres = "SELECT NUMERO FROM numerodasorte WHERE NUMERO = '$numero'" ;
            $consultaNumSorte = mysqli_query($conexao, $sqlTres);
            $qtd = mysqli_num_rows($consultaNumSorte);
        }
        try {
                $sql = "INSERT INTO numerodasorte (NUMERO, CPF, STATUS) VALUES ('$numero', '$cpf','aguardando sorteio')";
                $insert = mysqli_query($conexao, $sql);
            
                if (!$insert) {
                    throw new Exception(mysqli_error($conexao));
                }
            } catch (Exception $e) {
                $retornoDois= $e->getMessage();
            }
        }
    

    return [
        "sucesso" => true,
        "mensagem" => "Cupom cadastrado com sucesso! ".$retornoDois
    ]; 

}


if(isset($_POST['cadastrarCupom'])){

    $retorno= cadastraCupom();
    $sucesso  = $retorno['sucesso'];
    $mensagem = $retorno['mensagem'];
    $url = "Location: ../views/cadastraCupom.php?sucesso=$sucesso&mensagem=$mensagem";

    header($url);
}    

if(isset($_POST['voltar'])){

    $url = "Location: ../views/menuCliente.php";

    header($url);
    //include("menuCliente.php");
}   
?>
