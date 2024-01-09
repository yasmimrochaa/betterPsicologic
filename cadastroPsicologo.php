<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/cadastro.css">
    <title>Realize seu Cadastro</title>
</head>

<body style="background: #D9D9D9;">
        <div class="page">
            <div class="coluna">
                <form action="cadastroPsiBD.php" method="POST" class="formCadastro">
                    <h1>Cadastro</h1>
                    <p>Digite os seus dados de acesso no campo abaixo.</p>

                    <label>Nome completo</label>
                    <input name="nome" type="text" placeholder="Digite seu nome completo" autofocus="true" required>

                    <label>E-mail</label>
                    <input name="email" type="email" placeholder="Digite seu e-mail" required />

                    <label>CPF</label>
                    <input name="cpf" type="text" placeholder="Digite seu cpf" required>

                    <label>Telefone</label>
                    <input name="telefone" type="text" placeholder="Digite seu telefone" required>

                    <label>Data de Nascimento</label>
                    <input name="dataNasc" type="date" required>

                    <label>Senha</label>
                    <input name="password" type="password" placeholder="Digite sua senha" required />

                    <label>Confirmar senha</label>
                    <input name="confPassword" type="password" placeholder="Digite sua senha novamente" required />

                    <a href="loginPsi.php">Já possuo cadastro</a>

                    <input type="submit" value="Cadastrar" class="btn" href="/" />
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        $(document).ready(function() {
            $('input[name=telefone]').mask('(00)0 0000-0000');
            $('input[name=cpf]').mask('000.000.000-00')
        });
    </script>

</body>

</html>