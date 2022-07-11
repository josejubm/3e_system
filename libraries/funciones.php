<?php
function CargarPagina($file = "template/template.php"){
    ob_start();
    require_once ($file);

    $template_string=ob_get_clean();
    return$template_string;
}
