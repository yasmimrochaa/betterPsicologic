<?php
require_once("conexao.php");
session_start();

$email = $conn->real_escape_string($_POST["email"]);
$senha = $_POST["password"];

$sql = "SELECT * 
            from psicologo 
            where email = '$email' and 
                  senha = '$senha' ";

$resultado = $conn->query($sql);
if ($resultado->num_rows > 0) {
    $dados_usuario = $resultado->fetch_assoc();
    $_SESSION["cod"] = $dados_usuario["cod"];
    $_SESSION["email"] = $dados_usuario["email"];
    $_SESSION["nome"] = $dados_usuario["nome"];

    header("location: home.php");
}else{
    ?>
    <script>window.history.back();</script>
    <?php
}
?>