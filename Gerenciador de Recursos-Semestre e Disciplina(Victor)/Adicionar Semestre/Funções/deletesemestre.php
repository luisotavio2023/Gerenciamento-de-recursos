<?php

if (!empty($_GET['cod_semestre'])) {

    include_once("../conexao/conexao.php");

    $cod_semestre = $_GET['cod_semestre'];

    $sqlSelect = "SELECT * FROM semestres WHERE cod_semestre=$cod_semestre";

    $result = $conn->query($sqlSelect);

    if ($result->num_rows > 0) {

        $sqlDelete = "DELETE FROM semestres WHERE cod_semestre=$cod_semestre";

        $resultDelete = $conn->query($sqlDelete);
    }
}
header('location:../PáginaInicial/semestre.php');
