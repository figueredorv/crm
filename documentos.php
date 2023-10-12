<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomePesquisado = $_POST['nome'];
    $query = "SELECT documentos.idusuario, documentos.idusuario AS nome_proposta, documentos.caminho 
    FROM usuarios 
    JOIN documentos ON usuarios.idusuarios = documentos.idusuario 
    WHERE documentos.idusuario LIKE '%$nomePesquisado%'";

    $result = mysqli_query($conexao, $query);
}
?>


<!DOCTYPE html>
<html>

<head>
  <title>Documentos</title>

  


  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>



</head>


<body>



  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="painel_funcionario.php"><big><big><i class="fa fa-arrow-left"></i></big></big></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>



  <div class="container">







  <div class="container mt-4">
        <h3 class="text-center mb-4">DOCUMENTOS</h3>

        <!-- Formulário de pesquisa -->
        <form method="POST" action="documentos.php" class="mb-4">
            <div class="form-row">
                <div class="col-md-8">
                    <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome do cliente">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary btn-block">Pesquisar</button>
                </div>
            </div>
        </form>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Prévia</th>
                    <th>Nome do Documento</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($result)) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $nomeProposta = $row['nome_proposta'];
                        $documentoAnexado = $row['caminho'];

                        echo "<tr>";
                        echo "<td>$nomeProposta</td>";
                        echo "<td><img src='documentos/$documentoAnexado' class='img-thumbnail' width='100' height='100' alt='Prévia' /></td>";
                        echo "<td>$documentoAnexado</td>";
                        echo "<td>
                            <a class='btn btn-primary' href='documentos/$documentoAnexado' target='_blank'>Visualizar</a>
                            <a class='btn btn-primary' href='documentos/$documentoAnexado' download>Download</a>
                        </td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>






</body>

</html>