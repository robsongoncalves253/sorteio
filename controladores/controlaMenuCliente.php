<?php
    session_start();
    require_once("../inc/conecta.php");

    if (isset($_POST['cadastrarCupom'])) {
        include ("../views/cadastraCupom.php");
    }

    if (isset($_POST['MeusNum'])) {
        $retorno = listarNumSorteCliente();
        if($retorno['sucesso']==false){
            $mensagem = $retorno['mensagem'];
            $url = "Location: ../views/menuCliente.php?sucesso=$sucesso&mensagem=$mensagem";

            header($url);
        }
        if($retorno['sucesso']==true){
            $resultado=$retorno['resultado'];
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
            echo '<a href="../views/menuCliente.php"> Voltar </a>';
        }
    }    
        
    if (isset($_POST['sair'])){
        sair();
    }

    function listarNumSorteCliente() :array{
        if(isset($_SESSION['logado'])){
            global $conexao;
            $cpf = $_SESSION['cpf'];
            $sql = "SELECT Numero FROM numerodasorte WHERE CPF = '$cpf'";
            $consulta = mysqli_query($conexao, $sql);
            $qtd = mysqli_num_rows($consulta);
            $resultado = array();

            while ($dados = mysqli_fetch_assoc($consulta)) {
                $resultado[] = $dados;
            }


            if ($qtd==0) {
                return [
                    "sucesso" => false,
                    "mensagem" => "Você ainda não possui números da sorte."
                ]; 
            }

            return [
                "sucesso"=>true,
                "resultado"=>json_encode($resultado)
            ];
        }
    }

    function sair(){
        $url = "Location: ../principal.php";

        unset($_SESSION['logado']);
        session_destroy();

        header($url);
    }

?>