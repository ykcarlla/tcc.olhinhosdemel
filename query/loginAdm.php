<?php
if (isset($_POST['btnEnviar'])) {
    $email_adm = $_POST['email_adm'];
    $senha_adm = $_POST['senha_adm'];
    
    $sql = "SELECT * FROM administrador WHERE email_adm = '$email_adm'";

    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<p class='alerta'>Você logou com sucesso!</p>";
        
        } 
        else {
        echo "<script> alert('Ocorreu algum erro.') </script>";
    }
}