<html>
        <head>
            <title>Modificar la tabla del paciente</title>
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
			<li><a href="registros.php">Volver a la tabla Pacientes</a>
				</ul>
			</li>
            </ul>
            <hr size=3 color="black">
		</nav>
    </div>
    <div class="formus">
        <?php
            include('cone.php');
                $nom=$_POST['nomb_paciente'];
                $edad=$_POST['edad_paciente'];
                $sexo=$_POST['sexo'];
                $espe=$_POST['especie'];
                $raza=$_POST['raza'];
                $id=$_POST['id'];
        ?> 
        Modificar los datos del paciente con ID: <?php echo $id?>
        <form action="actualizar1.php" method="Post">
            Nombre<input type="text" name="nomb_paciente" value="<?php echo $nom?>"/><br><br>
            Edad:<input type="number" name="edad_paciente" value="<?php echo $edad?>" min="1" pattern="^[0-9]+"/><br><br>
            Sexo: <select name="sexo"><option>Macho</option><option>Hembra</option></select> <br><br>
            Especie: <input type="text" name="especie" value="<?php echo $espe?>"/><br><br>
            Raza: <input type="text" name="raza" value="<?php echo $raza?>"/><br><br>
            <input class="bt" id="btn" name="send" type="submit" value="Actualizar" /><br><br>
            <input name="id" type="hidden" value="<?php echo $id;?>"/>
        </form>
        <?php
            if(isset($_POST['send'])) {
                $nom=$_POST['nomb_paciente'];
                $edad=$_POST['edad_paciente'];
                $sexo=$_POST['sexo'];
                $espe=$_POST['especie'];
                $raza=$_POST['raza'];
                $id=$_POST['id'];
                $consulta = "UPDATE paciente SET edad_paciente=$edad, nomb_paciente='$nom', raza='$raza', especie='$espe', Sexo='$sexo' WHERE cod_paciente='$id'";
                $query= mysqli_query($conexion,$consulta);
                if ($query) {
			        header("Location: registros.php");   
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