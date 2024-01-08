<?php
include_once("conexao.php");
session_start();

$dataHora = $_POST["dataHoraCad"];
$descricao = $_POST["descricaoCad"];
$cpfPac = $_POST["cpf"];
$cpfPsi = $_SESSION['cpf'];

if (!empty($dataHora)) {
    $sql = "INSERT INTO sessao (dataHora, descricao, fk_cpfPsi, fk_cpfPac) 
                VALUES ('$dataHora', '$descricao', '$cpfPsi', '$cpfPac')";

    if ($conn->query($sql) === TRUE) {
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>
    Sessão cadastrada com sucesso!</div>"];
    } else {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>
    Sessão não cadastrada com sucesso</div>"];
    }
    echo json_encode($retorna);
}else{
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>
    Sessão não cadastrada com sucesso</div>"];
}
?>