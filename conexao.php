<?php
$conn = mysqli_connect('localhost', 'root', 'A1b1c1d1') or die ("Não possível conectar ao banco de dados");
$banco = mysqli_select_db($conn, 'olhinhosdemel');
