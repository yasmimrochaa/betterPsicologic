<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/prontuario.css">
    <title>Prontuário Médico</title>
    <style>
        .linha {
            display: flex;
            flex-flow: row wrap;
            padding: 10px;
        }

        .coluna-50 {
            width: 50%;
            padding: 20px;
            align-items: center;
            text-align: center;
        }

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
            padding-bottom: 20px;
        }

        img {
            width: 100px;
            left: 100px;
        }
    </style>
</head>

<body>
    <?php
    require_once("menu.php")
    ?>

    <h2 style="padding-bottom: 50px;">Prontuário</h2>

    <div class="linha">
        <div class="coluna-50">
            <form action="">
                <h4>Informações do Paciente</h4>
                <?php include_once("exibirImg.php"); ?>
                <br><br><br>
                <label for="">Nome</label>
                <input type="text">

                <label for="">Data de nascimento</label>
                <input type="date" name="" id="">

                <label for="">CPF</label>
                <input type="text" name="" id="">

                <label for="">Email</label>
                <input type="email" name="" id="">

                <label for="">Telefone</label>
                <input type="text" name="" id="">

                <label for="">Endereço</label>
                <input type="text" name="" id="">

                <label for="">Sexo</label>
                <input type="text" name="" id="">

                <label for="">Medicamentos</label>
                <textarea name="" id="" cols="30" rows="10"></textarea>

            </form>
        </div>


        <div class="coluna-50">
            <h4>Resumo das sessões</h4>
            <table class="table table-striped table-hover table-bordered">
                <tr style="background-color: #b5ebec">
                    <th>Dia</th>
                    <th>Descrição da sessão</th>
                </tr>
                <tr>
                    <td>11/12/20</td>
                    <td>dbewgucjbh</td>
                </tr>
            </table>
        </div>
    </div>




</body>

</html>