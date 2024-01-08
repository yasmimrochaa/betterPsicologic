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

        .nav-link {
            color: #259B9F;
        }

        .btn-primary {
            background-color: #259B9F;
            border-color: #259B9F;
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
            $cpf = $paciente['cpf'];
            $sql1 = "SELECT * FROM sessao WHERE fk_cpfPac = '$cpf' AND fk_cpfPsi = '$cpfPsi' ORDER BY dataHora";
            $resultado = $conn->query($sql1);
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
                <br><span id="msg"></span>
                <br>

                <button type="button" class="btn btn-primary" style="background-color: #259B9F;border-color: #259B9F; margin-bottom: 10px;" data-bs-toggle="modal" data-bs-target="#modalCadastrar">Nova Sessão</button>
                <!-- The Modal -->
                <!-- Modal Cadastrar -->
                <div class="modal fade" id="modalCadastrar" tabindex="-1" aria-labelledby="modalCadastrar" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="TituloModalCadastrar">Nova Sessão</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="formCadSessao">
                                    <div class="row mb-3">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Data e hora:</label>
                                        <div class="col-sm-8">
                                            <input type="datetime-local" class="form-control" name="dataHoraCad" id="dataHoraCad" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Descreva a Sessão:</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="descricaoCad" id="descricaoCad" rows="6" required></textarea>
                                        </div>
                                    </div>
                                    <input type="hidden" name="cpf" value="<?php echo $paciente['cpf'] ?>">
                                    <input type="submit" name="cadSessao" id="cadSessao" class="btn btn-success" value="Salvar">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FIM -->
                <br>
                <table class="table table-striped table-hover table-bordered">
                    <tr class="table-info">
                        <th>Cod</th>
                        <th>Dia e Hora</th>
                        <th>Descrição da sessão</th>
                        <th>Excluir</th>
                    </tr>
                    <?php
                    while ($sessao = $resultado->fetch_assoc()) {
                        $dataFormatada = date('d/m/Y  -  H:i', strtotime($sessao['dataHora']));
                    ?>
                        <tr class="small mb-2">
                            <td><?php echo $sessao['cod'] ?></td>
                            <td id="data"><?php echo $dataFormatada ?></td>
                            <td><?php echo $sessao['descricao'] ?></td>
                            <td>
                                <button class="btn btn-danger" onclick="confirmarExclusao(
                            '<?php echo $sessao["cod"] ?>',
                            '<?php echo $sessao["dataHora"] ?>')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script type='text/javascript'>
        const msg = document.getElementById("msg");
        const modalCadastrar = new bootstrap.Modal('#modalCadastrar');

        const formCadSessao = document.getElementById("formCadSessao");
        formCadSessao.addEventListener("submit", async (e) => {
            e.preventDefault();
            const dadosForm = new FormData(formCadSessao);
            dadosForm.append("add", 1);
            const dados = await fetch("cadastrarSessao.php", {
                method: "POST",
                body: dadosForm,
            });
            const resposta = await dados.json();
            if (resposta['erro']) {
                msg.innerHTML = resposta['msg'];
            } else {
                msg.innerHTML = resposta['msg'];
            };
            formCadSessao.reset();
            modalCadastrar.hide();
            removerMsg();
            window.location.reload();
        });

        function confirmarExclusao(cod, dataHora) {
            if (window.confirm("Deseja realmente excluir o registro: \n" + cod + " - " + dataHora)) {
                window.location = "excluirSessao.php?cod=" + cod;
            }
        };

        function removerMsg() {
            setTimeout(() => {
                document.getElementById('msg').innerHTML = "";
            }, 5000)
        };
    </script>

</body>

</html>