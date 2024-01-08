<?php
include_once("conexao.php");
session_start();
if (isset($_GET["cod"])) {
    $cod = $_GET["cod"];
    $cpfPsi = $_SESSION['cpf'];
    $sql = "DELETE FROM sessao WHERE cod = $cod AND fk_cpfPsi = '$cpfPsi' ";
    if ($conn->query($sql) === TRUE) {
    ?>
        <script>
            alert("Sessao excluida com sucesso!");
             window.history.back();
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Erro ao excluir Sessao.");
             window.history.back();
        </script>
<?php
    }
}
?>