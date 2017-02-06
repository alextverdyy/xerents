<?php

include_once 'config.php';

$usuario = $_REQUEST["usuario"];
$pass = $_REQUEST["pass"];
$email = $_REQUEST["email"];

//CREAMOS UN NUM ALEATORIO Y LA HASHEAMOS PARA LUEGO COMPROBAR QUE EL "TOKEN" SEAN IGUALES
$numAleatorio = rand(1, 123456789);
$hashNum = hash("md5", $numAleatorio);

//HASHEAMOS LA PASS PARA QUE EN LA BBDD NO SALGA LA ORIGINAL
$passHash = password_hash($clave, PASSWORD_DEFAULT);

$sql = "INSERT INTO  (usuarios,pass,email) values ('$usuario','$passHash','$email')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$mensaje = '<html>'.
    '<head><title>Xerents</title></head>'.
    '<body><h1>Bienvenido a Xerents</h1>'.
    'Le informamos que se ha registrado correctamente en la web de Xerents.'.
    '<hr>'.
    'Enviado por el administrador de Xerents'.
    '</body>'.
    '</html>';
$titulo = "Enviar por la web de Xerents";
$cabeceras = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$cabeceras .= 'Para mas informacion: Xerents@gmail.com';
mail($email, $titulo, $mensaje,$cabeceras);

?>