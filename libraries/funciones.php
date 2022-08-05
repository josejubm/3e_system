<?php
function CargarPagina($file = "template/template.php")
{
    ob_start();
    require_once($file);

    $template_string = ob_get_clean();
    return $template_string;
}

function CargarImgen($file = [], $ruta = "rutaGuardar/Imagenes/")
{
    ob_start();
    $nombre = $file['name'];
    if (isset($nombre) && $nombre != "") {
        $tipo = $file['type'];
        $tamano = $file['size'];
        $temp = $file['tmp_name'];
        $error = $file['error'];
        //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
        if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
            return [
                "STATUS" => "ERROR",
                "MENSAJE" => "NO ES EL FORMATO CORRECTO",
                "ERROR" => $error
            ];
        } else {
            $subirImagen = move_uploaded_file($temp, $ruta . $nombre);
            if ($subirImagen) {
                chmod($ruta . $nombre, 0777);
            } else {
                return [
                    "STATUS" => "ERROR",
                    "MENSAJE" => "NO SE GUARDO EN EL SERVIDOR",
                    "ERROR" => $error
                ];
            }
            return [
                "STATUS" => "OK",
                "MENSAJE" => "SE GURARDO CORRECTAMENTE EN EL SERVIDOR",
                "NOMBRE" => $nombre,
                "TIPO" => $tipo,
                "TAMAÑO" => $tamano,
                "RUTA" => $ruta.$nombre
             ];
        }
    }
}
