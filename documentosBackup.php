<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomePesquisado = $_POST['nome'];
    $query = "SELECT propostas.idusuario, propostas.nome AS nome_proposta, propostas.documentoanexado 
    FROM usuarios 
    JOIN propostas ON usuarios.idusuarios = propostas.idusuario 
    WHERE propostas.nome LIKE '%$nomePesquisado%'";

    $result = mysqli_query($conexao, $query);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentos por clientes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>



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
                        $documentoAnexado = $row['documentoanexado'];

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

