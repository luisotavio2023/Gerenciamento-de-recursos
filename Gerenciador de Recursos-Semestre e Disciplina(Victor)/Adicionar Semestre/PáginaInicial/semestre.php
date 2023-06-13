<?php
session_start();
include_once("../conexao/conexao.php");

$sql = "SELECT * FROM semestres ORDER BY cod_semestre DESC";

$result = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="semestre.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Semestre </title>
</head>

<body>
    <div class="retangulo-fundo">
        <div class="cabecalho"></div>

        <h1 class="title">Adicionar Semestre:</h1>
        <form method="POST" action="../processamentos/processasemestre.php">

            <input type="text" class="semestre" name="nome" placeholder="Informe o semestre escolhido" />

            <select id="ano" name="ano" class="ano">
                <?php
                $anoAtual = date("Y");
                for ($ano = 1900; $ano <= $anoAtual; $ano++) {
                    echo "<option value='$ano'>$ano</option>";
                }
                ?>
            </select>
            <button class="botao" type="submit">Adicionar</button>




        </form>
        <table class="table text-white table-bg">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Ano</th>
                    <th scope="col">Situacao</th>
                    <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>
                <?php


                while ($user_data = mysqli_fetch_assoc($result)) {
                    echo "<tr>";

                    echo "<td>" . $user_data['nome'] . "</td>";

                    echo "<td>" . $user_data['ano'] . "</td>";

                    echo "<td>";
                    if ($user_data['situacao'] == 'ligado') {
                        echo "<button class='btn btn-sm btn-success' onclick='alternarEstado(this)'>Enviado</button>";
                    } else {
                        echo "<button class='btn btn-sm btn-danger' onclick='alternarEstado(this)'>Não Enviado</button>";
                    }
                    echo "</td>";


                    echo "<td> 
                    <a class='btn btn-sm btn-primary' href='../Funções/editsemestres.php?cod_semestre=$user_data[cod_semestre]'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                    <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                    </svg>
                    </a>  
                    <a class='btn btn-sm btn-danger' href='../Funções/deletesemestre.php?cod_semestre=$user_data[cod_semestre]'>
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
        <script>
            function alternarEstado(botao) {
                if (botao.classList.contains('btn-success')) {
                    botao.classList.remove('btn-success');
                    botao.classList.add('btn-danger');
                    botao.textContent = 'Não enviado';
                } else {
                    botao.classList.remove('btn-danger');
                    botao.classList.add('btn-success');
                    botao.textContent = 'Enviado';
                }
            }
        </script>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>