<?php
require_once ('libraries/connection.php');
require_once ('libraries/funciones.php');
require_once ('usuario/usuario.php');

$template = CargarPagina('template/template.php');

print $template;
switch ($_GET ["action"] ){
    case "leer":
        $template = str_replace("<!--TITLE-->", "Tabla Usuarios", $template);

        include ('usuario/usuarioVistaLeer.php');
        break;

    case "agregar":
        $template = str_replace("<!--TITLE-->", "crear usuario", $template);

        include ('usuario/usuarioVistaCrear.php');
        break;
    case "registrar":
        $nombre = $_POST['nombre'];
        $matricula = $_POST['matricula'];
        $contraseña = $_POST['contraseña'];
        $domicilio = $_POST['domicilio'];
        $fecha_n = $_POST['fecha_n'];
        $curp = $_POST['curp'];
        $rfc = $_POST['rfc'];
        $esatdo_c = $_POST['estado_c'];
        $foto = $_POST['foto'];

        $query = "INSERT INTO usuario (nombre, matricula, password, domicilio, fecha_nacimiento, curp, rfc, estado_civil, foto) 
                  VALUES ('$nombre', '$matricula', '$contraseña', '$domicilio', '$fecha_n', '$curp', '$rfc', '$esatdo_c', '$foto');";
        $insertar=$connection->query($query);

        header('Location: usuarioControlador.php?action=leer');

        break;  
    case "actualizar":
      $template = str_replace("<!--TITLE-->", "Actualizar Usuario", $template);

      include ('usuario/usuarioVistaActualizar.php');
      break; 
    case "actualizando":
      
      $id = $_POST['id'];
      $nombre = $_POST['nombre'];
      $matricula = $_POST['matricula'];
      $contraseña = $_POST['contraseña'];
      $domicilio = $_POST['domicilio'];
      $fecha_n = $_POST['fecha_n'];
      $curp = $_POST['curp'];
      $rfc = $_POST['rfc'];
      $esatdo_c = $_POST['estado_c'];
      $foto = $_POST['foto'];

      $query = "UPDATE usuario SET nombre = '$nombre', matricula = '$matricula', password = '$contraseña' , domicilio = '$domicilio', fecha_nacimiento = '$fecha_n', curp = '$curp', rfc = '$rfc' , estado_civil = '$esatdo_c' , foto = '$foto' WHERE id = $id;";
        
      $update=$connection->query($query);

      header('Location: usuarioControlador.php?action=leer');

        break;
    case "borrar":
        $id = $_GET["id"];

        $query = "DELETE FROM usuario WHERE id = $id";
        $eliminar=$connection->query($query);

        header('Location: usuarioControlador.php?action=leer');

        break;
    default:
        print "No se detecto variable";
        break;
}





$footer = CargarPagina('template/footer.php');
print $footer;