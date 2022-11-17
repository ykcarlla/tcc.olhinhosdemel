<?php

include('conexao.php');

$id_dono = $_GET['id_dono'];

$sql = "DELETE FROM dono_animal WHERE id_dono = '$id_dono'";

mysqli_query($conn, $sql);
if (mysqli_affected_rows($conn) > 0) {
    header("Location: ../listaUsuarios.php");
} else {
    echo "<script>alert('Houve algum erro.');</script>";
    mysqli_error($conn);
    echo $conn->error;
}

