<?php
session_start();
include('conexao.php');

//if (isset($_POST['btnEnviar'])) {
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
    $tutores = $_SESSION['id_tutores'];
   
    $sql = "INSERT INTO animais (especie, sexo, nome, raca, cor, porte, vacinacao, vermes, doenca, comportamento, tutor) 
            VALUES ('$especie', '$sexo', '$nome_animal', '$raca', '$cor', '$porte', '$vacinacao', '$vermes', '$doenca', '$comportamento','$tutores')";
echo $sql;
  $last_id = mysqli_query($conn, $sql);
    
    $_SESSION['id_animal'] = $last_id;

    if (mysqli_affected_rows($conn) > 0) {
        echo "<p class='alerta'>Seus dados foram cadastrados com sucesso!</p>";
        header("Location: ../cadastraAgendamento.php");
    } 
    else {
        echo "<script> alert('Ocorreu algum erro.') </script>";
    }
//}