<?php
include_once("conexao.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Document</title>
    <style>
        table,
        th,
        td,
        tr {
            align-items: center;
            text-align: center;
        }
    </style>

    <script>
        $(document).ready(function() {
            $("#form-pesquisa").submit(function(evento) {
                evento.preventDefault();
                let pesquisa = $("#pesquisa").val;
                let dados = {
                    pesquisa: pesquisa
                }
                $.post("buscaPessoa.php", dados, function(retorna) {
                    $(".resultados").html(retorna);
                });
            });
        });

        function confirmarExclusao(cod, nome, cpf) {
            if (window.confirm("Deseja realmente excluir o registro: \n" + cod + " - " + nome)) {
                window.location = "excluirPaciente.php?cod=" + cod;
            }
        }
    </script>


</head>

<body>
    <?php
    if (isset($_SESSION["email"])) {
        require_once("menu.php");
    ?>
        <h2 style="text-align: center; padding-bottom: 10px;"> Pacientes Cadastrados</h2>

        <form id="form-pesquisa" action="" method="post">
            <div class="col-6">
                <input type="text" size="50" name="pesquisa" id="pesquisa" placeholder="Digite o texto da pesquisa">
                <input type="submit" name="btnEnviar" id="btnEnviar" value="Pesquisar">
            </div>
        </form>

        <br><br><br>

        <div class="resultados">

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