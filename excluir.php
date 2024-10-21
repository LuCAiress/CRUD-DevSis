<?php
    # comando para conexão com o banco de dados
    include 'conexao.php'; 

    $id = $_REQUEST['id'];

    $sql = "DELETE FROM usuario WHERE id =:id";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header('Location:cliente.php?mensagem=Usuário excluído com sucesso!');
?>