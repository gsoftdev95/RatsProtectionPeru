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
            <h1 class="text-center mb-4">Política de Garantía</h1>
            <p class="lead text-justify">
                En <b>RATS PROTECTION</b> nos preocupamos por la satisfacción de nuestros clientes.  
                Todos nuestros productos cuentan con una <b>garantía de 6 meses</b> contra defectos de fabricación.  
            </p>

            <h3 class="mt-4">¿Qué cubre la garantía?</h3>
            <ul>
                <li>Defectos de fábrica en los materiales.</li>
                <li>Fallas en costuras, cierres o acabados del producto.</li>
                <li>Problemas en el funcionamiento de mecanismos de seguridad.</li>
            </ul>

            <h3 class="mt-4">¿Qué no cubre?</h3>
            <ul>
                <li>Daños ocasionados por uso inadecuado o manipulación indebida.</li>
                <li>Desgaste natural del producto debido al uso diario.</li>
                <li>Reparaciones realizadas por terceros no autorizados.</li>
            </ul>

            <h3 class="mt-4">¿Cómo hacer válida la garantía?</h3>
            <p>
                Para solicitar la garantía debes presentar tu comprobante de compra (boleta o factura) 
                y el producto en cuestión. Escríbenos por WhatsApp para coordinar el proceso.
            </p>

            <p class="mt-4 lead text-justify">
                Nos haremos responsables de su reparación y/o cambio de producto para que cumpla condiciones óptimas de uso.  
            </p>

            <div class="text-center mt-4">
                <a href="https://wa.me/51925850399?text=Hola,%20quiero%20solicitar%20garantía%20de%20mi%20producto" 
                   class="btn btn-success btn-lg" target="_blank">
                    <i class="bi bi-whatsapp"></i> Solicitar Garantía
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
