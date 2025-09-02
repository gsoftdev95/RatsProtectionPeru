<?php
    require_once('controladores/funciones.php');
    require_once('helpers/dd.php');
    require_once('partials/conexionBD.php');
    //controll de accesso por roles
    require_once('controladores/controlAcceso.php');
    
    $id=$_GET['id'];
    
    $reclamos = detalleReclamos($bd, $id, 'reclamos');
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

        <div class="container-fluid m-0 p-0">
            <section class="col-12 container-fluid m-0 p-0">
                <h2 class="bg-primary-subtle text-primary-emphasis text-center py-5">Datos del producto</h2>            
            </section>
            <div class="m-5 w-25"><a href="administrar.php" class="btn btn-secondary rounded-0 W-25">Volver</a></div>
            <section class="row d-flex flex-row container-fluid m-0 p-0" >            
                <div class="col-4 offset-2 pt-4 w-50 ">
                    <h5 class="mt-4 mb-0 fw-bolder">ID:</h5>  <?= $reclamos['id'];?> 
                    <br>
                    <h5 class="mt-4 fw-bolder">Codigo del reclamo:</h5> <?= $reclamos['codigo_reclamo'];?>
                    <br> 
                    <h5 class="mt-4 fw-bolder">Fecha del reclamo:</h5> <?= $reclamos['fecha_reclamo'];?>
                    <br> 
                    <h5 class="mt-4 fw-bolder">Nombre del reclamante:</h5> <?= $reclamos['nombre'];?>
                    <br>        
                    <h5 class="mt-4 fw-bolder">Dni del reclamante:</h5> <?= $reclamos['dni'];?>
                    <br>
                    <h5 class="mt-4 fw-bolder">Correo del reclamante:</h5> <?= $reclamos['correo'];?>
                    <br>
                    <h5 class="mt-4 fw-bolder">Telefono del reclamante:</h5> <?= $reclamos['telefono'];?>
                    <br>
                    <h5 class="mt-4 fw-bolder">Producto o servicio</h5> <?= $reclamos['producto'];?>
                    <br>
                    <h5 class="mt-4 fw-bolder">Detalle del reclamo:</h5> <?= $reclamos['detalle'];?>
                    <br>
                    <h5 class="mt-4 fw-bolder">Pedido del cliente:</h5> <?= $reclamos['pedido'];?>
                    <br>
                    <h5 class="mt-4 fw-bolder">Estado del reclamo:</h5> <?= $reclamos['estado'];?>
                    <br>             
                </div>
            </section>
            <div class="m-5 w-25"><a href="administrar.php" class="btn btn-secondary rounded-0 W-25">Volver</a></div>
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

