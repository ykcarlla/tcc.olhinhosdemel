<?php

if(!$_SESSION['logado']) {
    header('Location: ../loginUsuario.php');
    exit();
}else{
    header('Location: ../logado.php');
    exit();
}