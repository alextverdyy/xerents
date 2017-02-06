<?php

include_once 'config.php';

$usuario = $_REQUEST["usuario"];
$pass = $_REQUEST["pass"];

$clave = ($conn->query("SELECT pass FROM usuarios WHERE usuario = '$usuario'"));
$claveValido = $clave->fetch_row();


//COMPRUEBA LA CONTRASEÑA Y APARTE TAMBIEN SI ESTA BLOQUEADO O NO;
if(password_verify($clave, $claveValido[0])){
    echo "Se ha logeado correctamente";
    echo "<a href=''></a>";
}else{
    echo "El usuario o contraseña son incorrectos, intentelo de nuevo";
    echo "<a href='login.php'></a>";
}

?>