<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/cadastroPac.css">
    <title>Document</title>
</head>

<body>
    <div class="page"">
        <div class=" coluna2">
        <form method="POST" class="formCadastro">
            <h1>Cadastro de Pacientes</h1>
            <p>Digite os dados do Paciente nos campos abaixo.</p>
            <label for="nome">Nome completo</label>
            <input type="text" placeholder="Digite seu nome completo" autofocus="true">

            <label for="email">E-mail</label>
            <input type="email" placeholder="Digite seu e-mail" />

            <label for="cpf">CPF</label>
            <input type="text" placeholder="Digite seu cpf">

            <label for="telefone">Telefone</label>
            <input type="text" placeholder="Digite seu telefone">

            <label for="dataNasc">Data de Nasciemnto</label>
            <input type="text" placeholder="Digite sua data de nascimento">

            <label for="genero">Gênero</label>
            <input type="text" placeholder="Digite seu gênero">

            <label for="endereco">Endereço</label>
            <input type="text" placeholder="Digite seu endereco">

            <label for="medicamentos">Medicamentos</label>
            <input type="text" placeholder="Digite os medicamentos que o paciente faz uso">

            <label for="password">Senha</label>
            <input type="password" placeholder="Digite sua senha" />

            <label for="confPassword">Confirmar senha</label>
            <input type="password" placeholder="Digite sua senha novamente" />

            <input type="submit" value="Cadastrar" class="btn" href="/" />
        </form>
    </div>
    </div>
</body>

</html>