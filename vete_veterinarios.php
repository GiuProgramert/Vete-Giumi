<html>
    <head>
        <title>Veterinaria Giumi</title>
        <link rel="stylesheet"type="text/css"href="css.css"/>
        <link rel=”Shortcut Icon” href=”https://centroveterinariopadilla.com/wp-content/uploads/2018/06/logo.png” type=”image/icon” />
    </head>
<body>
<div class="titu">
            <h1>Veterinaria Giumi</h1>
            <hr size=5 color="black">
        <nav class="menu">
			<ul class="navegacion">
            <li><a href="index.php">Inicio</a></li>
            <li><a href="index.php">Observar registros</a>
				<ul class="submenu">
					<li><a href="registros1.php">Registro de los dueños</a></li>
					<li><a href="registros.php">Registro de los pacientes</a></li>
				</ul>
            </li>
            <li><a href="vete_servicios.php">Cargar Servicios</a></li>
            <li><a href="registros2.php">Consulta de datos de servicio</a></li>
            <li><a href="registros3.php">Consulta de veterinarios</a></li>
            </li>
            </ul>
            <hr size=3 color="black">
		</nav>
    </div>
    <div class="formus">
        <form action="vete_veterinarios.php" method="Post">
            Ingresar los siguientes datos del Veterinario<br><br>
            Código: <input type="number" min="1" pattern="^[0-9]+" name="cod_vet" required><br><br>
            Nombre: <input type="text" required name="nom_vet"><br><br>
            <input type="submit" class="bt" value="Enviar" name="apro">
            <input type="reset" class="bt">
        </form>
    </div>
    <?php
        include("cone.php");
        @$cod=$_POST['cod_vet'];
        @$nom=$_POST['nom_vet'];
        if (isset($_POST['apro'])) {
            $consulta="INSERT INTO veterinario VALUES($cod,'$nom')";
            $query = mysqli_query($conexion,$consulta);
            if (!$query) {
                echo "<script> alert('Inserte otro Código'); </script>";
            }
        }
    ?>

    <footer class="titu">
            <hr size=3 color="black">
            Página Desarrollada por <ul class="no"><li><a href="https://www.instagram.com/giuliano_diaz11/">Giuliano Diaz</a></li><li><a href="https://www.instagram.com/cam.lagrana/">Camila Lagraña</a></li></ul>
    </footer>
    </body>
</html>