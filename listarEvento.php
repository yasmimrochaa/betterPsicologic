<?php
include_once("conexao.php");
session_start();

$cpfPsi = $_SESSION['cpf'];
$sql = "SELECT id, title, start, end, color, fk_cpfPsi  FROM evento WHERE fk_cpfPsi = '$cpfPsi'";

$result = $conn->query($sql);

$eventos = [];

while($row = $result->fetch_assoc()){
    // extrair o array
    extract($row);
    
    $eventos[] = [
        'id' => $id,
        'title' => $title,
        'start' => $start,
        'end' => $end,
        'color' => $color,

    ];
}

echo json_encode($eventos);
?>