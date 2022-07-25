<?php
require_once('libraries/connection.php');
require_once('libraries/funciones.php');
require_once('usuario/usuario.php');

$styles = CargarPagina('template/TemplateStyles.php');
$myStyles = "";
$sidebar = CargarPagina('template/TemplateSidebar.php');
$breadcrumb = CargarPagina('template/TemplateBreadcrumb.php');
$header = CargarPagina('template/TemplateHeader.php');
$footer = CargarPagina('template/TemplateFooter.php');
$scripts = CargarPagina('template/TemplateScripts.php');
$myScripts = "";
$template = CargarPagina('template/Template.php');
$template1 = CargarPagina('template/Template1.php');
$Search = [
    '<!--STYLES-->',
    '<!--MY STYLES-->',
    '<!--SIDEBAR-->',
    '<!--HEADER-->',
    '<!--BREADCRUMB-->',
];

$Replace = [
    $styles,
    $myStyles,
    $sidebar,
    $header,
    $breadcrumb,
];

$template = str_replace($Search, $Replace, $template);

print $template;

switch ($_GET["action"]) {
    case "leer":
        $template = str_replace("<!--TITLE-->", "Tabla Usuarios", $template);
        
        include('usuario/usuarioVistaLeer.php');
        break;
    case "agregar":
        $template = str_replace("<!--TITLE-->", "Crear Usuario", $template);
        include('usuario/usuarioVistaCrear.php');
        break;
    case "registrar":
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $correo = $_POST['email'];
        $contrasena = $_POST['password'];
        $intento = $_POST['intento'];
        $lastLogin = $_POST['lastLogin'];
        $activo = $_POST['activo'];

        $query = "INSERT INTO usuario (nombreCompleto, usuario, contrasena, correoElectronico, intento, lastLogin, activo) 
                  VALUES ('$nombre', '$usuario', '$contrasena', '$correo', '$intento', '$lastLogin', '$activo');";
        $insertar = $connection->query($query);

        $alert["flash"] = ["message" => "Usuario {$nombre} Agregado.", "type" => "alert-success"];
        include('usuario/usuarioVistaLeer.php');
        break;
    case "actualizar":
        $template = str_replace("<!--TITLE-->", "Actualizar Usuario", $template);

        include('usuario/usuarioVistaActualizar.php');
        break;
    case "actualizando":
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $correo = $_POST['email'];
        $contrasena = $_POST['password'];
        $intento = $_POST['intento'];
        $lastLogin = $_POST['lastLogin'];
        $activo = $_POST['activo'];

        $query = "UPDATE usuario SET nombreCompleto = '$nombre', usuario = '$usuario', contrasena = '$contrasena' , correoElectronico = '$correo', intento = '$intento', lastLogin = '$lastLogin', activo = '$activo' WHERE id = $id;";
        $update = $connection->query($query);

        $alert["flash"] = ["message" => "Usuario {$nombre} Actualizado.", "type" => "alert-warning"];
        include('usuario/usuarioVistaLeer.php');
        break;
    case "borrar":
        $id = $_GET["id"];
        $nombre = $_GET["nombre"];

        $query = "DELETE FROM usuario WHERE id = $id";
        $eliminar = $connection->query($query);

        $alert["flash"] = ["message" => "Usuario {$nombre} Eliminado .", "type" => "alert-danger"];
        include('usuario/usuarioVistaLeer.php');
        break;
    default:
        print "No se detecto variable";
        break;
}

$Search2 = [
    '<!--FOOTER-->',
    '<!--SCRIPT-->',
    '<!--MY SCRIPTS-->'
];

$Replace2 = [
    $footer,
    $scripts,
    $myScripts
];

$template1 = str_replace($Search2, $Replace2, $template1);
print $template1;
