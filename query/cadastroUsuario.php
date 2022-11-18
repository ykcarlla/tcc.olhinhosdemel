<?php

include('conexao.php');

//if (isset($_POST['btnEnviar'])) {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $data_nasc =  $_POST['data_nasc'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $admin = 0;
    
    $sql = "INSERT INTO pessoas (nome, sobrenome, cpf, data_nasc, telefone, email, senha, administrador) 
            VALUES ('$nome', '$sobrenome', '$cpf', '$data_nasc', '$telefone', '$email', '$senha', '$admin')";

    mysqli_query($conn, $sql);

    $last_id = mysqli_insert_id($conn);

    $_SESSION['iduser'] = $last_id;

    if (mysqli_affected_rows($conn) > 0) {
        echo "<p class='alerta'>Você foi cadastrado com sucesso!</p>";
        header("Location: ../cadastraAnimal.php");
    } 
        else {
        echo "<script> alert('Ocorreu algum erro.') </script>";
    }
//}