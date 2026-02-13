<?php
    require_once('controladores/funciones.php');
    require_once('helpers/dd.php');
    controlIngreso();
    require_once('partials/conexionBD.php');
    //controll de accesso por roles
    require_once('controladores/controlAcceso.php');
    
    $id=$_GET['id'];
    
    $usuario = detalleUsuario($bd, $id, 'usuariorats');
    //dd($usuario);
?>
<!DOCTYPE html>
<html lang="es">
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

        <div class="container-fluid">
            <section class="row">
                <h2 class="display-4 bg-primary-subtle text-primary-emphasis text-center py-5">Datos del cliente</h2>            
            </section>


            <section class="containerInfo" >            
                <div class="containerInfoInner">
                    <h5 class=" mb-0 fw-bolder">ID:</h5>  
                    <p><?= $usuario['id'];?> </p>
                    <hr>
                    
                    <h5 class=" mb-0 fw-bolder">Nombre del cliente:</h5>
                    <?= $usuario['nombre'];?>
                    <hr>

                    <h5 class=" mb-0 fw-bolder">Apellidos del cliente:</h5>
                    <?= $usuario['apellidos'];?>
                    <hr>

                    <h5 class=" mb-0 fw-bolder">Categoria del producto:</h5> 
                    <?= $usuario['correo'];?>
                    <hr>

                    <h5 class=" mb-0 fw-bolder">Tipo del producto:</h5> 
                    <?= $usuario['perfil'];?>
                    <hr>
                </div>
            </section>
            
            <div><a href="administrar.php" class="btn btn-secondary rounded-0 m-2 w-5">Volver</a></div> 
        </div>
    </main>

    

    <footer>
        <?php include_once('./partials/footer.php')?>
    </footer>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
</body>
</html>    
   