<!-- Autor: Lucas Lima Aires
RA: 22202072 -->

<?php
    # comando para conexão com o banco de dados
    include 'conexao.php';

    # recuperando as informações do formulário   
    $nome = $_REQUEST['nome'];         
    $email = $_REQUEST['email'];
    $senha = md5($_REQUEST['senha']);

    $sql = "SELECT * FROM usuario WHERE email = :email";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);

    if ($result) {
        header('Location:register.php?mensagem=Email já em uso!');
        exit();
    }
    
    $sql = "INSERT INTO usuario (nome, email, senha) VALUES (:nome, :email, :senha)";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();
    header('Location:index.php?mensgaem=Conta criada com sucesso!');
 
?>