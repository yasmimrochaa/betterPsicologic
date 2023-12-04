<?php
//var_dump($_POST["upload"]);
if (isset($_POST["upload"])) {
    $file = $_FILES["upload"];
    //var_dump($file);
     // prescisa de ser vetor?
    $folder = "uploads";
    $permite = array("jpg", "png");
    $maxSize = 1024 * 1024 * 5;

    $msg = array();
    $errorMsg = array(
        1 => "O arquivo é maior que o limite permitido.",
        2 => "O upload do arquivo foi feito parcialmente",
        3 => "Não foi possivel fazer o upload"
    );

    $name = $file["name"];
    $type = $file["type"];
    $size = $file["size"];
    $error = $file["error"];
    $tmp = $file["tmp_name"];
    $extensao = @end(explode(".", $name));
    $novoNome = rand() .".".$extensao;

    if ($error != 0) {
        $msg[] = "<b>$name<b>" . $errorMsg[$error];
    } else if ($size > $maxSize) {
        $msg[] = "<b>$name<b>" . "O arquivo é maior que o limite permitido";
    }else{
        if (move_uploaded_file($tmp, $folder."/".$novoNome)) {
            include_once("conexao.php");
            session_start();
            $cod = $_SESSION["cod"];
            $sql = "UPDATE psicologo SET img = '$novoNome' WHERE cod = $cod";
            echo $sql;
            if ($conn->query($sql) == TRUE) {
                $msg[] = "Upload realizado com sucesso!";
            }else{
                $msg[] = "Erro ao fazer upload.";
            }
        }else{
            $msg[] = "Ocorreu algum erro ao fazer upload do arquivo";
        }
    }
    foreach($msg as $value){
        echo $value ."<br>";
    }
    header("Location: meuPerfil.php");
}

?>