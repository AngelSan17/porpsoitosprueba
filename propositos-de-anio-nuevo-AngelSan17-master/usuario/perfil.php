<?php session_start();
if(!isset($_SESSION["user"])){
    header("location: ../index.php");}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Propósitos</title>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
</head>

<body>

<?php require '../config/nav.php' ?>

<div class="container">

    <h1>Perfil</h1>

    <form method="post" action="actualizar.php" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Actuarlizar</button>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <img src="../img/image_<?php echo $_SESSION["id"];?>.png" class="img-thumbnail">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" name="email" class="form-control-plaintext" value="<?php echo $_SESSION["email"];?>" readonly>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="name" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Contraseña</label>
                    <input type="password" name="pass1" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Confirmar</label>
                    <input type="password" name="pass2" class="form-control">
                </div>
            </div>
        </div>
    </form>

</div>

<script>
    $(document).ready(function(){
        $("button[type=submit]").click(function (e){
            if ($("input[name='pass1']").val() == "" || $("input[name='pass2']").val() == "" || $("input[name='name']").val() == ""){
                e.preventDefault();
            }
            if ($("input[name='pass1']").val() != $("input[name='pass2']").val()){
                $("input[name='pass1']").css("border", "solid red");
                $("input[name='pass2']").css("border", "solid red");
                e.preventDefault();
            }
        });
    });
</script>
</body>
</html>

</script>
</body>
</html