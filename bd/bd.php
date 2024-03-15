<?php
    $servidor = "bpbgexskftr7azw9xubh-mysql.services.clever-cloud.com";
    $baseDeDatos="bpbgexskftr7azw9xubh";
    $usuario = "u0zzibaomfiuuuhw";
    $contrasenia = "nYwYpmoFrx3xQ4uVwJgq";
    try{
        $conexion = new PDO("mysql:host=$servidor;dbname=$baseDeDatos",$usuario,$contrasenia);
        // echo "Conexión realizada....";
    }catch(Exception $error){
        echo $error->getMessage();
    }
?>