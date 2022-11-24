<?php
session_start();
include('conexao.php');
if (!isset($_SESSION['logado'])) {
    header('location: loginUsuario.php');
  exit();
  }
  if (!$_SESSION['adm']){
    header('location: semPermissao.php');
    exit(); 
  }
$id_tutores = $_GET['id_tutor'];

$sql = "DELETE FROM tutores WHERE id_tutores = '$id_tutores'";

mysqli_query($conn, $sql);
if (mysqli_affected_rows($conn) > 0) {
    header("Location: ../listaTutores.php");
} else {
    echo "<script>alert('Houve algum erro.');</script>";
    mysqli_error($conn);
    echo $conn->error;
}

