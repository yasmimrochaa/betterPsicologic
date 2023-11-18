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
        <h2 style="text-align: center; padding-bottom: 25px;"> Meu Perfil </h2>
        <div class="row">

            <div class="col-xl-4">

                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Foto de Perfil </div>
                    <div class="card-body text-center">

                        <img class="img-account-profile rounded-circle mb-2" src="style/image/user.png"  alt>

                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>

                        <button class="btn"> 
                            <label for="arquivo">Carregar nova imagem</label>
                            <input type="file" name="arquivo" id="arquivo">
                        </button>
                    </div>
                    <button class="btn" >Confirmar</button>

                </div>
                <button class="btn" type="button" style="background-color: rgb(228, 120, 93); margin-top: 25px;">
                    Deletar Perfil
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                    </svg>
                </button>
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
                        </form>
                    </div>
                    <button class="btn" type="button">Salvar alterações</button>
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