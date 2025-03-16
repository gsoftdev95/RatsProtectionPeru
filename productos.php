<?php
require_once('helpers/dd.php');
require_once('controladores/funciones.php');
require_once('partials/conexionBD.php');

// Captura la categoría de la URL
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';

// Valida que la categoría no esté vacía
if (!empty($categoria)) {
    // Obtén los productos de la categoría
    $productos = obtenerProductosPorCategoria($bd, $categoria);
} else {
    $productos = []; // Si no hay categoría, no muestra productos
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once('./partials/head.php')?>
</head>
<body>
    <header>
        <?php include_once('./partials/navBar.php')?>
    </header>
    <aside class="ratswsp m-auto p-0">
        <a href="https://wa.me/+51925850399"  target="_blank">
            <div id="iconratswsp"><span class="icon-whatsapp"></span></div>
            <div id="ratswsptexto">¿Necesitas ayuda?</div>
        </a>
    </aside>

    <section class="containerIMGCategory">
        <?php if ($categoria == 'MTB'): ?>
            <img src="./imagenes/fotoPortadaMTB.png" alt="Portada MTB" class="IMGCategoryCover">
        <?php elseif ($categoria == 'BMX'): ?>
            <img src="./imagenes/fotoPortadaBMX.png" alt="Portada BMX" class="IMGCategoryCover">
        <?php elseif ($categoria == 'Roller'): ?>
            <img src="./imagenes/rollerPortada.png" alt="Portada Roller" class="IMGCategoryCover">
        <?php elseif ($categoria == 'ScooterSkate'): ?>
            <img src="./imagenes/fotoPortadaSkate.png" alt="Portada Roller" class="IMGCategoryCover">
        <?php elseif ($categoria == 'Kids'): ?>
            <img src="./imagenes/kidsPortada.jpg" alt="Portada Roller" class="IMGCategoryCover">
        <?php elseif ($categoria == 'Extras'): ?>
            <img src="./imagenes/fotoPortadaExtras.png" alt="Portada Roller" class="IMGCategoryCover">
        <?php else: ?>
            <img src="./imagenes/fotoPortadaGenerica.png" alt="Portada Generica" class="IMGCategoryCover">
        <?php endif; ?>
    </section>
    
    <div class="containerItemProducto">
        <?php if (!empty($productos)): ?>
            <?php foreach ($productos as $producto): ?>
                <?php 
                // Decodificar el JSON de avatar
                $imagenes = json_decode($producto['avatar'], true);

                // Validar si es un array y contiene al menos una imagen
                if (is_array($imagenes) && count($imagenes) > 0) {
                    $primeraImagen = htmlspecialchars($imagenes[0]);
                } else {
                    $primeraImagen = 'default.jpg'; // Imagen por defecto
                }
                ?>
                <div class="cajaItemProducto">
                    <a href="productoCategoria.php?id=<?= $producto['id'] ?>">
                        <div class="img-container">
                            <?php 
                            // Decodificar el JSON de avatar
                            $imagenes = json_decode($producto['avatar'], true);
                            // Obtener la primera imagen
                            $primeraImagen = is_array($imagenes) && count($imagenes) > 0 ? htmlspecialchars($imagenes[0]) : 'default.jpg';
                            // Obtener la segunda imagen
                            $segundaImagen = is_array($imagenes) && count($imagenes) > 1 ? htmlspecialchars($imagenes[1]) : 'default.jpg';
                            ?>
                            <img class="img-default" src="imgRats/Productos/<?= $primeraImagen ?>" alt="<?= htmlspecialchars($producto['nombreProducto']) ?>">
                            <img class="img-hover" src="imgRats/Productos/<?= $segundaImagen ?>" alt="<?= htmlspecialchars($producto['nombreProducto']) ?>">
                        </div>
                        <div class="cajaItemProductoText"><?= htmlspecialchars($producto['nombreProducto']) ?></div>
                    </a>                    
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay productos disponibles en esta categoría.</p>
        <?php endif; ?>
    </div>


    <?php include_once('./partials/bottomNavBar.php')?>

    <footer>
        <?php include_once('./partials/footer.php')?>
    </footer>

    <script src="./js/lightbox-plus-jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
