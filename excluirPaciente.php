<?php
include_once("conexao.php");
if (isset($_GET["cod"])) {
    $cod = $_GET["cod"];
    $sql = "DELETE FROM paciente WHERE cod = $cod";
    if ($conn->query($sql) === TRUE) {
    ?>
        <script>
            alert("Paciente excluido com sucesso!");
            window.location = "prontuario.php";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Erro ao excluir paciente.");
            window.location = "prontuario.php";
        </script>
<?php
    }
}
?>