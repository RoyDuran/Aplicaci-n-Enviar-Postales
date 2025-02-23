<?php
try {
    // Crear una instancia de PDO
    $conexion = new PDO("mysql:host=localhost;dbname=clientes;charset=utf8", "root", "");

    // Configurar el modo de error de PDO a excepciones
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}
?>