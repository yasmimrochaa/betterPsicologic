<?php
    include_once("conexao.php");

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $cpf = $_POST["cpf"];
    $telefone = $_POST["telefone"];
    $dataNasc = $_POST["dataNasc"];
    $senha = $_POST["password"];

    $sql = "INSERT INTO psicologo (cpf, nome, senha, email, telefone, dataNasc) 
            VALUES ('$cpf', '$nome', '$senha', '$email', '$telefone', '$dataNasc')";

    echo $sql;

    if ($conn->query($sql) === true) {
        ?>
        <script>
            alert("Registro salvo com sucesso");
            //window.location = 'cadastro.php';
        </script>
        <?php
    }else {
        ?>
        <script>
            alert("Erro ao inserir dados ");
            //window.history.back();
        </script>
        <?php
    }
        
?>