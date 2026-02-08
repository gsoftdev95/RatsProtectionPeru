<?php
http_response_code(503); // Servicio no disponible
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>En mantenimiento</title>
    <link rel="stylesheet" href="./css/estilosRatsgrid.css">
</head>
<body class="bg-light">

<div class="containerMantenimiento">
    <div>
        <h1 class="titleMant" id="titulo"><i>PAGINA EN MANTENIMIENTO</i></h1>

        <p class="" id="mensaje">
            Sobrino, estamos mejorando la página en este momento.            
            <br><br>
            ¡Volveremos pronto!
        </p>
    </div>
</div>


<script>
// Contador de recargas usando sessionStorage
let recargas = sessionStorage.getItem('recargas') ? parseInt(sessionStorage.getItem('recargas')) : 0;

recargas++;
sessionStorage.setItem('recargas', recargas);

const mensaje = document.getElementById('mensaje');

if(recargas === 2) {
    mensaje.innerHTML = "Sobrino, ¿que te he dicho?";
} else if(recargas >= 3) {
    mensaje.innerHTML = "papi, ¿yo hablo chino?";
}
</script>

</body>
</html>
