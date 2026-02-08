<?php
require_once('helpers/dd.php');
require_once('controladores/funciones.php');
require_once('partials/conexionBD.php');

// Verifica que el cliente esté logueado
if (!isset($_SESSION['correo'])) {
    header('Location: login.php');
    exit;
}
//dd($_SESSION['correo']);
$emailUsuario = $_SESSION['correo'];

$usuario = obtenerUsuarioPorId($bd, $emailUsuario);
//$pedidos = obtenerPedidosPorUsuario($bd, $emailUsuario);
?>

<!doctype html>
<html lang="es">
<head>
    <?php include_once('./partials/head.php')?>
</head>
<body>    
    
    <header>
        <?php include_once('./partials/navBar.php')?>
    </header>

    
    <main class="container containerPerfil mt-4 mb-5">
        <h1 class="mb-4 perfilTitle">Mi Perfil</h1>

        <div class="sectionPerfil mb-4">
            <div class="perfilSectionUser">
                <h5 class="card-title mb-3">Información personal</h5>
                <p><strong>Nombre:</strong> <?= $usuario['nombre'] . ' ' . $usuario['apellidos'] ?></p>
                <p><strong>Email:</strong> <?= $usuario['correo'] ?></p>
                <!-- <p><strong>Celular:</strong> <?= $usuario['celular'] ?></p>-->
                <!-- <p><strong>Dirección:</strong> <?= $usuario['direccion'] ?></p>-->
                <!-- <p><strong>Fecha de creación:</strong> <?= date('d/m/Y', strtotime($usuario['fecha_creacion'])) ?></p> -->
            </div>
        </div>

        <div class="sectionPerfil mb-4">
            <div class="card-body">
                <h5 class="card-title">Mis Pedidos</h5>
                <p>Coming soon</p>
            </div>
        </div>
        
        <div class="sectionPerfil">
            <div class="card-body">
                <p>Para actualización de datos comunicarse con atención al cliente</p>            </div>
            </div>
        </div>
    </main>
    
    <section class="botNavInner">
        <?php include_once('./partials/bottomNavBar.php')?>
    </section>

    <footer>
        <?php include_once('./partials/footer.php')?>
    </footer>





    <!--Boostrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

</body>
</html>