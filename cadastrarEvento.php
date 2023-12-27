<?php
include_once("conexao.php");
session_start();
$title = $_POST["cad_Title"];
$start = $_POST["cad_start"];
$end = $_POST["cad_end"];
$color = $_POST["cad_color"];
// ALTERAR ISSO DPS
$cpfPac = null ;
$cpfPsi = $_SESSION["cpf"];

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$sql = "INSERT INTO evento (title, start, end, color) VALUES ('$title', '$start', '$end', '$color')";
$conn -> query($sql)
?>