<?php
require_once ('libraries/connection.php');
require_once ('libraries/funciones.php');
require_once ('usuario/usuario.php');

$template = CargarPagina('template/template.php');
$sidebar = CargarPagina('template/TemplateSidebar.php');
$breadcrumb = CargarPagina('template/TemplateBreadcrumb.php');
$header = CargarPagina('template/TemplateHeader.php');

print $template;
print $sidebar;
print $header;
print $breadcrumb;



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


$footer = CargarPagina('template/TemplateFooter.php');
print $footer;