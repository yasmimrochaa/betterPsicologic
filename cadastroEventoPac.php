<?php
include_once("conexao.php");
session_start();

$start = $_POST['dataHora'];
$cpfPsi = $_SESSION['fk_cpfPsi'];
$querySelect = "SELECT * FROM evento WHERE start = '$start' AND fk_cpfPsi = '$cpfPsi' ";
$resposta = $conn->query($querySelect);
if ($resposta->num_rows == 0) {
    $title = $_SESSION['nome'];
    $end = strtotime($start);
    $endTimestamp = strtotime('+1 hours', $end);
    $end = date('Y-m-d H:i:s', $endTimestamp);
    $queryInsert = "INSERT INTO evento (title, start, end, color, fk_cpfPsi)
                    VALUES ('$title', '$start', '$end', '#259B9F', '$cpfPsi')";
    if($conn->query($queryInsert) === TRUE){
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>
    Horário agendado com sucesso!</div>"];
    }else{
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>
    Horário não agendado com sucesso</div>"];
    }
} else {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>
    Horário não disponível na agenda!</div>"];
}

echo json_encode($retorna);
?>
