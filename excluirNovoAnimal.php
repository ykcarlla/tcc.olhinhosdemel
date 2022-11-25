<?php
session_start();
include('conexao.php');
if (!isset($_SESSION['logado'])) {
    header('location: loginUsuario.php');
  exit();
  }

$id_animal = $_GET['id_animal'];



$sql = "DELETE FROM animais WHERE id_animal = '$id_animal'";


mysqli_query($conn, $sql);
if (mysqli_affected_rows($conn) > 0) {
    header("Location: ../cadastraAnimal.php");
} else {
    echo "<script>alert('Houve algum erro.');</script>";
    mysqli_error($conn);
    echo $conn->error;
}

