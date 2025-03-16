<?php
    require_once('controladores/funciones.php');
    require_once('helpers/dd.php');
    controlIngreso();
    require_once('partials/conexionBD.php');
    
    $id = $_GET['id'];
    $team = detalleDeportista($bd, $id, 'teamrats');
    //dd($usuario);
    //controll de accesso por roles
    if (!isset($_SESSION['correo'])) {
        echo "No se ha iniciado sesión.";
        exit; 
    }
    $username = $_SESSION['correo'];
    $usuario = acceso($bd, 'usuariorats', $username);
    verificarAcceso($usuario, [9]);
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
            <h2 class="bg-primary-subtle text-primary-emphasis text-center py-5">Datos del deportista</h2>
        </section>
        <section class="row container-fluid m-0 p-0"> 
            <div><a href="administrarDeportistas.php" class="btn btn-secondary rounded-0 m-2 w-5">Volver</a></div>         
            <article class="col-4 offset-2 pt-4 w-50">                
                <h4>ID: <?= $team['idteamrats'];?> </h4> 
                <br>           
                <h4>Nombre: <?= $team['nombre'];?></h4>    
                <br>        
                <h4>Apellido: <?= $team['apellido'];?></h4>
                <br>
                <figure> 
                    <img class="w-50" src="./imgRats/Team/<?=$team['imgteamrats'] ?>" alt="<?= $team['nombre'];?>" > 
                </figure>                
            </article>
            <div><a href="administrarDeportistas.php" class="btn btn-secondary rounded-0 m-2 w-5">Volver</a></div>         
        </section>
        
             
    </div>

    <footer>
        <?php include_once('./partials/footer.php')?>
    </footer>


    <script src="./js/lightbox-plus-jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>    
   