<?php 
    session_start();
    if(isset($_SESSION['usuario']) && $_SESSION['tipo'] == 0){
        header("Location:./principal.php");
    }else if(isset($_SESSION['usuario']) && $_SESSION['tipo'] == 1){
        header("Location:./admin/index.php");
    }
    if($_POST){
        include("bd/bd.php"); // archivo de conexion
        $usuario = (isset($_POST['usuario']))?$_POST['usuario']:"";
        $password = (isset($_POST['password']))?$_POST['password']:"";
        $sentencia=$conexion->prepare("SELECT *, count(*) as n_usuario 
        FROM tbl_usuarios WHERE usuario = :usuario AND password = :password");
        //donde encuentres usuario pon la varible $usuario en la sentencia de arriba
        $sentencia->bindParam(":usuario",$usuario);
        //donde encuentres password pon la varible $password en la sentencia de arriba
        $sentencia->bindParam(":password",$password);
        //Ejecutar
        $sentencia->execute();
        $lista_usuarios=$sentencia->fetch(PDO::FETCH_LAZY);
        if($lista_usuarios['n_usuario']>0){
            // print_r("el usuario y contraseña existe");
            if($lista_usuarios['tipo'] == 0){
                header("Location:./principal.php");
            }else if($lista_usuarios['tipo'] == 1){
                header("Location:./admin/index.php");
            }else{
                $mensaje = "Error: El usuario no puede existir";
            }
            // Declaracion de variables de session
            $_SESSION['usuario'] = $lista_usuarios['usuario'];
            $_SESSION['tipo'] = $lista_usuarios['tipo'];
            $_SESSION['logueado'] = true;            
        }else{
            $mensaje = "Error: El usuario o la contraseña No existe";
        }
    }
?>

<!doctype html>
<html lang="en">

<head>
  <title>Login</title>
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
  <header>
  </header>
  <main>
    <div class="container">
      <div class="row">
            <div class="col-3">
            </div>
            <div class="col-6">
                <br><br><!--saltos de linea para dar estatica -->
                <!-- alerta fuera del card -->
                <?php if(isset($mensaje)){ ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong><?php echo $mensaje?></strong>
                        </div>
                        <script>
                        var alertList = document.querySelectorAll('.alert');
                        alertList.forEach(function (alert) {
                        new bootstrap.Alert(alert)
                        })
                    </script>
                <?php } ?>
                <!-- inicio del card -->
                <div class="card">
                    <div id="login-form"  id="login-container">
                        <div class="card-header">
                            Iniciar Sesión
                        </div>
                        <div class="card-body">
                            <form id="login" action="index.php" method="post">
                                <!-- Campos de inicio de sesión -->
                                <div class="mb-3">
                                <label for="usuario" class="form-label">Usuario</label>
                                    <input class="form-control" type="text" name="usuario" placeholder="Nombre de usuario" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <input class="form-control" type="password" name="password" placeholder="Contraseña" required>
                                </div>                                                
                                <input class="btn btn-primary" type="submit" value="Entrar">
                            </form>
                            <p>No tienes una cuenta? <a href="#" onclick="showRegisterForm()">Regístrate</a></p>
                        </div>
                    </div>
                    <div id="register-form" style="display: none;">
                        <div class="card-header">
                            Registrarse
                        </div>
                        <div class="card-body">
                            <form id="register" action="register.php" method="post">
                                <!-- Campos de inicio de sesión -->
                                <div class="mb-3">
                                    <label for="new_username" class="form-label">Nombre de usuario</label>
                                    <input class="form-control" type="text" name="new_username" placeholder="Nuevo nombre de usuario" required>
                                </div>
                                <div class="mb-3">
                                    <label for="correo" class="form-label">Correo</label>
                                    <input class="form-control" type="email" name="correo" placeholder="Correo electronico" required>
                                </div>
                                <div class="mb-3">
                                    <label for="new_password" class="form-label">Contraseña</label>
                                    <input class="form-control" type="password" name="new_password" placeholder="Nueva contraseña" required>
                                </div>                                                
                                <input class="btn btn-primary" type="submit" value="Registrar">
                            </form>
                            <p>Ya tienes una cuenta? <a href="#" onclick="showLoginForm()">Iniciar Sesión</a></p>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </div>  
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <script src="index.js"></script>
</body>
</html>