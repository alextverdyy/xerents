<?php

$servername = "";
$username = "";
$password = "";
$dbname = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$usuario = $_POST["usuario"];
$pass = $_POST["pass"];
$email = $_POST["email"];

//CREAMOS UN NUM ALEATORIO Y LA HASHEAMOS PARA LUEGO COMPROBAR QUE EL "TOKEN" SEAN IGUALES
$numAleatorio = rand(1, 123456789);
$hashNum = hash("md5", $numAleatorio);

//HASHEAMOS LA PASS PARA QUE EN LA BBDD NO SALGA LA ORIGINAL
$passHash = password_hash($clave, PASSWORD_DEFAULT);

$sql = "INSERT INTO  () values ('$usuario','$passHash','$email')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//SACA LA ID DEL USUARIO Y LUEGO LE EMAIL UN EMAIL CON EL MENSAJE Y UN TOKEN PARA LUEGO DESBLOQUEARLE Y QUE PUEDA LOGEARSE
$id = ($conn->query());
$idValido = $id->fetch_row();
$mensaje = "";

?>