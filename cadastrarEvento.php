<?php
include_once("conexao.php");
session_start();

$title = $_POST["cad_title"];
$start = $_POST["cad_start"];
$end = $_POST["cad_end"];
$color = "#259B9F";
$cpfPsi = $_SESSION["cpf"];


$sql = "INSERT INTO evento (title, start, end, color, fk_cpfPsi) 
                VALUES ('$title', '$start', '$end', '$color', '$cpfPsi')";

if ($conn->query($sql) === TRUE) {
    $retorna = [
        'status' => true, 
        'msg' => 'Evento cadastrado com sucesso!',
        'id' => mysqli_insert_id($conn),
        'title' => $title,
        'start' => $start,
        'end' => $end,
        'color' => $color
    ];

} else {
    $retorna = [
        'status' => false,
        'msg' => 'Erro: Evento não cadastrado!'];

}

echo json_encode($retorna);
?>