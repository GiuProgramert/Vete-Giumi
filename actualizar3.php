<html>
        <head>
            <title>Modificar tabla del dueño</title>
            <link rel="stylesheet"type="text/css"href="css.css"/>
            <link rel="icon" type="image/png" href="https://image.flaticon.com/icons/png/512/64/64431.png">
        </head>
    <body>
    <div class="titu">
            <h1>Veterinaria Giumi</h1>
            <hr size=5 color="black">
        <nav class="menu">
			<ul class="navegacion">
            <li><a href="index.php">Inicio</a></li>
			<li><a href="registros2.php">Volver a la tabla Servicios</a>
				</ul>
			</li>
            </ul>
            <hr size=3 color="black">
		</nav>
    </div>
        <?php
            include('cone.php');
                $nom=$_POST['nomb_servicio'];
                $ape=$_POST['observacion'];
                $dir=$_POST['especificacion_serv'];
                $id=$_POST['id'];
        ?> 
    <div class="formus">
        Modificar los datos del Servicio con ID: <?php echo $id?>
        <form action="actualizar3.php" method="Post">
            Nombre: <input type="text" name="nomb_servicio" value="<?php echo $nom?>"/><br><br>
            Observacion: <input type="text" name="observacion" value="<?php echo $ape?>"/><br><br>
            Precio: <input type="text" name="especificacion_serv" value="<?php echo $dir?>" min="1" pattern="^[0-9]+"/><br><br>
            <input class="bt2" id="btn" name="send3" type="submit" value="Actualizar" /><br><br>
            <input name="id" type="hidden" value="<?php echo $id;?>"/>
        </form>
        <?php
            if(isset($_POST['send3'])) {
                $nom=$_POST['nomb_servicio'];
                $ape=$_POST['observacion'];
                $dir=$_POST['especificacion_serv'];
                $id=$_POST['id'];
                $consulta = "UPDATE servicio SET nomb_servicio='$nom', observacion='$ape', especificacion_serv='$dir' WHERE cod_servicio='$id'";
                $query= mysqli_query($conexion,$consulta);
                if ($query) {
                    header("Location: registros2.php"); 
                } else {
                    echo mysqli_error($conexion);
                }
            }
        ?>
    </div>
    <footer class="titu">
            <hr size=3 color="black">
            Página Desarrollada por <ul class="no"><li><a href="https://www.instagram.com/giuliano_diaz11/">Giuliano Diaz</a></li><li><a href="https://www.instagram.com/cam.lagrana/">Camila Lagraña</a></li></ul>
    </footer>
    </body>
</html>