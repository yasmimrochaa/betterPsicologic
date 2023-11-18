<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/cadastroPac.css">
    <title>Document</title>
</head>

<body>
    <?php
    require_once("menu.php")
    ?>

    <h1 style="text-align: center;">Cadastro de Pacientes</h1>

    <main>
        <form action="cadastroPacBD.php" method="POST" class="formCadastro">
            
            <p>Digite os dados do Paciente nos campos abaixo.</p>
            <label>Nome completo</label>
            <input name="nome" text" placeholder="Digite seu nome completo" autofocus="true" required>

            <label>E-mail</label>
            <input name="email" type="email" placeholder="Digite seu e-mail" required>

            <label>CPF</label>
            <input name="cpf" type="text" placeholder="Digite seu cpf" required>

            <label>Telefone</label>
            <input name="telefone" type="text" placeholder="Digite seu telefone" required>

            <label>Data de Nasciemnto</label>
            <input name="dataNasc" type="date" required>

            <label for="sexo">Sexo:</label>
            <select id="sexo" name="sexo" required>
                <option value="masculino">Masculino</option>
                <option value="feminino">Feminino</option>
                <option value="outro">Outro</option>
            </select>

            <label>Endereço</label>
            <input name="endereco" type="text" placeholder="Digite seu endereco" required>

            <label>Medicamentos</label>
            <input name="medicamentos" type="text" placeholder="Digite os medicamentos que o paciente faz uso" required>

            <label>Senha</label>
            <input name="password" type="password" placeholder="Digite sua senha" required />

            <label>Confirmar senha</label>
            <input name="confPassword" type="password" placeholder="Digite sua senha novamente" required />

            <button type="submit" href="/"> Cadastrar </button>
            
        </form>
    </main </body>

</html>