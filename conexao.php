<?php
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD', '');
    define('DB', 'mytherapy');

    $conn = new mysqli(HOST, USER, PASSWORD, DB);

    if($conn->connect_error){
        die("Falha na conexao com o BD: " . $conn->connect_error);
    }
?>