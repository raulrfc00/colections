<?php
require_once("coleccion.php"); 

if (isset($_POST['insert'])) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $region = $_POST['region'];
    $tipo = implode(", ", $_POST['tipo']); // Si 'tipo' es un array de tipos

    // Manejar la carga del archivo
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        $rutaCarpetaDestino = "imagenes/";  
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
    $tipo = implode(", ", $_POST['tipo']); 
    //echo "<pre>";
    //print_r($_POST);
    //echo "</pre>";


    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        $rutaCarpetaDestino = "imagenes/";  
        $nombreArchivo = basename($_FILES["imagen"]["name"]);
        $rutaArchivoFinal = $rutaCarpetaDestino . $nombreArchivo;


        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaArchivoFinal)) {
            // El archivo se cargó correctamente, proceder a guardar en la base de datos
            $resultado = editPokemon($id, $nombre, $descripcion, $rutaArchivoFinal, $region, $tipo);

        }
    }
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    deletePokemon($id);
    //echo "<pre>";
    //print_r($_POST);
    //echo "</pre>";
}
?>