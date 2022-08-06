<?php
require_once('libraries/Auth/Security.php');
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
$templatebread = CargarPagina('template/TemplateBread.php');
$template1 = CargarPagina('template/Template1.php');

$Search = [
    '<!--STYLES-->',
    '<!--MY STYLES-->',
    '<!--SIDEBAR-->',
    '<!--HEADER-->',
];

$Replace = [
    $styles,
    $myStyles,
    $sidebar,
    $header,
];

$template = str_replace($Search, $Replace, $template);
print $template;

switch ($_GET["action"]) {
    case "leer";
        $pages = [
            "DATO" => "Usuarios",
        ];

        $bread = str_replace('<!--BREADCRUMB-->', $breadcrumb, $templatebread);
        print $bread;

        print_r($pages);

        include('usuario/usuarioVistaLeer.php');
        break;
    case "table":
        $template = str_replace("<!--TITLE-->", "Tabla Usuarios", $template);

        include('usuario/usuarioVistaTable.php');
        break;
    case "agregar":
        $template = str_replace("<!--TITLE-->", "Crear Usuario", $template);
        include('usuario/usuarioVistaCrear.php');
        break;
    case "registrar":
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $correo = $_POST['email'];
        $contrasena = password_hash($_POST["password"], PASSWORD_BCRYPT);
        $fechaRegistro = $_POST['lastLogin'];
        $activo = $_POST['activo'];
        $tipo = $_POST['tipo'];

        $ruta = "imagesUser/";
        $resultado = CargarImgen($_FILES['foto'], $ruta);
        $imagen = $resultado['RUTA'];

        $query = "INSERT INTO usuario (nombreCompleto, usuario, contrasena, correoElectronico, fechaRegistro, activo, tipo, foto) 
                  VALUES ('$nombre', '$usuario', '$contrasena', '$correo', '$fechaRegistro', '$activo', '$tipo', '$imagen');";
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
        $fechaRegistro = $_POST['fechaRegistro'];
        $activo = $_POST['activo'];

        $query = "UPDATE usuario SET nombreCompleto = '$nombre', usuario = '$usuario', contrasena = '$contrasena' , correoElectronico = '$correo', intento = '$intento', fechaRegistro = '$fechaRegistro', activo = '$activo' WHERE id = $id;";
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

    case "reporte":
        $resultado = $connection->query('SELECT * FROM usuario');
        $resultado = $resultado->fetch_all(MYSQLI_ASSOC);

       
        for ($i=0; $i < 10 ; $i++) { 
            $td .= 11;
        }

        $table = "<table>
        $td
        </table>";

        $datos = [];
        $datos[0] = '<h5> jose manuel </h5>';
        $datos[1] = '<h5> carlos </h5>';

       

        //print_r($datos);

        $etiqueta = [
            '<!--##TABLE##-->'
        ];
        
        //$template = $template = CargarPagina('TemplateReporte.html');
        $dir = "reportes/";
        $name = "users";

        $resultado = generaReporte($resultado, $etiqueta, $template, $dir, $name);

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
