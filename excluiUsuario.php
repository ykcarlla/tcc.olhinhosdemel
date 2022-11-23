<?php
session_start();
include('conexao.php');

$id_tutores = $_SESSION['id_tutores'];

$sql = "DELETE FROM tutores WHERE id_tutores = '$id_tutores'";

mysqli_query($conn, $sql);
if (mysqli_affected_rows($conn) > 0) {
    header("Location: ../listaUsuarios.php");
} else {
    echo "<script>alert('Houve algum erro.');</script>";
    mysqli_error($conn);
    echo $conn->error;
}

