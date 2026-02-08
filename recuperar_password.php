<?php
    require_once('helpers/dd.php');
    require_once('controladores/funciones.php');
    require_once('partials/conexionBD.php');
    $errores = [];
    $mensaje = "";

    if ($_POST) {
        $correo = $_POST['correo'];

        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $errores['correo'] = 'Correo inválido';
        }

        if (empty($errores)) {

            $usuario = buscarPorEmail($bd, 'usuariorats', $correo);

            // Mensaje neutro (seguridad)
            $mensaje = "Si el correo existe, te enviaremos un enlace de recuperación.";

            if ($usuario) {
                crearTokenRecuperacion($bd, $usuario);
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include_once('./partials/head.php')?>
    </head>
<body>
    
    <section class="recuperarContainer">
        <div class="recuperarInner">
            <div><img src="./imagenes/logo negro sin fondo.png" alt=""></div>
            <h3><i>¿Has olvidado tu contraseña?</i></h3>
            <p>Ingresa tu correo electronico y te enviaremos las instrucciones</p>

            <?php if ($mensaje): ?>
                <div class="mensaje-recuperacion">
                    <?= htmlspecialchars($mensaje) ?>
                </div>
            <?php endif; ?>

            <form method="post" action="">
                <input type="email" class="form-control" name="correo" placeholder="correo electronico" required>
                <button type="submit">Enviar enlace</button>
            </form>
        </div>        
    </section>

    <footer>
        <?php include_once('./partials/footer.php')?>
    </footer>
    
    
    
    <script src="./js/lightbox-plus-jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <?php if ($mensaje): ?>
        <script>
            setTimeout(() => {
                window.location.href = "index.php";
            }, 30000); // 30 segundos
        </script>
    <?php endif; ?>


</body>
</html>