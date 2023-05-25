<?php
global $conexion;
session_start();
require '../config/conexion.php';
/* Lógica para guardar los datos de un propósito */
if ($_POST["accion"] == "Guardar") {
    $proposito = $_POST["proposito"];
    $vencimiento = $_POST["vencimiento"];
    $idProposito = $_POST["id_proposito"];

    if ($idProposito != "") {
        $query = "UPDATE propositos SET proposito = '$proposito', vencimiento = '$vencimiento' WHERE id = $idProposito";
        $resultado = mysqli_query($conexion, $query);
        if ($resultado) {
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                if (move_uploaded_file($_FILES['imagen']['tmp_name'], "../img/prop" . $idProposito . ".png")) {
                    header("location: ../proposito/index.php");
                    exit;
                }
            }
            header("location: ../proposito/index.php");
        } else {
            echo "Ha ocurrido un error: " . mysqli_error($conexion);
        }
    } else {
        $idUsuario = $_SESSION["id"];
        $query = "INSERT INTO propositos (id_usuario, proposito, vencimiento) VALUES ($idUsuario, '$proposito', '$vencimiento')";
        $resultado = mysqli_query($conexion, $query);
        if ($resultado) {
            $idNuevoProposito = mysqli_insert_id($conexion);
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                if (move_uploaded_file($_FILES['imagen']['tmp_name'], "../img/prop" . $idNuevoProposito . ".png")) {
                    header("location: ../proposito/index.php");
                    exit;
                }
            }
            header("location: ../proposito/index.php");
        } else {
            echo "Ha ocurrido un error: " . mysqli_error($conexion);
        }
    }
} else {
    header("location: ../proposito/index.php");
    exit;
}

mysqli_close($conexion);
?>
