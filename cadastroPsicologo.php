<?php
    session_start();
?>
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
            <form action="database/cadastroPsi.php" method="POST" class="formCadastro">
            <h1>Cadastro</h1>
            <p>Digite os seus dados de acesso no campo abaixo.</p>

            <label>Nome completo</label>
            <input name="nome" type="text" placeholder="Digite seu nome completo" autofocus="true">

            <label>E-mail</label>
            <input name="email" type="email" placeholder="Digite seu e-mail" />

            <label>CPF</label>
            <input name="cpf" type="text" placeholder="Digite seu cpf">

            <label>Telefone</label>
            <input name="telefone" type="tel" placeholder="Digite seu Telefone">

            <label>Data de Nascimento</label>
            <input name="dataNasc" type="date">

            <label>Senha</label>
            <input name="password" type="password" placeholder="Digite sua senha" />

            <label>Confirmar senha</label>
            <input name="confPassword" type="password" placeholder="Digite sua senha novamente" />

            <a href="login.php">Já possuo cadastro</a>

            <input type="submit" value="Cadastrar" class="btn" href="/"/>
        </form>
        </div>
        <div class="coluna">
            <img src="style/image/fundoCadas.png" alt="">
        </div>
    </div>
</body>
</html>