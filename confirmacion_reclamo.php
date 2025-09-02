<?php
$codigo = $_GET['codigo'] ?? null;
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
    <div class="alert alert-success">
        <h4>✅ Reclamo registrado con éxito</h4>
        <p>Su código de reclamo es:</p>
        <h3 class="text-primary"><?= htmlspecialchars($codigo) ?></h3>
        <p>Guarde este código para realizar seguimiento en nuestra plataforma.</p>
    </div>

    <a href="index.php" class="btn btn-primary">Volver al inicio</a>
</main>

<footer>
    <?php include_once('./partials/footer.php')?>
</footer>
</body>
</html>
