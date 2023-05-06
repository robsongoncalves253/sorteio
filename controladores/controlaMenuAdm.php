<?php
    session_start();
    require_once("../inc/conecta.php");

    if (isset($_POST['listarCliente'])) {

        $retorno = listarCliente();
        if($retorno['sucesso']==false){
            $mensagem = $retorno['mensagem'];
            $url = "Location: ../views/menuCliente.php?sucesso=$sucesso&mensagem=$mensagem";

            header($url);
        }
        if($retorno['sucesso']==true){
            $resultado = $retorno['resultado'];
            $result = json_decode($resultado, true);
            echo"<link rel='stylesheet' href='../estilos/estilo.css'>";
            //echo "<table style='text-align:'center' border = '1' width='60%'><tr>";
            echo "<h1>Clientes Cadastrados</h1>";
            echo "<table><tr>";
            $titulo = $result[0];
            foreach ($titulo as $chave => $valor) {
                echo "<th>$chave</th>";
            }
            echo '</tr>';
            foreach ($result as $chave => $valor) {
                foreach ($valor as $chave2 => $valor2) {
                    echo "<td>$valor2</td>";
                }
                echo '</tr>';
            }
            echo '</table>';
            echo '<br>';
            echo '<a href="../views/menuAdm.php"> Voltar </a>';
        }    
        
    }
    if (isset($_POST['sair'])){
        sair();
    }


    if (isset($_POST['mostrarNumSorte'])) {
        $retorno =  mostrarNumsrote();
        if($retorno['sucesso']==false){
            $mensagem = $retorno['mensagem'];
            $url = "Location: ../views/menuCliente.php?sucesso=$sucesso&mensagem=$mensagem";

            header($url);
        }
        if($retorno['sucesso']==true){
            $resultado = $retorno['resultado'];
            $result = json_decode($resultado, true);
            echo"<link rel='stylesheet' href='../estilos/estilo.css'>";
            //echo "<table style='text-align:'center' border = '1' width='60%'><tr>";
            echo "<h1>Números da Sorte</h1>";
            echo "<table><tr>";
            $titulo = $result[0];
            foreach ($titulo as $chave => $valor) {
                echo "<th>$chave</th>";
            }
            echo '</tr>';
            foreach ($result as $chave => $valor) {
                foreach ($valor as $chave2 => $valor2) {
                    echo "<td>$valor2</td>";
                }
                echo '</tr>';
            }
            echo '</table>';
            echo '<br>';
            echo '<a href="../views/menuAdm.php"> Voltar </a>';
        }
    }

    if (isset($_POST['verCupomCliente'])) {
        include("../views/pesquisacupom.php");    
    }

    if(isset($_POST['buscar'])){
        $retorno = pesquisaCupom();
        if($retorno['sucesso']==false){
            $mensagem = $retorno['mensagem'];
            $url = "Location: ../views/pesquisacupom.php?sucesso=$sucesso&mensagem=$mensagem";

            header($url);
        }
        if($retorno['sucesso']==true){
            $resultado = $retorno['resultado'];
            $result = json_decode($resultado, true);
            echo"<link rel='stylesheet' href='../estilos/estilo.css'>";
            //echo "<table style='text-align:'center' border = '1' width='60%'><tr>";
            echo "<h1>Cupons Cadastrados</h1>";
            echo "<table><tr>";
            $titulo = $result[0];
            foreach ($titulo as $chave => $valor) {
                echo "<th>$chave</th>";
            }
            echo '</tr>';
            foreach ($result as $chave => $valor) {
                foreach ($valor as $chave2 => $valor2) {
                    echo "<td>$valor2</td>";
                }
                echo '</tr>';
            }
            echo '</table>';
            echo '<br>';
            echo '<a href="../views/menuAdm.php"> Voltar </a>';
        }    
    }
    if(isset($_POST['fazerSorteio'])){
        include("../views/fazerSorteio.php");
    }
    if(isset($_POST['sortear'])){
        //$resultado = fazerSorteio();
        //$result = json_decode($resultado, true);
        //print_r($result);
        $retorno = fazerSorteio();
        if($retorno['sucesso']==false){
            $mensagem = $retorno['mensagem'];
            $url = "Location: ../views/fazersorteio.php?sucesso=$sucesso&mensagem=$mensagem";

            header($url);
        }
        if($retorno['sucesso']==true){
            $resultado = $retorno['resultado'];
            $result = json_decode($resultado, true);
            echo"<link rel='stylesheet' href='../estilos/estilo.css'>";
            echo "<h3>Número Sorteado: ".$result['NUMERO']."</h3>";
            echo "<h3>Ganhador: ".$result['NOME']."<h3>";
            echo '<a href="../views/menuAdm.php"> Voltar </a>';
        }
        
    }

    if(isset($_POST['voltar'])){
        voltar();
        
    }


    function listarCliente() :array{
        if(isset($_SESSION['logadoAdm'])){
            global $conexao;
            $sql = "SELECT NOME, CPF, DATANASC, SEXO  FROM cliente";
            $consulta = mysqli_query($conexao, $sql);
            $qtd = mysqli_num_rows($consulta);
            $resultado = array();

            while ($dados = mysqli_fetch_assoc($consulta)) {
                $resultado[] = $dados;
            }


            if ($qtd==0) {
                return[
                    "sucesso"=>false,
                    "mensagem"=>"Ainda não existem clientes cadastrados"
                ];   
            }

            return [
                "sucesso"=>true,
                "resultado"=>json_encode($resultado)
            ];    
        }
    }

    function mostrarNumsrote() :array{
        if(isset($_SESSION['logadoAdm'])){
            global $conexao;
            $sql = "SELECT NOME, NUMERO FROM cliente INNER JOIN numerodasorte ON cliente.CPF = numerodasorte.CPF";
            $consulta = mysqli_query($conexao, $sql);
            $qtd = mysqli_num_rows($consulta);
            $resultado = array();

            while ($dados = mysqli_fetch_assoc($consulta)) {
                $resultado[] = $dados;
            }


            if ($qtd==0) {
                return [
                    "sucesso"=>false,
                    "mensagem"=>"Base Vazia"
                ];    
            }

            return [
                "sucesso"=>true,
                "resultado"=> json_encode($resultado)
            ];    
        }  
        
    }

    function pesquisaCupom() :array{
        if(isset($_SESSION['logadoAdm'])){
            global $conexao;
            $cpf = $_POST['cpfCliente'];
            $sql = "SELECT CODIGO, LOJA, VALOR, DATAHORA, CPF_CUPOM, CPF_TITULAR, STATUS FROM CUPOM WHERE CPF_TITULAR = '$cpf'";
            $consulta = mysqli_query($conexao, $sql);
            $qtd = mysqli_num_rows($consulta);
            $resultado = array();

            while ($dados = mysqli_fetch_assoc($consulta)) {
                $resultado[] = $dados;
            }


            if ($qtd==0) {
                return [
                    "sucesso"=>false,
                    "mensagem"=>"Nenhum cupom encontrado"
                ];    
            }

            return [
                "sucesso"=>true,
                "resultado"=>json_encode($resultado)
            ];    
        }
    }

    function fazerSorteio() :array{
        if(isset($_SESSION['logadoAdm'])){
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

            
            $sql = "SELECT NOME, NUMERO FROM cliente INNER JOIN numerodasorte ON cliente.CPF = numerodasorte.CPF";
            $consulta = mysqli_query($conexao, $sql);
            $qtd = mysqli_num_rows($consulta);
            $resultado = array();

            if($qtd==0){
                return [
                    "sucesso" =>false,
                    "mensagem" => "Ainda não foi gerado nenhum número da sorte!"
                ];    
            }

            while ($dados = mysqli_fetch_assoc($consulta)) {
                $resultado[] = $dados;
            }

            $sorteado = rand(0,$qtd-1);
            $result = $resultado[$sorteado]['NUMERO'];

            $sqlDois = "UPDATE numerodasorte set STATUS = 'sorteado' WHERE NUMERO = $result";
            $consultaDois = mysqli_query($conexao, $sqlDois);


            return [
                "sucesso" =>true,
                "resultado" => json_encode($resultado[$sorteado])
            ];    
            
        }
    }
    function sair(){
        $url = "Location: ../principal.php";

        unset($_SESSION['logadoAdm']);
        session_destroy();

        header($url);
    }

    function voltar(){
        include("../views/menuAdm.php");
    }


?>