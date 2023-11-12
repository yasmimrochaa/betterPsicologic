<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style/prontuario.css">
        <title>Document</title>
</head>

<body>
    <?php
    require_once("menu.php")
    ?>
    <h2 style="text-align: center; padding: 30px;" > Pacientes Cadastrados</h2> 

    <div class="search-box">
        <input type="text" class="search-text" placeholder="Pesquisar...">
        <a class="search-btn">
            <img class="user-loupe" src="style/image/pesquisarUsuario.png" alt="" width="25px" height="25px">
            <img class="loupe" src="style/image/pesquisar.png" alt="" width="25px" height="25px">
        </a>
    </div>

    <br><br><br>

    <table class="table table-striped table-hover table-bordered ">
        <thead>

            <tr style="background-color: #b5ebec">
                <th>Codigo</th>
                <th>Nome</th>
                <th>CPF</th>
                <th class="d-none d-lg-table-cell">Telefone</th>
                <th width="120" class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>yasmim</td>
                <td>yasmim isabela rocha</td>
                <td class="d-none d-sm-table-cell">31988207028</td>
                <td class="d-none d-lg-table-cell">000</td>

                <td>
                    <button class="btn btn-outline-secondary"> <svg xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                            <path
                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                        </svg></i> </button>
                    <button class="btn btn-outline-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-trash3-fill" viewBox="0 0 16 16">
                            <path
                                d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                        </svg>
                    </button>
                </td>
            </tr>

        </tbody>
    </table>

    <i class="bi bi-eye-fill"></i>
</body>

</html>