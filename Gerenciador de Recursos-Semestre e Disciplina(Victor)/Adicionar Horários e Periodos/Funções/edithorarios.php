<?php

if (!empty($_GET['cod_horario'])) {

    include_once("../conexao/conexao.php");

    $cod_horario = $_GET['cod_horario'];

    $sqlSelect = "SELECT * FROM horarios WHERE cod_horario=$cod_horario";

    $result = $conn->query($sqlSelect);

  if ($result->num_rows > 0) {
    while ($user_data = mysqli_fetch_assoc($result)) {

      $horario = $user_data['horario'];
      $periodo = $user_data['periodo'];
    }
  } else {
    header('location:../PáginaInicial/horariosPeriodos.php');
  }
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="../PáginaInicial/index.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adicionar Horários e Periodos </title>
</head>

<body>
  <div class="retangulo-fundo">
    <div class="cabecalho"></div>

    <h1 class="title">Editar Horário e Periodo:</h1>
    <form method="POST" action="../Funções/saveEdithorarios.php">

      <input type="time" class="horario" name="horario" placeholder="Adicionar Horário:" />

      <select id="periodo" name="periodo" class="periodo">
        <option value="manha">Manhã</option>
        <option value="tarde">Tarde</option>
        <option value="noite">Noite</option>
      </select>
      <input type="hidden"name="cod_horario" value="<?php echo $cod_horario ?>">
      <button class="botao" type="submit"name="update" id="update" >Salvar</button>

      <table class="table text-white table-bg">
            <thead>
                <tr>
                    <th scope="col">Horario</th>
                    <th scope="col">Periodo</th>
                    <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>
                <?php


                while ($user_data = mysqli_fetch_assoc($result)) {
                    echo "<tr>";

                    echo "<td>" . $user_data['horario'] . "</td>";

                    echo "<td>" . $user_data['periodo'] . "</td>";


                    echo "<td> 
                    <a class='btn btn-sm btn-primary' href='edit.php?cod_horario=$user_data[cod_horario]'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                    <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                    </svg>
                    </a>  
                    <a class='btn btn-sm btn-danger' href='../Funções/deletehorarios.php?cod_horario=$user_data[cod_horario]'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                    <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z'/>
                  </svg>
                    </a>    
                    </td>";
                    echo "<tr>";
                }
                ?>

            </tbody>
        </table>
  </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>