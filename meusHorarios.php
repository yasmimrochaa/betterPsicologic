<?php
include_once("conexao.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Meus Horários</title>
    <style>
        table,
        th,
        td,
        tr {
            align-items: center;
            text-align: center;
            justify-content: center;
        }

    </style>
</head>

<body>
    <?php
    if (isset($_SESSION["email"])) {
        require_once("menuPac.php");
    ?>
        <h2 style="text-align: center; padding-bottom: 10px;">Meus Horários</h2>
        <hr> <br>
        <center>
            <div class="container-sm" style="max-width: 540px;">
                <table class="table table-striped table-hover table-bordered " style="max-width: 540px,;">
                    <tr class="table-info">
                        <th>Data e Hora</th>
                    </tr>
                    <?php
                    $cpfPac = $_SESSION["cpf"];
                    $cpfPsi = $_SESSION["fk_cpfPsi"];
                    $nome = $_SESSION["nome"];
                    $sql = "SELECT * 
                FROM evento 
                WHERE fk_cpfPsi = '$cpfPsi'
                AND title = '$nome'
                ORDER BY start DESC ";
                    $eventos = $conn->query($sql);
                    while ($exibir = $eventos->fetch_assoc()) {
                        $dataFormatada = date('d/m/Y  -  H:i', strtotime($exibir['start']));
                    ?>
                        <tr>
                            <td><?php echo $dataFormatada ?></td>
                        </tr>

                    <?php
                    }
                    ?>
                </table>
            </div>
        </center>
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