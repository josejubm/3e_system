

<br>
<a href="usuarioControlador.php?action=agregar"> <button class="btn btn-success">agregar Usuario</button> </a>
<br>

<table class="table">
    <thead class="table-danger">
    <tr>

        <th scope="row">id</th>

        <th>nombre</th>
        <th>matricula </th>
        <th>password</th>
        <th>domicilio</th>
        <th>fecha de nacimiento</th>
        <th>CURP</th>
        <th>RFC</th>
        <th>estado Civil</th>
        <th>Direccion de imagen</th>

        <th>     </th>
        <th>     </th>
    </tr>

    </thead>
    <tbody class="table-primary">
    <?php
    $resultado=$connection->query('SELECT * FROM usuario');

    $resultado=$resultado->fetch_all(MYSQLI_ASSOC);

    $numeroFilas=sizeof($resultado);
    for ($i=0;$i<$numeroFilas;$i++)
    {
        $id=$resultado[$i]["id"];
        $nombre=$resultado[$i]["nombreCompleto"];
        $user=$resultado[$i]["usuario"];
        $contraseña=$resultado[$i]["contrasena"];
        $domicilio=$resultado[$i]["domicilio"];
        $correoElectronico=$resultado[$i]["correoElectronico"];
        $intento=$resultado[$i]["intento"];
        $lastLogin=$resultado[$i]["lastLogin"];
        $activo=$resultado[$i]["activo"];
        


        print "<tr>
    <td>$id</td>
    <td>$nombre</td>
    <td>$user</td>
    <td>$contraseña</td>
    <td>$domicilio </td>
    <td>$correoElectronico </td>
    <td>$intento </td>
    <td>$lastLogin  </td>
    <td>$activo </td>

    <td> <a href='usuarioControlador.php?action=actualizar&id=$id'> <button class='btn btn-warning'> actualizar </button> </a> </td>

    <td> <a href='usuarioControlador.php?action=borrar&id=$id'> <button class='btn btn-danger'> eliminar </button> </a> </td>
    
    </tr>";
    }
    ?>

    </tbody>
</table>


