<?php
    require_once('controladores/funciones.php');
    require_once('helpers/dd.php');
    require_once('partials/conexionBD.php');
    //controll de accesso por roles
    require_once('controladores/controlAcceso.php');
    
    $id=$_GET['id'];
    
    $productos = detalleProducto($bd, $id, 'productos');
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
            <h2 class="bg-primary-subtle text-primary-emphasis text-center py-5">Datos del producto</h2>            
        </section>
        <div class="m-5 w-25"><a href="administrarProductos.php" class="btn btn-secondary rounded-0 W-25">Volver</a></div>
        <section class="row d-flex flex-row container-fluid m-0 p-0" >            
            <div class="col-4 offset-2 pt-4 w-50 ">
                <h5 class="mt-3 mb-0 fw-bolder">ID:</h5>  <?= $productos['id'];?> 
                <br>           
                <h5 class="mt-3 mb-0 fw-bolder">Nombre del producto:</h5> <?= $productos['nombreProducto'];?>
                <br>        
                <h5 class="mt-3 mb-0 fw-bolder">Categoria del producto:</h5> <?= $productos['categoriaProducto'];?>
                <br>
                <h5 class="mt-3 mb-0 fw-bolder">Tipo del producto:</h5> <?= $productos['tipoid'];?>
                <br>
                <h5 class="mt-2 fw-bolder">Fecha de creacion:</h5> <?= $productos['fecha_creacion'];?>
                <br>
                <h5 class="mt-2 fw-bolder">Precio</h5> <?= $productos['precio'];?>
                <br>
                <h5 class="mt-2 fw-bolder">Tallas:</h5> <?= $productos['tallas'];?>
                <br> 
                <h5 class="mt-2 fw-bolder">Descripción:</h5> <?= $productos['descripcion'];?>
                <br>                
                <div class="pt-4">
                    <h5 class="mt-2 fw-bolder">Especificaciones:</h5>
                    <div>
                        <?php
                        if (!empty($productos['especificaciones'])) {
                            // Decodificar JSON a array
                            $especificacionesArray = json_decode($productos['especificaciones'], true);

                            if (is_array($especificacionesArray)) {
                                foreach ($especificacionesArray as $especificacion) {
                                    echo "<li>" . htmlspecialchars(trim($especificacion)) . "</li>";
                                }
                            } else {
                                echo "<p>Error al leer las especificaciones.</p>";
                            }
                        } else {        
                            echo "<p>No hay Especificaciones del producto.</p>";
                        }
                        ?>
                    </div>
                </div>               
            </div>
            <div class=" col-4 offset-2 pt-4 w-50">
                <h5 class="mt-2 fw-bolder">Imágenes del Producto:</h5>
                <div class="d-flex flex-wrap">
                    <?php if (!empty($productos['imagenes']) && is_array($productos['imagenes'])): ?>
                        <?php foreach ($productos['imagenes'] as $imagen): ?>
                            <figure class="m-2">
                                <img class="w-100" src="./imgRats/Productos/<?= $imagen ?>" alt="<?= $productos['nombreProducto']; ?>" style="max-width: 150px; max-height: 150px;">
                            </figure>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No hay imágenes disponibles.</p>
                    <?php endif; ?>
                </div>
            </div >                
        </section>
        <div class="m-5 w-25"><a href="administrarProductos.php" class="btn btn-secondary rounded-0 W-25">Volver</a></div>
        
             
    </div>

    <footer>
        <?php include_once('./partials/footer.php')?>
    </footer>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
</body>
</html>    
   