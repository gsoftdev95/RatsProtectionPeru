<?php
    session_start();
    //Cerrar o destruir la sesión del usuario que ingreso al sistema
    session_destroy();
    //Eliminar las cookies
    setcookie('correo', null, time() -1);    
    header('location:index.php');
?>