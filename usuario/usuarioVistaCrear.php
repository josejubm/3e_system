<form action="usuarioControlador.php?action=registrar" method="post" class="container">

    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" class="form-control">

    <label for="usuario">usuario</label>
    <input type="text" name="usuario" id="usuario" class="form-control">
    
    <label for="contrasena">contraseña</label>
    <input type="text" name="contrasena" id="contrasena" class="form-control">
    
    <label for="correo">correo</label>
    <input type="text" name="correo" id="correo" class="form-control">
    
    <label for="intento">Intento</label>
    <input type="tinyint" name="intento" id="intento" class="form-control">
    
    <label for="lastLogin">lastLogin</label>
    <input type="datetime" name="lastLogin" id="lastLogin" class="form-control">
    
    <label for="activo">activo</label>
    <input type="tinyint" name="activo" id="activo" class="form-control">

    <br>
    <input type="submit" value="enviar datos" class="btn btn-success ">

</form>
