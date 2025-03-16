<?php
    require_once('controladores/funciones.php');
    require_once('helpers/dd.php');
    controlIngreso();
    // Conexión a la base de datos
    require_once('partials/conexionBD.php');
    //controll de accesso por roles
    if (!isset($_SESSION['correo'])) {
        echo "No se ha iniciado sesión.";
        exit; 
    }
    $username = $_SESSION['correo'];
    $usuario = acceso($bd, 'usuariorats', $username);
    verificarAcceso($usuario, [9]);

    $id = $_GET['id'];

    $evento = detalleEvento($bd, $id, 'eventosrats');

    if ($_POST) {
        // Manejar la nueva imagen si se ha subido
        if (isset($_FILES['imgevento']) && $_FILES['imgevento']['error'] === 0) {
            $imgEvento = armarLaImagenEvento($_FILES);
        } else {
            $imgEvento = $evento['imgevento']; // Mantener la imagen actual si no se subió una nueva
        }
        
        $_POST['imgevento'] = $imgEvento;
        
        
        // Asegúrate de que los nombres coincidan
        modificarEvento($bd, 'eventosrats', $_POST);
        header('location: administrarEventos.php');
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
    <div class="container-fluid m-0 p-0">        
        <section class="col-12 container-fluid m-0 p-0">
            <h2 class="bg-primary-subtle text-primary-emphasis text-center py-5">Actualización de datos del evento</h2>            
        </section>
        <section class="col-6 offset-3">            
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="id">ID</label>
                    <input type="text" class="form-control" name="idevento" value="<?= $evento['idevento'];?>" readonly>
                    <label for="first_name">Nombre</label>
                    <input type="text" class="form-control" name="nombreevento" value="<?= $evento['nombreevento'];?>">
                    <br>
                    <label for="avatar">Subir nueva imagen</label>
                    <input class="form-control" type="file" id="formFile" name="imgevento" >

                    <button type="submit" class="btn btn-success rounded-0">Actualizar</button>
                    <a href="administrarEventos.php" class="btn btn-secondary rounded-0">Volver al administrador</a>
                       
                </div>
            </form>
        </section>            
    </div>

    <script src="./js/lightbox-plus-jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>