<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/formulario.css">
    <title>Document</title>
</head>

<body>
    <?php
    require_once("menu.php")
    ?>

    <h2 style="text-align: center;">Cadastro de Pacientes</h2>

    <main>
        <form action="cadastroPacBD.php" method="POST" class="formCadastro">

            <p style="margin-bottom: 5px; text-align: center;">Digite os dados do Paciente nos campos abaixo.</p>

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

            <button class="btn" type="submit" href="/" style="margin-top: 20px;"> Cadastrar </button>

        </form>
    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        $(document).ready(function() {
            $('input[name=telefone]').mask('(00)0 0000-0000');
            $('input[name=cpf]').mask('000.000.000-00')
        })
    </script>
</body>


</html>