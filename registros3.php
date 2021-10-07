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
			<li><a href="registros2.php">Registros de los Servicios</a>
				</ul>
			</li>
            </ul>
            <hr size=3 color="black">
		</nav>
    </div>    
        <div id="regis">
            <table width="841" border="1" align="left" bgcolor="#f4d03f">
            <tr>
                <th colspan="7 " align="center">Datos de Consulta Veteinarios</th>
            </tr>
                <tr>
                    <td><center>ID</center></td>
                    <td><center>Nombre</center></td>
                    <td colspan="2" align="center">ACCIONES</td>
                </tr>
                <?php 
                        //Hacer consulta
                        include('cone.php');
                        $consulta=mysqli_query($conexion,"SELECT * FROM veterinario");
                        while($filas=mysqli_fetch_array($consulta)) {
                    ?>    <!--Imprimir Filas-->
                    <tr>
                        <td><center><?php echo $filas['cod_vet']?></center></td>
                        <td><center><?php echo $filas['nom_vet']?></center></td>
                        <!--boton eliminar-->
                        <td>
                        <form action="registros3.php" method="Post">
                        <input name="nomb_due" type="hidden"value="<?php echo $filas['cod_vet'];?>" />
                        <center><input class="bt" id="btn" name="borrar" type="submit" value="Eliminar" /></center></td>
                    
                    <?php 
                        if(isset($_POST["borrar"])){		
                            $em=$_POST['nomb_due'];
                            echo $em;
                            $q = "Delete from veterinario where cod_vet='$em';";
                            $rs = mysqli_query($conexion,$q);
                            if($rs == false) { 
                                echo "<script> alert('No se puede eliminar un registro que posee un paciente cargado'); </script>".mysqli_error($conexion);
                            }else{ 
                                header("Location: registros3.php");
                                
                            } 
                        }
                    ?>
                    </form>
                        <!--boton modificar-->
                    <td>          
                    <form  action="actualizar4.php" method="Post">
                        <input name="id" type="hidden" value="<?php echo $filas['cod_vet'];?>"/>
                        <input name="nom_vet" type="hidden" value="<?php echo $filas['nom_vet'];?>"/>
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