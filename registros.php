<html>
        <head>
            <title>Tabla del paciente</title>
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
			<li><a href="registros1.php">Registros de los dueños</a>
            </li>
            <li><a href="#">Cargar datos
                <ul class="submenu">
                    <li><a href="vete_servicios.php">Cargar Servicios</a></li>
                    <li><a href="vete_veterinarios.php">Cargar Veterinarios</a></li>
                </ul>
            </li>
            <li><a href="#">Consultar datos
                <ul class="submenu">
                    <li><a href="registros2.php">Consulta de datos de servicio</a></li>
                    <li><a href="registros3.php">Consulta de veterinarios</a></li>
                </ul>
            </li>
            </ul>
            <hr size=3 color="black">
		</nav>
    </div>    
            <table width="841" border="1" align="left" bgcolor="#f4d03f">
            <tr>
                <th colspan="7" align="center">Datos de Consulta del Paciente</th>
            </tr>
                <tr>
                    <td><center>Paciente</center></td>
                    <td><center>Edad</center></td>
                    <td><center>Sexo</center></td>
                    <td><center>Especie</center></td>
                    <td><center>Raza</center></td>
                    <td colspan="2" align="center">ACCIONES</td>
                </tr>

                <?php 
                        //Hacer consulta
                        include('cone.php');
                        $consulta=mysqli_query($conexion,"SELECT * FROM paciente");
                        while($filas=mysqli_fetch_array($consulta)) {
                    ?>    <!--Imprimir Filas-->
                        <tr>
                        <td><center><?php echo $filas['nomb_paciente'];?></center></td>
                        <td><center><?php echo $filas['edad_paciente'];?></center></td>
                        <td><center><?php echo $filas['sexo'];?></center></td>
                        <td><center><?php echo $filas['especie'];?></center></td>
                        <td><center><?php echo $filas['raza'];?></center></td>
                        <td>
                        <!--boton eliminar-->
                        <form action="registros.php" method="Post">
                        <input name="nomb_due" type="hidden" value="<?php echo $filas['id_dueno'];?>">
                        <center><input class="bt" id="btn" name="borrar" type="submit" value="Eliminar"></center></td>
                    <?php 
                        if(isset($_POST["borrar"])){		
                            $em=$_POST['nomb_due'];  
                            $q = "Delete from paciente where id_dueno='$em';";
                            $rs = mysqli_query($conexion,$q);
                            if($rs == false) { 
                                echo '<p>Error al borrar los campos en la tabla.</p>'.mysqli_error($conexion);
                            }else{ 
                                header("Location: registros.php");
                                
                            } 
                        }
                    ?>
                    </form> 
                    <!--boton modificar-->
                    <td>          
                    <form  action="actualizar1.php" method="Post">
                        <input name="nomb_paciente" type="hidden" value="<?php echo $filas['nomb_paciente'];?>"/>
                        <input name="edad_paciente" type="hidden" value="<?php echo $filas['edad_paciente'];?>"/>
                        <input name="sexo" type="hidden" value="<?php echo $filas['sexo'];?>"/>
                        <input name="especie" type="hidden" value="<?php echo $filas['especie'];?>"/>
                        <input name="raza" type="hidden" value="<?php echo $filas['raza'];?>"/>
                        <input name="id" type="hidden" value="<?php echo $filas['cod_paciente'];?>"/>
                        <center><input class="bt" id="btn" name="mod1" type="submit" value="modificar" /></center>
                    </form>
                    </td>
                    </tr>
                <?php  
                    } 
                ?>
                </table>
                <footer class="titu">
                    <hr size=3 color="black">
                    Página Desarrollada por <ul class="no"><li><a href="https://www.instagram.com/giuliano_diaz11/">Giuliano Diaz</a></li><li><a href="https://www.instagram.com/cam.lagrana/">Camila Lagraña</a></li></ul>
                </footer>
        </tr>
    </body>
</html>