<?php
include 'conexao.php';
session_start();


// Verifique se o formulário de pesquisa foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomePesquisado = $_POST['nome'];
    $query = "SELECT *
    FROM documentos 
    WHERE nome LIKE '%$nomePesquisado%' order by id desc";
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
    <script src="//code.jivosite.com/widget/fgSW8k1Bo7" async></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="painel_funcionario.php"><big><big><i class="fa fa-arrow-left"></i></big></big></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <div class="container">

        <?php if (isset($_SESSION['erro_enviardoc'])) : ?>
            <br>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Atenção!</strong><?php echo $_SESSION['erro_enviardoc']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
            unset($_SESSION['erro_enviardoc']); // Limpa a mensagem de erro após exibição
        endif;
        ?>

        <div class="container mt-4">
            <h4 class="text-center mb-4 custom-text-color">
                <i class="fa fa-file-text-o custom-icon-color" aria-hidden="true"></i> ENVIO E CONSULTA DE DOCUMENTOS
            </h4>
            <!-- Formulário de pesquisa -->
            <form method="POST" action="documentosantigo.php" class="mb-4">
                <div class="form-row">
                    <div class="col-md-8">
                        <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome do cliente">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary btn-block">Pesquisar</button>
                    </div>
                </div>
            </form>

            <style>
                .custom-text-color {
                    color: #64ABE7;
                    /* Substitua pela cor desejada em formato hexadecimal, RGB, ou nome da cor (Cor do texto ENVIO E CONSULTA DE DOCUMENTOS)*/
                }

                .custom-icon-color {
                    color: #64ABE7;
                    /* Substitua pela cor desejada em formato hexadecimal, RGB, ou nome da cor (cor do ícone)*/
                }

                .table-container {
                    max-height: 510px;
                    /* Defina a altura máxima desejada */
                    overflow-y: auto;
                    /* Adiciona uma barra de rolagem vertical quando necessário */
                }
            </style>



            <!-- Botão para cadastrar um novo documento -->

            <button type="button" class="btn btn-success btn-block mb-3" data-toggle="modal" data-target="#modalExemplo" style="background-color: #FF4D75;">
                <i class="fa fa-cloud-upload"></i> Upload
            </button>
            <div class="table-container">
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
                                echo "<a class='btn btn-primary' href='documentos/$documentoAnexado' target='_blank'><i class='fa fa-eye'></i></a> ";
                                echo "<a class='btn btn-primary' href='documentos/$documentoAnexado' download><i class='fa fa-download'></i></a> ";
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

                            <!-- Exibir mensagem de erro -->


                            <!-- Campo de pesquisa dentro do modal -->
                            <div class="form-group col-md-12">
                                <label for="inputNome">Nome*</label>
                                <input type="text" id="nome-modal" name="nome" class="form-control" placeholder="Nome do cliente">

                                <label for="inputNome">
                                    Qual o <a href="propostas.php" target="_blank">id da proposta</a> que deseja atribuir esse documento?</label>
                                <input type="text" id="idproposta" name="idproposta" class="form-control" placeholder="ID da proposta">
                            </div>

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
                        <button type="submit" class="btn btn-primary mb-3" name="button">Salvar </button>


                        <button type="button" class="btn btn-secondary mb-3" data-dismiss="modal">Cancelar </button>
                        </form>


                        </form>

                    </div>
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
    $idproposta = $_POST['idproposta'];

    // Verifica se pelo menos um documento foi enviado
    if (empty($_FILES['imagens']['name'][0])) {
        echo "<script language='javascript'> window.alert('Por favor, selecione pelo menos um documento antes de enviar.'); </script>";
        echo "<script language='javascript'> window.location='documentos.php'; </script>";
        exit; // Interrompe a execução do script se nenhum documento for selecionado
    }

    if (empty($_POST['nome'])) {
        $_SESSION['erro_enviardoc'] = ' Por favor, preencha o campo com o nome do cliente antes de enviar o documento.';
        echo "<script language='javascript'> window.location='documentos.php'; </script>";
        exit; // Interrompe a execução do script se o campo nome do cliente não estiver preenchido
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $imagens = $_FILES['imagens'];
        $novo_nome = '';
        foreach ($imagens['name'] as $key => $nomedocumento) {
            if ($imagens['error'][$key] === 0) {
                $extensao = pathinfo($nomedocumento, PATHINFO_EXTENSION);
                $novo_nome = md5(uniqid()) . '.' . $extensao;

                if (move_uploaded_file($imagens['tmp_name'][$key], 'documentos/' . $novo_nome)) {
                    // Insira o nome do arquivo no banco de dados
                    $query = "INSERT INTO documentos (nome, caminho, idproposta) VALUES ('$nome','$novo_nome','$idproposta')";
                    mysqli_query($conexao, $query);
                }
            }
        }
    }

    echo "<script language='javascript'> window.alert('Documento cadastrado com Sucesso!'); </script>";
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