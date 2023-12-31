<?php
include_once("conexao.php");
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style/meuperfil.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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

        .nav-link{
            color: #259B9F;
        }
    </style>
</head>

<body>
    <?php
    require_once("menu.php")
    ?>
    <div class="container-xl px-4 mt-4">
        <h2 style="padding-bottom: 30px;">Prontuário</h2>

        <?php
        if (isset($_GET['cod'])) {
            $cod = $_GET['cod'];

            $cpfPsi = $_SESSION['cpf'];
            $sql = "SELECT * FROM paciente
                            WHERE fk_cpfPsi = '$cpfPsi' 
                            AND cod = '$cod'";
            $result = $conn->query($sql);
            $paciente = $result->fetch_assoc();
        }
        ?>

        <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin: 10px; margin-bottom: 0px;">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Ficha</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Sessões</button>
            </li>
        </ul>
        <div class="tab-content card" id="myTabContent" style="background-color: #fff; margin: 10px; margin-top: 0px; padding: 30px;">
            <!-- FICHA -->
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                <!-- CONTEUDO DO TABLE ACTIVE -->

                <h5 class="card-header">Informações do Paciente</h5>

                <div style="text-align: center;">
                    <br>
                    <?php include_once("exibirImgPac.php"); ?>
                </div>
                <br><br>


                <form action="updatePaciente.php" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label class="small mb-1" for="nome">Nome</label>
                            <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $paciente['nome'] ?>">
                        </div>
                        <div class="form-group col-md-1">
                            <label class="small mb-1" for="cod">Código</label>
                            <input type="text" class="form-control" name="cod" id="cod" value="<?php echo $paciente['cod'] ?>" disabled>
                            <input type="hidden" name="cod" value="<?php echo $paciente['cod'] ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="small mb-1" for="dataNasc">Data de nasc</label>
                            <input type="date" class="form-control" name="dataNasc" id="dataNasc" value="<?php echo $paciente['dataNasc'] ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="small mb-1" for="cpf">CPF</label>
                            <input type="text" class="form-control" name="cpf" id="cpf" value="<?php echo $paciente['cpf'] ?>">
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="form-group col-md-3">
                            <label class="small mb-1" for="telefone">Telefone</label>
                            <input type="text" class="form-control" name="telefone" id="telefone" value="<?php echo $paciente['telefone'] ?>">
                        </div>
                        <div class="form-group col-md-5">
                            <label class="small mb-1" for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="<?php echo $paciente['email'] ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="small mb-1" for="sexo">Sexo</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexo" id="feminino" value="feminino" <?php echo $paciente['sexo'] == 'feminino' ? 'checked' : '' ?>>
                                <label class="form-check-label" for="feminino">Feminino</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexo" id="masculino" value="masculino" <?php echo $paciente['sexo'] == 'Masculino' ? 'checked' : '' ?>>
                                <label class="form-check-label" for="masculino">Masculino</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexo" id="outro" value="outro" <?php echo $paciente['sexo'] == 'Outro' ? 'checked' : '' ?>>
                                <label class="form-check-label" for="outro">Outro</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="endereco">Endereço</label>
                            <input type="text" class="form-control" name="endereco" id="endereco" value="<?php echo $paciente['endereco'] ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="medicamentos">Medicamentos</label>
                            <textarea class="form-control" id="medicamentos" name="medicamentos" rows="5"><?php echo $paciente['medicamentos'] ?></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="cpfPsi" value="<?php echo $paciente['fk_cpfPsi'] ?>">
                    <input type="hidden" name="senha" value="<?php echo $paciente['senha'] ?>">
                    <input type="hidden" name="img" value="<?php echo $paciente['img'] ?>">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" name="update" id="update" class="btn btn-primary" style="background-color: #259B9F;">Salvar alterações</button>
                    </div>
                </form>
                <!-- FIM DO CONTEUDO -->
            </div>

            <!-- SESSÕES -->
            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                <!-- INICIO DO CONTEUDO -->

                <h5 class="card-header">Resumo das sessões</h5>
                <br>
                <table class="table table-striped table-hover table-bordered">
                    <tr class="table-info">
                        <th>Dia</th>
                        <th>Descrição da sessão</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                    <tr class="small mb-2">
                        <td>11/12/20</td>
                        <td>dbewgucbdwjcveghcveghvceghjcbhrfvbrhkdbdhcbgefhc brc gfghrfbhgfghgjhgftyjgyughjfgbhrycjbh</td>
                        <td>
                            <button class="btn btn-primary" style=" background-color: #259B9F">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001" />
                                </svg>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                </table>

                <button type="button" class="btn btn-primary" style="background-color: #259B9F;" data-toggle="modal" data-target="#ExemploModalCentralizado">Nova Sessão</button>
                <!-- The Modal -->
                <!-- Modal -->
                <div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="TituloModalCentralizado">Nova Sessão</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="">
                                    <div class="row mb-3">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Data e hora:</label>
                                        <div class="col-sm-8">
                                            <input type="datetime-local" class="form-control" id="inputEmail3">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Descreva a Sessão:</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="floatingTextarea" rows="6"></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success">Salvar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FIM -->
            </div>
        </div>
    </div>




</body>

</html>