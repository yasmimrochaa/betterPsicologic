<?php
require_once("conexao.php");
session_start();

$usuario = $conn->real_escape_string($_POST["email"]);
$senha = md5($_POST["password"]);


$sql = "SELECT * 
            from psicologo 
            where email = '$usuario' and 
                  senha = '$senha' ";

$resultado = $conn->query($sql);
if ($resultado->num_rows > 0) {
    $dados_usuario = $resultado->fetch_assoc();
    $_SESSION["cod"] = $dados_usuario["cod"];
    $_SESSION["email"] = $dados_usuario["email"];
    $_SESSION["nome"] = $dados_usuario["nome"];
    $_SESSION["cpf"] = $dados_usuario["cpf"];
    $_SESSION["telefone"] = $dados_usuario["telefone"];
    $_SESSION["dataNasc"] = $dados_usuario["dataNasc"];

    header("location: home.php");
}else{
    ?>
    <script>
        alert("Email ou senha incorretos!");
        window.history.back();
    </script>
    <?php
}
?>