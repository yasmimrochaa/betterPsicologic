<?php
include_once("conexao.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/meuPerfil.css">
    <title>Document</title>
</head>

<body>
    <?php
    require_once("menu.php")
    ?>

    <div class="container-xl px-4 mt-4">
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xl-4">

                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Foto de Perfil </div>
                    <div class="card-body text-center">

                        <img class="img-account-profile rounded-circle mb-2" src="style/image/user.png" alt>

                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>

                        <label for="arquivo">Enviar arquivo</label>
                        <input type="file" accept="image/png, image/jpeg" name="arquivo">

                        <button class="btn" type="button">Carregar nova imagem</button>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">

                <div class="card mb-4">
                    <div class="card-header">Detalhes da conta</div>
                    <div class="card-body">
                        <form>

                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Nome</label>
                                <input class="form-control" id="inputUsername" type="text" placeholder="Insira seu nome completo" value="username">
                            </div>

                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">CPF</label>
                                <input class="form-control" id="inputUsername" type="text" placeholder="Insira seu CPF" value="123.456.789-10">
                            </div>

                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                <input class="form-control" id="inputEmailAddress" type="email" placeholder="Insira seu email" value="name@example.com">
                            </div>

                            <div class="row gx-3 mb-3">

                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Telefone</label>
                                    <input class="form-control" id="inputPhone" type="tel" placeholder="Insira seu número de telefone" value="555-123-4567">
                                </div>

                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputBirthday">Data de nascimento</label>
                                    <input class="form-control" id="inputBirthday" type="date" name="birthday" placeholder="Insira sua data de nascimento" value="06/10/1988">
                                </div>
                            </div>

                            <button class="btn" type="button">Salvar alterações</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">

    </script>
</body>

</html>