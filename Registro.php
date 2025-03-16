<?php
ob_start(); // Inicia el almacenamiento en búfer
require_once('helpers/dd.php');
require_once('controladores/funciones.php');

$errores = [];
if ($_POST) {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];

    // Validación del usuario
    $errores = validarUsuario($_POST, $_FILES);
    if (count($errores) === 0) {
        // Conectar con la base de datos
        require_once('partials/conexionBD.php');
        
        // Guardar al usuario
        guardarUsuario($bd, 'usuariorats', $_POST);
        enviarCorreo($_POST);
        header('location: IniciarSesion.php');
        exit(); // Asegúrate de usar exit después de header
    }
}
ob_end_flush(); // Envía el contenido del búfer al navegador
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
        <section class=" row container-fluid m-0 p-0">
            <article class="col-12 m-0 p-0">
                <h2 class="bg-black text-white bg-info text-center container-fluid pt-5 m-0" style="font-family: Agency FB;">Registro de usuarios</h2>
            </article>
        </section>

        <section class="bg-home pt-4">
            <div class="container">
                <div class="row" >
                    <div class="col-8 mx-auto">


                        <div class="signup-form">
                            <?php if(count($errores)>0) :?>
                                <ul class="alert alert-danger">
                                <?php foreach ($errores as $key => $error) : ?>
                                    <li><?= $error?></li>
                                <?php endforeach;?>
                            </ul>
                            <?php endif; ?>
                            

                            <form action="" method="POST" enctype="multipart/form-data" >
                                <div class="form-group">
                                    <input type="text" class="form-control mt-2" name="nombre" placeholder="Nombre" value="<?= isset($nombre)?$nombre : '';?>" >
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control mt-2" name="apellidos" placeholder="Apellido" value="<?=isset($apellidos)? $apellidos : '';?>"
>
                                </div>	
                                <div class="form-group">
                                    <input type="text" class="form-control mt-2" name="correo" placeholder="Email" value="<?=isset($correo) ? $correo : '';?>"
>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control mt-2" name="password" placeholder="Contraseña" >
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control mt-2" name="confirm_password" placeholder="Confirma Contraseña" >
                                </div>                                       
                                <div class="form-group  mt-2">
                                    <button type="submit" class="btn btn btn-dark rounded-0">Registrar</button>
                                    <a  class="btn btn-danger mx-2" href="./IniciarSesion.php">Volver</a>
                                </div>
                            </form>
                            
                        </div>
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