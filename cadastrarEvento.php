<?php
include_once("conexao.php");
session_start();

$title = $_POST["cad_title"];
$start = $_POST["cad_start"];
$end = $_POST["cad_end"];
$color = "#259B9F";
$cpfPsi = $_SESSION["cpf"];
// pegando o cpf do paciente para salvar no banco de dados 
$sql = "SELECT * FROM paciente WHERE nome = '$title'";
$dadosPessoa = $conn->query($sql);
if ($dadosPessoa->num_rows > 0) {
    while ($exibir = $dadosPessoa->fetch_assoc()) {
        $cpfPac = $exibir["cpf"];

        $sql1 = "INSERT INTO evento (title, start, end, color, fk_cpfPac, fk_cpfPsi) 
                VALUES ('$title', '$start', '$end', '$color', '$cpfPac', '$cpfPsi')";

        if ($conn->query($sql1) === TRUE) {
            $retorna = [
                'status' => TRUE, 'msg' => 'Evento cadastrado com sucesso!', 'id' => mysqli_insert_id($conn),
                'title' => $title, 'start' => $start, 'end' => $end, 'color' => $color
            ];
?>
            <script>
                alert("Evento cadastrado com sucesso!");
                window.location = "agendapsi.php";
            </script>
        <?php
        } else {
            $retorna = ['status' => FALSE, 'msg' => 'Evento não cadastrado'];
        ?>
            <script>
                alert("Evento não cadastrado");
                window.location = "agendapsi.php";
            </script>
<?php
        }
    }
}
echo json_encode($retorna);
?>