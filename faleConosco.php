<?php
include_once("conexao.php");
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style/formulario.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        main {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        input{
            padding: 10px;
        }

    </style>
</head>
<body>
<?php
    if (isset($_SESSION["email"])) {
        require_once("menu.php");
    ?>

    <h2 style="text-align: center;">Fale conosco</h2>

    <main>
        <form>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="telefone">Telefone:</label>
            <input type="tel" id="telefone" name="telefone" required>

            <label for="mensagem">Mensagem:</label>
            <textarea id="mensagem" name="mensagem" rows="6" required></textarea>

            <br><br>

            <button type="submit" class="btn">Enviar</button>
        </form>
    </main>

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
