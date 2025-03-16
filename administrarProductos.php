<?php
    require_once('helpers/dd.php');
    require_once('controladores/funciones.php');
    //Determina si el usuario está o no logueado (sesión o cookie)
    controlIngreso();
    require_once('partials/conexionBD.php');
    //controll de accesso por roles
    require_once('controladores/controlAcceso.php');

    if($_GET &&  trim($_GET['busqueda']) != ''){
        $producto = buscarProductos($bd, 'productos', $_GET['busqueda'], $_GET['tipoBusqueda']);
    }else{
        $producto = listarProductos($bd, 'productos');
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
    
    <section class="container-fluid m-0 p-0">
        <article class="col-12 container-fluid m-0 p-0">
            <h2 class="bg-primary-subtle text-primary-emphasis text-center py-5">Administrar productos</h2>
        </article>
        <article class=" col-12 ">
            <section class="container-fluid d-flex justify-content-between">
                <form class="formularioAdministracion mt-3 mb-4" role="search" action="#" method="GET" >
                    <input class="form-control me-2" type="search" placeholder="Buscador..." aria-label="Search" name="busqueda">
                    <select name="tipoBusqueda" id="tipoBusqueda">
                    <option  class="m-1" value="nombreProducto">Por nombre</option>
                    <option  class="m-1" value="categoriaProducto">Por categoria</option>
                    </select>
                    <button class="btn btn-success rounded-0 m-1" type="submit">Buscar</button>
                    <div class="form-group">                    
                        <a  class="btn btn-secondary rounded-0" href="./administrar.php">Volver</a>
                    </div>
                </form>
                <div class="mx-2 mt-3 "><a class="text-decoration-none text-dark" href="AddProduct.php"><span class="icon-plus"></span> Agregar producto</a></div> 
            </section>

               

            <!-- <h4 ><a class="pl-3" href="incluirUsuario.php"><ion-icon name="person-add-outline"></ion-icon></a></h4> -->
            <table class="tableAdministracion table table-striped-columns text-primary-emphasis containerfluid">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Nombre Producto</th>
                        <th class="text-center">Categoria</th>
                        <th class="text-center">Precio</th>
                        <th class="text-center">Ver</th>
                        <th class="text-center">Editar</th>
                        <th class="text-center">Eliminar</th>    
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($producto as $id => $productos) :?>
                        <tr>
                            <td class="text-center text-primary-emphasis"><?= $productos['id'] ?></td>
                            <td class="text-primary-emphasis"><?= $productos['nombreProducto']?></td>
                            <td class="text-center text-primary-emphasis"><?= $productos['categoriaProducto']?></td>
                            <td class="text-center text-primary-emphasis"><?= $productos['precio']?></td>
                            <!-- Envío de ID por Query String -->
                            <td class="text-center text-primary-emphasis"><a href="detalleProducto.php?id=<?= $productos['id'];?>"><span class="icon-eye"></span></a></td>
                            <!-- Envío de ID por Query String -->
                            <td class="text-center text-primary-emphasis"><a href="modificarProducto.php?id=<?= $productos['id'];?>"><span class="icon-pencil"></span></a></td>
                            <!-- Envío de ID por Query String -->
                            <td class="text-center text-primary-emphasis"><a href="eliminarProducto.php?id=<?= $productos['id'];?>"><span class="icon-bin2"></span></a></td>
                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
        </article>
    </section>
    
    
        
    <footer>
        <?php include_once('./partials/footer.php')?>
    </footer>
        
    
    
    
    <script src="./js/lightbox-plus-jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>