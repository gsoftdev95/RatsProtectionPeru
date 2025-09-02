<?php
require_once('helpers/dd.php');
require_once('controladores/funciones.php');
require_once('partials/conexionBD.php');

// Verifica que venga de un formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre   = $_POST['nombre'];
    $dni      = $_POST['dni'];
    $correo   = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $producto = $_POST['producto'];
    $tipo     = $_POST['tipo'];
    $detalle  = $_POST['detalle'];
    $pedido  = $_POST['pedido'];

    // Generar código único
    $codigo = strtoupper(uniqid("RCLM-"));

    // Fecha actual
    $fecha = date("Y-m-d H:i:s");

    // Estado inicial
    $estado = "Pendiente";

    // Guardar en la BD
    $stmt = $bd->prepare("INSERT INTO reclamos 
        (codigo_reclamo, nombre, dni, correo, telefono, producto, tipo, detalle, pedido, fecha_reclamo, estado) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
    $stmt->execute([$codigo, $nombre, $dni, $correo, $telefono, $producto, $tipo, $detalle, $pedido, $fecha, $estado]);

    // Redirige a confirmación y evita reenvío
    header("Location: confirmacion_reclamo.php?codigo=".$codigo);
    exit();
} else {
    // Si alguien entra directo a este archivo sin POST
    header("Location: libro_reclamaciones.php");
    exit();
}
