<?php
require_once('helpers/dd.php');
require_once('controladores/funciones.php');
require_once('partials/conexionBD.php');

$team = obtenerTeam($bd,'teamrats'); // Asegúrate de pasar la conexión a la base de datos

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
    
    <aside class="ratswsp">
        <a href="https://wa.me/+51925850399"  target="_blank">
            <div id="iconratswsp"><span class="icon-whatsapp"></span></div>
            <div id="ratswsptexto">Realiza tu pedido con nosotros</div>
        </a>
    </aside>

    <section class="container-fluid">
        <section class="bodyTeamRats">
            <section class="ContainerTeamRats ">
                <?php foreach ($team as $miembro): ?>
                    <div class="TeamBox ">
                        <img src="./imgRats/Team/<?= htmlspecialchars($miembro['imgteamrats']); ?>" alt="<?= htmlspecialchars($miembro['nombre']); ?>">
                        <div class="nameteam"><i><?= htmlspecialchars($miembro['nombre']) . ' ' . htmlspecialchars($miembro['apellido']); ?></i></div>
                    </div>
                <?php endforeach; ?>
            </section>
        </section>
    </section>
    
    <footer>
        <?php include_once('./partials/footer.php')?>
    </footer>
    <script src="./js/lightbox-plus-jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>