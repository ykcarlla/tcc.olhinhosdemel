<?php
session_start();
unset($_SESSION["email"]);
unset($_SESSION["nome"]);
unset($_SESSION["sobrenome"]);
unset($_SESSION["cpf"]);
unset($_SESSION["data de nascimento"]);
unset($_SESSION["telefone"]);
unset($_SESSION["logado"]);
session_destroy();
header('Location: index.php');
?>