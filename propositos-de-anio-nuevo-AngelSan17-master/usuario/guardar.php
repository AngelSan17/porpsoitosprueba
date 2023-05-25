<?php
/*Lógica para guardar los datos de un nuevo usuario*/
require '../config/conexion.php';
$email = $_POST["email"];
$name = $_POST["name"];
$pass1 = $_POST["pass1"];
$pass2 = $_POST["pass2"];
$resul = mysqli_query($conexion, "select nombre from usuarios where email='" . $email . "'");
if (mysqli_num_rows($resul) == 0) {
    $res = mysqli_query($conexion, "insert into usuarios (email,nombre,password,creacion) values ('" . $email . "','" . $name . "','" . md5($pass1) . "',NOW())") or exit(mysqli_error($conexion));
    if ($res) {
        $result = mysqli_query($conexion, "select id from usuarios order by id DESC limit 1");
        if (mysqli_num_rows($result) > 0) {
            $fila = mysqli_fetch_assoc($result);
            if (move_uploaded_file($_FILES['fotografia']['tmp_name'], "../img/image_" . $fila["id"] . ".png")) {
                header("location: ../index.php");
                echo "s" . $fila["id"];
            } else {
                echo "fail";
            }
        }
    } else {
        echo "fail2";
    }
}
header("location: ../index.php");
?>
