<?php
$id = $_GET["id"];
$resultado=$connection->query("SELECT * FROM cliente WHERE id = $id");

$resultado=$resultado->fetch_all(MYSQLI_ASSOC);

        $id=$resultado[0]["id"];
        $clave=$resultado[0]["clave"];
        $denominacion=$resultado[0]["denominacion"];
        $domicilio=$resultado[0]["domicilio"];
        $telefono=$resultado[0]["telefono"];
        $email=$resultado[0]["email"];
?>

<form action="clienteControlador.php?action=actualizando" method="post" class="container">

    <label for="clave">Clave</label>
    <input type="text" name="clave" id="clave" class="form-control" value="<?php echo $clave ?>">

    <label for="denominacion">denominacion</label>
    <input type="text" name="denominacion" id="denominacion" class="form-control" value="<?php echo $denominacion ?>">

    <label for="domicilio">Domicilio</label>
    <input type="text" name="domicilio" id="domicilio" class="form-control" value="<?php echo $domicilio ?>" >
    
    <label for="telefono">telefono</label>
    <input type="text" name="telefono" id="telefono" class="form-control" value="<?php echo $telefono ?>">
    
    <label for="email">email</label>
    <input type="text" name="email" id="email" class="form-control" value="<?php echo $email ?>">

    <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
    <br>

    <input type="submit" value="enviar datos" class="btn btn-success ">

</form>
