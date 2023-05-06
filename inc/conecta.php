<?PHP

//conexão com banco de dados mysql
$servidor = "localhost";
$usuario = "root";
$senha = "";
$bancoDeDados = "exerciciofinal";
$porta = 3306;

$conexao = mysqli_connect($servidor, $usuario, $senha, $bancoDeDados, $porta);
?>