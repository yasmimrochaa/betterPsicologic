<?php
    require_once("conexao.php");
    session_start();

    $email = $conn->real_escape_string($_POST["email"]);
    $senha = $_POST["password"];

    $sql = "SELECT * 
            from psicologo, paciente 
            where email = '$email' and 
                  senha = '$senha' "
?>