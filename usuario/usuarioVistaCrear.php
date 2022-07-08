<body class="container-fluid">

<form action="usuarioControlador.php?action=registrar" method="post" class="container">

    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" class="form-control">
    <label for="matricula">Matricula</label>
    <input type="text" name="matricula" id="matricula" class="form-control">
    <label for="contraseña">Contraseña</label>
    <input type="text" name="contraseña" id="contraseña" class="form-control">
    <label for="domicilio">Domicilio</label>
    <input type="text" name="domicilio" id="domicilio" class="form-control">
    <label for="fecha nacimiento">Fecha de Nacimiento</label>
    <input type="text" name="fecha_n" id="fecha_n" class="form-control">
    <label for="curp">CURP</label>
    <input type="text" name="curp" id="curp" class="form-control">
    <label for="rfc">RFC</label>
    <input type="text" name="rfc" id="rfc" class="form-control">
    <label for="estado civil">Estado Civil</label>
    <input type="text" name="estado_c" id="estado_c" class="form-control">
    <label for="foto">Foto</label>
    <input type="text" name="foto" id="foto" class="form-control">

    <br>

    <input type="submit" value="enviar datos" class="btn btn-success ">

</form>

</body>
</html>