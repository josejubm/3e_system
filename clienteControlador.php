<?php
require_once ('libraries/connection.php');
require_once ('libraries/funciones.php');
require_once ('usuario/usuario.php');

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

switch ($_GET ["action"] ){
    case "leer":
        $template = str_replace("<!--TITLE-->", "Tabla Clientes", $template);

        include ('cliente/clienteVistaLeer.php');
        break;
    case "agregar":
        $template = str_replace("<!--TITLE-->", "crear usuario", $template);

        include ('cliente/clienteVistaCrear.php');
        break;
        
    case "registrar":
      $clave = $_POST['clave'];
      $denominacion = $_POST['denominacion'];
      $domicilio = $_POST['domicilio'];
      $telefono = $_POST['telefono'];
      $email = $_POST['email'];

      $query = "INSERT INTO cliente (clave, denominacion, domicilio, telefono, email) 
                  VALUES ('$clave','$denominacion','$domicilio','$telefono','$email');";
      $insertar=$connection->query($query);
       
      include ('cliente/clienteVistaLeer.php');
      break;
    case "actualizar":
      $template = str_replace("<!--TITLE-->", "Actualizar cliente", $template);

      include ('cliente/clienteVistaActualizar.php');
      break; 
    case "actualizando":
      
      $id = $_POST['id'];
      $clave = $_POST['clave'];
      $denominacion = $_POST['denominacion'];
      $domicilio = $_POST['domicilio'];
      $telefono = $_POST['telefono'];
      $email = $_POST['email'];

      $query = "UPDATE cliente SET clave = '$clave', denominacion = '$denominacion', domicilio = '$domicilio' , telefono = '$telefono', email = '$email' WHERE id = $id;";
      $update=$connection->query($query);

      include ('cliente/clienteVistaLeer.php');

      //header('Location: clienteControlador.php?action=leer');

        break;
    case "borrar":
        $id = $_GET["id"];

        $query = "DELETE FROM cliente WHERE id = $id";
        $eliminar=$connection->query($query);

        include ('cliente/clienteVistaLeer.php');
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