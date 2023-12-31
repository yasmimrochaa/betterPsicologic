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

        .box-search {
            display: flex;
            justify-content: end;
            gap: .1%;
        }


    </style>

</head>

<body>
    <?php
    if (isset($_SESSION["email"])) {
        require_once("menu.php");
    ?>
        <h2 style="text-align: center; padding-bottom: 10px;"> Pacientes Cadastrados</h2>

        <div class="box-search">
            <input type="search" class="form-control w-25" placeholder="Pesquisar..." id="pesquisar">
            <button onclick="searchData()" type="button" class="btn btn-info">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                </svg>
            </button>
        </div>

        <br>

        <table class="table table-striped table-hover table-bordered ">
            <tr class="table-info">
                <th>Cod</th>
                <th>Nome</th>
                <th>CPF</th>
                <th class="d-none d-lg-table-cell">Telefone</th>
                <th width="120" class="text-center">Visualizar</th>
                <th width="120" class="text-center">Deletar</th>
            </tr>

            <?php
            $cpfPsi = $_SESSION["cpf"];
            if (!empty($_GET['search'])) {
                $data = $_GET['search'];
                $sql = "SELECT * 
                FROM paciente 
                WHERE fk_cpfPsi = '$cpfPsi' 
                AND cod LIKE '%$data%' 
                OR nome LIKE '%$data%'
                ORDER BY cod ";
            } else {
                $sql = "SELECT * 
                FROM paciente 
                WHERE fk_cpfPsi = '$cpfPsi'
                ORDER BY cod ";
            };
            $dadosPessoa = $conn->query($sql);
            while ($exibir = $dadosPessoa->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $exibir["cod"] ?></td>
                    <td><?php echo $exibir["nome"] ?></td>
                    <td><?php echo $exibir["cpf"] ?></td>
                    <td><?php echo $exibir["telefone"] ?></td>
                    <td>
                        <button class="btn btn-primary" style=" background-color: #259B9F">
                            <a href="paciente.php?cod=<?php echo $exibir['cod']?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                </svg>
                            </a>
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-danger" onclick="confirmarExclusao(
                            '<?php echo $exibir["cod"] ?>',
                            '<?php echo $exibir["nome"] ?>')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                            </svg>
                        </button>
                    </td>
                </tr>

            <?php
            }
            ?>
        </table>


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

    <script>
        function confirmarExclusao(cod, nome, cpf) {
            if (window.confirm("Deseja realmente excluir o registro: \n" + cod + " - " + nome)) {
                window.location = "excluirPaciente.php?cod=" + cod;
            }
        }

        var search = document.getElementById('pesquisar');

        search.addEventListener("keydown", function(event) {
            if (event.key === "Enter") {
                searchData();
            }
        });

        function searchData() {
            window.location = 'prontuario.php?search=' + search.value;
        }
    </script>


</body>

</html>