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
        <form action="cadastroPacBD.php" method="POST" class="formCadastro">
            <h1>Cadastro de Pacientes</h1>
            <p>Digite os dados do Paciente nos campos abaixo.</p>
            <label>Nome completo</label>
            <input name="nome" text" placeholder="Digite seu nome completo" autofocus="true">

            <label>E-mail</label>
            <input name="email" type="email" placeholder="Digite seu e-mail" />

            <label>CPF</label>
            <input name="cpf" type="text" placeholder="Digite seu cpf">

            <label>Telefone</label>
            <input name="telefone" type="text" placeholder="Digite seu telefone">

            <label>Data de Nasciemnto</label>
            <input name="dataNasc" type="date">

            <label>Gênero</label>
            <input name="genero" type="text" placeholder="Digite seu gênero">

            <label>Endereço</label>
            <input name="endereco" type="text" placeholder="Digite seu endereco">

            <label>Medicamentos</label>
            <input name="medicamentos" type="text" placeholder="Digite os medicamentos que o paciente faz uso">

            <label>Senha</label>
            <input name="password" type="password" placeholder="Digite sua senha" />

            <label>Confirmar senha</label>
            <input name="confPassword" type="password" placeholder="Digite sua senha novamente" />

            <input type="submit" value="Cadastrar" class="btn" href="/" />
        </form>
    </div>
    </div>
</body>

</html>