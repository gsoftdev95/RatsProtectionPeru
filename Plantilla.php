<?php

    require_once('helpers/dd.php');
    require_once('controladores/funciones.php');
    //Determina si el usuario está o no logueado (sesión o cookie)
    controlIngreso();    
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
    
    
    
    
        
    <footer>
        <?php include_once('./partials/footer.php')?>
    </footer>
        
    
    
    
    <script src="./js/lightbox-plus-jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>