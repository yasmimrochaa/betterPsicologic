<?php
include_once("conexao.php");
session_start();
?>

<!doctype html>
<html lang="pt-br">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>

  <link rel="stylesheet" href="style/calendario.css">
  <title>Agenda Prossifional</title>

</head>

<body>
  <?php
  if (isset($_SESSION["email"])) {
    require_once("menu.php");
  ?>

    <div class="container">

      <h1 style="text-align: center;" class="mb-5"> Agenda </h1>

      <span id="msg" style="padding-bottom: 10px;"></span>

      <div id='calendar'></div>

    </div>

    <!-- Modal Visualizar -->
    <div class="modal fade" id="visualizarModal" tabindex="-1" aria-labelledby="visualizarModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="visualizarModalLabel">Visualizar o Evento </h1>
            <h1 class="modal-title fs-5" id="editarModalLabel" style="display: none;">Editar o Evento </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <span id="msgViewEvento"></span>
            <div id="visualizarEvento">
              <dl class="row">
                <dt class="col-sm-3">ID: </dt>
                <dd class="col-sm-9" id="visualizar_id"></dd>
                <dt class="col-sm-3">Nome do paciente: </dt>
                <dd class="col-sm-9" id="visualizar_title"></dd>
                <dt class="col-sm-3">Início: </dt>
                <dd class="col-sm-9" id="visualizar_start"></dd>
                <dt class="col-sm-3">Fim: </dt>
                <dd class="col-sm-9" id="visualizar_end"></dd>
              </dl>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning" id="btnViewEditEvento" sty>Editar</button>
                <button type="button" class="btn btn-danger" id="btnApagarEvento" sty>Apagar</button>
              </div>
            </div>


            <div id="editarEvento" style="display: none;">
              <!-- Modal Editar -->
              <span id="msgEditEvento"></span>
              <form method="POST" id="formEditEvento">
                <input type="hidden" name="edit_id" id="edit_id">
                <div class="mb-3 row">
                  <label for="edit_title" class="col-sm-2 col-form-label">Nome:</label>
                  <div class="col-sm-10">
                    <input type="text" id="edit_title" name="edit_title" class="form-control">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="edit_start" class="col-sm-2 col-form-label">Início:</label>
                  <div class="col-sm-10">
                    <input type="datetime-local" class="form-control" name="edit_start" id="edit_start">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="edit_end" class="col-sm-2 col-form-label">Fim:</label>
                  <div class="col-sm-10">
                    <input type="datetime-local" class="form-control" name="edit_end" id="edit_end">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" name="btnViewEvento" id="btnViewEvento">Cancelar</button>
                  <button type="submit" class="btn btn-warning" name="btnEditEvento" id="btnEditEvento">Salvar</button>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- Modal Cadastrar -->
    <div class="modal fade" id="cadastrarModal" tabindex="-1" aria-labelledby="cadastrarModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="cadastrarModalLabel">Cadastrar o Evento </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <span id="msgCadEvento"></span>
            <form method="POST" id="formCadEvento">
              <div class="mb-3 row">
                <label for="cad_title" class="col-sm-2 col-form-label">Nome:</label>
                <div class="col-sm-10">
                  <input type="text" name="cad_title" class="form-control" id="cad_Title" placeholder="Nome do paciente">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="cad_start" class="col-sm-2 col-form-label">Início:</label>
                <div class="col-sm-10">
                  <input type="datetime-local" name="cad_start" class="form-control" id="cad_start">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="cad_end" class="col-sm-2 col-form-label">Fim:</label>
                <div class="col-sm-10">
                  <input type="datetime-local" name="cad_end" class="form-control" id="cad_end">
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" name="btnCadEvento" id="btnCadEvento">Cadastrar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src='js/index.global.min.js'></script>
    <script src="js/bootstrap5/index.global.min.js"></script>
    <script src="js/core/locales-all.global.min.js"></script>
    <script src="js/custom.js"></script>


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