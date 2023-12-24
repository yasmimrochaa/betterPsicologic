<?php
include_once("conexao.php");
if (!isset($_SESSION)) {
    session_start();
}

$pesquisa = $_POST["pesquisa"];

$sql = "SELECT * 
    FROM paciente 
    where nome like '%$pesquisa%'
    order by nome";

$dadosPessoa = $conn->query($sql);
if ($dadosPessoa->num_rows > 0) {
?>
    <table class="table table-striped table-hover table-bordered ">
        <tr style="background-color: #b5ebec">
            <th>Nome</th>
            <th>CPF</th>
            <th class="d-none d-lg-table-cell">Telefone</th>
            <th width="120" class="text-center">Visualizar</th>
            <th width="120" class="text-center">Deletar</th>
        </tr>

        <?php
        while ($exibir = $dadosPessoa->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo $exibir["nome"] ?></td>
                <td><?php echo $exibir["cpf"] ?></td>
                <td><?php echo $exibir["telefone"] ?></td>
                <td>
                    <button class="btn btn-outline-secondary">
                        <a href="paciente.php"></a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                        </svg> </button>
                </td>
                <td>
                    <button class="btn btn-outline-secondary" onclick="confirmarExclusao(
                            '<?php echo $exibir["cod"] ?>',
                            '<?php echo $exibir["nome"] ?>')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                        </svg>
                    </button>
                </td>
            </tr>

        <?php
        }
        ?>
    </table>
    <a href="paciente.php">visualizar</a>
<?php
}
?>