<?php
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD', '');
    define('DB', 'betterPsicologic');

    $conn = new mysqli(HOST, USER, PASSWORD, DB);

    if($conn->connection_error){
        die("Falha na conexao com o BD: " . $conn->connect_error);
    }
?>