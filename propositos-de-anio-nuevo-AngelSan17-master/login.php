<?php
require './config/conexion.php';

$email = $_POST["email"];
$pass = $_POST["pass"];

$resul = mysqli_query($conexion, "SELECT nombre, id, email FROM usuarios WHERE email = '".$email."' AND password = '".md5($pass)."'");

if (mysqli_num_rows($resul) > 0) {
    $fila = mysqli_fetch_assoc($resul);
    session_start();
    $_SESSION["user"] = $fila["nombre"];
    $_SESSION["id"] = $fila["id"];
    $_SESSION["email"] = $fila["email"];
    header("Location: proposito/index.php");
} else {
    header("Location: index.php");
}
?>
