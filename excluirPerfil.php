<?php
session_start();
include('conexao.php');

$email = $_SESSION['email'];

$sql = "DELETE FROM pessoas WHERE email = '$email'";

mysqli_query($conn, $sql);
if (mysqli_affected_rows($conn) > 0) {
    header("Location: ../index.php");
} else {
    echo "<script>alert('Houve algum erro.');</script>";
    mysqli_error($conn);
    echo $conn->error;
}

