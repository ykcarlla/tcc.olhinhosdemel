<?php
session_start();

if(isset($_GET['data'])){
    $data_selecionada = $_GET['data'];
    $dt = DateTime::createFromFormat("Y-m-d", $data_selecionada);
    $dia_semana = $dt->format('D');
    if($dia_semana == 'Sun'){
        $disponiveis = [];
        return;
    }
    if($dia_semana == 'Sat'){
        $disponiveis = ['9','10','11'];
    }else{
        $disponiveis = ['9','10','11','13','14','15','16','17'];
    }
    $sql = "SELECT * from agendamento_agendar WHERE data between '$data_selecionada 00:00:00' and '$data_selecionada 23:59:59'";
    $indisponiveis = mysqli_query($conn, $sql);
    while($data = mysqli_fetch_array($indisponiveis)){
        $dt = DateTime::createFromFormat("Y-m-d H:i:s", $data['data']);
        $hora = $dt->format('H');
        if (($chave = array_search($hora, $disponiveis)) !== false) {
            unset($disponiveis[$chave]);
        }
    }
}

if (isset($_POST['btnEnviar'])) {
    $animal = $_POST['animal'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    if($hora == 'null'){
        echo "<script> Selecione um horario válido </script>";
        return;
    }
    $sql = "INSERT INTO agendamentos (animal, data) 
            VALUES ('$animal', '$data $hora:00:00')";

    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<p class='alerta'>Agendamento feito com sucesso!</p>";
        if (($chave = array_search($hora, $disponiveis)) !== false) {
            unset($disponiveis[$chave]);
        }
    } 
        else {
        echo "<script> alert('Ocorreu algum erro.') </script>";
    }
}