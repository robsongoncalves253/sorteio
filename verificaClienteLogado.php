<?PHP
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
if(!isset($_SESSION['logado'])){

    $url = "Location: principal.php";

    header($url);

}
?>