<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function openBd()
        {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "pokedex";


            $conexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->exec("set names utf8");

            return $conexion;
        }

        function closeBd()
        {
            return null;
        }

        function selectPokemons()
        {
            $conexion = openBd();

            $sentenciaText = "select * from pokemons";

            $sentencia = $conexion->prepare($sentenciaText);
            $sentencia->execute();

            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);

            $conexion = closeBd();

            return $resultado;
        }

        function insertPokemons($nombre, $descripcion, $imagen, $region, $tipo)
        {
            $conexion = openBd();

            $sentenciaText = "insert INTO pokemons (nombre, descripcion, imagen, region, tipo) values (:nombre, :descripcion, :imagen, :region, :tipo)";
            $sentencia = $conexion->prepare($sentenciaText);
            $sentencia->bindParam(':nombre', $nombre);
            $sentencia->bindParam(':descripcion', $descripcion);
            $sentencia->bindParam(':imagen', $imagen);
            $sentencia->bindParam(':region', $region);
            $sentencia->bindParam(':tipo', $tipo);
            $sentencia->execute();


            $conexion = closeBd();
        }

        function deleteCiudades()
        {
            $conexion = openBd();

            $sentenciaText = "delete from pokemons where cif = :cif";
            $sentencia = $conexion->prepare($sentenciaText);
            $sentencia->bindParam(':cif', $cif);
            $sentencia->execute();


            $conexion = closeBd();
        }
    ?>
</body>
</html>