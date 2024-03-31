<?php
    session_start();
    if (isset($_GET['FINISH'])){
        echo "<script>alert('Pedido registrado');</script>";
    }
    include('bd/bd.php');
    $ID = $_SESSION['ID'];
    $sentencia=$conexion->prepare("SELECT * FROM tbl_reportes WHERE usuario_ID = :ID;");
    $sentencia->bindParam(":ID",$ID);
    $sentencia->execute();
    $lista_reportes=$sentencia->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1.0"
		/>
		<title>Tienda</title>
		<link rel="stylesheet" href="styles.css"/>
	</head>
	<body>
		<header>
            <h1>Tienda</h1>
			<nav>
				<ul>
					<li><a href="principal.php">Inicio</a></li>
					<li><a href="pedidos.php">Mis pedidos</a></li>					
					<li><a href="acerca.php">Acerca de</a></li>
					<li><a href="cerrar.php">Cerrar sesion</a></li>
				</ul>
        	</nav>
			<div class="container-icon">
                <svg 
                    xmlns="http://www.w3.org/2000/svg" 
                    fill="none" 
                    viewBox="0 0 24 24" 
                    stroke-width="1.5" 
                    stroke="currentColor" 
                    class="icon-check"><!--Clase de la imagen -->
                    <path 
                        stroke-linecap="round" 
                        stroke-linejoin="round" 
                        d="m4.5 12.75 6 6 9-13.5" />
                </svg>
			</div>
		</header>
        <table >
            <thead>
                <tr>
                    <th>Pedido</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista_reportes as $registros) { ?>
                <tr >
                    <td><?php echo $registros["reporte"]?></td>
                    <td>
                        <a href="funciones.php?REPORTE=<?php echo $registros["reporte"]?>" role="button">Descargar</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>