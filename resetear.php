<?php

require_once('helpers/dd.php');
require_once('controladores/funciones.php');
require_once('partials/conexionBD.php');

$errores = [];

if (!isset($_GET['token']) || empty($_GET['token'])) {
    die('Acceso no permitido');
}

$token = $_GET['token'];

$sql = "SELECT pr.*, u.id AS usuario_id
        FROM password_resets pr
        INNER JOIN usuariorats u ON pr.usuario_id = u.id
        WHERE pr.token = ?
        AND pr.expira_en >= NOW()
        AND pr.usado = 0";

$stmt = $bd->prepare($sql);
$stmt->execute([$token]);
$reset = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$reset) {
    die('El enlace es inválido o ya expiró');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $password  = trim($_POST['password']);
    $password2 = trim($_POST['password2']);

    if (empty($password) || empty($password2)) {
        $errores[] = 'Completa ambos campos';
    }

    if ($password !== $password2) {
        $errores[] = 'Las contraseñas no coinciden';
    }

    if (strlen($password) < 6) {
        $errores[] = 'La contraseña debe tener al menos 6 caracteres';
    }

    if (count($errores) === 0) {

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // actualizar password
        $stmt = $bd->prepare("UPDATE usuariorats SET password = ? WHERE id = ?");
        $stmt->execute([$passwordHash, $reset['usuario_id']]);

        // marcar token como usado
        $stmt = $bd->prepare("UPDATE password_resets SET usado = 1 WHERE id = ?");
        $stmt->execute([$reset['id']]);

        header('Location: iniciarsesion.php?reset=ok');
        exit();
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once('./partials/head.php') ?>
</head>
<body>
    <header>
        <?php include_once('./partials/navBar.php')?>
    </header>

    <section class="container mt-5">
        <h2>Restablecer contraseña</h2>

        <?php if ($errores): ?>
            <?php foreach ($errores as $error): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endforeach; ?>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="Nueva contraseña">
            </div>

            <div class="form-group mb-3">
                <input type="password" name="password2" class="form-control" placeholder="Confirmar contraseña">
            </div>

            <button type="submit" class="btn btn-dark">Actualizar contraseña</button>
        </form>
    </section>  
    

    <footer>
        <?php include_once('./partials/footer.php')?>
    </footer>



    <!--visulizar contraseña-->
    <script src="./js/viewPassword.js"></script>
</body>
</html>