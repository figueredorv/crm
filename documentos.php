<?php

session_start();
include('verificar_login.php');
include("conexao.php");
?>

<?php
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
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Documentos</title>



    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//code.jivosite.com/widget/fgSW8k1Bo7" async></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">CRMCORBAN <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="painel_funcionario.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="propostas.php">
                    <i class="fa fa-search"></i>
                    <span>Propostas</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="documentos.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Documentos</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="observacoes.php">
                    <i class="fa fa-comment"></i>
                    <span>Observações</span></a>
            </li>



            <!-- Heading 
            <div class="sidebar-heading">
                Interface
            </div>
            -->
            <!-- Nav Item - Pages Collapse Menu -->



            <?php
            // lógica para só conseguir visualizar o dropdown Administração quem for nível Master do sistema.
            if ($_SESSION['cargo_usuario'] == 'Master') : ?>
                <!-- Divider -->
                <hr class="sidebar-divider">
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Administração</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Área administrativa:</h6>
                            <a class="collapse-item" href="usuarios.php">Usuários</a>
                            <a class="collapse-item" href="status.php">Status</a>
                            <a class="collapse-item" href="promotora.php">Promotoras</a>
                            <a class="collapse-item" href="bancos.php">Bancos</a>
                            <a class="collapse-item" href="novanotificacao.php">Notificações</a>
                        </div>
                    </div>
                </li>

            <?php
            endif;
            ?>









            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading 
            <div class="sidebar-heading">
                Addons
            </div>
                -->






            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>CRMCORBAN PRO<br></strong> Eleve sua gestão de relacionamento com o cliente para o próximo nível com o CRMCORBAN PRO repleto de recursos premium e componentes exclusivos!</p>
                <button class="btn btn-success btn-sm" disabled>você ja é Pro!</button>

            </div>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                   
                    <!-- Topbar Search -->
                    <form  method="POST" action="documentos.php" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" name="nome" id="nome" class="form-control bg-light border-0 small" placeholder="Pesquisar pelo nome" aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts codigo abaixo -->

                        <!-- Nav Item - Alerts -->
                        
                            
                        <!-- Final Nav Item - Alerts -->




                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nome_usuario']; ?></span>
                                <?php
                                // Defina um caminho padrão para a imagem de placeholder
                                $caminhoDaImagemPadrao = 'https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg';

                                // Verifique se o usuário está logado
                                if (isset($_SESSION['idusuarios'])) {
                                    $idUsuario = $_SESSION['idusuarios'];

                                    // Consulta SQL para buscar o caminho da imagem do usuário
                                    $sql = "SELECT imagem FROM usuarios WHERE idusuarios = $idUsuario";

                                    // Executa a consulta
                                    $resultado = mysqli_query($conexao, $sql);

                                    if ($resultado) {
                                        $linha = mysqli_fetch_assoc($resultado);

                                        if ($linha && !empty($linha['imagem'])) {
                                            $caminhoDaImagem = 'assets/img/faces/' . $linha['imagem']; // Supondo que as imagens estejam na pasta 'assets/img/faces/'
                                        } else {
                                            // Se o caminho da imagem estiver vazio, use o caminho da imagem de placeholder
                                            $caminhoDaImagem = $caminhoDaImagemPadrao;
                                        }
                                    }
                                } else {
                                    // Se o usuário não estiver logado, use o caminho da imagem de placeholder
                                    $caminhoDaImagem = $caminhoDaImagemPadrao;
                                }

                                // Aqui, você pode continuar a renderização da página, e a imagem será exibida no local desejado no HTML.
                                ?>

                                <!-- Exibir a imagem -->
                                <img class="img-profile rounded-circle" src="<?php echo $caminhoDaImagem; ?>">


                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Meu perfil
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Configurações
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Log de atividades
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>


                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800" style="padding-bottom: 30px;">ENVIO E CONSULTA DE DOCUMENTOS</h1>


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

                            <!-- Formulário de pesquisa 
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
                            -->

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
                                    /* Defina a altura máxima desejada */
                                    max-height: 510px;
                                      
                                    
                                    overflow-y: auto;
                                    /* Adiciona uma barra de rolagem vertical quando necessário */
                                }
                            </style>



                            <!-- Botão para cadastrar um novo documento -->

                            <button type="button" class="btn btn-primary btn-block mb-3" data-toggle="modal" data-target="#modalExemplo">
                                <i class="fa fa-cloud-upload"></i> Enviar documentos
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



                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; CRMCORBAN 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pronto para partir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecione "Sair" abaixo se estiver pronto para encerrar sua sessão atual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Sair</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

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