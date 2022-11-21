<?php
$conn = mysqli_connect('localhost', 'root', '') or die ("Não possível conectar ao banco de dados");
$banco = mysqli_select_db($conn, 'olhinhosdemel');
