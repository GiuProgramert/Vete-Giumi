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
            <li><a href="vete.php">Registrar datos</a></li>
			<li><a href="registros.php">Registros pacientes</a>
				</ul>
			</li>
            </ul>
            <hr size=3 color="black">
		</nav>
    </div>    
        <form action="vete.php" method="Post">
            <div class="formus">
                <div id="ani">
                    <!--Animal-->
                    <h3>Datos del Paciente</h3>
                        Código: <input name="cod" type="number" min="1" pattern="^[0-9]+" required><br><br>
                        Edad: <input name="edad" type="number" min="1" pattern="^[0-9]+" required><br><br>
                        Paciente: <input type="text" name="pacien" required><br><br>
                        Sexo: <select name="sex"><option>Macho</option><option>Hembra</option></select> <br><br>
                        Especie:  <input type="text" name="espe" required><br><br>
                        Raza: <input type="text" name="raza" required><br>
                </div>
                <div id="due">
                    <!--Humano-->
                    <h3>Datos del Dueño</h3>
                        Id: <input name="iddue" type="number" min="1" pattern="^[0-9]+" required><br><br>
                        Nombre: <input type="text" name="nom" required><br><br>
                        Apellido: <input type="text" name="ape" required><br><br>
                        Dirección: <input type="text" name="dir" required><br><br>
                        Ruc: <input type="text" name="ruc" required><br><br>
                        Telefono: <input type="text" name="phone" required><br><br>
                        
                </div>
                <div id="boto">
                        <br><input type="submit" value="Enviar datos" name="enviar" class="bt"> <input type="reset" value="Restablecer campos" class="bt"><br>
                </div>
            </div>
        </form>
        <footer class="titu">
            <hr size=3 color="black">
            Página Desarrollada por <ul class="no"><li><a href="https://www.instagram.com/giuliano_diaz11/">Giuliano Diaz</a></li><li><a href="https://www.instagram.com/cam.lagrana/">Camila Lagraña</a></li></ul>
        </footer>
    <?php
        include("cone.php");
        /* Caragar variables */
        //animal
        @$cod_pacien=$_POST['cod'];
        @$edad=$_POST['edad'];
        @$pacien=$_POST['pacien'];
        @$sexo=$_POST['sex'];
        @$espe=$_POST['espe'];
        @$raza=$_POST['raza'];
        //humano
        @$iddue=$_POST['iddue'];
        @$nom=$_POST['nom'];
        @$ape=$_POST['ape'];
        @$dir=$_POST['dir'];
        @$ruc=$_POST['ruc'];
        @$tel=$_POST['phone'];
        /* Código */
        if (isset($_POST['enviar'])) {
                $consulta="INSERT INTO dueno VALUES($iddue,'$nom','$ape','$dir','$ruc','$tel')";
                $query = mysqli_query($conexion,$consulta);
                if (!$query) {
                    echo "<script> alert('Inserte otro Código'); </script>";
                }
                $consulta="INSERT INTO paciente VALUES($cod_pacien,'$edad','$pacien','$iddue','$raza','$espe','$sexo')";
                $query= mysqli_query($conexion,$consulta);
                if (!$query) {
                    echo "<script> alert('Inserte otra ID'); </script>";
                }
        }        
    ?>
</body>
</html>