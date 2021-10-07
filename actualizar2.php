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
			<li><a href="registros1.php">Volver a la tabla Dueños</a>
				</ul>
			</li>
            </ul>
            <hr size=3 color="black">
		</nav>
    </div>
        <?php
            include('cone.php');
                $nom=$_POST['nomb_dueno'];
                $ape=$_POST['ape_dueno'];
                $dir=$_POST['dir_dueno'];
                $ruc=$_POST['ruc_dueno'];
                $telef=$_POST['telef_dueno'];
                $id=$_POST['id'];
        ?> 
    <div class="formus">
        Modificar los datos del Dueño con ID: <?php echo $id?>
        <form action="actualizar2.php" method="Post">
            Nombre: <input type="text" name="nomb_dueno" value="<?php echo $nom?>"/><br><br>
            Apellido: <input type="text" name="ape_dueno" value="<?php echo $ape?>"/><br><br>
            Dirección: <input type="text" name="dir_dueno" value="<?php echo $dir?>"/><br><br>
            RUC: <input type="text" name="ruc_dueno" value="<?php echo $ruc?>"/><br><br>
            Telefono: <input type="text" name="telef_dueno" value="<?php echo $telef?>"/><br><br>
            <input class="bt2" id="btn" name="send2" type="submit" value="Actualizar" /><br><br>
            <input name="id" type="hidden" value="<?php echo $id;?>"/>
        </form>
        <?php
            if(isset($_POST['send2'])) {
                $nom=$_POST['nomb_dueno'];
                $ape=$_POST['ape_dueno'];
                $dir=$_POST['dir_dueno'];
                $ruc=$_POST['ruc_dueno'];
                $telef=$_POST['telef_dueno'];
                $id=$_POST['id'];
                $consulta = "UPDATE dueno SET nomb_dueno='$nom', ape_dueno='$ape', dir_dueno='$dir', ruc_dueno='$ruc', telef_dueno='$telef' WHERE id_dueno='$id'";
                $query= mysqli_query($conexion,$consulta);
                if ($query) {
                    header("Location: registros1.php"); 
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