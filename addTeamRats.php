<?php
    require_once('helpers/dd.php');
    require_once('controladores/funciones.php');

    controlIngreso();
    $errores = [];
    $exito = false;
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
            $exito = true; 
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
    
    <main class="mainAdmin">
        <!-- Sidebar -->
        <?php include_once('./partials/asideAdmin.php')?>
        
        <section class="registro container-fluid">
            <section class="row">
                <h2 class="display-4 bg-primary-subtle text-primary-emphasis text-center py-5">Registrar deportista</h2>            
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
                                <?php if ($exito): ?>
                                        <div class="alert alert-success text-center">
                                            El producto fue agregado correctamente.  
                                            Serás redirigido en unos segundos…
                                        </div>

                                        <script>
                                            setTimeout(() => {
                                                window.location.href = "administrar.php";
                                            }, 3000); // 3 segundos
                                        </script>
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
                                        <a class="btn btn-secondary rounded-0" href="./detalleDeportista.php">Volver</a>
                                    </div>
                                </form>
                                
                            </div>
                        </div>                        
                        </div>
                    </div>
                </div>
            </section>
            
        </section>
    
    </main>
    
    
    <footer>
        <?php include_once('./partials/footer.php')?>
    </footer>
</body>
</html>