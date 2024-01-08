<?php
include_once("conexao.php");
session_start();

$id = $_POST["edit_id"];
$title = $_POST["edit_title"];
$start = $_POST["edit_start"];
$end = $_POST["edit_end"];
$color = "#259B9F";
$cpfPsi = $_SESSION["cpf"];


$sql = "UPDATE evento SET id = '$id', title = '$title', start = '$start', end = '$end', color = '$color', fk_cpfPsi = '$cpfPsi' 
WHERE id = '$id' AND fk_cpfPsi = '$cpfPsi' ";

if ($conn->query($sql) === TRUE) {
    $retorna = [
        'status' => true,
        'msg' => 'Evento editado com sucesso!',
        'id' => $id,
        'title' => $title,
        'start' => $start, 
        'end' => $end, 
        'color' => $color
    ];
} else {
    $retorna = ['status' => false, 'msg' => 'Erro: Evento não editado'];
}
echo json_encode($retorna);
?>