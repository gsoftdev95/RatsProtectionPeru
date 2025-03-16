<?php
    require_once('controladores/funciones.php');
    require_once('helpers/dd.php');
    //controll de accesso por roles    
    require_once('partials/conexionBD.php');
    require_once('controladores/controlAcceso.php');

    $id=$_GET['id'];
    //Armado de la sentencia
    $sql = "select * from productos where id=$id";
    //Ejecución de la sentencia
    $query = $bd->prepare($sql);
    $query->execute();
    //Lectura de los datos obtenidos en la sentencia como Array Asociativo
    $productos = $query->fetch(PDO::FETCH_ASSOC); 

    if($_POST){
        eliminarProducto($bd,'productos',$_POST);
        header('location:administrarProductos.php');
    }


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

    <div class="container-fluid">
        <section class="col-12 container-fluid m-0 p-0">
            <h2 class="bg-primary-subtle text-primary-emphasis text-center py-5">Eliminar producto</h2>            
        </section>
        <section class=" col-6 offset-3">
            
            <form action="" method="POST">
                <div class="form-group">
                    
                <label for="id">ID</label>
                    <input type="text" class="form-control" name="id" value="<?= $productos['id'];?>" readonly>
                    <label for="nombreProducto">Nombre del producto</label>
                    <input type="text" class="form-control" name="nombreProducto" value="<?= $productos['nombreProducto'];?>">
                    <label for="categoriaProducto">Categoria del producto</label>
                    <input type="text" class="form-control" name="categoriaProducto" value="<?= $productos['categoriaProducto'];?>">
                    <br>
                    <button type="submit" class="btn btn-danger rounded-0">Eliminar</button>
                    <a href="administrarProductos.php" class="btn btn-secondary rounded-0">Volver al administrador</a>                       
                </div>
            </form>
        </section>            
    </div>

    <script src="./js/lightbox-plus-jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>