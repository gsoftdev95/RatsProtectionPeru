<?php
    require_once('helpers/dd.php');
    require_once('controladores/funciones.php');
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

    <main class="container my-5">
        <section>
            <h1 class="text-center mb-4">Política de Devoluciones</h1>
            <p class="lead text-justify">
                En <b>RATS PROTECTION</b> buscamos que tu experiencia de compra sea siempre satisfactoria.  
                Si no estás conforme con tu producto, puedes solicitar la <b>devolución en un plazo de 7 días calendario</b> 
                desde la fecha de recepción.
            </p>

            <h3 class="mt-4">Condiciones para aceptar la devolución</h3>
            <ul>
                <li>El producto debe estar en perfectas condiciones y sin señales de uso.</li>
                <li>Debe conservar el empaque original y todos sus accesorios.</li>
                <li>Se debe presentar el comprobante de compra (boleta o factura).</li>
                <li>Las devoluciones se hacen siempre y cuando no tengamos la talla que necesite el cliente..</li>
            </ul>

            <h3 class="mt-4">¿Qué productos no aplican para devolución?</h3>
            <ul>
                <li>Productos en promoción o liquidación.</li>
                <li>Artículos personalizados o hechos a medida.</li>
                <li>Productos dañados por uso inadecuado.</li>
            </ul>

            <h3 class="mt-4">Proceso de devolución</h3>
            <p>
                Para iniciar el proceso de devolución, por favor escríbenos por WhatsApp indicando 
                tu número de pedido y el motivo de la devolución. Nuestro equipo te guiará paso a paso.
            </p>

            <div class="text-center mt-4">
                <a href="https://wa.me/51925850399?text=Hola,%20quiero%20realizar%20una%20devolución%20de%20mi%20pedido" 
                   class="btn btn-danger btn-lg" target="_blank">
                    <i class="bi bi-whatsapp"></i> Solicitar Devolución
                </a>
            </div>
        </section>
    </main>

    <footer>
        <?php include_once('./partials/footer.php')?>
    </footer>

    <script src="./js/lightbox-plus-jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
