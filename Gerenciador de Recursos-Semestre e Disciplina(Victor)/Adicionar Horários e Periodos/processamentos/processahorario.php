<?php

include_once("../conexao/conexao.php");

$horario = filter_input(INPUT_POST, 'horario', FILTER_SANITIZE_STRING);
$periodo = filter_input(INPUT_POST, 'periodo', FILTER_SANITIZE_STRING);


$result_horario = "INSERT INTO horarios(horario,periodo) VALUES('$horario','$periodo')";
$resultado_horario=mysqli_query($conn,$result_horario);

header('location:../PáginaInicial/horariosPeriodos.php');