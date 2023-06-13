<?php
include_once("../conexao/conexao.php");

  if(isset($_POST['update']))
  {
    $cod_horario=$_POST['cod_horario'];
    $horario = $_POST['horario'];
    $periodo = $_POST['periodo'];

    $sqlUpdate="UPDATE horarios SET horario='$horario',periodo='$periodo' WHERE cod_horario='$cod_horario'";

    $result=$conn->query($sqlUpdate);


  }
  header('location:../PáginaInicial/horariosPeriodos.php');

