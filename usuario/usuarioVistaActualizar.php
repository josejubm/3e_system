<?php
$id = $_GET["id"];
$resultado=$connection->query("SELECT * FROM usuario WHERE id = $id");

$resultado=$resultado->fetch_all(MYSQLI_ASSOC);

        $id=$resultado[0]["id"];
        $nombre=$resultado[0]["nombre"];
        $matricula=$resultado[0]["matricula"];
        $contraseña=$resultado[0]["password"];
        $domicilio=$resultado[0]["domicilio"];
        $fecha_n=$resultado[0]["fecha_nacimiento"];
        $curp=$resultado[0]["curp"];
        $rfc=$resultado[0]["rfc"];
        $estado_c=$resultado[0]["estado_civil"];
        $foto=$resultado[0]["foto"];
?>

<form action="usuarioControlador.php?action=actualizando" method="post" class="container">

    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $nombre?>">
    <label for="matricula">Matricula</label>
    <input type="text" name="matricula" id="matricula" class="form-control" value="<?php echo $matricula?>">
    <label for="contraseña">Contraseña</label>
    <input type="text" name="contraseña" id="contraseña" class="form-control" value="<?php echo $contraseña?>">
    <label for="domicilio">Domicilio</label>
    <input type="text" name="domicilio" id="domicilio" class="form-control" value="<?php echo $domicilio?>">
    <label for="fecha nacimiento">Fecha de Nacimiento</label>
    <input type="date" name="fecha_n" id="fecha_n" class="form-control" value="<?php echo $fecha_n ?>">
    <label for="curp">CURP</label>
    <input type="text" name="curp" id="curp" class="form-control" value="<?php echo $curp?>">
    <label for="rfc">RFC</label>
    <input type="text" name="rfc" id="rfc" class="form-control" value="<?php echo $rfc ?>">
    <label for="estado civil">Estado Civil</label>
    <input type="text" name="estado_c" id="estado_c" class="form-control" value="<?php echo $estado_c?>">
    <label for="foto">Foto</label>
    <input type="text" name="foto" id="foto" class="form-control" value="<?php echo $foto?>">
  
    <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
    
    <br>

    <input type="submit" value="actializar datos" class="btn btn-success ">

</form>

</body>
</html>