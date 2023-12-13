<?php

session_start();
include('verificar_login.php');
include("conexao.php");
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Observações</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/observacoes.css"> <!-- Certifique-se de ajustar o caminho conforme necessário -->
    <script src="//code.jivosite.com/widget/fgSW8k1Bo7" async></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
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
             <hr class="sidebar-divider d-none d-md-block">

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
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
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

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <?php
                                $idUsuario = $_SESSION['idusuarios'];

                                // Consulta para contar notificações não lidas associadas ao usuário na tabela visualizacoes_notificacoes
                                $query = "SELECT COUNT(*) AS total
            FROM notificacoes n
            LEFT JOIN visualizacoes_notificacoes vn ON n.id = vn.id_notificacao AND vn.id_usuario = $idUsuario
            WHERE n.lida = 0 AND vn.id_visualizacao IS NULL";
                                $result = mysqli_query($conexao, $query);
                                $row = mysqli_fetch_assoc($result);

                                $totalNotificacoesNaoLidas = $row['total'];

                                if ($totalNotificacoesNaoLidas > 0) {
                                    echo '<span class="badge badge-danger badge-counter">' . $totalNotificacoesNaoLidas . '</span>';
                                }
                                ?>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Notificações
                                </h6>

                                <?php
                                // Obter notificações não lidas no banco de dados
                                $queryNotificacoes = "SELECT * FROM notificacoes n
            LEFT JOIN visualizacoes_notificacoes vn ON n.id = vn.id_notificacao AND vn.id_usuario = $idUsuario
            WHERE n.lida = 0 AND vn.id_visualizacao IS NULL
            ORDER BY n.id DESC";
                                $resultNotificacoes = mysqli_query($conexao, $queryNotificacoes);

                                // Exibir as notificações dinamicamente no dropdown
                                while ($rowNotificacao = mysqli_fetch_assoc($resultNotificacoes)) {
                                    echo '<a class="dropdown-item d-flex align-items-center" href="notificacoes.php">';
                                    echo '<div class="mr-3">';
                                    echo '<div class="icon-circle bg-primary">';
                                    echo '<i class="' . ($rowNotificacao['icon'] ? $rowNotificacao['icon'] : 'fas fa-bell') . ' text-white"></i>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '<div>';
                                    echo '<div class="small text-gray-500">' . date('d/m/y', strtotime($rowNotificacao['data_publicacao'])) . '</div>';
                                    echo '<span class="font-weight-bold">' . $rowNotificacao['titulo'] . '</span>';
                                    echo '</div>';
                                    echo '</a>';
                                }

                                ?>

                                <a class="dropdown-item text-center small text-gray-500" href="notificacoes.php">Ver todas notificações</a>
                            </div>
                        </li>


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

                    <style>
                        .qa-message-list {
                            max-height: 500px;
                            /* Defina a altura máxima desejada */
                            overflow-y: auto;
                            /* Adiciona uma barra de rolagem vertical quando necessário */
                        }
                    </style>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Observações das propostas</h1>


                    <!-- início do código da lista de propostas -->
                    <div class="qa-message-list" id="wallmessages">
                        <?php



                        // Consulta para obter informações da proposta
                        $queryProposta = "SELECT * FROM propostas";
                        $resultProposta = mysqli_query($conexao, $queryProposta);

                        if ($resultProposta) {
                            while ($rowProposta = mysqli_fetch_assoc($resultProposta)) {
                                // Restante do seu código para exibir as informações da proposta

                                // Consulta para obter observações da proposta
                                $idpropostas = $rowProposta['idpropostas'];
                                $queryObservacoes = "SELECT * FROM observacoes order by id desc";
                                $resultObservacoes = mysqli_query($conexao, $queryObservacoes);

                                if ($resultObservacoes) {
                                    // Restante do seu código para exibir as observações
                                } else {
                                    echo 'Erro na consulta de observações: ' . mysqli_error($conexao);
                                }

                                // Restante do seu código para exibir as informações da proposta
                            }
                        } else {
                            echo 'Erro na consulta de propostas: ' . mysqli_error($conexao);
                        }

                        // Exibe as observações
                        while ($rowObservacao = mysqli_fetch_assoc($resultObservacoes)) {
                            echo '<div class="message-item">';
                            echo '<div class="message-inner">';
                            echo '<div class="message-head clearfix">';
                            echo '<div class="avatar pull-left"><img src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png"></div>';
                            echo '<div class="user-detail">';
                            echo '<h5 class="handle">' . $rowObservacao['usuario'] . '</h5>';
                            echo '<div class="post-meta">';
                            echo '<div class="asker-meta">';
                            echo '<span class="qa-message-what"></span>';
                            echo '<span class="qa-message-when">';
                            echo '<span class="qa-message-when-data">' . date('d/m/Y', strtotime($rowObservacao['data'])) . '</span>';
                            echo '</span>';
                            echo '<span class="qa-message-who">';
                            echo '<span class="qa-message-who-pad"> Proposta </span>';
                            //inicio <a href></a>
                            echo '<a href="propostas.php?txtpesquisarcpf=&txtpesquisardata=&txtpesquisar=' . $rowObservacao['idpropostas'] . '&buttonPesquisar=&txtpesquisaroperador=" target="_blank">';
                            echo '<span class="qa-message-who-data">' . $rowObservacao['idpropostas'] . '</span>';
                            echo '</a>';
                            //final  <a href></a>
                            echo '</span>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="qa-message-content">';
                            echo $rowObservacao['observacao'];
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }

                        // Fecha a conexão com o banco de dados
                        mysqli_close($conexao);
                        ?>
                    </div>
                    <!-- final do código da lista de propostas -->




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

</body>

</html>