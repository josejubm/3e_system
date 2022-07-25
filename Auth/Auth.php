<?php

function Logear($user, $password){
    global $connection;
    $query = "SELECT * FROM usuario WHERE usuario = ? AND password = ?";
    $prepare = $connection->prepare($query);
    $prepare->bind_param("ss", $user, $password);
    $prepare->execute();

    $result = $prepare->get_result();

    if($result->num_rows == 1){
        $response = $result->fetch_all(MYSQLI_ASSOC);
        return [
            'MENSAJE' => "Usuario Logeado",
            'STATUS' => "OK",
            'USER' => $response[0]['id']
        ];

    }

    return [
        'MENSAJE' => "Usuario Invalido",
        'STATUS' => "ERROR"
    ];

}