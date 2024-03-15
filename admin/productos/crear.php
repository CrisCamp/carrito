<?php 
include("../../bd/bd.php");

if($_POST){
    $nombre = (isset($_POST['nombre']))?$_POST['nombre']:"";
    $precio = (isset($_POST['precio']))?$_POST['precio']:"";
    $imagen = (isset($_FILES["imagen"]["name"]))?$_FILES["imagen"]["name"]:"";

    //en esta parte se esta validando que si existe una imagen le asignamos un nuevo nombre
    $fecha_imagen = new DateTime();
    $nombre_archivo_imagen = ($imagen!="")? $fecha_imagen->getTimestamp()."_".$imagen:"";
    
    //esta sentecia sirve para mover la imagen a otra carpeta
    $tmp_imagen=$_FILES["imagen"]["tmp_name"];
    if($tmp_imagen!=""){
        //porfolio en lugar de portafolio
        move_uploaded_file($tmp_imagen,"../../img/".$nombre_archivo_imagen);
    }

    // Definir 
    $sentencia=$conexion->prepare("INSERT INTO tbl_productos 
    (ID, nombre, precio, imagen) VALUES 
    (NULL, :nombre, :precio, :imagen);");

    //donde encuentres nombre pon la varible $nombre en la sentencia de arriba
    $sentencia->bindParam(":nombre",$nombre);
    //donde encuentres precio pon la varible $precio en la sentencia de arriba
    $sentencia->bindParam(":precio",$precio);
    //donde encuentres imagen pon la varible $nombre_archivo_imagen en la sentencia de arriba
    $sentencia->bindParam(":imagen",$nombre_archivo_imagen);

    //Ejecutar
    $sentencia->execute();
    $mensaje="Registro agregado con éxito.";
    header("Location:index.php?mensaje=".$mensaje);
}

include("../bootstrap.php"); ?>
<div class="card">
    <div class="card-header">
        Productos
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">

            <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text"
                class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre">
            </div>

            <div class="mb-3">
              <label for="precio" class="form-label">Precio:</label>
              <input type="text"
                class="form-control" name="precio" id="precio" aria-describedby="helpId" placeholder="Precio">
            </div>

            <div class="mb-3">
              <label for="imagen" class="form-label">Imagen:</label>
              <input type="file"
                class="form-control" name="imagen" id="imagen" aria-describedby="helpId" placeholder="Imagen">
            </div>

            <button type="submit" class="btn btn-success">Agregar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted">
    </div>
</div>