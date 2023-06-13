<?php

include_once("../conexao/conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_STRING);


$result_semestre = "INSERT INTO semestres(nome,ano) VALUES('$nome','$ano')";
$resultado_semestre=mysqli_query($conn,$result_semestre);

header('location:../PáginaInicial/semestre.php');