<?php
include_once("conexao.php");
session_start();


if (!empty($_GET['cod'])) {
    $cod = $_GET['cod'];
    $cpfPsi = $_SESSION['cpf'];
    $selectPac = "SELECT * FROM paciente WHERE cod = '$cod' AND fk_cpfPsi = '$cpfPsi'";
    $resultado = $conn->query($selectPac);
    $pac = $resultado->fetch_assoc();
    $cpfPac = $pac['cpf'];
    $deleteSessao = "DELETE FROM sessao WHERE fk_cpfPac = '$cpfPac' AND fk_cpfPsi = '$cpfPsi'";
    if ($conn->query($deleteSessao) === TRUE) {
        $sql = "DELETE FROM paciente WHERE cod = '$cod' AND fk_cpfPsi = '$cpfPsi'";
        if (($conn->query($sql) === TRUE)) {
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
}
?>