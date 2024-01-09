<?php
include_once("conexao.php");
session_start();

$cpf = $_SESSION['cpf'];
$deleteEvento = "DELETE FROM evento WHERE fk_cpfPsi = '$cpf'";
if ($conn->query($deleteEvento) === TRUE) {
    $deleteSessao = "DELETE FROM sessao WHERE fk_cpfPsi = '$cpf'";
    if ($conn->query($deleteSessao) === TRUE) {
        $deletePac = "DELETE FROM paciente WHERE fk_cpfPsi = '$cpf'";
        if ($conn->query($deletePac) === TRUE) {
            $deletePsi = "DELETE FROM psicologo WHERE cpf = '$cpf'";
            if ($conn->query($deletePsi) === TRUE) {
                ?>
                <script>
                    alert("Usuario excluido com sucesso!");
                    window.location = "index.php";
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert("Erro ao excluir usuario!");
                    window.location = "meuPerfil.php";
                </script>
            <?php
            }
        } else { ?>
            <script>
                alert("Erro ao excluir usuario!");
                window.location = "meuPerfil.php";
            </script>
        <?php
        }
    } else { ?>
        <script>
            alert("Erro ao excluir usuario!");
            window.location = "meuPerfil.php";
        </script>
    <?php
    }
} else { ?>
    <script>
        alert("Erro ao excluir usuario!");
        window.location = "meuPerfil.php";
    </script>
<?php
}

?>