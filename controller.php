<?php
require_once("coleccion.php"); // Cambia esto por el nombre de tu archivo de funciones

if (isset($_POST['insert'])) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $region = $_POST['region'];
    $tipo = implode(", ", $_POST['tipo']); // Si 'tipo' es un array de tipos

    // Manejar la carga del archivo
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        $rutaCarpetaDestino = "imagenes/";  // Asegúrate de que esta carpeta existe en tu servidor
        $nombreArchivo = basename($_FILES["imagen"]["name"]);
        $rutaArchivoFinal = $rutaCarpetaDestino . $nombreArchivo;

        // Asegúrate de validar y sanear el nombre del archivo aquí

        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaArchivoFinal)) {
            // El archivo se cargó correctamente, proceder a guardar en la base de datos
            $resultado = insertPokemons($nombre, $descripcion, $rutaArchivoFinal, $region, $tipo);

        }
    }
}

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $region = $_POST['region'];
    $tipo = implode(", ", $_POST['tipo']); // Si 'tipo' es un array de tipos
    echo "<pre>";
print_r($_POST);
echo "</pre>";

    // Manejar la carga del archivo
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        $rutaCarpetaDestino = "imagenes/";  // Asegúrate de que esta carpeta existe en tu servidor
        $nombreArchivo = basename($_FILES["imagen"]["name"]);
        $rutaArchivoFinal = $rutaCarpetaDestino . $nombreArchivo;

        // Asegúrate de validar y sanear el nombre del archivo aquí

        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaArchivoFinal)) {
            // El archivo se cargó correctamente, proceder a guardar en la base de datos
            $resultado = editPokemon($id, $nombre, $descripcion, $rutaArchivoFinal, $region, $tipo);

        }
    }
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $resultado = deletePokemon($id);
}




?>