<?php
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>REGISTRO</title>
</head>
    <body>
    //EL PRIMER FORM ES PARA LOGEARSE
    <form method="post" action="logea.php">
        <input type="text" name="usuario">
        <input type="text" name="pass">
        <input type="text" name="email">
        <input type="submit" value="Logearse">
    </form>
    //EL SEGUNDO FORM ES PARA REGISTRARSE
    <form method="post" action="registrar.php">
        <input type="submit" value="Registrarse">
    </form>
    </body>
</html>
