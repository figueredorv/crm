<?php

session_start();
include('verificar_login.php');
include("conexao.php");
?>


<?php

$nomeusuario = $_SESSION['nome_usuario'];


?>



<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Propostas</title>

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

                    <div class="table-responsive h-100">


                <!--LISTAR TODAS AS PROPOSTAS -->

                <?php

                // Definir o número de itens por página
                $itens_por_pagina = 10;
                $pagina = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1;
                $offset = max(0, ($pagina - 1) * $itens_por_pagina);

                $statusproposta = isset($_GET['statusproposta']) ? $_GET['statusproposta'] : 'PENDENTE';

                // Calcula o deslocamento para a consulta SQL
                $offset = max(0, ($pagina - 1) * $itens_por_pagina);

                // Consulta SQL para obter os registros da página atual
                $sql_code = "SELECT * FROM propostas LIMIT $offset, $itens_por_pagina";
                $result = $conexao->query($sql_code) or die($conexao->error);

                // Ajusta a URL para incluir o filtro de statusproposta nas páginas
                $pagina_anterior = max(1, $pagina - 1);
                $pagina_seguinte = $pagina + 1;

                // Obter os resultados da consulta
                //$propostas = $result->fetch_assoc();


                // Número total de registros
                $num_total = $conexao->query("SELECT * FROM propostas")->num_rows;

                // Calcular o número total de páginas
                $num_paginas = ceil($num_total / $itens_por_pagina);


                function adicionarParametro($url, $parametro, $valor)
                {
                  // Verifica se a URL já contém algum parâmetro
                  if (strpos($url, '?') !== false) {
                    // Se já existir parâmetro, adiciona o novo com "&"
                    $url .= "&$parametro=$valor";
                  } else {
                    // Se não existir parâmetro, adiciona o novo com "?"
                    $url .= "?$parametro=$valor";
                  }

                  return $url;
                }



                // novo codigo ( procurar proposta pelo nome da pessoa)
                $id = $_SESSION['idusuarios'];
                $cargo_usuario = $_SESSION['cargo_usuario'];

                if (isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] != '') {
                  $nome = $_GET['txtpesquisar'] . '%';
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas WHERE nome LIKE '%$nome%' OR idpropostas = '$nome' ORDER BY nome ASC";
                  } else {
                    //$query = "SELECT * FROM propostas WHERE nome LIKE '%$nome%' AND idusuario = $id OR idusuario = $id OR idpropostas = '$nome' ORDER BY nome ASC";
                    $query = "SELECT * FROM propostas WHERE (nome LIKE '%$nome%' OR idpropostas = '$nome') AND idusuario = $id ORDER BY nome ASC";
                  }
                } else if (isset($_GET['buttonPesquisarcpf'])) {
                  $nome = $_GET['txtpesquisarcpf'];
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas WHERE cpf = '$nome' ORDER BY idpropostas DESC";
                  } else {
                    $query = "SELECT * FROM propostas WHERE cpf = '$nome' AND idusuario = $id ORDER BY idpropostas DESC";
                  }
                } else if (isset($_GET['buttonPesquisardata']) and $_GET['txtpesquisardata'] != '') {
                  $nome = $_GET['txtpesquisardata'];
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas WHERE data = '$nome' ORDER BY idpropostas DESC";
                  } else {
                    $query = "SELECT * FROM propostas WHERE data = '$nome' AND idusuario = $id ORDER BY idpropostas DESC";
                  }
                } else if (isset($_GET['buttonpropostamaisnova'])) {
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  } else {
                    $query = "SELECT * FROM propostas WHERE idusuario = $id ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  }
                } else if (isset($_GET['buttonpropostamaisantiga'])) {
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas ORDER BY idpropostas ASC LIMIT $offset, $itens_por_pagina";
                  } else {
                    $query = "SELECT * FROM propostas WHERE idusuario = $id ORDER BY idpropostas ASC LIMIT $offset, $itens_por_pagina";
                  }
                } else if (isset($_GET['buttonPesquisarOperador'])) {
                  $usuario = $_GET['txtpesquisaroperador'];
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT propostas.*, usuarios.usuario 
                                FROM propostas 
                                INNER JOIN usuarios ON propostas.idusuario = usuarios.idusuarios 
                                WHERE usuarios.usuario LIKE '%$usuario%' 
                                ORDER BY propostas.idpropostas DESC";
                  } else {
                    $query = "SELECT propostas.*, usuarios.usuario 
                                FROM propostas 
                                INNER JOIN usuarios ON propostas.idusuario = usuarios.idusuarios 
                                WHERE usuarios.usuario LIKE '%$usuario%' AND propostas.idusuario = $id 
                                ORDER BY propostas.idpropostas DESC";
                  }
                } else if (isset($_GET['statuspropostaconsultapendente'])) {
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas WHERE statusproposta = 'PENDENTE' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  } else {
                    $query = "SELECT * FROM propostas WHERE idusuario = $id AND statusproposta = 'PENDENTE' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  }
                } else if (isset($_GET['statuspropostaconsultaaguard'])) {
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas WHERE statusproposta = 'AGUARD DIGITAÇÃO' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  } else {
                    $query = "SELECT * FROM propostas WHERE idusuario = $id AND statusproposta = 'AGUARD DIGITAÇÃO' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  }
                } else if (isset($_GET['statuspropostaconsultaaverbada'])) {
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas WHERE statusproposta = 'AVERBADA' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  } else {
                    $query = "SELECT * FROM propostas WHERE idusuario = $id AND statusproposta = 'AVERBADA' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  }
                } else if (isset($_GET['statuspropostaconsultaintegrado'])) {
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas WHERE statusproposta = 'INTEGRADO' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  } else {
                    $query = "SELECT * FROM propostas WHERE idusuario = $id AND statusproposta = 'INTEGRADO' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  }
                } else if (isset($_GET['statuspropostaconsultaaguardando'])) {
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas WHERE statusproposta = 'AGUARDANDO AVERBAÇÃO' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  } else {
                    $query = "SELECT * FROM propostas WHERE idusuario = $id AND statusproposta = 'AGUARDANDO AVERBAÇÃO' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  }
                } else if (isset($_GET['statuspropostaconsultacancelado'])) {
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas WHERE statusproposta = 'CANCELADO' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  } else {
                    $query = "SELECT * FROM propostas WHERE idusuario = $id AND statusproposta = 'CANCELADO' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  }
                } else if (isset($_GET['statuspropostaconsultapaga'])) {
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas WHERE statusproposta = 'PAGA' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  } else {
                    $query = "SELECT * FROM propostas WHERE idusuario = $id AND statusproposta = 'PAGA' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  }
                } else if (isset($_GET['statuspropostaconsultadigitado'])) {
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas WHERE statusproposta = 'DIGITADO' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  } else {
                    $query = "SELECT * FROM propostas WHERE idusuario = $id AND statusproposta = 'DIGITADO' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  }
                } else if (isset($_GET['statuspropostaconsultaretornado'])) {
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas WHERE statusproposta = 'SALDO RETORNADO' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  } else {
                    $query = "SELECT * FROM propostas WHERE idusuario = $id AND statusproposta = 'SALDO RETORNADO' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  }
                } else if (isset($_GET['statuspropostaconsultaemdig'])) {
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas WHERE statusproposta = 'EM DIGITAÇÃO' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  } else {
                    $query = "SELECT * FROM propostas WHERE idusuario = $id AND statusproposta = 'EM DIGITAÇÃO' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  }
                } else if (isset($_GET['statuspropostaconsultaformalizada'])) {
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas WHERE statusproposta = 'FORMALIZAÇÃO CONCLUÍDA' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  } else {
                    $query = "SELECT * FROM propostas WHERE idusuario = $id AND statusproposta = 'FORMALIZAÇÃO CONCLUÍDA' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  }
                } else if (isset($_GET['statuspropostaconsultapendform'])) {
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas WHERE statusproposta = 'PEND FORMALIZAÇÃO' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  } else {
                    $query = "SELECT * FROM propostas WHERE idusuario = $id AND statusproposta = 'PEND FORMALIZAÇÃO' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  }
                } else if (isset($_GET['statuspropostaconsultaanalisebanco'])) {
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas WHERE statusproposta = 'ANALISE BANCO' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  } else {
                    $query = "SELECT * FROM propostas WHERE idusuario = $id AND statusproposta = 'ANALISE BANCO' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  }
                } else if (isset($_GET['statuspropostaconsultaaguardcip'])) {
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas WHERE statusproposta = 'AGUARDANDO CIP' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  } else {
                    $query = "SELECT * FROM propostas WHERE idusuario = $id AND statusproposta = 'AGUARDANDO CIP' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  }
                } else if (isset($_GET['statuspropostaconsultataxafora'])) {
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas WHERE statusproposta = 'TAXA FORA DO ENQUADRAMENTO' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  } else {
                    $query = "SELECT * FROM propostas WHERE idusuario = $id AND statusproposta = 'TAXA FORA DO ENQUADRAMENTO' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  }
                } else if (isset($_GET['statuspropostaconsultafdpolitica'])) {
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas WHERE statusproposta = 'FORA DA POLITICA' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  } else {
                    $query = "SELECT * FROM propostas WHERE idusuario = $id AND statusproposta = 'FORA DA POLITICA' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  }
                } else if (isset($_GET['statuspropostaconsultaaguardabco'])) {
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas WHERE statusproposta = 'AGUARDA BCO' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  } else {
                    $query = "SELECT * FROM propostas WHERE idusuario = $id AND statusproposta = 'AGUARDA BCO' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  }
                } else if (isset($_GET['statuspropostaconsultaesp92'])) {
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas WHERE statusproposta = 'ESP32/92<60' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  } else {
                    $query = "SELECT * FROM propostas WHERE idusuario = $id AND statusproposta = 'ESP32/92<60' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  }
                } else if (isset($_GET['statuspropostaconsultaaguard5dloas'])) {
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas WHERE statusproposta = 'AGUARDA 5D LOAS' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  } else {
                    $query = "SELECT * FROM propostas WHERE idusuario = $id AND statusproposta = 'AGUARDA 5D LOAS' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  }
                } else if (isset($_GET['statuspropostaconsultaportpaga'])) {
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas WHERE statusproposta = 'PORTABILIDADE PAGA' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  } else {
                    $query = "SELECT * FROM propostas WHERE idusuario = $id AND statusproposta = 'PORTABILIDADE PAGA' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  }
                } else if (isset($_GET['statuspropostaconsultaaguardlink'])) {
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas WHERE statusproposta = 'AGUARD LINK' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  } else {
                    $query = "SELECT * FROM propostas WHERE idusuario = $id AND statusproposta = 'AGUARD LINK' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  }
                } else if (isset($_GET['statuspropostaconsultanbbloq'])) {
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas WHERE statusproposta = 'NB BLOQUEADO' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  } else {
                    $query = "SELECT * FROM propostas WHERE idusuario = $id AND statusproposta = 'NB BLOQUEADO' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  }
                } else if (isset($_GET['statuspropostaconsultacancelpolitica'])) {
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas WHERE statusproposta = 'CANCELADO POR POLITICA INTERNA' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  } else {
                    $query = "SELECT * FROM propostas WHERE idusuario = $id AND statusproposta = 'CANCELADO POR POLITICA INTERNA' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  }
                } else if (isset($_GET['statuspropostaconsultaaguardaumento'])) {
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas WHERE statusproposta = 'AGUARD AUMENTO' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  } else {
                    $query = "SELECT * FROM propostas WHERE idusuario = $id AND statusproposta = 'AGUARD AUMENTO' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  }
                } else if (isset($_GET['statuspropostaconsultaaguarddesbloqbnf'])) {
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas WHERE statusproposta = 'AGUARDA DESBLOQ BNF' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  } else {
                    $query = "SELECT * FROM propostas WHERE idusuario = $id AND statusproposta = 'AGUARDA DESBLOQ BNF' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  }
                } else if (isset($_GET['statuspropostaconsultacpfrestrição'])) {
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas WHERE statusproposta = 'CPF C/ RESTRIÇÃO INTERNA-IMBURSA' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  } else {
                    $query = "SELECT * FROM propostas WHERE idusuario = $id AND statusproposta = 'CPF C/ RESTRIÇÃO INTERNA-IMBURSA' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  }
                } else if (isset($_GET['statuspropostaconsultaaguarddig'])) {
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas WHERE statusproposta = 'AGUARD DIGITAÇÃO' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  } else {
                    $query = "SELECT * FROM propostas WHERE idusuario = $id AND statusproposta = 'AGUARD DIGITAÇÃO' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  }
                } else if (isset($_GET['statuspropostaconsultapendencia'])) {
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas WHERE statusproposta = 'PENDENCIA RESOLVIDA' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  } else {
                    $query = "SELECT * FROM propostas WHERE idusuario = $id AND statusproposta = 'PENDENCIA RESOLVIDA' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  }
                } else if (isset($_GET['statuspropostaconsultasrccativo'])) {
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas WHERE statusproposta = 'SRCC ATIVO' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  } else {
                    $query = "SELECT * FROM propostas WHERE idusuario = $id AND statusproposta = 'SRCC ATIVO' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  }
                } else if (isset($_GET['statuspropostaconsultaaguardbco'])) {
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas WHERE statusproposta = 'AGUARD BCO/SRCC' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  } else {
                    $query = "SELECT * FROM propostas WHERE idusuario = $id AND statusproposta = 'AGUARD BCO/SRCC' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  }
                } else if (isset($_GET['statuspropostaconsultaaguardbancobpc'])) {
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas WHERE statusproposta = 'AGUARD BANCO/BPC PORT' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  } else {
                    $query = "SELECT * FROM propostas WHERE idusuario = $id AND statusproposta = 'AGUARD BANCO/BPC PORT' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  }
                } else if (isset($_GET['statuspropostaconsultaretidapelai'])) {
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas WHERE statusproposta = 'RETIDO PELA IF CREDORA' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  } else {
                    $query = "SELECT * FROM propostas WHERE idusuario = $id AND statusproposta = 'RETIDO PELA IF CREDORA' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  }
                } else if (isset($_GET['statuspropostaconsultaretidacip'])) {
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas WHERE statusproposta = 'RETIDA CIP-CTO NÃO LOCALIZADO' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  } else {
                    $query = "SELECT * FROM propostas WHERE idusuario = $id AND statusproposta = 'RETIDA CIP-CTO NÃO LOCALIZADO' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  }
                } else if (isset($_GET['statuspropostaconsultanbbloqtbm'])) {
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas WHERE statusproposta = 'NB BLOQUEADO TBM' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  } else {
                    $query = "SELECT * FROM propostas WHERE idusuario = $id AND statusproposta = 'NB BLOQUEADO TBM' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  }
                } else if (isset($_GET['statuspropostaconsultanbbloqconcessao'])) {
                  if ($cargo_usuario == 'Master' || $cargo_usuario == 'Adm') {
                    $query = "SELECT * FROM propostas WHERE statusproposta = 'NB BLOQUEADO CONCESSÃO' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  } else {
                    $query = "SELECT * FROM propostas WHERE idusuario = $id AND statusproposta = 'NB BLOQUEADO CONCESSÃO' ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                  }
                }












                //verificando se o cargo do usuário é == Master, se for, consegue visualizar todas as propostas sem limitar apenas para o usuário que cadastrou.
                else if ($_SESSION['cargo_usuario'] == 'Master' || $_SESSION['cargo_usuario'] == 'Adm') {
                  $query = "SELECT * FROM propostas
      
                      ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                }


                //final do código

                else {
                  $id = $_SESSION['idusuarios'];
                  $query = "SELECT * FROM propostas
                      WHERE idusuario = $id
                      ORDER BY idpropostas DESC LIMIT $offset, $itens_por_pagina";
                }





                $result = mysqli_query($conexao, $query);
                //$dado = mysqli_fetch_array($result);
                $row = mysqli_num_rows($result);

                if ($row == '') {

                  echo "<h3> Não existem propostas cadastradas por você!</h3>";
                } else {

                ?>



                  <table class="table table-hover table-borderless">
                    <thead class=" text-primary">
                      <th>
                        id
                      </th>
                      <th>
                        Nome
                      </th>
                      <th>
                        Cpf
                      </th>
                      <th>
                        Operação
                      </th>
                      <th>
                        Convênio
                      </th>
                      <th>
                        Banco
                      </th>

                      <th>
                        Valor
                      </th>

                      <th>
                        Promotora
                      </th>

                      <th>
                        Usuário
                      </th>

                      <th>
                        Data
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
                      // Supondo que você já tenha uma conexão com o banco de dados ($conexao)
                      $query_cores = "SELECT statusproposta, cor FROM statusproposta";
                      $result_cores = mysqli_query($conexao, $query_cores);

                      // Criar um array associativo para armazenar as cores
                      $status_cores = array();
                      while ($row_cores = mysqli_fetch_assoc($result_cores)) {
                        $status_cores[$row_cores['statusproposta']] = $row_cores['cor'];
                      }
                      while ($res_1 = $result->fetch_assoc()) {
                        $id = $res_1["idpropostas"];
                        $nome = $res_1["nome"];
                        $cpf = $res_1["cpf"];
                        $operacao = $res_1["operacao"];
                        $tabela = $res_1["tabela"];
                        $convenio = $res_1["convenio"];
                        $banco = $res_1["bancoproposta"];
                        $valor = $res_1["valor"];
                        $promotora = $res_1["promotora"];
                        $usuario_id = $res_1["idusuario"]; // Aqui armazenamos o ID do usuário
                        $statusproposta = $res_1["statusproposta"];
                        $data = $res_1["data"];


                        $data2 = implode('/', array_reverse(explode('-', $data)));


                        // Agora, vamos buscar o nome do usuário com base no ID
                        $query_usuario = "SELECT usuario FROM usuarios WHERE idusuarios = $usuario_id";
                        $result_usuario = mysqli_query($conexao, $query_usuario);
                        $row_usuario = mysqli_fetch_assoc($result_usuario);
                        $nome_usuario = $row_usuario['usuario'];



                      ?>

                        <tr>
                          <td class="linha-clicavel" data-href="propostas.php?func=visualizarproposta&id=<?php echo $id; ?>"><?php echo $id; ?></td>
                          <td class="linha-clicavel" data-href="propostas.php?func=visualizarproposta&id=<?php echo $id; ?>"><?php echo $nome; ?></td>
                          <td class="linha-clicavel" data-href="propostas.php?func=visualizarproposta&id=<?php echo $id; ?>"><?php echo  $cpf; ?></td>
                          <td class="linha-clicavel" data-href="propostas.php?func=visualizarproposta&id=<?php echo $id; ?>"><?php echo  $operacao;  ?></td>
                          <td class="linha-clicavel" data-href="propostas.php?func=visualizarproposta&id=<?php echo $id; ?>"><?php echo $convenio; ?></td>
                          <td class="linha-clicavel" data-href="propostas.php?func=visualizarproposta&id=<?php echo $id; ?>"><?php echo $banco; ?></td>
                          <td class="linha-clicavel" data-href="propostas.php?func=visualizarproposta&id=<?php echo $id; ?>"><?php echo number_format($valor, 2, ",", "."); ?></td>
                          <td class="linha-clicavel" data-href="propostas.php?func=visualizarproposta&id=<?php echo $id; ?>"><?php echo  $promotora; ?></td>
                          <td class="linha-clicavel" data-href="propostas.php?func=visualizarproposta&id=<?php echo $id; ?>"><?php echo  $nome_usuario; ?></td>
                          <td class="linha-clicavel" data-href="propostas.php?func=visualizarproposta&id=<?php echo $id; ?>"><?php echo  $data2; ?></td>





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
                              // Verificar se o usuário é 'Master'
                              if ($_SESSION['cargo_usuario'] == 'Master' || $_SESSION['cargo_usuario'] == 'Adm') : ?>
                                <div class="dropdown">
                                  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                    <i class="fa fa-cog" aria-hidden="true"></i><span class="caret"></span>
                                  </button>
                                  <ul class="dropdown-menu">
                                    <li><a href="propostas.php?func=editarcliente&id=<?php echo $id; ?>" style="white-space: nowrap;">Editar cliente</a></li>
                                    <li><a href="propostas.php?func=editarpropostas&id=<?php echo $id; ?>" style="white-space: nowrap;">Editar propostas</a></li>
                                    <li><a href="propostas.php?func=editardadosbancarios&id=<?php echo $id; ?>" style="white-space: nowrap;">Editar dados bancários</a></li>
                                  </ul>
                                </div>
                              <?php elseif ($statusproposta == 'PENDENTE' || $statusproposta == 'AGUARD DIGITAÇÃO') : ?>
                                <!-- Se não for 'Master' e o status for 'PENDENTE', exiba o botão de edição -->
                                <div class="dropdown">
                                  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                    <i class="fa fa-cog" aria-hidden="true"></i><span class="caret"></span>
                                  </button>
                                  <ul class="dropdown-menu">
                                    <li><a href="propostas.php?func=editarcliente&id=<?php echo $id; ?>" style="white-space: nowrap;">Editar cliente</a></li>
                                    <li><a href="propostas.php?func=editarpropostas&id=<?php echo $id; ?>" style="white-space: nowrap;">Editar propostas</a></li>
                                    <li><a href="propostas.php?func=editardadosbancarios&id=<?php echo $id; ?>" style="white-space: nowrap;">Editar dados bancários</a></li>
                                  </ul>
                                </div>
                              <?php endif; ?>





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
                              // lógica para só conseguir excluir o status da proposta quem for master do sistema
                              if ($_SESSION['cargo_usuario'] == 'Master') : ?>
                                <a class="btn btn-primary btn btn-danger" style="color: white;" data-toggle="modal" data-target="#confirmModal" data-id="<?php echo $id; ?>">
                                  <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a>

                              <?php

                              endif;
                              ?>


                              <script>
                                // Adicione um script para redirecionar ao clicar na linha, exceto no dropdown
                                $(document).ready(function() {
                                  $(".linha-clicavel").click(function(e) {
                                    // Verifica se o clique foi no dropdown ou em algum de seus itens
                                    if ($(e.target).hasClass("dropdown-toggle") || $(e.target).closest(".dropdown-menu").length > 0) {
                                      // Clique no dropdown, não redirecionar
                                      return;
                                    }

                                    // Redireciona para o URL da linha
                                    window.location = $(this).data("href");
                                  });
                                });
                              </script>





                            </div>

                          </td>
                        </tr>

                      <?php
                      }
                      ?>



                    </tbody>
                  </table>

                  <nav aria-label="Page navigation example">
                    <ul class="pagination">
                      <li class="page-item <?php echo ($pagina <= 1) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="propostas.php?pagina=<?php echo $pagina - 1; ?>" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                          <span class="sr-only">Previous</span>
                        </a>
                      </li>

                      <?php
                      $num_links = 3; // Número de links para exibir antes e depois da página atual
                      $inicio = max(1, $pagina - $num_links);
                      $fim = min($num_paginas, $pagina + $num_links);

                      for ($i = $inicio; $i <= $fim; $i++) {
                        $estilo = ($pagina == $i) ? "active" : "";
                      ?>
                        <li class="page-item <?php echo $estilo; ?>">
                          <?php
                          // Construir a URL preservando os parâmetros existentes
                          $url = "propostas.php?pagina=$i";
                          foreach ($_GET as $key => $value) {
                            if ($key != 'pagina') {
                              $url .= "&$key=$value";
                            }
                          }
                          ?>
                          <a class="page-link" href="<?php echo $url; ?>"><?php echo $i; ?></a>
                        </li>
                      <?php } ?>

                      <li class="page-item <?php echo ($pagina >= $num_paginas) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="propostas.php?pagina=<?php echo $pagina + 1; ?>" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span>
                          <span class="sr-only">Next</span>
                        </a>
                      </li>
                    </ul>
                  </nav>




                <?php
                }
                ?>
              </div>
            </div>

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