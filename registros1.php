<html>
        <head>
            <title>Tabla del dueño</title>
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
			<li><a href="registros.php">Registros de los Pacientes</a>
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
        <div id="regis">
            <table width="841" border="1" align="left" bgcolor="#f4d03f">
            <tr>
                <th colspan="7 " align="center">Datos de Consulta del dueño</th>
            </tr>
                <tr>
                    <td><center>Nombre</center></td>
                    <td><center>Apellido</center></td>
                    <td><center>Dirección</center></td>
                    <td><center>Ruc</center></td>
                    <td><center>Telefono</center></td>
                    <td colspan="2" align="center">ACCIONES</td>
                </tr>
                <?php 
                        //Hacer consulta
                        include('cone.php');
                        $consulta=mysqli_query($conexion,"SELECT * FROM dueno");
                        while($filas=mysqli_fetch_array($consulta)) {
                    ?>    <!--Imprimir Filas-->
                    <tr>
                        <td><center><?php echo $filas['nomb_dueno']?></center></td>
                        <td><center><?php echo $filas['ape_dueno']?></center></td>
                        <td><center><?php echo $filas['dir_dueno']?></center></td>
                        <td><center><?php echo $filas['ruc_dueno']?></center></td>
                        <td><center><?php echo $filas['telef_dueno']?></center></td>
                        <!--boton eliminar-->
                        <td>
                        <form action="registros1.php" method="Post">
                        <input name="nomb_due" type="hidden"value="<?php echo $filas['ruc_dueno'];?>" />
                        <center><input class="bt" id="btn" name="borrar" type="submit" value="Eliminar" /></center></td>
                    
                    <?php 
                        if(isset($_POST["borrar"])){		
                            $em=$_POST['nomb_due'];  
                            $q = "Delete from dueno where ruc_dueno='$em';";
                            $rs = mysqli_query($conexion,$q);
                            if($rs == false) { 
                                echo "<script> alert('No se puede eliminar un registro que posee un paciente cargado'); </script>";
                            }else{ 
                                header("Location: registros1.php");
                                
                            } 
                        }
                    ?>
                    </form>
                        <!--boton modificar-->
                    <td>          
                    <form  action="actualizar2.php" method="Post">
                        <input name="nomb_dueno" type="hidden" value="<?php echo $filas['nomb_dueno'];?>"/>
                        <input name="ape_dueno" type="hidden" value="<?php echo $filas['ape_dueno'];?>"/>
                        <input name="dir_dueno" type="hidden" value="<?php echo $filas['dir_dueno'];?>"/>
                        <input name="ruc_dueno" type="hidden" value="<?php echo $filas['ruc_dueno'];?>"/>
                        <input name="telef_dueno" type="hidden" value="<?php echo $filas['telef_dueno'];?>"/>
                        <input name="id" type="hidden" value="<?php echo $filas['id_dueno'];?>"/>
                        <center><input class="bt" id="btn" name="mod" type="submit" value="modificar" /></center>
                    </form>
                    </td>
                   </tr>
    
                    </tr>
                        
                <?php
                    }
                ?>
                </table>
        </div>
        <footer class="titu">
            <hr size=3 color="black">
            Página Desarrollada por <ul class="no"><li><a href="https://www.instagram.com/giuliano_diaz11/">Giuliano Diaz</a></li><li><a href="https://www.instagram.com/cam.lagrana/">Camila Lagraña</a></li></ul>
        </footer>
    </body>
</html>