<?php
    require_once('controladores/funciones.php');
    require_once('helpers/dd.php');
    controlIngreso();    
    require_once('partials/conexionBD.php');
    //controll de accesso por roles
    require_once('controladores/controlAcceso.php');
    
    $id = $_GET['id'];
    $evento = detalleEvento($bd, $id, 'eventosrats');
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
    
    <div class="container-fluid m-0 p-0">
        <section class="col-12 container-fluid m-0 p-0">
            <h2 class="bg-primary-subtle text-primary-emphasis text-center py-5">Datos del evento</h2>            
        </section>
        <section class="row container-fluid m-0 p-0">
            <div><a href="administrarEventos.php" class="btn btn-secondary rounded-0 m-2 w-5">Volver</a></div>
            <article class="col-4 offset-2 pt-4 w-50">
                <h4>ID: <?= $evento['idevento'];?> </h4> 
                <br>           
                <h4>Nombre: <?= $evento['nombreevento'];?></h4>    
                <br>
                <figure> 
                    <img class="w-50" src="./imgRats/Eventos/<?=$evento['imgevento'] ?>" alt="<?= $evento['nombreevento'];?>" > 
                </figure>
            </article> 
            <div><a href="administrarEventos.php" class="btn btn-secondary rounded-0 m-2 w-5">Volver</a></div> 
        </section>        
             
    </div>

    <footer>
        <?php include_once('./partials/footer.php')?>
    </footer>


    <script src="./js/lightbox-plus-jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>    
   