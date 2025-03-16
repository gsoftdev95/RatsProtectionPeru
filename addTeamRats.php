<?php
    require_once('helpers/dd.php');
    require_once('controladores/funciones.php');
    controlIngreso();
    $errores = [];
    if($_POST){
        //dd($_FILES);
        $nombre = $_POST['nombre'];
        $apellido =  $_POST['apellido'];
        //Validación del team
        $errores = validarTeam($_POST,$_FILES);

        if(count($errores)===0){
            // Obtener el nombre del avatar
            $imgteamrats = armarLaImagenTeam($_FILES);
            //Conectar con la base de datos
            require_once('partials/conexionBD.php');
                    
            //Guardar al usuario
            //dd($_POST);
            guardarTeam($bd, 'teamrats', $_POST, $imgteamrats);
            header('location: administrarDeportistas.php');
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
        <section class=" row container-fluid m-0 p-0">
            <article class="col-12 m-0 p-0">
                <h2 class="bg-primary-subtle text-primary-emphasis text-center py-5" style="font-family: Agency FB;">Registrar deportista</h2>
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
                                    <input type="text" class="form-control mt-2" name="apellido" placeholder="Apellido" value="<?=isset($apellido)? $apellido : '';?>">
                                </div>                                
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Avatar</label>
                                    <input class="form-control" type="file" id="formFile" name="imgteamrats">
                                </div>                                      
                                <div class="form-group  mt-2">
                                    <button type="submit" name="submit" class="btn btn-success rounded-0">Registrar</button>
                                    <a class="btn btn-secondary rounded-0" href="./administrarDeportistas.php">Volver</a>
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