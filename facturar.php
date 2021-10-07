<?php include('cone.php'); ?>
<html>
        <head>
            <title>Veterinaria Giumi</title>
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
            <li><a href="factu.php">Ver facturas</a></li>
            <li><a href="deta_factu.php">Ver detalle Factura</a></li>
            <hr size=3 color="black">
        </div>
        <div class="formus">
            <form action="facturar.php" method="Post">
                Datos Para la elaboracion de la factura: <br>
                Intruzca la fecha: <input type="date" id="start" name="fecha" value="2018-07-22" min="2000-01-01" max="2019-12-31"><br><br>
                Intruzca el tipo de pago <select name="tipo_pago"><option>Efectivo</option><option>Tarjeta</option><option>Cheque</option></select><br><br>
                Introduca el paciente: <select name="paciente">
                    <?php
                            $consulta=mysqli_query($conexion,"SELECT * FROM paciente");
                            while($filas=mysqli_fetch_array($consulta)) {
                                echo '<option value="'.$filas["cod_paciente"].'">'.$filas["nomb_paciente"].'</option>';
                            }
                    ?>
                </select><br><br>
                Introduzca el servicio: <select name="servicio">
                    <?php
                            $consulta=mysqli_query($conexion,"SELECT * FROM servicio");
                            while($filas=mysqli_fetch_array($consulta)) {
                                echo '<option value="'.$filas["cod_servicio"].'">'.$filas["nomb_servicio"].'</option>';
                            }
                    ?>
                </select><br><br>
                Introduzca el veterinario: <select name="veterinario">
                <?php
                            $consulta=mysqli_query($conexion,"SELECT * FROM veterinario");
                            while($filas=mysqli_fetch_array($consulta)) {
                                echo '<option value="'.$filas["cod_vet"].'">'.$filas["nom_vet"].'</option>';
                            }
                    ?>
                </select><br><br>
                Cantidad: <input type="text" name="cantidad" required><br><br>
                <input type="submit" name="enviar" value="Crear" class="bt">
                <input type="reset" name="enviar" value="Restablecer" class="bt">
            </form>
            <?php
                if (isset($_POST['enviar'])) {
                    $fecha=$_POST['fecha'];
                    $pago=$_POST['tipo_pago'];
                    $nrofac=rand(1,1000);
                        $consulta="INSERT INTO factura VALUES($nrofac,'$pago','$fecha')";
                        $query = mysqli_query($conexion,$consulta);
                        while (!$query) {
                            $nrofac=rand(1,1000);
                            $consulta="INSERT INTO factura VALUES($nrofac,'$pago','$fecha')";
                            $query = mysqli_query($conexion,$consulta);
                        }
                    $paciente=$_POST['paciente'];
                    $servicio=$_POST['servicio'];
                    $canti=$_POST['cantidad'];
                    $veterinario=$_POST['veterinario'];
                    $consulta="INSERT INTO detalle_factura VALUES($nrofac,$paciente,$servicio,'',$veterinario,$canti)";
                    $query = mysqli_query($conexion,$consulta);
                    if (!$query) {
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