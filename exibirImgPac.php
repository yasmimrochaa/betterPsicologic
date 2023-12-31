<?php
include_once("conexao.php");
$cod = $_GET["cod"];
$cpfPsi = $_SESSION['cpf'];
$sql = "SELECT * from paciente 
    WHERE cod = '$cod'
    AND fk_cpfPsi = '$cpfPsi'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($exibir = $result->fetch_assoc()) {
?>

        <img style="width: 200px; height: 200px; object-fit: cover; border-radius: 50%;" src=uploads/<?php echo $exibir["img"] ?>>

<?php

        $sql = "SELECT * FROM paciente
                     WHERE cod = '$cod'";
        $result = $conn->query($sql);
        $pessoa = $result->fetch_assoc();
    }
} else {
    echo "Nenhum registro encontrado.";
}

$conn->close();
?>