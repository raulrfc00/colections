<?php
require_once("./coleccion.php");

if (isset($_POST['insert'])) {
    
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $imagen = $_FILES['imagen'];
    $region = $_POST['region'];
    $tipo = $_POST['tipo'];

    // Aquí deberías añadir el código para manejar la carga de la imagen
    // Por ahora, usaré una ruta de imagen genérica
    $imagen = 'ruta/a/tu/imagen.jpg';

    insertPokemons($nombre, $descripcion,$imagen, $region, $tipo);

    header('Location: ./bd.php')
}


?>