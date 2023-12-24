<?php
include_once("conexao.php");

$sql = "SELECT id, title, start, end, color, fk_cpfPac, fk_cpfPsi  FROM evento";

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