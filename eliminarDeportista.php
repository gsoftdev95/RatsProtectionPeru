 <?php
    require_once('controladores/funciones.php');
    require_once('helpers/dd.php');    
    controlIngreso();
    require_once('partials/conexionBD.php');
    //controll de accesso por roles
    require_once('controladores/controlAcceso.php');
    $errores = [];
    
    $id=$_GET['id'];
    //Armado de la sentencia
    $sql = "select * from teamrats where idteamrats=$id";
    //Ejecución de la sentencia
    $query = $bd->prepare($sql);
    $query->execute();  
    //Lectura de los datos obtenidos en la sentencia como Array Asociativo
    $team = $query->fetch(PDO::FETCH_ASSOC); 

    if($_POST){
        eliminarDeportista($bd,'teamrats',$_POST);
        header('location:administrarDeportistas.php');
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
    <div class="container-fluid m-0 p-0">
        <section class="col-12 container-fluid m-0 p-0">
            <h2 class="bg-primary-subtle text-primary-emphasis text-center py-5">Eliminar deportista</h2>            
        </section>
        <section class=" col-6 offset-3">
            
            <form action="" method="POST">
                <div class="form-group">
                    
                <label for="id">ID</label>
                <input type="text" class="form-control" name="id" value="<?= $team['idteamrats'];?>" readonly>
                <label for="nombreProducto">Nombre del producto</label>
                <input type="text" class="form-control" name="nombre" value="<?= $team['nombre'];?>">
                <label for="categoriaProducto">Categoria del producto</label>
                <input type="text" class="form-control" name="apellido" value="<?= $team['apellido'];?>">
                <br>
                <button type="submit" class="btn btn-danger rounded-0">Eliminar</button>
                <a href="administrarDeportistas.php" class="btn btn-secondary rounded-0">Volver al administrador</a>                       
                </div>
            </form>
        </section>
            
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
</body>
</html>