<?php
include('conexao.php');
session_start();
if (isset($_POST['btnEnviar'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    if(empty('$email') || empty('$senha')) {
        header('Location: ../loginUsuario.php');
        exit();
    }
    $sql = "SELECT * FROM pessoas WHERE email = '$email' and senha = '$senha'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $email;
        $_SESSION['nome'] = $row['nome'];
        $_SESSION['sobrenome'] = $row['sobrenome'];
        $_SESSION['cpf'] = $row['cpf'];
        $_SESSION['telefone'] = $row['telefone'];
        $_SESSION['data de nascimento'] = $row['data_nasc'];
        $_SESSION['logado'] = true;
        header("Location: ../painelUsuario.php");
        exit();
        } 
        else {
        echo "<script> alert('Ocorreu algum erro.') </script>";
    }
}