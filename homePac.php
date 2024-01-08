<?php
include_once("conexao.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Home</title>
</head>

<body>
    <?php
    if (isset($_SESSION["email"])) {
        require_once("menuPac.php");
    ?>

        <center>
            <h1>Seja Bem Vindo(a)!</h1>
        </center>

        <br><br>
        <div>
            <p class="conteudo">
                <center> Olá paciente, no nosso website você pode agendar seu próprio horário <br>
                em “Agendar um horário”, você também pode acessar os horários agendados através <br>
                 de “Meus horários”, em “Meu perfil” tem a opção de acessar seu perfil contendo <br> 
                 todas as informações do cadastro, e por fim poderá ter acesso ao nosso email por <br>
                 meio do “Fale conosco”.<br><br><br>
                    <img src="style/image/logoBranco.png" alt="">
                </center>
            </p>
        </div>
    <?php
    } else {
    ?>
        <br>
        <div class="alert alert-warning">
            <p>Usuário não autenticado!</p>
            <a href="index.php">Realize o login</a>
        </div>
    <?php
    }
    ?>
</body>

</html>