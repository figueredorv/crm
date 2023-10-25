<?php
include 'conexao.php';
session_start();


// Verifique se o formulário de pesquisa foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomePesquisado = $_POST['nome'];
    $query = "SELECT *
    FROM documentos 
    WHERE nome LIKE '%$nomePesquisado%'";
    $result = mysqli_query($conexao, $query);
}

// Função para excluir um documento
function excluirDocumento($conexao, $id)
{
    $consulta = "SELECT caminho FROM documentos WHERE id = $id";
    $resultado = mysqli_query($conexao, $consulta);

    if ($resultado) {
        $linha = mysqli_fetch_assoc($resultado);
        $novo_nome = $linha['caminho'];

        if (file_exists('documentos/' . $novo_nome)) {
            unlink('documentos/' . $novo_nome);
        }

        $consulta_exclusao = "DELETE FROM documentos WHERE id = $id";
        mysqli_query($conexao, $consulta_exclusao);
    }
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
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

            <!-- Botão para cadastrar um novo documento -->
            <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#modalExemplo">Novo documento </button>

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
                            $nome = $row['nome'];
                            $documentoAnexado = $row['caminho'];
                            $id = $row["id"];



                            echo "<tr>";
                            echo "<td>$nome</td>";
                            echo "<td><img src='documentos/$documentoAnexado' class='img-thumbnail' width='100' height='100' alt='Prévia' /></td>";
                            echo "<td>$documentoAnexado</td>";
                            echo "<td>";
                            echo "<a class='btn btn-primary' href='documentos/$documentoAnexado' target='_blank'><i class='fa fa-eye'></i></a>";
                            echo "<a class='btn btn-primary' href='documentos/$documentoAnexado' download><i class='fa fa-download'></i></a>";
                            if ($_SESSION['cargo_usuario'] == 'Master' || $_SESSION['cargo_usuario'] == 'Adm') {
                                echo "<a class='btn btn-danger' href='documentos.php?func=deletar&id=$id'><i class='fa fa-trash'></i></a>";
                            }
                            echo "</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>







    <!-- Modal -->
    <div id="modalExemplo" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">Cadastrar documento</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="" enctype="multipart/form-data">

                        <!-- Campo de pesquisa dentro do modal -->
                        <input type="text" id="nome-modal" name="nome" class="form-control" placeholder="Digite o nome do cliente">
                        <!-- Lista suspensa para resultados da pesquisa -->
                        <ul id="lista-resultados" class="dropdown-menu" style="display: none;"></ul>

                        <script>
                            // Função para atualizar a lista suspensa com os resultados da pesquisa
                            function atualizarListaSuspensa(resultados) {
                                var listaSuspensa = document.getElementById("lista-resultados");

                                // Limpa a lista suspensa
                                listaSuspensa.innerHTML = "";

                                // Preenche a lista suspensa com os resultados
                                resultados.forEach(function(resultado) {
                                    var listItem = document.createElement("li");
                                    listItem.classList.add("dropdown-item");
                                    listItem.textContent = resultado.nome; // Mostra apenas o nome do cliente
                                    listaSuspensa.appendChild(listItem);
                                });

                                // Exibe a lista suspensa
                                listaSuspensa.style.display = "block";
                            }

                            // Função para preencher o campo de entrada com o nome selecionado
                            function selecionarNome(e) {
                                var nomeSelecionado = e.target.textContent;
                                document.getElementById("nome-modal").value = nomeSelecionado;
                                document.getElementById("lista-resultados").style.display = "none";
                            }

                            // Adiciona um evento de entrada ao campo de pesquisa
                            document.getElementById("nome-modal").addEventListener("input", function() {
                                var nomePesquisa = document.getElementById("nome-modal").value;
                                var listaSuspensa = document.getElementById("lista-resultados");

                                if (nomePesquisa !== "") {
                                    // Fazer uma solicitação AJAX para buscar os registros em tempo real
                                    var xhr = new XMLHttpRequest();
                                    xhr.open("GET", "buscar_registros.php?nome=" + nomePesquisa, true);

                                    xhr.onreadystatechange = function() {
                                        if (xhr.readyState == 4 && xhr.status == 200) {
                                            var registros = JSON.parse(xhr.responseText);
                                            atualizarListaSuspensa(registros);
                                        }
                                    };

                                    xhr.send();
                                } else {
                                    listaSuspensa.style.display = "none";
                                }
                            });

                            // Adicionar um evento de clique aos itens da lista suspensa
                            document.getElementById("lista-resultados").addEventListener("click", selecionarNome);
                        </script>


                        <div class="form-group col-md-12">
                            <label for="inputDocumento">Deseja anexar algum documento?</label>
                            <input name="imagens[]" multiple type="file" class="form-control-file" id="inputDocumento" accept=".pdf, .jpg, jpeg, .png">
                        </div>



                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-success mb-3" name="button">Salvar </button>


                    <button type="button" class="btn btn-danger mb-3" data-dismiss="modal">Cancelar </button>
                    </form>


                    </form>

                </div>
            </div>
        </div>
    </div>


</body>

</html>


<?php
if (isset($_POST['button'])) {
    $nome = $_POST['nome'];
    $documentoanexado = $_FILES['imagens'];




    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $imagens = $_FILES['imagens'];
        $novo_nome = '';
        foreach ($imagens['name'] as $key => $nomedocumento) {
            if ($imagens['error'][$key] === 0) {
                $extensao = pathinfo($nomedocumento, PATHINFO_EXTENSION);
                $novo_nome = md5(uniqid()) . '.' . $extensao;

                if (move_uploaded_file($imagens['tmp_name'][$key], 'documentos/' . $novo_nome)) {
                    // Insira o nome do arquivo no banco de dados
                    $query = "INSERT INTO documentos (nome, caminho) VALUES ('$nome','$novo_nome')";
                    mysqli_query($conexao, $query);
                }
            }
        }
    }


    echo "<script language='javascript'> window.location='documentos.php'; </script>";
}
?>



<?php

if (@$_GET['func'] == 'deletar') {
    $id = $_GET['id'];
    $query = "DELETE FROM documentos where id = '$id'";

    $registro_id = $id; // O ID do registro a ser excluído

    // Consulta para recuperar o nome do arquivo associado ao registro
    $consulta = "SELECT caminho FROM documentos WHERE id = $registro_id";
    $resultado = mysqli_query($conexao, $consulta);

    if ($resultado) {
        $linha = mysqli_fetch_assoc($resultado);
        $novo_nome = $linha['caminho']; // Usando o mesmo nome da variável

        // Excluir o arquivo do servidor
        if (file_exists('documentos/' . $novo_nome)) {
            unlink('documentos/' . $novo_nome);
        }

        // Excluir o registro do banco de dados
        $consulta_exclusao = "DELETE FROM documentos WHERE id = $registro_id";
        mysqli_query($conexao, $consulta_exclusao);
    }

    mysqli_query($conexao, $query);
    echo "<script language='javascript'> window.alert('Documento excluído com Sucesso!'); </script>";
    echo "<script language='javascript'> window.location='documentos.php'; </script>";
}


?>