<?php
    require_once('controladores/funciones.php');
    require_once('helpers/dd.php');
    controlIngreso();
    //Conexión a la base de datos
    require_once('partials/conexionBD.php');

    //controll de accesso por roles
    if (!isset($_SESSION['correo'])) {
        echo "No se ha iniciado sesión.";
        exit; 
    }
    $username = $_SESSION['correo'];
    $usuario = acceso($bd, 'usuariorats', $username);
    verificarAcceso($usuario, [9]);

    $id=$_GET['id'];

    $team=detalleDeportista($bd,$id,'teamrats'); 


    if ($_POST) {
        // Manejar la nueva imagen si se ha subido
        if (isset($_FILES['imgteamrats']) && $_FILES['imgteamrats']['error'] === 0) {
            $imgteamrats = armarLaImagenDeportista($_FILES);
        } else {
            $imgteamrats = $evento['imgteamrats']; // Mantener la imagen actual si no se subió una nueva
        }
        
        $_POST['imgteamrats'] = $imgteamrats;
        
        
        // Asegúrate de que los nombres coincidan
        modificarDeportista($bd, 'teamrats', $_POST);
        header('location: administrarDeportistas.php');
        exit(); // Asegúrate de salir después de redirigir
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include_once('./partials/head.php')?>
</head>
<body>
    <header>
        <?php include_once('./partials/navBar.php')?>
    </header>
    <div class="container-fluid">        
        <section class="col-12 container-fluid m-0 p-0">
            <h2 class="bg-primary-subtle text-primary-emphasis text-center py-5">Actualización de datos del deportista</h2>            
        </section>
        <section class=" col-6 offset-3">            
            <form action="" method="POST"  enctype="multipart/form-data">
                <div class="form-group">
                    <label for="id">ID</label>
                    <input type="text" class="form-control" name="id" value="<?= $team['idteamrats'];?>" readonly>
                    <label for="first_name">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="<?= $team['nombre'];?>">
                    <label for="last_name">Apellido</label>
                    <input type="text" class="form-control" name="apellido" value="<?= $team['apellido'];?>">
                    <br>                    
                    <label for="avatar">Subir nueva imagen</label>
                    <input class="form-control" type="file" id="formFile" name="imgteamrats" >

                    <button type="submit" class="btn btn-success rounded-0">Actualizar</button>
                    <a href="administrarDeportistas.php" class="btn btn-secondary rounded-0">Volver al administrador</a>
                       
                </div>
            </form>
        </section>            
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
</body>
</html>