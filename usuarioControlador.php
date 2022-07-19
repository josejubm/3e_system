<?php
require_once ('libraries/connection.php');
require_once ('libraries/funciones.php');
require_once ('usuario/usuario.php');

switch ($_GET ["action"] ){
    case "leer":
        $template = str_replace("<!--TITLE-->", "Tabla Usuarios", $template);

        $body = 'usuario/usuarioVistaLeer.php';
        break;

    case "agregar":
        $template = str_replace("<!--TITLE-->", "crear usuario", $template);

        $body = 'usuario/usuarioVistaCrear.php';
        break;
    case "registrar":
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];
        $correo = $_POST['correo'];
        $intento = $_POST['intento'];
        $lastLogin = $_POST['lastLogin'];
        $activo = $_POST['activo'];

        $query = "INSERT INTO usuario (nombreCompleto, usuario, contrasena, correoElectronico, intento, lastLogin, activo) 
                  VALUES ('$nombre','$usuario','$contrasena','$correo','$intento','$lastLogin','$activo');";
        $insertar=$connection->query($query);

       // header('Location:usuarioControlador.php?action=leer');
       
       include ('usuario/usuarioVistaLeer.php');

        break;  
    case "actualizar":
      $template = str_replace("<!--TITLE-->", "Actualizar Usuario", $template);

      include ('usuario/usuarioVistaActualizar.php');
      break; 
    case "actualizando":
      
      $id = $_POST['id'];
      $nombre = $_POST['nombre'];
      $usuario = $_POST['usuario'];
      $contrasena = $_POST['contrasena'];
      $correo = $_POST['correo'];
      $intento = $_POST['intento'];
      $lastLogin = $_POST['lastLogin'];
      $activo = $_POST['activo'];

      $query = "UPDATE usuario SET nombreCompleto = '$nombre', usuario = '$usuario', contrasena = '$contrasena' , correoElectronico = '$correo', intento = '$intento', lastLogin = '$lastLogin', activo = '$activo' WHERE id = $id;";
        
      $update=$connection->query($query);

      header('Location: usuarioControlador.php?action=leer');

        break;
    case "borrar":
        $id = $_GET["id"];

        $query = "DELETE FROM usuario WHERE id = $id";
        $eliminar=$connection->query($query);

        include ('usuario/usuarioVistaLeer.php');
        break;
    default:
        print "No se detecto variable";
        break;
}

$styles = CargarPagina('template/TemplateStyles.php');
$myStyles = "";
$sidebar = CargarPagina('template/TemplateSidebar.php');
$breadcrumb = CargarPagina('template/TemplateBreadcrumb.php');
$header = CargarPagina('template/TemplateHeader.php');
$footer = CargarPagina('template/TemplateFooter.php');
$scripts = CargarPagina('template/TemplateScripts.php');
$myScripts = "";

$template = CargarPagina('template/Template.php');

$Search = [
  '<!--STYLES-->',
  '<!--MY STYLES-->',
  '<!--SIDEBAR-->',
  '<!--HEADER-->',
  '<!--BREADCRUMB-->',
  '<!--BODY--> ',
  '<!--FOOTER-->',
'<!--SCRIPT-->',
'<!--MY SCRIPTS-->'
];

$Replace = [
    $styles,
    $myStyles,
    $sidebar,
    $header,
    $breadcrumb,
    $footer,
    $scripts,
    $myScripts
];

$template = str_replace($Search, $Replace, $template);


print $template;
require_once ($body);
