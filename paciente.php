<?php
include_once("conexao.php");
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/meuperfil.css">
    <title>Prontuário Médico</title>
    <style>
        table,
        th,
        td,
        tr {
            align-items: center;
            text-align: center;
        }

        h2,
        h4 {
            text-align: center;

        }

        img {
            background-color: #ddd;
            border-radius: 50%;
            height: 200px;
            object-fit: cover;
            width: 200px;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?php
    require_once("menu.php")
    ?>
    <div class="container-xl px-4 mt-4">
        <h2 style="padding-bottom: 50px;">Prontuário</h2>

        <?php
        if (!empty($_GET['cod'])) {
            $cod = $_GET['cod'];
            $cpfPsi = $_SESSION['cpf'];
            $sql = "SELECT * FROM paciente
                            WHERE fk_cpfPsi = '$cpfPsi' 
                            AND cod = '$cod'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($user_data = mysqli_fetch_assoc($result)) {
                    $nome = $user_data['nome'];
                    $senha = $user_data['senha'];
                    $dataNasc = $user_data['dataNasc'];
                    $cpf = $user_data['cpf'];
                    $email = $user_data['email'];
                    $telefone = $user_data['telefone'];
                    $sexo = $user_data['sexo'];
                    $endereco = $user_data['endereco'];
                    $medicamentos = $user_data['medicamentos'];
                    $img = $user_data['img'];
                }
            } else {
                header('Location: prontuario.php');
            }
        }
        ?>

        <div class="row">
            <div class="col-xl 4">
                <div class="card mb-4 mb-xl-0">
                    <div class=" card-body">
                        <div class="card-header">Informações do Paciente</div>

                        <div style="text-align: center;">
                            <br>
                            <?php include_once("exibirImg.php"); ?>
                        </div>
                        <br><br>
                        <form action="updatePaciente.php" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label class="small mb-1" for="nome">Nome</label>
                                    <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $nome ?>">
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="small mb-1" for="cod">Código</label>
                                    <input type="text" class="form-control" name="cod" id="cod" value="<?php echo $cod ?>" disabled>
                                    <input type="hidden" name="cod" value="<?php echo $cod?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="small mb-1" for="dataNasc">Data de nasc</label>
                                    <input type="date" class="form-control" name="dataNasc" id="dataNasc" value="<?php echo $dataNasc ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="small mb-1" for="cpf">CPF</label>
                                    <input type="text" class="form-control" name="cpf" id="cpf" value="<?php echo $cpf ?>">
                                </div>
                            </div>

                            <div class="form-row mb-3">
                                <div class="form-group col-md-3">
                                    <label class="small mb-1" for="telefone">Telefone</label>
                                    <input type="text" class="form-control" name="telefone" id="telefone" value="<?php echo $telefone ?>">
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="small mb-1" for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" value="<?php echo $email ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="small mb-1" for="sexo">Sexo</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sexo" id="feminino" value="feminino" <?php echo $sexo == 'feminino' ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="feminino">Feminino</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sexo" id="masculino" value="masculino" <?php echo $sexo == 'Masculino' ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="masculino">Masculino</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sexo" id="outro" value="outro" <?php echo $sexo == 'Outro' ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="outro">Outro</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="form-group col-md-6">
                                    <label class="small mb-1" for="endereco">Endereço</label>
                                    <input type="text" class="form-control" name="endereco" id="endereco" value="<?php echo $endereco ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="small mb-1" for="medicamentos">Medicamentos</label>
                                    <textarea class="form-control" id="medicamentos" name="medicamentos" rows="5"><?php echo $medicamentos ?></textarea>
                                </div>
                            </div>
                    </div>
                    <input type="hidden" name="senha" value="<?php echo $senha?>">
                    <input type="hidden" name="img" value="<?php echo $img?>">
                    <button type="submit" name="update" id="update" class="btn btn-primary" style="background-color: #259B9F;">Salvar alterações</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-xl-8">
            <div class="card mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="card-header">Resumo das sessões</div>
                    <br>
                    <table class="table table-striped table-hover table-bordered">
                        <tr style="background-color: #b5ebec" class="small mb-3">
                            <th>Dia</th>
                            <th>Descrição da sessão</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                        <tr class="small mb-2">
                            <td>11/12/20</td>
                            <td>dbewgucbdwjcveghcveghvceghjcbhrfvbrhkdbdhcbgefhc brc gfghrfbhgfghgjhgftyjgyughjfgbhrycjbh</td>
                        </tr>
                    </table>
                </div>
                <button type="button" class="btn btn-primary" style="background-color: #259B9F;" data-toggle="modal" data-target="#ExemploModalCentralizado">Nova Sessão</button>
                <!-- The Modal -->
                <!-- Modal -->
                <div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="TituloModalCentralizado">Nova Sessão</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="">
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Descreva a sessão:</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" style="background-color: #259B9F;">Salvar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>




</body>

</html>