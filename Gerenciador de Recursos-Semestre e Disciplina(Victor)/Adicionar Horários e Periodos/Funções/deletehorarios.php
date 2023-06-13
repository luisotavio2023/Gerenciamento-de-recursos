<?php

if (!empty($_GET['cod_horario'])) {

    include_once("../conexao/conexao.php");

    $cod_horario = $_GET['cod_horario'];

    $sqlSelect = "SELECT * FROM horarios WHERE cod_horario=$cod_horario";

    $result = $conn->query($sqlSelect);

    if ($result->num_rows > 0) {

        $sqlDelete = "DELETE FROM horarios WHERE cod_horario=$cod_horario";

        $resultDelete = $conn->query($sqlDelete);
    }
}
header('location:../PáginaInicial/horariosPeriodos.php');
