<?php
    include_once("conexao.php");
    if (isset($_GET["cod"])) {
        $cod = $_SESSION("cod");
    $sql = "DELETE FROM psicologo WHERE cod = $cod";
    echo $sql;
    if ($conn->query($sql) === TRUE) {
        ?>
            <script>
                alert("Usuário excluido com sucesso!");
                window.location = "index.php";
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("Erro ao excluir usuário.");
                window.location = "meuPerfil.php";
            </script>
    <?php
        }
    }
    
?>