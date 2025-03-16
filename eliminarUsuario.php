<?php
    require_once('controladores/funciones.php');
    require_once('helpers/dd.php');
    controlIngreso();
    require_once('partials/conexionBD.php');
    //controll de accesso por roles
    require_once('controladores/controlAcceso.php');
    
    //controll de accesso por roles
    if (!isset($_SESSION['correo'])) {
        echo "No se ha iniciado sesión.";
        exit; 
    }
    $username = $_SESSION['correo'];
    $usuario = acceso($bd, 'usuariorats', $username);
    verificarAcceso($usuario, [9]);

    $errores=[];
    //Conexión a la base de datos
    require_once('partials/conexionBD.php');

    $id=$_GET['id'];
    //Armado de la sentencia
    $sql = "select * from usuariorats where id=$id";
    //Ejecución de la sentencia
    $query = $bd->prepare($sql);
    $query->execute();
    //Lectura de los datos obtenidos en la sentencia como Array Asociativo
    $usuario = $query->fetch(PDO::FETCH_ASSOC); 

    if($_POST){
        eliminarUsuario($bd,'usuariorats',$_POST);
        header('location:administrarUsuario.php');
    }

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
    
    <div class="container-fluid">
        <section class="col-12 container-fluid m-0 p-0">
            <h2 class="bg-primary-subtle text-primary-emphasis text-center py-5">Eliminar usuario</h2>            
        </section>
        <section class=" col-6 offset-3">
            
            <form action="" method="POST">
                <div class="form-group">                    
                    <label for="id">ID</label>
                    <input type="text" class="form-control" name="id" value="<?= $usuario['id'];?>" readonly>
                    <label for="first_name">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="<?= $usuario['nombre'];?>" readonly>
                    <label for="last_name">Apellido</label>
                    <input type="text" class="form-control" name="apellidos" value="<?= $usuario['apellidos'];?>" readonly>
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="correo" value="<?= $usuario['correo'];?>" readonly>
                    <br>
                    <button type="submit" class="btn btn-primary">Eliminar</button>
                    <a href="administrar.php" class="btn btn-link">Volver al administrador</a>                    
                </div>
            </form>
        </section>            
    </div>
    
    
        
    <footer>
        <?php include_once('./partials/footer.php')?>
    </footer>
        
    
    
    
    <script src="./js/lightbox-plus-jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>