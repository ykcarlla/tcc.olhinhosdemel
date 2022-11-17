<?php
session_start();

$iduser = $_SESSION['iduser'];
include('conexao.php');

if (isset($_POST['btnEnviar'])) {
    $especie = $_POST['especie'];
    $sexo = $_POST['sexo'];
    $nome_animal = $_POST['nome_animal'];
    $raca = $_POST['raca'];
    $cor = $_POST['cor'];
    $porte = $_POST['porte'];
    $doenca = $_POST['doenca'];
    $vermes = $_POST['vermes'];
    $vacinacao = $_POST['vacinacao'];
    $comportamento = $_POST['comportamento'];
    
    $sql = "INSERT INTO animais (especie, sexo, nome, raca, cor, porte, vacinacao, vermes, doenca, comportamento) 
            VALUES ('$especie', '$sexo', '$nome_animal', '$raca', '$cor', '$porte', '$vacinacao', '$vermes', '$doenca', '$comportamento')";

    mysqli_query($conn, $sql);
    
    if (mysqli_affected_rows($conn) > 0) {
        echo "<p class='alerta'>Seus dados foram cadastrados com sucesso!</p>";
        header("Location: ../cadastraAgendamento.php");
    } 
    else {
        echo "<script> alert('Ocorreu algum erro.') </script>";
    }
}