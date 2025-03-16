<?php
require_once('controladores/funciones.php');
require_once('helpers/dd.php');
require_once('partials/conexionBD.php');

    //controll de accesso por roles
    if (!isset($_SESSION['correo'])) {
        echo "No se ha iniciado sesión.";
        exit; 
    }
    $username = $_SESSION['correo'];
    $usuario = acceso($bd, 'usuariorats', $username);
    verificarAcceso($usuario, [9]);

$id = $_GET['id'];
$productos = detalleProducto($bd, $id, 'productos');

if ($_POST) {
    $imagenes_actuales = json_decode($productos['avatar'], true) ?? [];

    // Si se suben nuevas imágenes, las procesamos; si no, mantenemos las actuales
    if (isset($_FILES['avatar']) && !empty($_FILES['avatar']['name'][0])) {
        $imagenes_nuevas = armarLaImagenProducto($_FILES);
        $avatar = json_encode($imagenes_nuevas);
    } else {
        $avatar = json_encode($imagenes_actuales);
    }

    // Asegurar que tipoid se pase correctamente
    $_POST['tipoid'] = isset($_POST['tipoid']) ? intval($_POST['tipoid']) : null;

    modificarProducto($bd, 'productos', $_POST, $avatar);
    header('location:administrarProductos.php');
    exit;
}

$descripcion = isset($productos['descripcion']) ? htmlspecialchars($productos['descripcion']) : '';
$tallas = isset($productos['tallas']) ? implode(',', json_decode($productos['tallas'], true) ?? []) : '';
$especificaciones = isset($productos['especificaciones']) && !empty($productos['especificaciones']) 
    ? implode("\n", json_decode($productos['especificaciones'], true) ?? []) 
    : '';

// Decodificar imágenes
$imagenes = json_decode($productos['avatar'], true) ?? [];
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
        <section class="row">
            <h2 class="bg-primary-subtle text-primary-emphasis text-center py-5">Actualización de datos del producto</h2>            
        </section>
        <section class="col-6 offset-3">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="id">ID</label>
                    <input type="text" class="form-control" name="id" value="<?= $productos['id']; ?>" readonly>
                    
                    <label for="nombreProducto">Nombre del producto</label>
                    <input type="text" class="form-control" name="nombreProducto" value="<?= $productos['nombreProducto']; ?>" required>
                    
                    <label for="categoriaProducto">Categoría del producto</label>
                    <select class="form-select mb-3" name="categoriaProducto" required>
                        <option selected>Elija la categoría</option>
                        <option value="MTB" <?= ($productos['categoriaProducto'] == 'MTB') ? 'selected' : ''; ?>>MTB</option>
                        <option value="BMX" <?= ($productos['categoriaProducto'] == 'BMX') ? 'selected' : ''; ?>>BMX</option>
                        <option value="Roller" <?= ($productos['categoriaProducto'] == 'Roller') ? 'selected' : ''; ?>>Roller</option>
                        <option value="ScooterSkate" <?= ($productos['categoriaProducto'] == 'ScooterSkate') ? 'selected' : ''; ?>>ScooterSkate</option>
                        <option value="Kids" <?= ($productos['categoriaProducto'] == 'Kids') ? 'selected' : ''; ?>>Kids</option>
                        <option value="Extras" <?= ($productos['categoriaProducto'] == 'Extras') ? 'selected' : ''; ?>>Extras</option>
                    </select>

                    <label for="tipoid">Tipo del producto</label>
                    <select class="form-select mb-3" name="tipoid" required>
                        <option value="">Seleccione el tipo</option>
                        <option value="1" <?= ($productos['tipoid'] == 1) ? 'selected' : ''; ?>>1 - Protecciones</option>
                        <option value="2" <?= ($productos['tipoid'] == 2) ? 'selected' : ''; ?>>2 - Ropa</option>
                        <option value="3" <?= ($productos['tipoid'] == 3) ? 'selected' : ''; ?>>3 - Accesorios</option>
                    </select>
                    
                    <label for="precio">Precio del producto</label>
                    <input type="text" class="form-control" name="precio" value="<?= $productos['precio']; ?>" required>
                    
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control" name="descripcion" rows="3" required><?= $descripcion; ?></textarea>
                    
                    <label for="tallas">Tallas disponibles</label>
                    <input type="text" class="form-control" name="tallas" value="<?= $tallas; ?>" placeholder="Ej: S,M,L,XL" required>
                    
                    <label for="especificaciones">Especificaciones</label>
                    <textarea class="form-control" name="especificaciones" rows="3"><?= $especificaciones; ?></textarea>
                    
                    <label>Imágenes actuales:</label>
                    <div class="mb-3">
                        <?php if (!empty($imagenes)): ?>
                            <?php foreach ($imagenes as $imagen): ?>
                                <img src="imgRats/Productos/<?= htmlspecialchars($imagen) ?>" width="100" class="me-2">
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No hay imágenes disponibles para este producto.</p>
                        <?php endif; ?>
                    </div>

                    <label for="avatar">Subir nuevas imágenes (opcional)</label>
                    <input class="form-control" type="file" id="formFile" name="avatar[]" multiple>
                    
                    <button type="submit" class="btn btn-success rounded-0 mt-3">Actualizar</button>
                    <a href="administrarProductos.php" class="btn btn-secondary rounded-0 mt-3">Volver al listado de productos</a>
                </div>
            </form>
        </section>
    </div>

    <footer>
        <?php include_once('./partials/footer.php')?>
    </footer>

    <script src="./js/lightbox-plus-jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
