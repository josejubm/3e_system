<?php
require_once ('libraries/connection.php');
require_once ('libraries/funciones.php');
require_once ('libraries/Auth/Auth.php');

switch ($_POST["action"]){
    case "login":
        $use_name = $_POST['user'];
        $password = $_POST['password'];

        $resultado = Logear($use_name, $password);

        if($resultado['STATUS'] == 'OK'){

        session_start();
        $_SESSION["user"] = $user;

            header("Location: index.php");
        }else{
            header("Location: Login.php");
        }

        break;

        default;

        break;

}



?>