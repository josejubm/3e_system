

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
        $nombre=$resultado[$i]["nombre"];
        $matricula=$resultado[$i]["matricula"];
        $contraseña=$resultado[$i]["password"];
        $domicilio=$resultado[$i]["domicilio"];
        $fecha_n=$resultado[$i]["fecha_nacimiento"];
        $curp=$resultado[$i]["curp"];
        $rfc=$resultado[$i]["rfc"];
        $estado_c=$resultado[$i]["estado_civil"];
        $foto=$resultado[$i]["foto"];


        print "<tr>
    <td>$id</td>
    <td>$nombre</td>
    <td>$matricula</td>
    <td>$contraseña</td>
    <td>$domicilio </td>
    <td>$fecha_n </td>
    <td>$curp </td>
    <td>$rfc</td>
    <td>$estado_c</td>
    <td>$foto </td>

    <td> <a href='usuarioControlador.php?action=actualizar&id=$id'> <button class='btn btn-warning'> actualizar </button> </a> </td>

    <td> <a href='usuarioControlador.php?action=borrar&id=$id'> <button class='btn btn-danger'> eliminar </button> </a> </td>
    
    </tr>";
    }
    ?>

    </tbody>
</table>


