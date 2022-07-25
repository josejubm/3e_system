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

<div class="row">
    <!-- basic form start -->
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Crear Usuario</h4>
                <form action="usuarioControlador.php?action=actualizando" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre Completo</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp" placeholder="Nombre" value="<?php echo $nombre?>">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Usuario</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" aria-describedby="emailHelp" placeholder="Usuario" value="<?php echo $user ?>">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Correo" value="<?php echo $correoElectronico ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo $contraseña ?>">
                    </div>

                    <div class="form-group">
                        <label for="intento">INTENTO</label>
                        <input type="number" name="intento" id="intento" class="form-control" value="<?php echo $intento ?>">
                    </div>

                    <div class="fprm-group">
                        <label for="lastLogin">LAST LOGIN</label>
                        <input type="datetime-local" name="lastLogin" id="lastLogin" class="form-control" value="<?php echo $lastLogin ?>">
                    </div>

                    <div class="form-group">
                        <label for="activo">ACTIVO</label>
                        <input type="number" name="activo" id="activo" class="form-control" value="<?php echo $activo ?>">
                    </div>

                    <input type="hidden" name="id" id="id" value="<?php echo $id ?>">

                    <input type="submit" class="btn btn-outline-success mb-3" value="Actualizar Datos">

                </form>
            </div>
        </div>
    </div>
    <!-- basic form end -->
</div>