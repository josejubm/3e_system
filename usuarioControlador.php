<?php
require_once ('libraries/connection.php');
require_once ('libraries/funciones.php');
require_once ('usuario/usuario.php');
//require_once ('template/template1.php');


$template = CargarPagina('template/template1.php');

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


        $query = "INSERT INTO usuario (nombre, matricula, password, domicilio, fecha_nacimiento, curp, rfc, estado_civil, foro) 
                  VALUES ('$nombre', '$matricula', );";
        $insertar=$connection->query($query);

        header('Location: productoControlador.php?action=leer');

        break;  
    case "actualizar":
        include ('categoria/categoriaVistaActualizar.php');
        break;
    
    case "actualizando":

        break;
    case "borrar":

        break;
    default:
        print "No se detecto variable";
        break;
}

print $template;