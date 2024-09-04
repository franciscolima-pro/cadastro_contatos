<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $bd = "alphacode";

    $conex = mysqli_connect($server, $user, $pass, $bd);

    if (!$conex) {
        die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
    }
?>