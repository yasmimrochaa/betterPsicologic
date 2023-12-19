<?php
include_once("conexao.php");
session_start();

$nome = $_POST["nome"];
$email = $_POST["email"];
$cpf = $_POST["cpf"];
$telefone = $_POST["telefone"];
$dataNasc = $_POST["dataNasc"];
$sexo = $_POST["sexo"];
$endereco = $_POST["endereco"];
$medicamentos = $_POST["medicamentos"];
$senha = $_POST["password"];

$sql = "INSERT INTO paciente(cpf, nome, senha, email, telefone, dataNasc, sexo, endereco, medicamentos)
                 VALUES ('$cpf', '$nome', '$senha', '$email', '$telefone', 
                        '$dataNasc', '$sexo', '$endereco', '$medicamentos')";

echo $sql;

if ($conn->query($sql) === TRUE) {
?>
    <script>
        alert("Registro salvo com sucesso!");
        window.location = "cadastroPaciente.php";
    </script>
<?php
} else {
?>
    <script>
        alert("Erro");
        window.history.back();
    </script>
<?php
}
?>