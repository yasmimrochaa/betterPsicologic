<?php
include_once("conexao.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style/login.css">
    <title>Recuperar Senha</title>
</head>

<body>

<?php
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            if (!empty($dados['SendRecupSenha'])) {
                $email = $_POST['email'];

                $querySelect = "SELECT cod, nome, email 
                                FROM psicologo
                                WHERE email = '$email'
                                LIMIT 1";
                $result = $conn->query($querySelect);
                if ($result->num_rows != 0) {
                    $dados_usuario = $result->fetch_assoc();
                    $cod = $dados_usuario['cod'];
                    $chave_recuperarSenha = password_hash(
                        $dados_usuario['cod'] . $dados_usuario['email'],
                        PASSWORD_DEFAULT
                    );

                    $cod = $dados_usuario['cod'];
                    $queryUpdate = "UPDATE psicologo
                            SET chave_recuperarSenha = '$chave_recuperarSenha'
                            WHERE cod = '$cod'
                            LIMIT 1";
                    if ($conn->query($queryUpdate)) {
                        $link = "http://localhost/mytherapy/atualizarSenha.php?chave=$chave_recuperarSenha";
                        require('lib/vendor/autoload.php');
                        $mail = new PHPMailer(true);
                        try {
                            $mail->CharSet = 'UTF-8';
                            $mail->isSMTP();
                            $mail->Host = 'sandbox.smtp.mailtrap.io';
                            $mail->SMTPAuth = true;
                            $mail->Username = 'bc330ccac565e9';
                            $mail->Password = '4e7803d6d57d6c';
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                            $mail->Port = 465;
                            $mail->setFrom('mytherapyy.0@gmail.com', 'My Therapy');
                            $mail->addAddress($dados_usuario['email'], $dados_usuario['nome']);
                            $mail->isHTML(true);
                            $mail->Subject = 'Recuperar senha';
                            // formato html
                            $mail->Body = "Olá " . $dados_usuario['nome'] . ", Você solicitou alteração de senha.<br><br>
                            Para continuar o processo de recuperação de senha, clicque no link abaixo ou cole o endereço no seu navegador:
                            <br><br><a href='" . $link . "'>" . $link . "</a><br><br>Se você não solicitou essa alteração, nenhuma ação é
                            necessária. Sua senha permanecerá a mesma até que você ative este código ";
                            // formato texto
                            $mail->AltBody = "Olá " . $dados_usuario['nome'] . "\n\n Você solicitou alteração de senha.\n\n
                            Para continuar o processo de recuperação de senha, clicque no link abaixo ou cole o endereço no seu navegador:
                            \n\n" . $link . "\n\nSe você não solicitou essa alteração, nenhuma ação é
                            necessária. Sua senha permanecerá a mesma até que você ative este código \n\n";
                            $mail->send();
                            ?>
                            <script>
                                alert("Enviado email para recuperar a senha");
                                window.history.back();
                            </script>
                             <?php
                            header('location: loginPsi.php');
                            
                        } catch (Exception $e) {
                        ?>
                            <script>
                                alert("Erro: Email não enviado");
                                window.history.back();
                            </script>
                        <?php

                        }
                    } else {
                        ?>
                        <script>
                            alert("Erro: tente novamente!");
                            window.history.back();
                        </script>
                    <?php
                    }
                } else {
                    ?>
                    <script>
                        alert("Usuário não encontrado!");
                        window.history.back();
                    </script>
            <?php
                }
            }
            ?>
    <div class="page">
        <div class="coluna">

            <form method="POST" class="form" >
                <h1>Recuperar senha</h1>
                <p>Digite o seu email de acesso no campo abaixo.</p>

                <label>E-mail</label>
                <input name="email" type="email" placeholder="Digite seu e-mail" autofocus="true" require />


                <a href="loginPsi.php">Lembrei a senha</a>
                <input type="submit" value="Recuperar" class="btn" name="SendRecupSenha" />

            </form>
        </div>


    </div>

</body>

</html>