

<br>
<a href="clienteControlador.php?action=agregar"> <button class="btn btn-success">agregar cliente</button> </a>
<br>

<table class="table">
    <thead class="table-danger">
    <tr>
        <th scope="row">id</th>
        <th>Clave</th>
        <th>Denominacion</th>
        <th>Domicilio</th>
        <th>Telefono</th>
        <th>Email</th>
        <th>     </th>
        <th>     </th>
    </tr>

    </thead>
    <tbody class="table-primary">
    <?php
    $resultado=$connection->query('SELECT * FROM cliente');

    $resultado=$resultado->fetch_all(MYSQLI_ASSOC);

    $numeroFilas=sizeof($resultado);
    for ($i=0;$i<$numeroFilas;$i++)
    {
        $id=$resultado[$i]["id"];
        $clave=$resultado[$i]["clave"];
        $denominacion=$resultado[$i]["denominacion"];
        $domicilio=$resultado[$i]["domicilio"];
        $telefono=$resultado[$i]["telefono"];
        $email=$resultado[$i]["email"];



        print "<tr>
    <td>$id</td>
    <td>$clave</td>
    <td>$denominacion</td>
    <td>$domicilio</td>
    <td>$telefono </td>
    <td>$email </td>

    <td> <a href='clienteControlador.php?action=actualizar&id=$id'> <button class='btn btn-warning'> actualizar </button> </a> </td>

    <td> <a href='clienteControlador.php?action=borrar&id=$id'> <button class='btn btn-danger'> eliminar </button> </a> </td>
    
    </tr>";
    }
    ?>

    </tbody>
</table>


