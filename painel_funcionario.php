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

    <title>CRMCORBAN - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
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
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Pesquisar pelo nome..." aria-label="Search" aria-describedby="basic-addon2" name="buttonPesquisar">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" name="botaoPesquisar">
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

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <button onclick="window.open('relatorio.php', '_blank')" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
    <i class="fas fa-download fa-sm text-white"></i> Gerar relatório
</button>

                    </div>

                    <?php
                    $query = "SELECT * FROM propostas WHERE data = CURDATE() ORDER BY data ASC";
                    $result = mysqli_query($conexao, $query);
                    $row = mysqli_num_rows($result);

                    if ($row > 0) :
                    ?>
                        <div class="alert alert-success alert-dismissible fade show text-dark">
                            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="nc-icon nc-simple-remove"></i>
                            </button>
                            <span>
                                <b>Muito bem!</b> Você possui <?php echo $row; ?>
                                <?php echo ($row === 1) ? 'nova proposta!' : 'novas propostas!'; ?>
                            </span>
                        </div>
                    <?php endif; ?>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total de propostas</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                if ($_SESSION['cargo_usuario'] == 'Master' || $_SESSION['cargo_usuario'] == 'Adm') {

                                                    $query = "select * from propostas order by nome asc";
                                                } else {
                                                    $id = $_SESSION['idusuarios'];
                                                    $query = "select * from propostas WHERE idusuario = $id order by nome asc";
                                                }

                                                $result = mysqli_query($conexao, $query);
                                                //$dado = mysqli_fetch_array($result);
                                                $row = mysqli_num_rows($result);

                                                if ($row == '') {

                                                    echo "<h5> 0 </h5>";
                                                } else {
                                                    echo "<h5> $row </h5>";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-university fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Valor das propostas</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <h5><?php

                                                    if ($_SESSION['cargo_usuario'] == 'Master' || $_SESSION['cargo_usuario'] == 'Adm') {
                                                        $query = "SELECT SUM(valor) AS total_valor
                                                        FROM propostas;";
                                                    } else {
                                                        //se nao tiver privilegios, ver os valores apenas cadastrados pelo usuário
                                                        $id = $_SESSION['idusuarios'];
                                                        $query = "SELECT SUM(valor) AS total_valor
                                                        FROM propostas  WHERE idusuario = $id;";
                                                    }


                                                    $result = mysqli_query($conexao, $query);
                                                    //$dado = mysqli_fetch_array($result);
                                                    $row = mysqli_num_rows($result);
                                                    $dado = mysqli_fetch_array($result);
                                                    $resultado = $dado["total_valor"]; // Valor a ser formatado
                                                    $resultadoFormatado = number_format($resultado, 2, ',', '.');

                                                    if ($row == '') {

                                                        echo "<h5> 0 </h5>";
                                                    } else {
                                                        echo  "<h5> $resultadoFormatado</h5";
                                                    }
                                                    ?></h5>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <?php
                                        // Consulta SQL para obter o número total de propostas
                                        $queryTotalPropostas = "SELECT COUNT(*) as totalPropostas FROM propostas";
                                        $resultTotalPropostas = mysqli_query($conexao, $queryTotalPropostas);
                                        $rowTotalPropostas = mysqli_fetch_assoc($resultTotalPropostas);
                                        $totalPropostas = $rowTotalPropostas['totalPropostas'];


                                        if ($_SESSION['cargo_usuario'] == 'Master' || $_SESSION['cargo_usuario'] == 'Adm') {
                                            // Consulta SQL para obter o número de propostas pagas
                                            $queryPropostasPagas = "SELECT COUNT(*) as pagas FROM propostas WHERE statusproposta = 'PAGA'";
                                            $resultPropostasPagas = mysqli_query($conexao, $queryPropostasPagas);
                                            $rowPagas = mysqli_fetch_assoc($resultPropostasPagas);
                                            $pagas = $rowPagas['pagas'];
                                        } else {
                                            //se nao tiver privilegios, ver os valores apenas cadastrados pelo usuário
                                            $id = $_SESSION['idusuarios'];
                                            // Consulta SQL para obter o número de propostas pagas por um usuário específico
                                            $queryPropostasPagas = "SELECT COUNT(*) as pagas FROM propostas WHERE idusuario = $id AND statusproposta = 'PAGA'";
                                            $resultPropostasPagas = mysqli_query($conexao, $queryPropostasPagas);
                                            $rowPagas = mysqli_fetch_assoc($resultPropostasPagas);
                                            $pagas = $rowPagas['pagas'];
                                        }


                                        // Verifique se o total de propostas é diferente de zero antes de calcular a porcentagem
                                        if ($totalPropostas != 0) {
                                            // Calcule a porcentagem de propostas pagas
                                            $porcentagemPagas = ($pagas / $totalPropostas) * 100;

                                            // Formate a porcentagem com duas casas decimais
                                            $porcentagemFormatada = number_format($porcentagemPagas, 2);
                                        } else {
                                            // Se não houver propostas, defina a porcentagem como zero
                                            $porcentagemFormatada = 0.00;
                                        }
                                        ?>

                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Desempenho das vendas</div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $porcentagemFormatada . '%'; ?></div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $porcentagemFormatada; ?>%" aria-valuenow="<?php echo $porcentagemPagas; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Média de vendas</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php



                                                                                                if ($_SESSION['cargo_usuario'] == 'Master' || $_SESSION['cargo_usuario'] == 'Adm') {

                                                                                                    $query = "SELECT AVG(valor) AS media FROM propostas";
                                                                                                } else {
                                                                                                    //se nao tiver privilegios, ver os valores apenas cadastrados pelo usuário
                                                                                                    $id = $_SESSION['idusuarios'];
                                                                                                    $query = "SELECT AVG(valor) AS media FROM propostas  WHERE idusuario = $id";
                                                                                                }

                                                                                                $result = mysqli_query($conexao, $query);


                                                                                                if ($result) {
                                                                                                    $row = mysqli_fetch_assoc($result); // Use mysqli_fetch_assoc para obter o resultado como um array associativo
                                                                                                    $media = $row['media'];
                                                                                                    $mediaFormatada = number_format($media, 2, ',', '.');

                                                                                                    echo "<h5>$mediaFormatada</h5>";
                                                                                                } else {
                                                                                                    // Trate possíveis erros na consulta
                                                                                                    echo "Erro na consulta: " . mysqli_error($conexao);
                                                                                                }
                                                                                                ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-money fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Média de vendas</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <div id="chart_div" style="width: 100%; height: 90%;"></div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Distribuição por status</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <div id="chart_pie_div" style="width: 100%; height: auto;"></div>

                                    </div>
                                    <div class="mt-4 text-start small">
                                        <span class="mr-2">
                                            <i class="fa fa-pie-chart text-primary"></i> Distribuição de Propostas por Status
                                        </span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Propostas</h6>
                                </div>
                                <div class="card-body">
                                    <?php
                                    $queryTotalPropostas = "SELECT COUNT(*) as total FROM propostas";
                                    $resultTotalPropostas = mysqli_query($conexao, $queryTotalPropostas);
                                    $rowTotalPropostas = mysqli_fetch_assoc($resultTotalPropostas);
                                    $totalPropostas = $rowTotalPropostas['total'];

                                    $queryPropostasCanceladas = "SELECT COUNT(*) as canceladas FROM propostas WHERE statusproposta = 'CANCELADO'";
                                    $resultPropostasCanceladas = mysqli_query($conexao, $queryPropostasCanceladas);
                                    $rowCanceladas = mysqli_fetch_assoc($resultPropostasCanceladas);
                                    $canceladas = $rowCanceladas['canceladas'];

                                    // Certifique-se de que $totalPropostas não é zero antes de calcular a porcentagem
                                    if ($totalPropostas != 0) {
                                        // Calcule a porcentagem de propostas canceladas
                                        $percentage = ($canceladas / $totalPropostas) * 100;
                                    } else {
                                        // Se não houver propostas, defina a porcentagem como zero
                                        $percentage = 0.0;
                                    }

                                    // Certifique-se de que $canceladas seja definido, mesmo que inicialmente seja vazio
                                    if ($canceladas == '') {
                                        $canceladas = 0;
                                    }


                                    // Formatar a porcentagem com 1 casa decimal
                                    $percentageFormatted = number_format($percentage, 1);
                                    ?>

                                    <h4 class="small font-weight-bold">Canceladas <span class="float-right"><?php echo $percentageFormatted; ?>%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $percentage; ?>%" aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>


                                    <?php
                                    $queryPropostasPendentes = "SELECT COUNT(*) as pendentes FROM propostas WHERE statusproposta = 'AGUARD DIGITAÇÃO'";
                                    $resultPropostasPendentes = mysqli_query($conexao, $queryPropostasPendentes);
                                    $rowPendentes = mysqli_fetch_assoc($resultPropostasPendentes);
                                    $pendentes = $rowPendentes['pendentes'];

                                    // Certifique-se de que $totalPropostas não é zero antes de calcular a porcentagem
                                    if ($totalPropostas != 0) {
                                        // Calcule a porcentagem de propostas pendentes
                                        $percentagePendentes = ($pendentes / $totalPropostas) * 100;
                                    } else {
                                        // Se não houver propostas, defina a porcentagem como zero
                                        $percentagePendentes = 0.0;
                                    }

                                    // Certifique-se de que $pendentes seja definido, mesmo que inicialmente seja vazio
                                    if ($pendentes == '') {
                                        $pendentes = 0;
                                    }


                                    // Formatar a porcentagem de pendentes com 1 casa decimal
                                    $percentagePendentesFormatted = number_format($percentagePendentes, 1);
                                    ?>

                                    <h4 class="small font-weight-bold">Aguardando digitação <span class="float-right"><?php echo $percentagePendentesFormatted; ?>%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $percentagePendentes; ?>%" aria-valuenow="<?php echo $percentagePendentes; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>



                                    <?php
                                    $queryPropostasPendentes = "SELECT COUNT(*) as pendentes FROM propostas WHERE statusproposta = 'PENDENTE'";
                                    $resultPropostasPendentes = mysqli_query($conexao, $queryPropostasPendentes);
                                    $rowPendentes = mysqli_fetch_assoc($resultPropostasPendentes);
                                    $pendentes = $rowPendentes['pendentes'];

                                    // Certifique-se de que $totalPropostas não é zero antes de calcular a porcentagem
                                    if ($totalPropostas != 0) {
                                        // Calcule a porcentagem de propostas pendentes
                                        $percentagePendentes = ($pendentes / $totalPropostas) * 100;
                                    } else {
                                        // Se não houver propostas, defina a porcentagem como zero
                                        $percentagePendentes = 0.0;
                                    }

                                    // Certifique-se de que $pendentes seja definido, mesmo que inicialmente seja vazio
                                    if ($pendentes == '') {
                                        $pendentes = 0;
                                    }


                                    // Formatar a porcentagem de pendentes com 1 casa decimal
                                    $percentagePendentesFormatted = number_format($percentagePendentes, 1);
                                    ?>

                                    <h4 class="small font-weight-bold">Pendentes <span class="float-right"><?php echo $percentagePendentesFormatted; ?>%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $percentagePendentes; ?>%" aria-valuenow="<?php echo $percentagePendentes; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>




                                    <?php
                                    $queryPropostasPagas = "SELECT COUNT(*) as pagas FROM propostas WHERE statusproposta = 'PAGA'";
                                    $resultPropostasPagas = mysqli_query($conexao, $queryPropostasPagas);
                                    $rowPagas = mysqli_fetch_assoc($resultPropostasPagas);
                                    $pagas = $rowPagas['pagas'];

                                    // Certifique-se de que $totalPropostas não é zero antes de calcular a porcentagem
                                    if ($totalPropostas != 0) {
                                        // Calcule a porcentagem de propostas pagas
                                        $percentagePagas = ($pagas / $totalPropostas) * 100;
                                    } else {
                                        // Se não houver propostas, defina a porcentagem como zero
                                        $percentagePagas = 0.0;
                                    }

                                    // Certifique-se de que $pagas seja definido, mesmo que inicialmente seja vazio
                                    if ($pagas == '') {
                                        $pagas = 0;
                                    }


                                    // Formatar a porcentagem de propostas pagas com 1 casa decimal
                                    $percentagePagasFormatted = number_format($percentagePagas, 1);
                                    ?>

                                    <h4 class="small font-weight-bold">Paga <span class="float-right"><?php echo $percentagePagasFormatted; ?>%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $percentagePagas; ?>%" aria-valuenow="<?php echo $percentagePagas; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>


                                    <?php
                                    $queryFormalizacaoConcluida = "SELECT COUNT(*) as concluida FROM propostas WHERE statusproposta = 'FORMALIZACAO CONCLUIDA'";
                                    $resultFormalizacaoConcluida = mysqli_query($conexao, $queryFormalizacaoConcluida);
                                    $rowConcluida = mysqli_fetch_assoc($resultFormalizacaoConcluida);
                                    $concluida = $rowConcluida['concluida'];

                                    // Certifique-se de que $totalPropostas não é zero antes de calcular a porcentagem
                                    if ($totalPropostas != 0) {
                                        // Calcule a porcentagem de propostas concluídas
                                        $percentageConcluida = ($concluida / $totalPropostas) * 100;
                                    } else {
                                        // Se não houver propostas, defina a porcentagem como zero
                                        $percentageConcluida = 0.0;
                                    }

                                    // Certifique-se de que $concluida seja definido, mesmo que inicialmente seja vazio
                                    if ($concluida == '') {
                                        $concluida = 0;
                                    }


                                    // Formatar a porcentagem de formalização concluída com 1 casa decimal
                                    $percentageConcluidaFormatted = number_format($percentageConcluida, 1);
                                    ?>

                                    <?php if ($percentageConcluida >= 100) : ?>
                                        <h4 class="small font-weight-bold">Concluída <span class="float-right">Complete!</span></h4>
                                    <?php else : ?>
                                        <h4 class="small font-weight-bold">Concluída <span class="float-right"><?php echo $percentageConcluidaFormatted; ?>%</span></h4>
                                    <?php endif; ?>

                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $percentageConcluida; ?>%" aria-valuenow="<?php echo $percentageConcluida; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>


                                </div>
                            </div>

                            <!-- Color System -->
                            <div class="row">
                                <!-- início tabela propostas recentes-->
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-12">
                                                <h5>Propostas registradas <span style="color:white;" class="badge bg-secondary">RECENTES</span></h5>
                                                <small class="text-muted">Filtrar por valores mais altos e mais baixos</small>
                                            </div>
                                            <div class="col-4">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <form class="form-inline my-2 my-lg-0">
                                                        <button name="buttonMaisAlta" type="submit" class="btn btn-primary btn-sm"><i class="fa fa-sort-asc" aria-hidden="true"></i></button>
                                                    </form>
                                                    <form class="form-inline my-2 my-lg-0">
                                                        <button name="buttonMaisBaixa" type="submit" class="btn btn-primary btn-sm"><i class="fa fa-sort-desc" aria-hidden="true"></i></button>
                                                    </form>
                                                    <form class="form-inline my-2 my-lg-0">
                                                        <button name="buttonPesquisar" type="submit" class="btn btn-primary btn-sm"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">


                                            <!--LISTAR TODAS AS PROPOSTAS -->

                                            <?php
                                            if (isset($_GET['buttonPesquisar'])) {
                                                $nome = $_GET['buttonPesquisar'] . '%';
                                                $query = "select * from propostas where nome LIKE '$nome'  order by nome asc LIMIT 5";
                                            } else if (isset($_GET['botaoPesquisar'])) {
                                                $nome = $_GET['botaoPesquisar'] . '%';
                                                $query = "select * from propostas where nome LIKE '$nome'  order by nome asc";
                                            }
                                            // novo codigo ( procurar proposta pelo nome)
                                            else if (isset($_GET['buttonPesquisar'])) {
                                                $nome = $_GET['buttonPesquisar'] . '%';
                                                $query = "select * from propostas where nome LIKE '$nome'  order by nome asc where curdate()";
                                            }

                                            // novo codigo ( procurar por propostas mais altas)
                                            else if (isset($_GET['buttonMaisAlta'])) {

                                                $query = "SELECT *
                FROM propostas
                WHERE data = CURDATE()
                ORDER BY valor DESC
                LIMIT 1;";
                                            }
                                            // novo codigo ( procurar por propostas mais baixa)
                                            else if (isset($_GET['buttonMaisBaixa'])) {

                                                $query = "SELECT *
                FROM propostas
                WHERE data = CURDATE()
                ORDER BY valor ASC
                LIMIT 1;";
                                            }
                                            // novo codigo ( procurar por propostas sem nenhuma vacina)
                                            else if (isset($_GET['buttonpetsemvacina'])) {
                                                $nome = '';
                                                $query = "select * from propostas where statusproposta = '$nome'";
                                            } else if ($_SESSION['cargo_usuario'] == 'Master') {
                                                $query = "SELECT * FROM propostas WHERE data = CURDATE()

                ORDER BY idpropostas DESC limit 5";
                                            }


                                            //final do código

                                            else {
                                                $id = $_SESSION['idusuarios'];
                                                $query = "SELECT * FROM propostas
          WHERE idusuario = $id and data = CURDATE()
          ORDER BY idpropostas DESC limit 5";
                                            }





                                            $result = mysqli_query($conexao, $query);
                                            //$dado = mysqli_fetch_array($result);
                                            $row = mysqli_num_rows($result);

                                            if ($row == '') {

                                                echo "<h5> Não existem propostas cadastradas recentes por você! </h5>";
                                            } else {

                                            ?>



                                                <table class="table table-borderless">
                                                    <thead class=" text-primary">

                                                        <th>
                                                            Nome do cliente
                                                        </th>

                                                        <th>
                                                            Operação
                                                        </th>
                                                        <th>
                                                            Valor
                                                        </th>
                                                        <th>
                                                            Usuário
                                                        </th>
                                                        <th>
                                                            Status
                                                        </th>

                                                        <th>
                                                            Ações
                                                        </th>
                                                    </thead>
                                                    <tbody>

                                                        <?php

                                                        // ja tendo uma conexão com o banco de dados ($conexao)
                                                        $query_cores = "SELECT statusproposta, cor FROM statusproposta";
                                                        $result_cores = mysqli_query($conexao, $query_cores);

                                                        // Criar um array associativo para armazenar as cores
                                                        $status_cores = array();
                                                        while ($row_cores = mysqli_fetch_assoc($result_cores)) {
                                                            $status_cores[$row_cores['statusproposta']] = $row_cores['cor'];
                                                        }


                                                        while ($res_1 = mysqli_fetch_array($result)) {
                                                            $nome = $res_1["nome"];
                                                            $cpf = $res_1["cpf"];
                                                            $operacao = $res_1["operacao"];
                                                            $tabela = $res_1["tabela"];
                                                            $convenio = $res_1["convenio"];
                                                            $banco = $res_1["banco"];
                                                            $valor = $res_1["valor"];
                                                            $promotora = $res_1["promotora"];
                                                            $usuario_id = $res_1["idusuario"]; // Aqui armazenamos o ID do usuário
                                                            $statusproposta = $res_1["statusproposta"];
                                                            $data = $res_1["data"];
                                                            $id = $res_1["idpropostas"];

                                                            $data2 = implode('/', array_reverse(explode('-', $data)));

                                                            // Agora, vamos buscar o nome do usuário com base no ID
                                                            $query_usuario = "SELECT usuario FROM usuarios WHERE idusuarios = $usuario_id";
                                                            $result_usuario = mysqli_query($conexao, $query_usuario);
                                                            $row_usuario = mysqli_fetch_assoc($result_usuario);
                                                            $nome_usuario = $row_usuario['usuario'];



                                                        ?>

                                                            <tr>

                                                                <td><?php echo $nome; ?></td>
                                                                <td><?php echo  $operacao;  ?></td>
                                                                <td><?php echo number_format($valor, 2, ",", "."); ?></td>
                                                                <td><?php echo  $nome_usuario; ?></td>






                                                                <?php
                                                                if (array_key_exists($statusproposta, $status_cores)) {
                                                                    $cor_badge = $status_cores[$statusproposta];
                                                                    echo "<td class='badge badge-pill badge-custom' style='background-color: $cor_badge; color: #000000;'>$statusproposta</td>";
                                                                } else {
                                                                    echo "<td class='badge badge-pill badge-info'>$statusproposta</td>";
                                                                }
                                                                ?>





                                                                <td>





                                                                    <div class="btn-group" role="group" aria-label="Exemplo básico">


                                                                        <?php
                                                                        // Verificando se o usuario é Master ou Adm, se nao for, nao consegue editar as propostas em (propostas recentes)
                                                                        if ($_SESSION['cargo_usuario'] == 'Master' || $_SESSION['cargo_usuario'] == 'Adm') : ?>
                                                                            <div class="dropdown">
                                                                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                                                                    <i class="fa fa-cog" aria-hidden="true"></i><span class="caret"></span>
                                                                                </button>
                                                                                <ul class="dropdown-menu dropdown-menu-right dropdown-menu-up">
                                                                                    <li><a href="propostas.php?func=editarcliente&id=<?php echo $id; ?>" style="white-space: nowrap;">Editar cliente</a></li>
                                                                                    <li><a href="propostas.php?func=editarpropostas&id=<?php echo $id; ?>" style="white-space: nowrap;">Editar propostas</a></li>
                                                                                    <li><a href="propostas.php?func=editardadosbancarios&id=<?php echo $id; ?>" style="white-space: nowrap;">Editar dados bancários</a></li>
                                                                                </ul>
                                                                            </div>
                                                                        <?php

                                                                        endif;

                                                                        ?>

                                                                        <span style="margin-right: 5px;"></span> <!-- Isso vai criar um espaçamento de 10 pixels -->

                                                                        <!-- Botão de exclusão de proposta -->


                                                                        <span style="margin-right: 5px;"></span> <!-- Isso vai criar um espaçamento de 10 pixels -->

                                                                        <!-- Botão de edição de status da proposta -->
                                                                        <a class='btn btn-primary' href="propostas.php?func=editarstatus&id=<?php echo $id; ?>"><i class='fa fa-check-square-o'></i></a>

                                                                        <span style="margin-right: 5px;"></span> <!-- Isso vai criar um espaçamento de 10 pixels -->


                                                                        <!-- Botão de visualizar proposta -->
                                                                        <a class='btn btn-primary' href="propostas.php?func=visualizarproposta&id=<?php echo $id; ?>"><i class='fa fa-eye'></i></a>


                                                                        <span style="margin-right: 5px;"></span> <!-- Isso vai criar um espaçamento de 10 pixels -->


                                                                        <?php
                                                                        // lógica para só conseguir excluir a proposta quem for master do sistema
                                                                        if ($_SESSION['cargo_usuario'] == 'Master') : ?>
                                                                            <a class="btn btn-primary btn btn-danger" style="color: white;" data-toggle="modal" data-target="#confirmModal" data-id="<?php echo $id; ?>">
                                                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                                            </a>

                                                                        <?php

                                                                        endif;

                                                                        ?>











                                                                    </div>

                                                                </td>
                                                            </tr>

                                                        <?php
                                                        }
                                                        ?>



                                                    </tbody>
                                                </table>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- final tabela propostas recentes-->
                            </div>

                        </div>

                        <style>
                            /* Estilo para o banner rotativo */
                            #banner-container {
                                max-width: 80%;
                                margin: auto;
                                overflow: hidden;
                            }

                            #banner-slider {
                                display: flex;
                                transition: transform 0.5s ease-in-out;
                            }

                            .banner-image {
                                width: 100%;
                            }
                        </style>



                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Últimas Informações</h6>
                                </div>
                                <div class="card-body">
                                    <div id="banner-container" class="container">
                                        <div id="banner-slider" class="carousel">
                                            <img class="banner-image active" src="img/novidade1.jpg" alt="Banner 1">
                                            <!-- <img class="banner-image active" src="img/novidade1.jpg" alt="Banner 1"> -->
                                        </div>

                                        <div id="navigation-buttons" class="d-flex justify-content-between mt-3 mb-3">
                                            <button class="btn btn-primary" onclick="prevBanner()">Anterior</button>
                                            <button class="btn btn-primary" onclick="nextBanner()">Próxima</button>
                                        </div>

                                    </div>
                                        
                                    <?php
                                    // Obter as últimas 3 notificações não lidas no banco de dados
                                    $queryNotificacoes = "SELECT * FROM notificacoes n
                                    LEFT JOIN visualizacoes_notificacoes vn ON n.id = vn.id_notificacao AND vn.id_usuario = $idUsuario
                                    AND vn.id_visualizacao IS NULL
                                    ORDER BY n.id DESC
                                    LIMIT 3";
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

                                </div>
                            </div>

                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Top 3 usuários que mais cadastrou propostas</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <?php
                                        $query = "SELECT u.idusuarios, u.usuario, COALESCE(COUNT(p.idusuario), 0) as propostas
            FROM usuarios u
            LEFT JOIN propostas p ON u.idusuarios = p.idusuario
            GROUP BY u.idusuarios, u.usuario
            ORDER BY propostas DESC
            LIMIT 3 OFFSET 0;";

                                        $result = mysqli_query($conexao, $query);
                                        $row = mysqli_num_rows($result);

                                        if ($row == 0) {
                                            echo "<h3>Não existem dados cadastrados no banco</h3>";
                                        } else {
                                        ?>
                                            <table class="table">
                                                <thead class="text-primary">
                                                    <th>Imagem</th>
                                                    <th>Usuário</th>
                                                    <th>Propostas cadastradas</th>

                                                </thead>
                                                <tbody>
                                                    <?php
                                                    while ($res_1 = mysqli_fetch_array($result)) {
                                                        $nome = $res_1["usuario"];
                                                        $propostas = $res_1["propostas"];
                                                        $idUsuario = $res_1["idusuarios"];
                                                        $caminhoDaImagem = 'https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg'; // Caminho padrão para imagem de placeholder

                                                        // Verifique se o usuário tem uma imagem de perfil
                                                        $sql = "SELECT imagem FROM usuarios WHERE idusuarios = $idUsuario";
                                                        $resultImagem = mysqli_query($conexao, $sql);
                                                        if ($resultImagem && mysqli_num_rows($resultImagem) > 0) {
                                                            $linhaImagem = mysqli_fetch_assoc($resultImagem);
                                                            if (!empty($linhaImagem['imagem'])) {
                                                                $caminhoDaImagem = 'assets/img/faces/' . $linhaImagem['imagem'];
                                                            }
                                                        }
                                                    ?>
                                                        <tr>
                                                            <td>
                                                                <img class="avatar border-gray" src="<?php echo $caminhoDaImagem; ?>" alt="Imagem de Perfil" style="width: 50px; height: 50px;">
                                                            </td>
                                                            <td><?php echo $nome; ?></td>
                                                            <td><?php echo $propostas; ?></td>

                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        <?php
                                        }
                                        ?>
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
                        <span>Copyright &copy; CRM CORBAN 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->



    <!-- Scroll to Top Button
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
        -->


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

    <!-- Modal de confirmação de exclusão de registro -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirmação de Exclusão</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Tem certeza de que deseja excluir este registro?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary btn btn-danger" href="propostas.php?func=deleta&id=<?php echo $id; ?>">Excluir</a>
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


    <!-- script banner rotativo -->
    <script>
        const bannerSlider = document.getElementById('banner-slider');

        function nextBanner() {
            bannerSlider.style.transition = 'transform 0.5s ease-in-out';
            bannerSlider.style.transform = 'translateX(-100%)';
            setTimeout(() => {
                bannerSlider.appendChild(bannerSlider.firstElementChild);
                bannerSlider.style.transition = 'none';
                bannerSlider.style.transform = 'translateX(0)';
                updateActiveClass();
            }, 500);
        }

        function prevBanner() {
            bannerSlider.style.transition = 'transform 0.5s ease-in-out';
            bannerSlider.style.transform = 'translateX(100%)';
            setTimeout(() => {
                bannerSlider.prepend(bannerSlider.lastElementChild);
                bannerSlider.style.transition = 'none';
                bannerSlider.style.transform = 'translateX(0)';
                updateActiveClass();
            }, 500);
        }

        function updateActiveClass() {
            // Adicionar classe active à imagem corrente
            Array.from(bannerSlider.children).forEach((image, index) => {
                image.classList.toggle('active', index === 0);
            });
        }

        setInterval(nextBanner, 9000); // Intervalo de 9 segundos
    </script>
    <style>
        .banner-image {
            display: none;
        }

        .banner-image.active {
            display: block;
        }
    </style>

</body>

</html>




<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Métrica', 'Valor'],
            ['Média das Propostas', <?php echo $media; ?>]
        ]);

        var options = {
            title: 'Média do Valor das Propostas',
            hAxis: {
                title: 'Métrica',
                titleTextStyle: {
                    color: '#333'
                }
            },
            vAxis: {
                minValue: 0
            },
            chart: {
                title: 'Média do Valor das Propostas',
                subtitle: 'Métrica: Valor'
            },
            bars: 'vertical' // Define o tipo de gráfico para barras verticais
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>


<!-- Gráfico Pie Chart -->
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawPieChart);

    function drawPieChart() {
        var dataStatus = google.visualization.arrayToDataTable([
            ['Status', 'Quantidade'],
            <?php
            // Substitua 'sua_conexao' pela sua conexão ao banco de dados


            // Consulta SQL para contar propostas por status
            $queryStatus = "SELECT statusproposta, COUNT(*) as count FROM propostas GROUP BY statusproposta";
            $resultStatus = mysqli_query($conexao, $queryStatus);

            while ($rowStatus = mysqli_fetch_assoc($resultStatus)) {
                echo "['" . $rowStatus['statusproposta'] . "', " . $rowStatus['count'] . "],";
            }

            // Feche a conexão com o banco de dados
            mysqli_close($conexao);
            ?>
        ]);

        var optionsStatus = {
            title: '',
            width: 'auto', // Largura do gráfico
            height: 'auto', // Altura do gráfico
        };

        var chartStatus = new google.visualization.PieChart(document.getElementById('chart_pie_div'));
        chartStatus.draw(dataStatus, optionsStatus);
    }
</script>