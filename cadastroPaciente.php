<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/cadastro.css">
    <title>Document</title>
</head>

<body>
    <div class="page"">
        <div class=" coluna2">
        <form method="POST" class="formCadastro">
            <h1>Cadastro</h1>
            <p>Digite os seus dados de acesso no campo abaixo.</p>
            <label for="nome">Nome completo</label>
            <input type="text" placeholder="Digite seu nome completo" autofocus="true">
            <label for="email">E-mail</label>
            <input type="email" placeholder="Digite seu e-mail" />
            <label for="cpf">CPF</label>
            <input type="text" placeholder="Digite seu cpf">
            <label for="password">Senha</label>
            <input type="password" placeholder="Digite sua senha" />
            <label for="confPassword">Confirmar senha</label>
            <input type="password" placeholder="Digite sua senha novamente" />
            <a href="login.html">Já possuo cadastro</a>
            <input type="submit" value="Acessar" class="btn" href="/" />
        </form>
    </div>
    </div>
</body>

</html>