<?php
include_once("conexao.php");
session_start();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if(!empty($id)){
    $sql = "DELETE FROM evento WHERE id = '$id'";
    if ($conn->query($sql) === TRUE){
        $retorna = ['status' => true, 'msg' => 'Evento apagado com sucesso!'];
    }else{
        $retorna = ['status' => false, 'msg' => 'Erro: Evento não apagado'];
    }
}else{
    $retorna = ['status' => false, 'msg' => 'Erro: Evento não apagado'];
}

echo json_encode($retorna);
?>