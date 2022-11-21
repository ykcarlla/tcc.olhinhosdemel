<?php
session_start();
include('conexao.php');

$id_tutor = $_SESSION['id_tutor'];

$sql = "DELETE FROM pessoas WHERE id_pessoas = '$id_tutor'";

mysqli_query($conn, $sql);
if (mysqli_affected_rows($conn) > 0) {
    header("Location: ../listaUsuarios.php");
} else {
    echo "<script>alert('Houve algum erro.');</script>";
    mysqli_error($conn);
    echo $conn->error;
}

