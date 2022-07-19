<?php
$id = $_GET["id"];
$resultado=$connection->query("SELECT * FROM usuario WHERE id = $id");

$resultado=$resultado->fetch_all(MYSQLI_ASSOC);

$id=$resultado[0]["id"];
$nombre=$resultado[0]["nombreCompleto"];
$user=$resultado[0]["usuario"];
$contraseña=$resultado[0]["contrasena"];
$domicilio=$resultado[0]["domicilio"];
$correoElectronico=$resultado[0]["correoElectronico"];
$intento=$resultado[0]["intento"];
$lastLogin=$resultado[0]["lastLogin"];
$activo=$resultado[0]["activo"];

?>

<form action="usuarioControlador.php?action=actualizando" method="post" class="container">
  
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $foto?>">

    <label for="usuario">usuario</label>
    <input type="text" name="usuario" id="usuario" class="form-control">
    
    <label for="contrasena">contraseña</label>
    <input type="text" name="contrasena" id="contrasena" class="form-control">
    
    <label for="correo">correo</label>
    <input type="text" name="correo" id="correo" class="form-control">
    
    <label for="intento">Intento</label>
    <input type="date" name="intento" id="intento" class="form-control">
    
    <label for="lastLogin">lastLogin</label>
    <input type="datetime" name="lastLogin" id="lastLogin" class="form-control">
    
    <label for="activo">activo</label>
    <input type="text" name="activo" id="activo" class="form-control">


    <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
    
    <br>

    <input type="submit" value="actializar datos" class="btn btn-success ">

</form>

</body>
</html>