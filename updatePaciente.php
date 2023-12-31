<?php
include_once("conexao.php");
session_start();
if (isset($_POST['update'])) {
    $cpfPsi = $_SESSION['cpf'];
    $nome = $_POST['nome'];
    $cod = $_POST['cod'];
    $dataNasc = $_POST['dataNasc'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $sexo = $_POST['sexo'];
    $endereco = $_POST['endereco'];
    $medicamentos = $_POST['medicamentos'];
    $senha = $_POST['senha'];
    $img = $_POST['img'];

    $sql = "UPDATE paciente SET cpf='$cpf',nome='$nome',senha='$senha',email='$email',cod='$cod',telefone='$telefone',
    dataNasc='$dataNasc',sexo='$sexo',endereco='$endereco',medicamentos='$medicamentos',img='$img',fk_cpfPsi='$cpfPsi'
     WHERE cod = '$cod' AND fk_cpfPsi='$cpfPsi'";

    $result = $conn->query($sql);

}
header('Location: prontuario.php');

?>
