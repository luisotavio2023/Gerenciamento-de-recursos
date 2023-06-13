<?php
include_once("../conexao/conexao.php");

  if(isset($_POST['update']))
  {
    $cod_semestre=$_POST['cod_semestre'];
    $nome = $_POST['nome'];
    $ano = $_POST['ano'];
    $situacao = $_POST['situacao'];

    $sqlUpdate="UPDATE semestres SET nome='$nome',ano='$ano',situacao='$situacao' WHERE cod_semestre='$cod_semestre'";

    $result=$conn->query($sqlUpdate);


  }
  header('location:../PáginaInicial/semestre.php');

