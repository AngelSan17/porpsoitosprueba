<?php
require '../config/conexion.php';
/* Lógica para eliminar los datos de un propósito */

$idProposito = $_GET["id"];

$query = "DELETE FROM propositos WHERE id = $idProposito";
$resultado = mysqli_query($conexion,  $query);

if ($resultado) {
    header("location: ../propositos/index.php");
} else {
    echo "Ha ocurrido un error: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>
