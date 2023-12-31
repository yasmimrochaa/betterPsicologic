<?php
include_once("conexao.php");
$cod = $_SESSION["cod"];
$sql = "SELECT * from psicologo WHERE cod = $cod";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($exibir = $result->fetch_assoc()) {
?>
        <div class="exibir">
            <img style="width: 250px; height: 250px; object-fit: cover; border-radius: 50%;" src=uploads/<?php echo $exibir["img"] ?>>
        </div>
<?php

        $sql = "SELECT * FROM psicologo
                                        WHERE cod = '$cod'";
        $result = $conn->query($sql);
        $pessoa = $result->fetch_assoc();
    }
} else {
    echo "Nenhum registro encontrado.";
}

$conn->close();
?>