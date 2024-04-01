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
        function selectTipos()
        {
            $conexion = openBd();

            $sentenciaText = "select * from pokemon_tipos";

            $sentencia = $conexion->prepare($sentenciaText);
            $sentencia->execute();

            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);

            $conexion = closeBd();

            return $resultado;
        }
        function asignarTipo($id)
        {
            $conexion = openBd();
            $sentenciaText = "SELECT t.nombre 
                                    FROM tipos t 
                                    INNER JOIN pokemon_tipos pt ON t.id = pt.tipo_id 
                                    WHERE pt.pokemon_id = ?
                ";
    
            $sentencia = $conexion->prepare($sentenciaText);
            $sentencia->execute([$id]);
            
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

        function editPokemon($id, $nombre, $descripcion, $imagen, $region, $tipo) {

                $conexion = openBd(); 
        
               
                $sentenciaText = "UPDATE pokemons SET nombre = :nombre, descripcion = :descripcion, imagen = :imagen, region = :region, tipo = :tipo WHERE id = :id";
                $sentencia = $conexion->prepare($sentenciaText);
        
                // Vincular los parámetros
                $sentencia->bindParam(':id', $id);
                $sentencia->bindParam(':nombre', $nombre);
                $sentencia->bindParam(':descripcion', $descripcion);
                $sentencia->bindParam(':imagen', $imagen);
                $sentencia->bindParam(':region', $region);
                $sentencia->bindParam(':tipo', $tipo);
        
                // Ejecutar la sentencia
                $sentencia->execute();
        
                closeBd($conexion); 
        
        }
        function deletePokemon($id) {

            $conexion = openBd(); 
    
            
            $sentenciaText = "DELETE FROM pokemons WHERE id = :id";
            $sentencia = $conexion->prepare($sentenciaText);
    
            // Vincular los parámetros
            $sentencia->bindParam(':id', $id);
    
            // Ejecutar la sentencia
            $sentencia->execute();
    
            closeBd($conexion); 
    
    }

    
    ?>
</body>
</html>