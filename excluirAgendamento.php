<?php
session_start();
include('conexao.php');
if (!isset($_SESSION['logado']) || $_SESSION['adm']==false) {
    header('location: loginUsuario.php');
  exit();
  }
  if (!$_SESSION['adm']){
    header('location: semPermissao.php');
    exit(); 
  }
$id_agendamento_agendar = $_GET['id_agendamento_agendar'];

$sql = "DELETE FROM agendamento_agendar WHERE id_agendamento_agendar = '$id_agendamento_agendar'";

mysqli_query($conn, $sql);
if (mysqli_affected_rows($conn) > 0) {
    header("Location: ../agendamentos.php");
} else {
    echo "<script>alert('Houve algum erro.');</script>";
    mysqli_error($conn);
    echo $conn->error;
}

