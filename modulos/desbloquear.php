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

$usuarioID = $_GET[""];
$passID = $_GET[""];

$hash = ($conn->query(""));
$hashValido = $hash->fetch_row();

if($hashValido[0] == $passID){
    $conn->query("");
    echo "";
}else{
    echo "";
}

?>