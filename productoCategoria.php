<?php
require_once('helpers/dd.php');
require_once('controladores/funciones.php');
require_once('partials/conexionBD.php');

// Verifica si se recibe un ID por GET
$idProducto = isset($_GET['id']) ? $_GET['id'] : null;

if (!$idProducto) {
    echo "Producto no encontrado.";
    exit;
}

// Obtiene los datos del producto
$producto = obtenerProductoPorId($bd, $idProducto);

if (!$producto) {
    echo "Producto no encontrado.";
    exit;
}

// Decodifica el JSON de imágenes
$imagenes = !empty($producto['avatar']) ? json_decode($producto['avatar'], true) : [];
// Decodifica el JSON de especificaciones
$especificaciones = !empty($producto['especificaciones']) ? json_decode($producto['especificaciones'], true) : [];
// Decodifica el JSON de tallas
$tallas = !empty($producto['tallas']) ? json_decode($producto['tallas'], true) : [];
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

    <aside class="ratswsp">
        <a href="https://wa.me/+51925850399" target="_blank">
            <div id="iconratswsp"><span class="icon-whatsapp"></span></div>
            <div id="ratswsptexto">Realiza tu pedido con nosotros</div>
        </a>
    </aside>

    <section class="container-fluid" style="background-color: #f2f2f2;height:auto; margin-bottom: 100px;">
        <section class="containerProducto">
            <section class="ContainerImagProducto">
                <?php if (!empty($imagenes) && is_array($imagenes)): ?>
                    <?php foreach ($imagenes as $index => $imagen): ?>
                        <a href="imgRats/Productos/<?= htmlspecialchars($imagen) ?>" data-lightbox="models">
                            <img src="imgRats/Productos/<?= htmlspecialchars($imagen) ?>" alt="<?= htmlspecialchars($producto['nombreProducto']) ?>">
                        </a>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No hay imágenes disponibles para este producto.</p>
                <?php endif; ?>
            </section>       

            <section class="informacionProducto">
                <section class="informacionProductoSub">
                    <div id="titulo" class="titulo"><b><?= htmlspecialchars($producto['nombreProducto']) ?></b></div>
                    <div id="categoria"><b>Categoría:</b> <?= htmlspecialchars($producto['categoriaProducto']) ?></div>
                    <div id="precio">S/. <?= number_format($producto['precio'], 2) ?></div>
                    <div id="talla">
                        <b>Tallas:</b><br>
                        <div class="containerTalla">
                            <?php if (!empty($tallas) && is_array($tallas)): ?>
                                <?php foreach ($tallas as $talla): ?>
                                    <div class="talla-box"> <?= htmlspecialchars($talla) ?> </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="talla-box">Única</div>
                            <?php endif; ?> 
                        </div>
                    </div>
                    <div id="descripcion">
                        <b>Descripción:</b><br>
                        <div>
                            <?= nl2br(htmlspecialchars($producto['descripcion'])) ?>
                        </div>
                    </div> 
                    <?php if (!empty($especificaciones) && is_array($especificaciones) && array_filter($especificaciones)): ?>
                        <div id="especificaciones">
                            <b>Especificaciones:</b><br>
                            <ul>
                                <?php foreach ($especificaciones as $especificacion): ?>
                                    <li><?= htmlspecialchars($especificacion) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif;?>
                </section>

                <section class="postVenta">
                    <ul>
                        <li><img src="./iconos/externos/moto.png" alt="" >Delivery S/.15 todo Lima</li>
                        <li><img src="./iconos/externos/world.png" alt="" >Envíos a nivel nacional e internacional</li>
                        <li><span class="icon-checkmark"></span>¿No te queda bien? Cambiamos tu producto por otra talla.</li>
                    </ul>
                    <a href="https://wa.me/+51925850399" class="text-decoration-none">
                        <div class="bg-dark p-2 text-center m-auto"><u>Realizar pedido </u><span class="icon-cart"></span></div>
                    </a>
                </section>               
            </section>
            
        </section>
    </section>

    <footer>
        <?php include_once('./partials/footer.php')?>
    </footer>

    <script src="./js/lightbox-plus-jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
