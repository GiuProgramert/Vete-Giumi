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
            <li><a href="facturar.php">Crear Factura</a></li>
            <li><a href="deta_factu.php">Ver detalle Factura</a></li>
            </ul>
            <hr size=3 color="black">
		</nav>
    </div>    
            <table width="841" border="1" align="left" bgcolor="#f4d03f">
            <tr>
                <th colspan="7" align="center">Datos de Consulta del Paciente</th>
            </tr>
                <tr>
                    <td><center>Nro Factura</center></td>
                    <td><center>Tipo de pago</center></td>
                    <td><center>Fecha de emición</center></td>
                </tr>

                <?php 
                        //Hacer consulta
                        include('cone.php');
                        $consulta=mysqli_query($conexion,"SELECT * FROM factura");
                        while($filas=mysqli_fetch_array($consulta)) {
                    ?>    <!--Imprimir Filas-->
                        <tr>
                        <td><center><?php echo $filas['num_factura'];?></center></td>
                        <td><center><?php echo $filas['tipo_pago'];?></center></td>
                        <td><center><?php echo $filas['fecha_emicion'];?></center></td>
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