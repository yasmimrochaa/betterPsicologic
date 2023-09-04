<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/cadastro.css">
    
    <title>Realize seu Cadastro</title>
</head>
<body>
    <div class="page">
        <div class="coluna">
            <form method="POST" class="formCadastro">
            <h1>Cadastro</h1>
            <p>Digite os seus dados de acesso no campo abaixo.</p>
            <label name="nome">Nome completo</label>
            <input type="text" placeholder="Digite seu nome completo" autofocus="true">
            <label name="email">E-mail</label>
            <input type="email" placeholder="Digite seu e-mail" />
            <label name="cpf">CPF</label>
            <input type="text" placeholder="Digite seu cpf">
            <label name="telefone">Telefone</label>
            <input type="tel" placeholder="Digite seu Telefone">
            <label name="dataNas">Data de Nascimento</label>
            <input type="date">
            <label name="password">Senha</label>
            <input type="password" placeholder="Digite sua senha" />
            <label name="confPassword">Confirmar senha</label>
            <input type="password" placeholder="Digite sua senha novamente" />
            <a href="login.html">Já possuo cadastro</a>
            <input type="submit" value="Cadastrar" class="btn" href="/"/>
        </form>
        </div>
        <div class="coluna">
            <img src="style/image/fundoCadas.png" alt="">
        </div>
    </div>
</body>
</html>