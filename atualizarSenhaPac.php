<?php
include_once("conexao.php");

$chave_recuperarSenha = filter_input(INPUT_GET, 'chave', FILTER_DEFAULT);
if (empty($chave_recuperarSenha)) {
?>
    <script>
        alert("Erro: link inválido");
        window.location = "loginPac.php";
    </script>
    <?php
} else {
    $querySelect = "SELECT cod FROM paciente WHERE chave_recuperarSenha = '$chave_recuperarSenha'";
    $result = $conn->query($querySelect);
    if ($result->num_rows === 0) {
    ?>
        <script>
            alert("Erro: link inválido");
            window.location = "loginPac.php";
        </script>
<?php
    }else{
        $dadosUsuario = $result->fetch_assoc();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style/login.css">
    <title>Atuzalizar Senha</title>
</head>

<body>
    <div class="page">
        <div class="coluna">

            <?php
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            if (!empty($dados['SendNovaSenha'])) {
                $senha = $dados['senha'];
                $confirmaSenha = $dados['confirmaSenha'];
                if ($senha === $confirmaSenha) {
                    $senhaCriptografada = md5($senha);
                    $cod = $dadosUsuario['cod'];
                    $queryUpdate = "UPDATE paciente 
                                        SET senha = '$senhaCriptografada',
                                            chave_recuperarSenha = ''
                                        WHERE cod = '$cod'
                                        LIMIT 1";
                    if ($conn->query($queryUpdate) === TRUE) {
                        ?>
                    <script>
                        alert("Senha alterada com sucesso!");
                        window.location = "loginPac.php";
                    </script>
            <?php
                    }else{
                        ?>
                    <script>
                        alert("Erro ao alterar a senha");
                        window.history.back();
                    </script>
            <?php
                    }
                } else {
                ?>
                    <script>
                        alert("Senhas diferentes");
                        window.history.back();
                    </script>
            <?php
                }
            }
            ?>

            <form method="POST" class="form">
                <h1>Atualizar Senha</h1>
                <p>Digite a nova senha de acesso no campo abaixo.</p>

                <label>Senha</label>
                <input name="senha" type="password" placeholder="Digite sua nova senha" autofocus="true" require />

                <label>Confirme sua senha</label>
                <input name="confirmaSenha" type="password" placeholder="Digite novamente sua nova senha" autofocus="true" require />

                <a href="loginPac.php">Lembrei a senha</a>
                <input type="submit" value="Atualizar" class="btn" name="SendNovaSenha"/>

            </form>
        </div>
    </div>
</body>

</html>