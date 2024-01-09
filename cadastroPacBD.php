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
$img = 'user.png';
$cpfPsi = $_SESSION['cpf'];
$senhaCriptografada = md5($senha);


$sql = "INSERT INTO paciente(cpf, nome, senha, email, telefone, dataNasc, sexo, endereco, medicamentos, img, fk_cpfPsi)
                 VALUES ('$cpf', '$nome', '$senhaCriptografada', '$email', '$telefone', 
                        '$dataNasc', '$sexo', '$endereco', '$medicamentos', '$img', '$cpfPsi')";

echo $sql;

if ($conn->query($sql) === TRUE) {
?>
    <script>
        alert("Registro salvo com sucesso!");
        window.location = "prontuario.php";
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