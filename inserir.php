<!-- Autor: Lucas Lima Aires
RA: 22202072 -->

<?php
    # comando para conexão com o banco de dados
    include 'conexao.php';

    # recuperando as informações do formulário            
    $nome = $_REQUEST['nome'];
    $email = $_REQUEST['email'];

    $id = $_REQUEST['id'];
    if($id == '') {
        $sql = "INSERT INTO usuario (nome, email) VALUES (:nome, :email)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        header('Location:cliente.php?mensagem=Usuário inserido com sucesso!');
    } else {
        $sql = "UPDATE usuario SET nome=:nome, email=:email WHERE id=:id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        header('Location:cliente.php?mensagem=Usuário alterado com sucesso!');
    }
    
?>