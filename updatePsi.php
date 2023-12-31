<?php
include_once("conexao.php");
session_start();
if (isset($_POST['update'])) {
    $nome = $_POST['nome'];
    $cod = $_POST['cod'];
    $dataNasc = $_POST['dataNasc'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $img = $_POST['img'];

    $sql = "UPDATE psicologo SET cpf='$cpf',nome='$nome',senha='$senha',email='$email',cod='$cod',telefone='$telefone',
        dataNasc='$dataNasc',img='$img'
         WHERE cod = '$cod'";


    if ($conn->query($sql) === TRUE) {
?>
        <script>
            alert("Registro atualizado com sucesso!");
            window.location = "meuPerfil.php";
        </script>
    <?php
    require_once("exibirImg.php");
    } else {
    ?>
        <script>
            alert("Erro ao atualizar o registro!");
            window.history.back();
        </script>
<?php
    }
}
?>