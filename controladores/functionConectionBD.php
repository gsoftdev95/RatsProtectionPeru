<?php
function conexion($host, $db, $users, $password) {
    try {
        $bd = new PDO("mysql:host=$host;dbname=$db", $users, $password);
        return $bd;
    } catch (PDOException $e) {
        echo "¡Error!: " . $e->getMessage() . "<br/>" . "<hr/>";
        exit();
    }
}
?>
