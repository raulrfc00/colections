<?php

require_once("./bd.php");

$pokemons = selectPokemons();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>

      <div id="formAnyadir" style="display: none;" enctype="multipart/form-data">
          <form action="controller.php" method="post" >
          <div class="form-floating mb-3">
              <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del Pokémon" required>
              <label for="nombre">Nombre</label>
          </div>
          
          <div class="form-floating mb-3">
              <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Descripción del Pokémon" style="height: 100px" required></textarea>
              <label for="descripcion">Descripción</label>
          </div>

          <!-- Tipos de Pokémon como checkboxes -->
          <div class="mb-3">
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="tipo[]" id="tipoFuego" value="Fuego">
                  <label class="form-check-label" for="tipoFuego">Fuego</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="tipo[]" id="tipoPlanta" value="Planta">
                  <label class="form-check-label" for="tipoPlanta">Planta</label>
              </div>
          </div>

          <div class="form-floating mb-3">
              <input type="file" class="form-control" name="imagen" id="imagen" placeholder="Imagen del Pokémon" required>
              <label for="imagen">Imagen</label>
          </div>

          <div class="form-floating mb-3">
              <input type="text" class="form-control" name="region" id="region" placeholder="Región del Pokémon" required>
              <label for="region">Región</label>
          </div>

          <button name="insert" type="submit" class="btn btn-primary">Agregar Pokémon</button>
      </form>
</div>


    <div id="cartas" class="container mt-4">
        <div class="row">
            <?php foreach ($pokemons as $pokemon) { ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="imagenes/<?php echo $pokemon['nombre']; ?>.jpg" class="card-img-top img-fluid" alt="Imagen de <?php echo $pokemon['nombre']; ?>">
                        <div class="card-body d-flex flex-column">
                            <div class="flex-grow-1">
                                <h5 class="card-title"><?php echo $pokemon['nombre']; ?></h5>
                                <p class="card-text"><?php echo $pokemon['descripcion']; ?></p>
                            </div>
                            <a href="#" id="anyadirButton" class="btn btn-primary mt-2" >Añadir Cromo</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>


        <script>
            document.getElementById('anyadirButton').addEventListener('click', function() {
                document.getElementById('formAnyadir').style.display = 'block';
                document.getElementById('cartas').style.display = 'none';
              
            });
        </script>
    
      </div>

</body>
</html>