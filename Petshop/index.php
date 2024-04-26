<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programacion II Parcial 1</title>
    <link rel="stylesheet" href="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/style.css">
    
</head>
<body class="">

    <header>
      <nav class="container-fluid d-flex flex-wrap align-items-center justify-content-center py-3 mb-4 bg-warning">
        <div class="col-md-3 mb-2 mb-md-0">
          <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none fs-5">
            PetShop
          </a>
        </div>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 text-black">Home</a></li>
          <li><a href="#" class="nav-link px-2 text-black">Productos</a></li>
          <li><a href="#" class="nav-link px-2 text-black">Servicios</a></li>
          <li><a href="#" class="nav-link px-2 text-black">Tiendas</a></li>
        </ul>

        <div class="col-md-3 text-end"> 
          <button type="button" class="btn btn-outline-dark me-2">Login</button>
        </div>
      </nav>
    </header>
  
    <main>
        <?php
            require __DIR__ . "/views/home.php";
        ?>

    </main>

    <footer>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>