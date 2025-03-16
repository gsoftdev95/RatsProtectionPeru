<?php
require_once('helpers/dd.php');
require_once('controladores/funciones.php');
controlIngreso();
$errores = [];

if ($_POST) {
    $nombreevento = $_POST['nombreevento'];
    $errores = validarEvento($_POST, $_FILES);

    if (count($errores) === 0) {
        $imgEvento = armarLaImagenEvento($_FILES);
        require_once('partials/conexionBD.php');

        // Guardar el evento
        guardarEvento($bd, 'eventosrats', $_POST, $imgEvento);
        header('location: administrarEventos.php');
        exit(); // Asegúrate de salir después de redirigir
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once('./partials/head.php') ?>
</head>
<body>
    <header>
        <?php include_once('./partials/navBar.php')?>
    </header>
    
    <section class="registro">
        <section class="row container-fluid m-0 p-0">
            <article class="col-12 m-0 p-0">
                <h2 class="bg-primary-subtle text-primary-emphasis text-center py-5" style="font-family: Agency FB;">Agregar evento</h2>
            </article>
        </section>

        <section class="bg-home pt-4">
            <div class="container">
                <div class="row">
                    <div class="col-8 mx-auto">
                        <div class="signup-form">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="text" class="form-control mt-2" name="nombreevento" placeholder="nombre del evento" value="<?= isset($nombreevento) ? $nombreevento : ''; ?>">
                                    <?php if (isset($errores['nombreevento'])): ?>
                                        <div class="text-danger"><?= $errores['nombreevento']; ?></div>
                                    <?php endif; ?>
                                </div>                             
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Imagen del evento</label>
                                    <input class="form-control" type="file" id="formFile" name="imgevento">
                                    <?php if (isset($errores['imgevento'])): ?>
                                        <div class="text-danger"><?= $errores['imgevento']; ?></div>
                                    <?php endif; ?>
                                </div>                                      
                                <div class="form-group mt-2">
                                    <button type="submit" name="submit" class="btn btn-success rounded-0">Registrar</button>
                                    <a class="btn btn-secondary rounded-0" href="./administrarEventos.php">Volver</a>
                                </div>
                            </form>
                        </div>
                    </div>                        
                </div>
            </div>
        </section>
        
    </section>
    
    <footer>
        <?php include_once('./partials/footer.php')?>
    </footer>
</body>
</html>


