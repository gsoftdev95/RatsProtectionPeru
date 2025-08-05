<?php
require_once('helpers/dd.php');
require_once('controladores/funciones.php');
require_once('partials/conexionBD.php');

//controll de accesso por roles
require_once('controladores/controlAcceso.php');
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

    <aside class="ratswsp m-auto p-0">
        <a href="https://wa.me/+51925850399" target="_blank">
            <div id="iconratswsp"><span class="icon-whatsapp"></span></div>
            <div id="ratswsptexto">Realiza tu pedido con nosotros</div>
        </a>
    </aside>

    <section class="bodyAdministrator container-fluid m-0 p-0">
        <div class="welcomeAdminText bg-primary-subtle text-center mb-5 mt-0 mx-0 py-5">
            Hola <?= htmlspecialchars($_SESSION['nombre']) ?>!, bienvenido al modo administrador 
        </div>

        <!-- Opciones de administración -->
        <div class="optionAdmin mt-3">
            <a class="text-decoration-none text-dark d-flex" href="administrarUsuario.php">
                <span class="icon-user-tie"></span>
                <p class="ps-4">Ver usuarios</p>
            </a>
        </div>

        <div class="optionAdmin mt-3">
            <a class="text-decoration-none text-dark d-flex" href="administrarProductos.php">
                <img src="./iconos/externos/cajas.ico" alt="">
                <p class="ps-3">Administrar Productos</p>
            </a>
        </div>

        <div class="optionAdmin mt-3">
            <a class="text-decoration-none text-dark d-flex" href="administrarDeportistas.php">
                <img src="./iconos/externos/team.png" alt="" >
                <p class="ps-3">Administrar Team rats</p>
            </a>
        </div>

        <div class="optionAdmin mx-auto  mt-3">
            <a class="text-decoration-none text-dark d-flex" href="administrarEventos.php">
                <span class="icon-calendar"></span>
                <p class="ps-4">Administrar Eventos</p>
            </a>
        </div>
    </section>

    <footer>
        <?php include_once('./partials/footer.php')?>
    </footer>

    <script src="./js/lightbox-plus-jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
