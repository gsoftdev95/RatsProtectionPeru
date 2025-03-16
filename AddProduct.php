<?php
require_once('helpers/dd.php');
require_once('controladores/funciones.php');
require_once('partials/conexionBD.php');
controlIngreso();
$errores = [];
if ($_POST) {
    $nombreProducto = $_POST['nombreProducto'];
    $categoriaProducto = $_POST['categoriaProducto'];
    $precio = $_POST['precio'];
    $tallas = isset($_POST['tallas']) ? implode(",", $_POST['tallas']) : "";
    $descripcion = $_POST['descripcion'];
    $tipoid = isset($_POST['tipoid']) ? (int)$_POST['tipoid'] : null; // Convertir a entero

    // Validación de tipoid: Solo puede ser 1, 2 o 3
    if (!in_array($tipoid, [1, 2, 3])) {
        $errores[] = "El ID de la categoría debe ser 1 (Protecciones), 2 (Ropa) o 3 (Accesorios).";
    }

    $errores = array_merge($errores, validarProducto($_POST, $_FILES));

    if (count($errores) === 0) {
        $avatar = armarLaImagenProducto($_FILES);
        require_once('partials/conexionBD.php');
        guardarProducto($bd, 'productos', $_POST, $avatar);
        header('location: administrarProductos.php');
    }
}
?>

<!doctype html>
<html lang="es">
<head>
    <?php include_once('./partials/head.php') ?>
</head>
<body>
    <header>
        <?php include_once('./partials/navBar.php')?>
    </header>

    <div class="container-fluid">    
        <section class="row">
            <h2 class="display-4 bg-primary-subtle text-primary-emphasis text-center py-5">Agregar Producto</h2>            
        </section>
        <section class="bg-home pt-4">
            <div class="container">
                <div class="row">
                    <div class="col-8 mx-auto bg-light">
                        <div class="signup-form">
                            <?php if (count($errores) > 0) : ?>
                                <ul class="alert alert-danger">
                                    <?php foreach ($errores as $error) : ?>
                                        <li><?= $error ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <select class="form-select my-3" name="categoriaProducto">
                                    <option selected>Elija la categoria</option>
                                    <option value="MTB">MTB</option>
                                    <option value="BMX">BMX</option>
                                    <option value="Roller">Roller</option>
                                    <option value="ScooterSkate">ScooterSkate</option>
                                    <option value="Kids">Kids</option>
                                    <option value="Extras">Extras</option>
                                </select>
                                <div class="form-group my-3">
                                    <select class="form-select" name="tipoid" required>
                                        <option value="">Seleccione el ID de la categoría</option>
                                        <option value="1" <?= isset($tipoid) && $tipoid == 1 ? 'selected' : '' ?>>1 - Protecciones</option>
                                        <option value="2" <?= isset($tipoid) && $tipoid == 2 ? 'selected' : '' ?>>2 - Ropa</option>
                                        <option value="3" <?= isset($tipoid) && $tipoid == 3 ? 'selected' : '' ?>>3 - Accesorios</option>
                                    </select>
                                </div>
                                <div class="form-group my-3">
                                    <input type="text" class="form-control" name="nombreProducto" placeholder="Nombre del Producto" value="<?= isset($nombreProducto) ? $nombreProducto : ''; ?>">
                                </div>
                                <div class="form-group my-3">
                                    <input type="text" class="form-control" name="precio" placeholder="Precio del Producto Ejm: 24.90" value="<?= isset($precio) ? $precio : ''; ?>">
                                </div>
                                <div class="form-group my-3 ms-3">
                                    <b>Selecciona las tallas disponibles:</b><br>
                                    <div class="d-flex">
                                        <div class="me-3"><input type="checkbox" name="tallas[]" value="S"> S</div>
                                        <div class="me-3"><input type="checkbox" name="tallas[]" value="S/M"> S/M</div>
                                        <div class="me-3"><input type="checkbox" name="tallas[]" value="M"> M</div>
                                        <div class="me-3"><input type="checkbox" name="tallas[]" value="M/L">M/L</div>
                                        <div class="me-3"><input type="checkbox" name="tallas[]" value="L"> L</div>
                                        <div class="me-3"><input type="checkbox" name="tallas[]" value="L/XL"> L/XL</div>
                                        <div class="me-3"><input type="checkbox" name="tallas[]" value="XL"> XL</div>
                                    </div> 
                                    <div class="d-flex">
                                        <div class="me-3"><input type="checkbox" name="tallas[]" value="8"> 8</div>
                                        <div class="me-3"><input type="checkbox" name="tallas[]" value="10"> 10</div>
                                        <div class="me-3"><input type="checkbox" name="tallas[]" value="12"> 12</div>
                                        <div class="me-3"><input type="checkbox" name="tallas[]" value="14"> 14</div>
                                        <div class="me-3"><input type="checkbox" name="tallas[]" value="16"> 16</div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="me-3"><input type="checkbox" name="tallas[]" value="28"> 28</div>
                                        <div class="me-3"><input type="checkbox" name="tallas[]" value="30"> 30</div>
                                        <div class="me-3"><input type="checkbox" name="tallas[]" value="32"> 32</div>
                                        <div class="me-3"><input type="checkbox" name="tallas[]" value="34"> 34</div>
                                        <div class="me-3"><input type="checkbox" name="tallas[]" value="36"> 36</div>
                                    </div>  
                                    <input type="checkbox" name="tallas[]" value="Extra oficio"> Extra oficio
                                    <input type="checkbox" name="tallas[]" value="Estandar regulable"> Estandar regulable
                                    <input type="checkbox" name="tallas[]" value="Estandar"> Estandar 
                                </div>
                                <div class="my-3">
                                    <label for="formFile" class="form-label">Imágenes del Producto</label>
                                    <input class="form-control" type="file" id="formFile" name="avatar[]" multiple>
                                </div>
                                <div class="form-group my-3">
                                    <input type="text" class="form-control" name="descripcion" style="height: 5rem;" placeholder="Descripción del Producto" value="<?= isset($descripcion) ? $descripcion : ''; ?>">
                                </div>
                                <div class="form-group my-3">
                                    <label>Especificaciones (una por línea)</label>
                                    <textarea class="form-control" name="especificaciones" rows="5" placeholder="Ingrese las especificaciones aquí, una por línea"></textarea>
                                </div>
                                <div class="form-group my-3">
                                    <button type="submit" class="btn btn-success rounded-0">Registrar</button>
                                    <a class="btn btn-secondary rounded-0" href="./administrarProductos.php">Volver</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
        
    <footer>
        <?php include_once('./partials/footer.php'); ?>
    </footer>
</body>
</html>
