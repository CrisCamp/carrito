<?php 
  include ("../bd/bd.php");
  session_start();
  if(!isset($_SESSION['usuario'])){
    header("Location:../index.php");
  }else if ($_SESSION['tipo'] == 0){
    header("Location:../principal.php");
  }
?>
<!doctype html>
<html lang="en">
<head>
  <title>Administrador del sitio web</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>    
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="index.php">
          <img src="../img/Ceti.webp" alt="logo" style="width:40px;">
        </a>
        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <div class="dropdown show">
                    <!-- para dar el efecto de la clase nav-link es necesario agregarlo junto a las demas clases eliminando el diseño del boton inicial -->
                    <a class="btn nav-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Productos
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="productos">CRUD</a>
                    </div>
                  </div>
                </li>              
                <li class="nav-item">
                  <a class="nav-link" href="../cerrar.php">Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </nav>
  </header>
  <main class = "container">
  <br/>
<br/>
  <div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
      <h1 class="display-5 fw-bold">Bienvenido</h1>
      <p class="col-md-8 fs-4">El sistema de administración de la página hará posible al administrador realizar algunas acciónes necesarias para cambiar elmentos del template principal</p>
      <!-- <button class="btn btn-primary btn-lg" type="button">Example button</button> -->
    </div>
  </div>
</main> <!--este main inicia al final de header-->
  <footer>  
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>