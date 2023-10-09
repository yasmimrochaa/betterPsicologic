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
    require_once("menu.php");
    ?>
    <!-- Conteudo -->
    <center>
       
        <h2>Meu Perfil</h2>

    </center>
    

    <?php
    $sql = "SELECT * FROM psicologo WHERE 1";
    $dadosPessoa = $conn->query($sql);
    if ($dadosPessoa->num_rows > 0) {
    ?>
        <div class="page">
            <div class="foto">
                <img src="style/image/yasmim.JPG" alt="">
            </div>

            <div class="about">
                <form action="" method="get" class="form">

                    <label>Nome completo</label>
                    <input name="nome" type="text"><br>

                    <label>E-mail</label>
                    <input name="email" type="email" ><br>

                    <label>CPF</label>
                    <input name="cpf" type="text"><br>

                    <label>Telefone</label>
                    <input name="telefone" type="tel" ><br>

                    <label>Data de Nascimento</label>
                    <input name="dataNasc" type="date"><br>

                </form>
            </div>
        </div>
    <?php
    while ($exibir = $dadosPessoa->fetch_assoc()) {
        
    }
    }
    ?>

    
</body>

</html>