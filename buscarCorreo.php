<?php
require "conexion.php"; // Archivo con la conexión a la base de datos
$destinatario = trim($_POST['destinatario']);
$mensaje = trim($_POST['mensaje']);
$asunto = trim($_POST['asunto']);
//Redirigir al formulario si algun campo esta vacio
if (empty($destinatario) || empty($mensaje) || empty($asunto)) {
    echo "<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Formulario de envio</title>
    <link rel='stylesheet' type='text/css' media='screen' href='estilos.css'>
    <script src='main.js'></script>
</head>

<body>
    <h1>Enviar  postales</h1>
    <div class='image-container'>
        <div class='image-item'>
            <img src='imagenes/puebloBlanco.jfif' alt='Descripción de la imagen 1'>
            <p>Pueblo blanco</p>
        </div>
        <div class='image-item'>
            <img src='imagenes/papaNoel.jfif' alt='Descripción de la imagen 2'>
            <p>Papa Noel</p>
        </div>
        <div class='image-item'>
            <img src='imagenes/arbolIluminado.jfif' alt='Descripción de la imagen 3'>
            <p>Arbol iluminado</p>
        </div>
        <div class='image-item'>
            <img src='imagenes/arbolNavidad.jfif' alt='Descripción de la imagen 4'>
            <p>Arbol de Navidad</p>
        </div>
        <div class='image-item'>
            <img src='imagenes/portalBelen.jfif' alt='Descripción de la imagen 5'>
            <p>Portal de Belen</p>
        </div>
    </div>
    <form action='enviarCorreo.php' method='post'>";
    if (empty($destinatario)) echo "<p class='mensaje-error'>campo vacio</p>";
    echo "
        <p>Destinatario
            <input type='text' name='destinatario' placeholder='nombre apellido1 apellido2' value='" . $destinatario . "' required>
        </p>
        <p>Mensaje
            <input type='text' name='mensaje' required>
        </p>";
    if (empty($asunto)) echo"<p class='mensaje-error'>campo vacio</p>";
    echo "
        <p>Asunto
            <select name='asunto' required>
                <option value='' disabled selected>Elija una opción</option>
                <option value='cumpleaños'>Felicitar el cumpleaños</option>
                <option value='navidad'>Felicitar la navidad</option>
                <option value='novedades'>Informar sobre las ultimas novedades</option>
            </select>
        </p>";
    if(empty($imagen)) echo"<p class='mensaje-error'>campo vacio</p>";
    echo "
        <p>Imagen
            <select name='imagen'>
                <option value='' disabled selected>Elija una opción</option>
                <option value='papaNoel.jfif'>Papa noel</option>
                <option value='arbolNavidad.jfif'>Arbol de navidad</option>
                <option value='arbolIluminado.jfif'>Arbol iluminado</option>
                <option value='puebloBlanco.jfif'>Pueblo blanco</option>
                <option value='portalBelen.jfif'>portal Belen</option>
            </select>
        </p>
        <input  type='submit' value='enviar'>
    </form>
</body>

</html>";
} else {
    // Convertir el destinatario en un array separado por espacios
    $destinatarioArray = explode(" ", $destinatario);
    //si hay menos de tres redirigimos al formulario
    $count = count($destinatarioArray);
    if ($count === 3) {
        $nombre = $destinatarioArray[0];
        $apellido1 = $destinatarioArray[1];
        $apellido2 = $destinatarioArray[2];
    } elseif ($count === 4) {
        $nombre = "{$destinatarioArray[0]} {$destinatarioArray[1]}";
        $apellido1 = $destinatarioArray[2];
        $apellido2 = $destinatarioArray[3];
    } else {
        echo "el array no tienen tamaño ni tres ni cuatro";
        //header("Location: index.html");
        die;
    }

    try {
        // Preparar la consulta para buscar el correo electrónico en la base de datos
        $stmt = $conexion->prepare("SELECT email FROM clientes WHERE nombre = :nombre AND apellido1 = :apellido1 AND apellido2 = :apellido2");
        // Vincular los valores a los parámetros de la consulta
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':apellido1', $apellido1, PDO::PARAM_STR);
        $stmt->bindParam(':apellido2', $apellido2, PDO::PARAM_STR);
        // Ejecutar la consulta
        $stmt->execute();
        // Obtener el correo del destinatario
        $correo = $stmt->fetchColumn();
    } catch (PDOException $e) {
        // Manejo de errores en caso de problemas con la base de datos
        echo "Error: " . $e->getMessage();
        die;
    }
}
