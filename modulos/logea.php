<?php

$servername = "";
$username = "";
$password = "";
$dbname = "";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$usuario = ["usuario"];
$pass = ["pass"];

$clave = ($conn->query());
$claveValido = $clave1->fetch_row();


//COMPRUEBA LA CONTRASEÑA Y APARTE TAMBIEN SI ESTA BLOQUEADO O NO;
if(password_verify()){

    $usuarioBloqueado = ($conn->query());
    $usuarioValido = $usuarioBloqueado->fetch_row();

    if($usuarioValido[0] == 1){

    }else{

    }
}else{

}

?>