<?php
    require_once('helpers/dd.php');
    require_once('controladores/funciones.php');
    //Determina si el usuario está o no logueado (sesión o cookie)

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
        <section class="text-center">
            <h1 class="mb-4">Centro de Ayuda</h1>
            <p class="lead">
                ¿Tienes dudas, problemas con tu compra o necesitas asistencia?  
                Nuestro equipo está listo para ayudarte en todo momento.
            </p>

            <div class="mt-4">
                <a href="https://wa.me/51925850399?text=Necesito%20ayuda,%20tengo%20un%20problema" class="btn btn-success btn-lg" target="_blank">
                    <i class="bi bi-whatsapp"></i> Escríbenos por WhatsApp
                </a>
            </div>

            <p class="mt-3 text-muted">
                Atención disponible de <b>Lunes a Sábado</b>, de <b>9:00 am a 7:00 pm</b>.
            </p>
        </section>
    </main>

    <footer>
        <?php include_once('./partials/footer.php')?>
    </footer>

    <script src="./js/lightbox-plus-jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
