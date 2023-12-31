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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Meu Perfil</title>
</head>

<body>
    <?php
    if (isset($_SESSION["email"])) {
        require_once("menu.php");
    ?>

        <?php
        if (isset($_GET['cod'])) {
            $cod = $_GET['cod'];
            $sql = "SELECT * FROM psicologo
                                    WHERE cod = '$cod'";
            $result = $conn->query($sql);
            $pessoa = $result->fetch_assoc();
        }
        ?>

        <div class="container-xl px-4 mt-4">
            <h2 style="text-align: center; padding-bottom: 25px;"> Meu Perfil </h2>
            <div class="row">

                <div class="col-xl-4">

                    <form action="uploadImg.php" method="post" enctype="multipart/form-data">
                        <div class="card mb-4 mb-xl-0">

                            <div class="card-header">Foto de Perfil </div>

                            <div class="card-body text-center">
                                <?php include_once("exibirImg.php"); 
                               ?>
                                <!-- implementar um select do banco para obter a img -->
                                <div class="small font-italic text-muted mb-4">JPG ou PNG de até 5 MB</div>

                                <div>
                                    <label for="formFileSm" class="form-label">Inserir nova foto</label>
                                    <input class="form-control form-control-sm" type="file" name="upload" id="upload" accept="image/png, image/jpeg, image/jpg">
                                </div>


                            </div>
                            <button class="btn" type="submit" name="upload" style="background-color: #259B9F;">Confirmar</button>

                    </form>
                </div>
            </div>


            <div class="col-xl-8">
                <div class="card mb-4">
                    <div class="card-header">Detalhes da conta</div>
                    <div class="card-body">
                        <form action="updatePsi.php" method="POST">

                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Nome</label>
                                <input class="form-control" name="nome" id="nome" type="text" placeholder="Insira seu nome completo" value="<?php echo $pessoa["nome"]; ?>">
                            </div>

                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">CPF</label>
                                <input class="form-control" name="cpf" id="cpf" type="text" placeholder="Insira seu CPF" value="<?php echo $pessoa["cpf"]; ?>">
                            </div>

                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputEmailAddress">Email</label>
                                    <input class="form-control" name="email" id="email" type="email" placeholder="Insira seu email" value="<?php echo $pessoa["email"]; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputEmailAddress">Senha</label>
                                    <input class="form-control" name="senha" id="senha" type="text" placeholder="Insira sua senha" value="<?php echo $pessoa["senha"]; ?>">
                                </div>
                            </div>

                            <div class="row gx-3 mb-3">

                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Telefone</label>
                                    <input class="form-control" name="telefone" id="telefone" type="tel" placeholder="Insira seu número de telefone" value="<?php echo $pessoa["telefone"]; ?>">
                                </div>

                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputBirthday">Data de nascimento</label>
                                    <input class="form-control" name="dataNasc" id="dataNasc" type="date" name="birthday" placeholder="Insira sua data de nascimento" value="<?php echo $pessoa["dataNasc"]; ?>">
                                </div>
                            </div>
                            <input type="hidden" name="img" value="<?php echo $pessoa['img'] ?>">
                            <input type="hidden" name="cod" value="<?php echo $pessoa['cod'] ?>">
                            <br>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-danger me-md-2" type="button" onclick="confirmarExclusao(
                                    '<?php echo $_SESSION["cod"] ?>')">Deletar Perfil
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                    </svg>
                                </button>
                                <button class="btn" type="submit" name="update" id="update" style="background-color: #259B9F; margin-left: 10px;">Salvar alterações</button>
                            </div>

                        </form>
                    </div>



                </div>
            </div>
        </div>
        </div>
        <script>
            function confirmarExclusao(cod) {
                if (window.confirm("Deseja confirmar a exclusão?")) {
                    window.location = "excluirPerfil.php?cod" + cod;
                }
            }
        </script>
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript"></script>
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