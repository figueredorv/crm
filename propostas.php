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

      <!-- Bootstrap core JavaScript-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

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
                        <input name="txtpesquisar" class="form-control" type="search" placeholder="Nome do cliente ou ID da proposta" aria-label="Pesquisar">
                            <div class="input-group-append">
                            <button name="buttonPesquisar" class="btn btn-outline-success" type="submit"><i class="fa fa-search"></i></button>
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

                    <!-- inputs de busca -->
                    <div class="col-sm-12">
        <!-- Sua tabela existente -->

        <!-- Filtros Avançados -->

        <!-- Input de pesquisa -->
        <form class="form-inline justify-content-end mb-3">
          <!-- Input de pesquisa por CPF -->
          <div class="form-group">
            <input name="txtpesquisarcpf" id="txtcpf" class="form-control" type="search" placeholder="CPF do cliente" aria-label="Pesquisar">
          </div>
          <div class="form-group mr-2">
            <button name="buttonPesquisarcpf" class="btn btn-outline-success" type="submit"><i class="fa fa-search"></i></button>
          </div>

          <!-- Input de pesquisa por data -->
          <div class="form-group">
            <input name="txtpesquisardata" id="txtdata" class="form-control" type="date" placeholder="2022-04-05" aria-label="Pesquisar">
          </div>
          <div class="form-group mr-2">
            <button name="buttonPesquisardata" class="btn btn-outline-success" type="submit"><i class="fa fa-search"></i></button>
          </div>

          <!-- Input de pesquisa por nome 
          <div class="form-group">
            <input name="txtpesquisar" class="form-control" type="search" placeholder="Nome ou ID da proposta" aria-label="Pesquisar">
          </div>
          <div class="form-group mr-2">
            <button name="buttonPesquisar" class="btn btn-outline-success" type="submit"><i class="fa fa-search"></i></button>
          </div>
          -->

          <?php
          // lógica para só conseguir visualizar o input pesquisar por usuário  quem for nível Master ou Adm do sistema.
          if ($_SESSION['cargo_usuario'] == 'Master' || $_SESSION['cargo_usuario'] == 'Adm') : ?>
            <!-- Input de pesquisa por nome -->
            <div class="form-group">
              <input name="txtpesquisaroperador" class="form-control" type="search" placeholder="Usuário" aria-label="Pesquisar">
            </div>
            <div class="form-group mr-2">
              <button name="buttonPesquisarOperador" class="btn btn-outline-success" type="submit"><i class="fa fa-search"></i></button>
            </div>
          <?php endif; ?>
        </form>



        <div class="card mb-3">
          <div class="card-header">
            Opções
          </div>
          <div class="card-body">

            <div class="form-inline my-2 my-lg-0">
              <div class="btn-group">

                <!-- Botão "ADICIONAR" -->
                <form class="form-inline mr-2">
                  <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalExemplo">ADICIONAR</button>
                </form>

                <!-- Botão de filtro "Nova/Antiga" -->
                <form class="form-inline mr-2">
                  <button name="buttonproposta" class="btn btn-secondary mb-3" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-filter"></i> Ordenar por
                  </button>
                  <div class="dropdown-menu">
                    <button name="buttonpropostamaisnova" class="dropdown-item" type="submit">Mais Nova</button>
                    <button name="buttonpropostamaisantiga" class="dropdown-item" type="submit">Mais Antiga</button>
                  </div>
                </form>

                <!-- Botão de filtro por "Status" -->
                <form class="form-inline mr-2">
                  <button name="statuspropostaconsulta" class="btn btn-secondary mb-3" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-filter"></i> Status
                  </button>
                  <div class="dropdown-menu" style="max-height: 200px; overflow-y: auto;">
                    <button name="statuspropostaconsultapendente" class="dropdown-item" type="submit">PENDENTE</button>
                    <button name="statuspropostaconsultaaverbada" class="dropdown-item" type="submit">AVERBADA</button>
                    <button name="statuspropostaconsultaintegrado" class="dropdown-item" type="submit">INTEGRADO</button>
                    <button name="statuspropostaconsultaaguardando" class="dropdown-item" type="submit">AGUARDANDO AVERBAÇÃO</button>
                    <button name="statuspropostaconsultacancelado" class="dropdown-item" type="submit">CANCELADO</button>
                    <button name="statuspropostaconsultapaga" class="dropdown-item" type="submit">PAGA</button>
                    <button name="statuspropostaconsultadigitado" class="dropdown-item" type="submit">DIGITADO</button>
                    <button name="statuspropostaconsultaretornado" class="dropdown-item" type="submit">SALDO RETORNADO</button>
                    <button name="statuspropostaconsultaemdig" class="dropdown-item" type="submit">EM DIGITAÇÃO</button>
                    <button name="statuspropostaconsultaformalizada" class="dropdown-item" type="submit">FORMALIZAÇÃO CONCLUÍDA</button>
                    <button name="statuspropostaconsultapendform" class="dropdown-item" type="submit">PEND FORMALIZAÇÃO</button>
                    <button name="statuspropostaconsultaanalisebanco" class="dropdown-item" type="submit">ANALISE BANCO</button>
                    <button name="statuspropostaconsultaaguardcip" class="dropdown-item" type="submit">AGUARDANDO CIP</button>
                    <button name="statuspropostaconsultataxafora" class="dropdown-item" type="submit">TAXA FORA DO ENQUADRAMENTO</button>
                    <button name="statuspropostaconsultafdpolitica" class="dropdown-item" type="submit">FORA DA POLITICA</button>
                    <button name="statuspropostaconsultaaguardabco" class="dropdown-item" type="submit">AGUARDA BCO</button>
                    <button name="statuspropostaconsultaesp92" class="dropdown-item" type="submit">ESP32/92&lt;60</button>
                    <button name="statuspropostaconsultaaguard5dloas" class="dropdown-item" type="submit">AGUARDA 5D LOAS</button>
                    <button name="statuspropostaconsultaportpaga" class="dropdown-item" type="submit">PORTABILIDADE PAGA</button>
                    <button name="statuspropostaconsultaaguardlink" class="dropdown-item" type="submit">AGUARD LINK</button>
                    <button name="statuspropostaconsultanbbloq" class="dropdown-item" type="submit">NB BLOQUEADO</button>
                    <button name="statuspropostaconsultacancelpolitica" class="dropdown-item" type="submit">CANCELADO POR POLITICA INTERNA</button>
                    <button name="statuspropostaconsultaaguardaumento" class="dropdown-item" type="submit">AGUARD AUMENTO</button>
                    <button name="statuspropostaconsultaaguarddesbloqbnf" class="dropdown-item" type="submit">AGUARDA DESBLOQ BNF</button>
                    <button name="statuspropostaconsultacpfrestrição" class="dropdown-item" type="submit">CPF C/ RESTRIÇÃO INTERNA-IMBURSA</button>
                    <button name="statuspropostaconsultaaguarddig" class="dropdown-item" type="submit">AGUARD DIGITAÇÃO</button>
                    <button name="statuspropostaconsultapendencia" class="dropdown-item" type="submit">PENDENCIA RESOLVIDA</button>
                    <button name="statuspropostaconsultasrccativo" class="dropdown-item" type="submit">SRCC ATIVO</button>
                    <button name="statuspropostaconsultaaguardbco" class="dropdown-item" type="submit">AGUARD BCO/SRCC</button>
                    <button name="statuspropostaconsultaaguardbancobpc" class="dropdown-item" type="submit">AGUARD BANCO/BPC PORT</button>
                    <button name="statuspropostaconsultaretidapelai" class="dropdown-item" type="submit">RETIDO PELA IF CREDORA</button>
                    <button name="statuspropostaconsultaretidacip" class="dropdown-item" type="submit">RETIDA CIP-CTO NÃO LOCALIZADO</button>
                    <button name="statuspropostaconsultanbbloqtbm" class="dropdown-item" type="submit">NB BLOQUEADO TBM</button>
                    <button name="statuspropostaconsultanbbloqconcessao" class="dropdown-item" type="submit">NB BLOQUEADO CONCESSÃO</button>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>

                    <!-- final input de busca-->

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Propostas</h1>


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
                                <thead class=" text-primary thead-light">
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
                <!-- final do código da lista de propostas -->

            </div>


            <!-- Modal -->
      <div id="modalExemplo" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">

              <h4 class="modal-title">CADASTRAR PROPOSTA</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

              <!-- INÍCIO DO CÓDIGO DAS TABS DE CADASTRO DE NOVA PROPOSTA-->
              <ul class="nav nav-tabs container mt-4" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="cliente-tab" data-toggle="tab" href="#cliente" role="tab" aria-controls="cliente" aria-selected="true">CLIENTE</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="propostas-tab" data-toggle="tab" href="#propostas" role="tab" aria-controls="propostas" aria-selected="false">PROPOSTAS</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="dadosbancarios-tab" data-toggle="tab" href="#dadosbancarios" role="tab" aria-controls="dadosbancarios" aria-selected="false">DADOS BANCÁRIOS</a>
                </li>
              </ul>
              <div class="tab-content mt-2" id="myTabContent">
                <div class="tab-pane fade show active" id="cliente" role="tabpanel" aria-labelledby="cliente-tab">
                  <!-- CONTEÚDO TAB CLIENTE-->
                  <form method="POST" action="propostas.php" enctype="multipart/form-data">
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputNome">NOME*</label>
                        <input name="inputNome" type="text" class="form-control" id="inputNome" placeholder="" required>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputCpf">CPF</label>
                        <input name="inputCpf" type="text" class="form-control inputCpf" id="inputCpf" placeholder="">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputRg">RG</label>
                        <input name="inputRg" type="text" class="form-control" id="inputRg" placeholder="">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputNumeroBeneficio">NÚMERO DO BENEFÍCIO</label>
                        <input name="inputNumeroBeneficio" type="text" class="form-control" id="inputNumeroBeneficio" placeholder="">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputDataEmissao">DATA EMISSÃO</label>
                        <input name="inputDataEmissao" type="date" class="form-control" id="inputDataEmissao" placeholder="">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputOrgaoEmissor">ORGÃO EMISSOR</label>
                        <input name="inputOrgaoEmissor" type="text" class="form-control" id="inputOrgaoEmissor" placeholder="">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputNaturalidade">NATURALIDADE</label>
                        <input name="inputNaturalidade" type="text" class="form-control" id="inputNaturalidade">
                      </div>
                      <!-- INÍCIO DO CONTEÚDO CONTATO-->
                      <div class="form-group col-md-4">
                        <label for="inputTelefone">TELEFONE</label>
                        <input name="inputTelefone" type="text" class="form-control" id="inputTelefone" placeholder="">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputEmail">EMAIL</label>
                        <input name="inputEmail" type="email" class="form-control" id="inputEmail" placeholder="">
                      </div>
                      <!-- FINAL DO CONTEÚDO CONTATO-->
                      <div class="form-group col-md-4">
                        <label for="inputDataNascimento">DATA DE NASCIMENTO</label>
                        <input name="inputDataNascimento" type="date" class="form-control" id="inputDataNascimento" placeholder="">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputNomeMae">NOME DA MÃE</label>
                        <input name="inputNomeMae" type="text" class="form-control" id="inputNomeMae" placeholder="">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputNomePai">NOME DO PAI</label>
                        <input name="inputNomePai" type="text" class="form-control" id="inputNomePai" placeholder="">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="inputCep">CEP</label>
                        <div class="input-group">
                          <input name="inputCep" type="text" class="form-control" id="cep" name="cep" placeholder="">
                          <div class="input-group-append">
                            <button class="btn btn-outline-dark" type="button" onclick="consultaEndereco()">
                              <i class="fa fa-search"></i>
                            </button>
                          </div>
                        </div>
                      </div>


                      <div class="form-group col-md-4">
                        <label for="inputRua">RUA</label>
                        <input name="inputRua" type="text" class="form-control" id="inputRua" placeholder="">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputNumero">NÚMERO</label>
                        <input name="inputNumero" type="text" class="form-control" id="inputNumero" placeholder="">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputComplemento">COMPLEMENTO</label>
                        <input name="inputComplemento" type="text" class="form-control" id="inputComplemento" placeholder="">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label for="inputBairro">BAIRRO</label>
                        <input name="inputBairro" type="text" class="form-control" id="inputBairro">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputCidade">CIDADE</label>
                        <input name="inputCidade" type="text" class="form-control" id="inputCidade">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputUf">UF</label>
                        <select name="inputUf" id="inputUf" class="form-control">
                          <option selected>Escolher...</option>
                          <option value="AC">Acre (AC)</option>
                          <option value="AL">Alagoas (AL)</option>
                          <option value="AP">Amapá (AP)</option>
                          <option value="AM">Amazonas (AM)</option>
                          <option value="BA">Bahia (BA)</option>
                          <option value="CE">Ceará (CE)</option>
                          <option value="DF">Distrito Federal (DF)</option>
                          <option value="ES">Espírito Santo (ES)</option>
                          <option value="GO">Goiás (GO)</option>
                          <option value="MA">Maranhão (MA)</option>
                          <option value="MT">Mato Grosso (MT)</option>
                          <option value="MS">Mato Grosso do Sul (MS)</option>
                          <option value="MG">Minas Gerais (MG)</option>
                          <option value="PA">Pará (PA)</option>
                          <option value="PB">Paraíba (PB)</option>
                          <option value="PR">Paraná (PR)</option>
                          <option value="PE">Pernambuco (PE)</option>
                          <option value="PI">Piauí (PI)</option>
                          <option value="RJ">Rio de Janeiro (RJ)</option>
                          <option value="RN">Rio Grande do Norte (RN)</option>
                          <option value="RS">Rio Grande do Sul (RS)</option>
                          <option value="RO">Rondônia (RO)</option>
                          <option value="RR">Roraima (RR)</option>
                          <option value="SC">Santa Catarina (SC)</option>
                          <option value="SP">São Paulo (SP)</option>
                          <option value="SE">Sergipe (SE)</option>
                          <option value="TO">Tocantins (TO)</option>
                        </select>
                      </div>
                    </div>

                    <!-- FINAL DO CONTEÚDO TAB CLIENTE-->
                </div>

                <div class="tab-pane fade" id="dadosbancarios" role="tabpanel" aria-labelledby="dadosbancarios-tab">

                  <!-- INÍCIO DO CONTEÚDO TAB DADOS BANCÁRIOS-->

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputBanco" id="inputBanco">BANCO</label>
                      <select name="inputBanco" class="form-control bancos required cadVenda select2-hidden-accessible" aria-hidden="true" tabindex="-1">
                        <?php

                        $query = "SELECT id, banco FROM bancos";
                        $result = mysqli_query($conexao, $query);




                        // Verificar se a consulta teve sucesso
                        if (!$result) {
                          die("Erro na consulta: " . mysqli_error($conexao));
                        }

                        while ($row = mysqli_fetch_assoc($result)) {
                          echo '<option value="' . $row['id'] . '">' . $row['banco'] . '</option>';
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputTipoConta">TIPO DE CONTA</label>
                      <select name="inputTipoConta" class="form-control" id="inputTipoConta">
                        <option value="1">CONTA CORRENTE</option>
                        <option value="2">CONTA SALÁRIO</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputAgencia">AGENCIA</label>
                      <input name="inputAgencia" type="text" class="form-control" id="inputAgencia" placeholder="">
                      <small class="text-muted">Com o dígito verificador se existir</small>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputConta">CONTA</label>
                      <input name="inputConta" type="text" class="form-control" id="inputConta" placeholder="">
                      <small class="text-muted">Com o dígito verificador</small>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputRenda">RENDA</label>
                      <input name="inputRenda" type="text" class="form-control" id="inputRenda" placeholder="" size="12" onKeyUp="mascaraMoeda(this, event)">
                    </div>
                  </div>

                  <!-- FINAL DO CONTEÚDO TAB DADOS BANCÁRIOS-->


                </div>
                <div class="tab-pane fade" id="propostas" role="tabpanel" aria-labelledby="propostas-tab">
                  <!-- INÍCIO DO CONTEÚDO TAB PROPOSTAS-->
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputConvenio">CONVÊNIO</label>
                      <select name="inputConvenio" class="form-control" id="inputConvenio">
                        <option value="1">INSS</option>
                        <option value="2">FGTS</option>
                        <option value="3">AUXÍLIO BRASIL</option>
                        <option value="4">GOVERNO DE SÃO PAULO</option>
                        <option value="5">PREFEITURA DE SÃO PAULO</option>
                        <option value="6">GOVERNO DO RIO DE JANEIRO</option>
                        <option value="7">SIAPE</option>
                        <option value="8">GOVERNO DA BAHIA</option>
                        <option value="9">PESSOAL</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputOperacao">OPERAÇÃO</label>
                      <select name="inputOperacao" name="inputOperacao" class="form-control operacao required cadVenda select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                        <option value="3">REFINANCIAMENTO </option>
                        <option value="2">PORTABILIDADE </option>
                        <option value="1">NOVO </option>
                        <option value="4">CARTÃO PLÁSTICO </option>
                        <option value="6">CARTÃO COM SAQUE </option>
                        <option value="5">PORTABILIDADE COM REFIN </option>
                        <option value="7">CARTÃO BENEFÍCIO COM SEGURO </option>
                        <option value="8">CARTÃO BENEFÍCIO SEM SEGURO </option>
                        <option value="9">CARTÃO BENEFÍCIO INSS </option>
                        <option value="10">NOVO REPRESENTANTE LEGAL </option>
                        <option value="11">NOVO AUMENTO DE SALARIO </option>
                        <option value="12">SAQUE CARTÃO BENEFÍCIO </option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputBanco">BANCO</label>
                      <select name="inputBancoProposta" id="inputBancoProposta" class="form-control bancos required cadVenda select2-hidden-accessible" aria-hidden="true" tabindex="-1">
                        <?php

                        $query = "SELECT id, banco FROM bancos";
                        $result = mysqli_query($conexao, $query);




                        // Verificar se a consulta teve sucesso
                        if (!$result) {
                          die("Erro na consulta: " . mysqli_error($conexao));
                        }

                        while ($row = mysqli_fetch_assoc($result)) {
                          echo '<option value="' . $row['id'] . '">' . $row['banco'] . '</option>';
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="id_produto">Promotora</label>
                      <select name="promotora" class="custom-select" id="promotora">
                        <?php

                        $query = "SELECT id, nome FROM promotoras";
                        $result = mysqli_query($conexao, $query);




                        // Verificar se a consulta teve sucesso
                        if (!$result) {
                          die("Erro na consulta: " . mysqli_error($conexao));
                        }

                        while ($row = mysqli_fetch_assoc($result)) {
                          echo '<option value="' . $row['id'] . '">' . $row['nome'] . '</option>';
                        }
                        ?>
                      </select>

                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputMargem">MARGEM</label>
                      <input name="inputMargem" id="inputMargem" type="Text" class="form-control" size="12" onKeyUp="mascaraMoeda(this, event)" value="">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputPrazo">PRAZO</label>
                      <select name="inputPrazo" class="form-control parcelas" data-gtm-form-interact-field-id="1">
                        <option value="120">120x</option>
                        <option value="96">96x</option>
                        <option value="84">84x</option>
                        <option value="72">72x</option>
                        <option value="60">60x</option>
                        <option value="48">48x</option>
                        <option value="36">36x</option>
                        <option value="24">24x</option>
                        <option value="12">12x</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputValor">VALOR</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">R$</span>
                        </div>
                        <input name="inputValor" id="inputValor" type="Text" class="form-control" size="12" onKeyUp="mascaraMoeda(this, event)" value="">
                      </div>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="inputValorParcelas">VALOR PARCELAS</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">R$</span>
                        </div>
                        <input name="inputValorParcelas" id="inputValorParcelas" type="Text" class="form-control" size="12" onKeyUp="mascaraMoeda(this, event)" value="">
                      </div>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="inputFormalizacao">FORMALIZAÇÃO</label>
                      <select name="inputFormalizacao" id="inputFormalizacao" class="form-control canais required cadVenda select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                        <option value="1">FÍSICO</option>
                        <option value="2">DIGITAL</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputCanal">CANAL</label>
                      <select name="inputCanal" id="inputCanal" class="form-control canais required cadVenda select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                        <option value="1">TELEMARKETING </option>
                        <option value="2">SMS </option>
                        <option value="3">OUTROS </option>
                        <option value="4">WHATSAPP </option>
                        <option value="5">FACEBOOK </option>
                        <option value="6">ANUNCIO DANIEL </option>
                        <option value="7">DISPAROS Whatsapp </option>
                        <option value="8">INDICAÇÃO </option>
                        <option value="9">LIGAÇÃO </option>
                        <option value="10">CLIENTE BALCÃO </option>
                        <option value="11">CLIENTE LIGOU NA LOJA </option>
                        <option value="12">INSTAGRAM </option>
                        <option value="13">FACE </option>
                        <option value="14">CARTEIRA </option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputTabela">TABELA</label>
                      <select name="inputTabela" id="inputTabela" class="form-control operacao required cadVenda select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                        <option selected value="">Nada para selecionar</option>
                      </select>
                    </div>
                    <div class="form-group col-md-12">
                      <label for="inputDocumento">Deseja anexar algum documento?</label>
                      <input name="imagens[]" multiple type="file" class="form-control-file" id="inputDocumento" accept=".pdf, .jpg, jpeg, .png">
                      <div class="form-group">
                        <br>
                        <label for="exampleFormControlTextarea1">Observação (opcional)</label>
                        <textarea name="inputObservacao" class="form-control" id="inputObservacao" rows="3"></textarea>
                      </div>
                    </div>


                  </div>
                  <!-- FINAL DO CONTEÚDO TAB DADOS BANCÁRIOS-->
                </div>
              </div>
              <!-- FINAL DO CÓDIGO DAS TABS DE CADASTRO DE NOVA PROPOSTA-->



            </div>

            <div class="modal-footer">


              <button id="salvarBotao" type="submit" class="btn btn-primary mb-3 btn-lg" name="button">Salvar </button>


              <button type="button" class="btn btn-secondary mb-3 btn-lg" data-dismiss="modal">Cancelar </button>


              </form>
            </div>
          </div>
        </div>
      </div>


      <script>
        var estadoAba = "cliente"; // Inicialmente, a aba "CLIENTE" está ativa

        $("#selecionarAba").click(function() {
          if (estadoAba === "cliente") {
            // Se a aba "CLIENTE" estiver ativa, selecione a aba "CONTATO"
            $("#cliente-tab").removeClass('active');
            $("#contato-tab").addClass('active');
            $("#cliente").removeClass('show active');
            $("#contato").addClass('show active');
            estadoAba = "dadosbancarios";
          } else if (estadoAba === "dadosbancarios") {
            // Se a aba "DADOS BANCÁRIOS" estiver ativa, selecione a aba "PROPOSTAS"
            $("#dadosbancarios-tab").removeClass('active');
            $("#propostas-tab").addClass('active');
            $("#dadosbancarios").removeClass('show active');
            $("#propostas").addClass('show active');
            estadoAba = "propostas";
          } else {
            // Se a aba "PROPOSTAS" estiver ativa, selecione a aba "CLIENTE"
            $("#propostas-tab").removeClass('active');
            $("#cliente-tab").addClass('active');
            $("#propostas").removeClass('show active');
            $("#cliente").addClass('show active');
            estadoAba = "cliente";
          }
        });
      </script>



      <script>
        function formatarMoeda(input) {
          // Obtém o valor sem formatação (removendo pontos e vírgulas)
          var valor = input.value.replace(/[.,]/g, '');

          // Formata o valor como moeda brasileira
          valor = parseFloat(valor).toFixed(2);
          valor = valor.replace('.', ',');

          // Atualiza o valor no input
          input.value = valor;
        }
        // final do script para os inputs de moeda
      </script>




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

  

</body>

</html>




<!--CADASTRAR -->

<?php








if (isset($_POST['button'])) {
  $usuario = $_SESSION['idusuarios'];
  $nome = $_POST['inputNome'];
  $cpf = $_POST["inputCpf"];
  $rg = $_POST['inputRg'];
  $numerobeneficio = $_POST['inputNumeroBeneficio'];
  $dataemissao = $_POST['inputDataEmissao'];
  $orgaoemissor = $_POST['inputOrgaoEmissor'];
  $nascimento = $_POST['inputDataNascimento'];
  $nomedamae = $_POST["inputNomeMae"];
  $nomedopai = $_POST['inputNomePai'];
  $cep = $_POST['inputCep'];
  $rua = $_POST['inputRua'];
  $numero = $_POST['inputNumero'];
  $complemento = $_POST['inputComplemento'];
  $bairro = $_POST['inputBairro'];
  $cidade = $_POST['inputCidade'];
  $naturalidade = $_POST['inputNaturalidade'];
  $uf = $_POST['inputUf'];
  $telefone = $_POST['inputTelefone'];
  $email = $_POST['inputEmail'];
  $convenio = $_POST['inputConvenio'];
  $banco = $_POST['inputBanco'];
  $bancoproposta = $_POST['inputBancoProposta'];
  $tipodeconta = $_POST['inputTipoConta'];
  $agencia = $_POST['inputAgencia'];
  $conta = $_POST['inputConta'];
  $renda = $_POST['inputRenda'];
  $operacao = $_POST['inputOperacao'];
  $tabela = $_POST['inputTabela'];
  $promotora = ""; //Obtendo dado diretamente do banco de dados
  $margem = $_POST['inputMargem'];
  $prazo = $_POST['inputPrazo'];
  $valor = $_POST['inputValor'];
  $valorparcelas = $_POST['inputValorParcelas'];
  $formalizacao = $_POST['inputFormalizacao'];
  $canal = $_POST['inputCanal'];
  $documentoanexado   = $_FILES['imagens'];
  $statusproposta = 'AGUARD DIGITAÇÃO';
  $data = date('d/m/Y H:i');







  if ($_POST["inputTipoConta"] == 1) {
    $tipodeconta = "CONTA CORRENTE";
  } elseif ($_POST["inputTipoConta"] == 2) {
    $tipodeconta = "CONTA SALÁRIO";
  }

  // Verifica se o formulário foi enviado
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Verifica se a chave 'nome' existe no $_POST
    if (isset($_POST["inputBanco"])) {

      // Obtém o valor selecionado no formulário
      $selectedValue = $_POST["inputBanco"];

      // Consulta SQL para obter o nome correspondente ao valor selecionado
      $query = "SELECT banco FROM bancos WHERE id = ?";
      $stmt = mysqli_prepare($conexao, $query);

      // Vincula o parâmetro e executa a consulta
      mysqli_stmt_bind_param($stmt, "i", $selectedValue);
      mysqli_stmt_execute($stmt);

      // Vincula o resultado da consulta
      mysqli_stmt_bind_result($stmt, $banco);

      // Obtém o resultado
      mysqli_stmt_fetch($stmt);

      // Fecha a consulta preparada
      mysqli_stmt_close($stmt);
    }
  }


  // Verifica se o formulário foi enviado
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Verifica se a chave 'nome' existe no $_POST
    if (isset($_POST["inputBancoProposta"])) {

      // Obtém o valor selecionado no formulário
      $selectedValue = $_POST["inputBancoProposta"];

      // Consulta SQL para obter o nome correspondente ao valor selecionado
      $query = "SELECT banco FROM bancos WHERE id = ?";
      $stmt = mysqli_prepare($conexao, $query);

      // Vincula o parâmetro e executa a consulta
      mysqli_stmt_bind_param($stmt, "i", $selectedValue);
      mysqli_stmt_execute($stmt);

      // Vincula o resultado da consulta
      mysqli_stmt_bind_result($stmt, $bancoproposta);

      // Obtém o resultado
      mysqli_stmt_fetch($stmt);

      // Fecha a consulta preparada
      mysqli_stmt_close($stmt);
    }
  }





  if ($_POST['inputValorParcelas'] == 120) {
    $parcela = "120x";
  } elseif ($_POST['inputValorParcelas'] == 96) {
    $parcela = "96x";
  } elseif ($_POST['inputValorParcelas'] == 84) {
    $parcela = "84x";
  } elseif ($_POST['inputValorParcelas'] == 72) {
    $parcela = "72x";
  } elseif ($_POST['inputValorParcelas'] == 60) {
    $parcela = "60x";
  } elseif ($_POST['inputValorParcelas'] == 48) {
    $parcela = "48x";
  } elseif ($_POST['inputValorParcelas'] == 36) {
    $parcela = "36x";
  } elseif ($_POST['inputValorParcelas'] == 24) {
    $parcela = "24x";
  } elseif ($_POST['inputValorParcelas'] == 12) {
    $parcela = "12x";
  }


  if ($_POST['inputCanal'] == 1) {
    $canal = "TELEMARKETING";
  } elseif ($_POST['inputCanal'] == 2) {
    $canal = "SMS";
  } elseif ($_POST['inputCanal'] == 3) {
    $canal = "OUTROS";
  } elseif ($_POST['inputCanal'] == 4) {
    $canal = "WHATSAPP";
  } elseif ($_POST['inputCanal'] == 5) {
    $canal = "FACEBOOK";
  } elseif ($_POST['inputCanal'] == 6) {
    $canal = "ANUNCIO";
  } elseif ($_POST['inputCanal'] == 7) {
    $canal = "DISPAROS WATZAP";
  } elseif ($_POST['inputCanal'] == 8) {
    $canal = "INDICAÇÃO";
  } elseif ($_POST['inputCanal'] == 9) {
    $canal = "LIGAÇÃO";
  } elseif ($_POST['inputCanal'] == 10) {
    $canal = "CLIENTE BALCÃO";
  } elseif ($_POST['inputCanal'] == 11) {
    $canal = "CLIENTE LIGOU NA LOJA";
  } elseif ($_POST['inputCanal'] == 12) {
    $canal = "INSTAGRAM";
  } elseif ($_POST['inputCanal'] == 13) {
    $canal = "FACE";
  } elseif ($_POST['inputCanal'] == 14) {
    $canal = "CARTEIRA";
  }


  // Verifica se o formulário foi enviado
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Verifica se a chave 'nome' existe no $_POST
    if (isset($_POST["promotora"])) {

      // Obtém o valor selecionado no formulário
      $selectedValue = $_POST["promotora"];

      // Consulta SQL para obter o nome correspondente ao valor selecionado
      $query = "SELECT nome FROM promotoras WHERE id = ?";
      $stmt = mysqli_prepare($conexao, $query);

      // Vincula o parâmetro e executa a consulta
      mysqli_stmt_bind_param($stmt, "i", $selectedValue);
      mysqli_stmt_execute($stmt);

      // Vincula o resultado da consulta
      mysqli_stmt_bind_result($stmt, $promotora);

      // Obtém o resultado
      mysqli_stmt_fetch($stmt);

      // Fecha a consulta preparada
      mysqli_stmt_close($stmt);
    }
  }


  if ($_POST['inputFormalizacao'] == 1) {
    $formalizacao = "FÍSICO";
  } elseif ($_POST['inputFormalizacao'] == 2) {
    $formalizacao = "DIGITAL";
  }

  if ($_POST['inputCanal'] == 1) {
    $canal = "TELEMARKETING";
  } elseif ($_POST['inputCanal'] == 2) {
    $canal = "SMS";
  }

  if ($_POST['inputConvenio'] == 1) {
    $convenio = "INSS";
  } elseif ($_POST['inputConvenio'] == 2) {
    $convenio = "FGTS";
  } elseif ($_POST['inputConvenio'] == 3) {
    $convenio = "AUXÍLIO BRASIL";
  } elseif ($_POST['inputConvenio'] == 4) {
    $convenio = "GOVERNO DE SÃO PAULO";
  } elseif ($_POST['inputConvenio'] == 5) {
    $convenio = "PREFEITURA DE SÃO PAULO";
  } elseif ($_POST['inputConvenio'] == 6) {
    $convenio = "GOVERNO DO RIO DE JANEIRO";
  } elseif ($_POST['inputConvenio'] == 7) {
    $convenio = "SIAPE";
  } elseif ($_POST['inputConvenio'] == 8) {
    $convenio = "GOVERNO DA BAHIA";
  } elseif ($_POST['inputConvenio'] == 9) {
    $convenio = "PESSOAL";
  }




  if ($_POST['inputOperacao'] == 1) {
    $operacao = "NOVO";
  } elseif ($_POST['inputOperacao'] == 2) {
    $operacao = "PORTABILIDADE";
  } elseif ($_POST['inputOperacao'] == 3) {
    $operacao = "REFINANCIAMENTO";
  } elseif ($_POST['inputOperacao'] == 4) {
    $operacao = "CARTÃO PLÁSTICO";
  } elseif ($_POST['inputOperacao'] == 5) {
    $operacao = "PORTABILIDADE COM REFIN";
  } elseif ($_POST['inputOperacao'] == 6) {
    $operacao = "CARTÃO COM SAQUE";
  } elseif ($_POST['inputOperacao'] == 7) {
    $operacao = "CARTÃO BENEFÍCIO COM SEGURO";
  } elseif ($_POST['inputOperacao'] == 8) {
    $operacao = "CARTÃO BENEFÍCIO SEM SEGURO";
  } elseif ($_POST['inputOperacao'] == 9) {
    $operacao = "CARTÃO BENEFÍCIO INSS";
  } elseif ($_POST['inputOperacao'] == 10) {
    $operacao = "NOVO REPRESENTANTE LEGAL";
  } elseif ($_POST['inputOperacao'] == 11) {
    $operacao = "NOVO AUMENTO DE SALÁRIO";
  } elseif ($_POST['inputOperacao'] == 12) {
    $operacao = "SAQUE CARTÃO BENEFÍCIO";
  }





  //VERIFICAR SE O NOME JÁ ESTÁ CADASTRADO ANTES DE CADASTRAR UMA NOVA
  /*$query_verificar = "select * from propostas where nome = '$nome' ";

  $result_verificar = mysqli_query($conexao, $query_verificar);
  $row_verificar = mysqli_num_rows($result_verificar);

  if ($row_verificar > 0) {
    echo "<script language='javascript'> window.alert('Proposta para esse cliente já Cadastrada!'); </scrip>";
    exit();
  }
*/


  $query = "INSERT into propostas (idusuario, nome,cpf, rg, numerobeneficio, dataemissao, orgaoemissor, nascimento, nomedamae, nomedopai, cep, rua, numero, complemento, bairro, cidade, naturalidade, uf, telefone, email, convenio, banco, bancoproposta, tipodeconta, agencia, conta, renda, operacao, tabela, promotora, margem, prazo, valor, valorparcelas, formalizacao, canal, statusproposta, data) VALUES ('$usuario','$nome','$cpf', '$rg','$numerobeneficio','$dataemissao','$orgaoemissor', '$nascimento','$nomedamae', '$nomedopai', '$cep', '$rua', '$numero','$complemento','$bairro','$cidade','$naturalidade','$uf','$telefone','$email','$convenio','$banco','$bancoproposta','$tipodeconta','$agencia','$conta','$renda','$operacao','$tabela','$promotora','$margem','$prazo','$valor','$valorparcelas','$formalizacao','$canal','$statusproposta',curDate())";
  $result = mysqli_query($conexao, $query);

  $idproposta = mysqli_insert_id($conexao); // Obtém o último ID inserido da proposta acima para usar no cadastro de documentos abaixo e recuperar o documento apenas referente a proposta.

      //marcador para editar observacoes
      if($_POST['inputObservacao'] != ""){
        $nomeusuario = $_SESSION['nome_usuario'];
        $observacao = $_POST['inputObservacao'];
        $idproposta = mysqli_insert_id($conexao);

        
        
        $query = "INSERT into observacoes (usuario, observacao, idpropostas, data) VALUES ('$nomeusuario','$observacao',' $idproposta',curDate())";
        $result = mysqli_query($conexao, $query);

      }

  
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $imagens = $_FILES['imagens'];

    foreach ($imagens['name'] as $key => $nomedocumento) {
      if ($imagens['error'][$key] === 0) {
        $extensao = pathinfo($nomedocumento, PATHINFO_EXTENSION);
        $novo_nome = md5(uniqid()) . '.' . $extensao;

        if (move_uploaded_file($imagens['tmp_name'][$key], 'documentos/' . $novo_nome)) {
          // Insira o nome do arquivo no banco de dados, usando o $idproposta obtido anteriormente
          $query = "INSERT INTO documentos (nome, caminho, idproposta) VALUES ('$nome', '$novo_nome', '$idproposta')";
          mysqli_query($conexao, $query);
        }
      }
    }
  }

  //Editando LOG de usuário, informando que foi adicionada uma nova ocorrÊncia por ele
  /*
  if ($row_verificar > 0) {
    echo "<script language='javascript'> window.alert('Nome já Cadastrado!'); </script>";
    exit();
  }
  */

  /*
  $querylog = "INSERT into loguser (nome, acao, data) VALUES ('$nomeusuario', 'Cadastrou uma proposta: $especie', curDate())";
  $resultlog = mysqli_query($conexao, $querylog);
  // Final do LOG de usuário
*/



  if ($result == '') {
    echo "<script language='javascript'> window.alert('Ocorreu um erro ao Cadastrar!'); </script>";
  } else {

    echo "<script language='javascript'> window.alert('Proposta cadastrada com sucesso!'); </script>";
    echo "<script language='javascript'> window.location='propostas.php'; </script>";
  }
}

?>





















<!--EDITAR -->
<?php
if (@$_GET['func'] == 'editarcliente') {
  $id = $_GET['id'];
  $query = "select * from propostas where idpropostas = '$id'";
  $result = mysqli_query($conexao, $query);




  while ($res_1 = mysqli_fetch_array($result)) {


?>






    <!-- Modal -->
    <div id="modalEditar" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">

            <h4 class="modal-title">EDITAR CLIENTE</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">

            <!-- INÍCIO DO CÓDIGO DAS TABS DE EDIÇÃO DE PROPOSTA-->
            <!-- CONTEÚDO TAB CLIENTE-->
            <form method="POST" action="">
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputNome">NOME*</label>
                  <input name="inputNome" type="text" class="form-control" id="inputNome" placeholder="" required value="<?php echo $res_1['nome']; ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputCpf">CPF</label>
                  <input name="inputCpf" type="text" class="form-control inputCpf" id="inputCpf" placeholder="" value="<?php echo $res_1['cpf']; ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputRg">RG</label>
                  <input name="inputRg" type="text" class="form-control" id="inputRg" placeholder="" value="<?php echo $res_1['rg']; ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputNumeroBeneficio">NÚMERO DO BENEFÍCIO</label>
                  <input name="inputNumeroBeneficio" type="text" class="form-control" id="inputNumeroBeneficio" placeholder="" value="<?php echo $res_1['numerobeneficio']; ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputDataEmissao">DATA DE EMISSÃO</label>
                  <input name="inputDataEmissao" type="text" class="form-control" id="inputDataEmissao" placeholder="" value="<?php echo $res_1['dataemissao']; ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputOrgaoEmissor">ORGÃO EMISSOR</label>
                  <input name="inputOrgaoEmissor" type="text" class="form-control" id="inputOrgaoEmissor" placeholder="" value="<?php echo $res_1['orgaoemissor']; ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputCidade">NATURALIDADE</label>
                  <input name="inputNaturalidade" type="text" class="form-control" id="inputNaturalidade" value="<?php echo $res_1['naturalidade']; ?>">
                </div>
                <div class="form-group col-md-4">
                  <form method="POST" action="">
                    <label for="inputTelefone">TELEFONE</label>
                    <input name="inputTelefone" type="text" class="form-control inputTelefone" id="inputTelefone" placeholder="" value="<?php echo $res_1['telefone']; ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputEmail">EMAIL</label>
                  <input name="inputEmail" type="email" class="form-control" id="inputEmail" placeholder="" value="<?php echo $res_1['email']; ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputDataNascimento">DATA DE NASCIMENTO</label>
                  <input name="inputDataNascimento" type="text" class="form-control inputDataNascimento" id="inputDataNascimento" placeholder="" value="<?php echo $res_1['nascimento']; ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputNomeMae">NOME DA MÃE</label>
                  <input name="inputNomeMae" type="text" class="form-control" id="inputNomeMae" placeholder="" value="<?php echo $res_1['nomedamae']; ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputNomePai">NOME DO PAI</label>
                  <input name="inputNomePai" type="text" class="form-control" id="inputNomePai" placeholder="" value="<?php echo $res_1['nomedopai']; ?>">
                </div>
                <div class="form-group col-md-2">
                  <label for="inputCep">CEP</label>
                  <input name="inputCep" type="text" class="form-control" id="inputCep" placeholder="" value="<?php echo $res_1['cep']; ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputRua">RUA</label>
                  <input name="inputRua" type="text" class="form-control" id="inputRua" placeholder="" value="<?php echo $res_1['rua']; ?>">
                </div>
                <div class="form-group col-md-3">
                  <label for="inputNumero">NÚMERO</label>
                  <input name="inputNumero" type="text" class="form-control" id="inputNumero" placeholder="" value="<?php echo $res_1['numero']; ?>">
                </div>
                <div class="form-group col-md-3">
                  <label for="inputComplemento">COMPLEMENTO</label>
                  <input name="inputComplemento" type="text" class="form-control" id="inputComplemento" placeholder="" value="<?php echo $res_1['complemento']; ?>">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-2">
                  <label for="inputBairro">BAIRRO</label>
                  <input name="inputBairro" type="text" class="form-control" id="inputBairro" value="<?php echo $res_1['bairro']; ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputCidade">CIDADE</label>
                  <input name="inputCidade" type="text" class="form-control" id="inputCidade" value="<?php echo $res_1['cidade']; ?>">
                </div>
                <div class="form-group col-md-3">
                  <label for="inputUf">UF</label>
                  <select name="inputUf" id="inputUf" class="form-control">
                    <option selected><?php echo $res_1['uf']; ?></option>
                    <option value="AC">Acre (AC)</option>
                    <option value="AL">Alagoas (AL)</option>
                    <option value="AP">Amapá (AP)</option>
                    <option value="AM">Amazonas (AM)</option>
                    <option value="BA">Bahia (BA)</option>
                    <option value="CE">Ceará (CE)</option>
                    <option value="DF">Distrito Federal (DF)</option>
                    <option value="ES">Espírito Santo (ES)</option>
                    <option value="GO">Goiás (GO)</option>
                    <option value="MA">Maranhão (MA)</option>
                    <option value="MT">Mato Grosso (MT)</option>
                    <option value="MS">Mato Grosso do Sul (MS)</option>
                    <option value="MG">Minas Gerais (MG)</option>
                    <option value="PA">Pará (PA)</option>
                    <option value="PB">Paraíba (PB)</option>
                    <option value="PR">Paraná (PR)</option>
                    <option value="PE">Pernambuco (PE)</option>
                    <option value="PI">Piauí (PI)</option>
                    <option value="RJ">Rio de Janeiro (RJ)</option>
                    <option value="RN">Rio Grande do Norte (RN)</option>
                    <option value="RS">Rio Grande do Sul (RS)</option>
                    <option value="RO">Rondônia (RO)</option>
                    <option value="RR">Roraima (RR)</option>
                    <option value="SC">Santa Catarina (SC)</option>
                    <option value="SP">São Paulo (SP)</option>
                    <option value="SE">Sergipe (SE)</option>
                    <option value="TO">Tocantins (TO)</option>
                  </select>
                </div>
              </div>

              <!-- FINAL DO CONTEÚDO TAB CLIENTE-->
          </div>

          <div class="modal-footer">


            <button id="salvarBotao" type="submit" class="btn btn-primary mb-3 btn-lg" name="buttonEditar">Salvar</button>


            <button type="button" class="btn btn-secondary mb-3 btn-lg" data-dismiss="modal">Cancelar </button>


            </form>
          </div>
        </div>
      </div>
    </div>




    <script>
      $("#modalEditar").modal("show");
    </script>






    <!--Comando para editar os dados UPDATE -->
    <?php
    if (isset($_POST['buttonEditar'])) {
      $usuario = $_SESSION['nome_usuario'];
      $nome = $_POST['inputNome'];
      $cpf = $_POST["inputCpf"];
      $rg = $_POST['inputRg'];
      $numerobeneficio = $_POST['inputNumeroBeneficio'];
      $dataemissao = $_POST['inputDataEmissao'];
      $orgaoemissor = $_POST['inputOrgaoEmissor'];
      $telefone = $_POST['inputTelefone'];
      $email = $_POST['inputEmail'];
      $nascimento = $_POST['inputDataNascimento'];
      $nomedamae = $_POST["inputNomeMae"];
      $nomedopai = $_POST['inputNomePai'];
      $cep = $_POST['inputCep'];
      $rua = $_POST['inputRua'];
      $numero = $_POST['inputNumero'];
      $complemento = $_POST['inputComplemento'];
      $bairro = $_POST['inputBairro'];
      $cidade = $_POST['inputCidade'];
      $uf = $_POST['inputUf'];
      $data = date('d/m/Y H:i');







      //Marcando o uf com base no valor do input bairro
      if (isset($_POST["inputUf"])) {
        $inputUf = $_POST["inputUf"];

        if ($uf == "AC") {
          $uf = "Acre (AC)";
        }
        if ($uf == "AL") {
          $$uf = "Alagoas (AL)";
        }
        if ($uf == "AP") {
          $uf = "Amapá (AP)";
        }
        if ($uf == "AM") {
          $uf = "Amazonas (AM)";
        }
        if ($uf == "BA") {
          $uf = "Bahia (BA)";
        }
        if ($uf == "CE") {
          $uf = "Ceará (CE)";
        }
        if ($uf == "DF") {
          $uf = "Distrito Federal (DF)";
        }
        if ($inputUf == "ES") {
          $bairro = "Espírito Santo (ES)";
        }
        if ($uf == "GO") {
          $uf = "Goiás (GO)";
        }
        if ($uf == "MA") {
          $uf = "Maranhão (MA)";
        }
        if ($uf == "MT") {
          $uf = "Mato Grosso (MT)";
        }
        if ($uf == "MS") {
          $uf = "Mato Grosso do Sul (MS)";
        }
        if ($uf == "MG") {
          $uf = "Minas Gerais (MG)";
        }
        if ($uf == "PA") {
          $uf = "Pará (PA)";
        }
        if ($uf == "PB") {
          $uf = "Paraíba (PB)";
        }
        if ($uf == "PR") {
          $uf = "Paraná (PR)";
        }
        if ($uf == "PE") {
          $uf = "Pernambuco (PE)";
        }
        if ($uf == "PI") {
          $uf = "Piauí (PI)";
        }
        if ($uf == "RJ") {
          $uf = "Rio de Janeiro (RJ)";
        }
        if ($uf == "RN") {
          $uf = "Rio Grande do Norte (RN)";
        }
        if ($uf == "RS") {
          $uf = "Rio Grande do Sul (RS)";
        }
        if ($uf == "RO") {
          $uf = "Rondônia (RO)";
        }
        if ($uf == "RR") {
          $uf = "Roraima (RR)";
        }
        if ($uf == "SC") {
          $uf = "Santa Catarina (SC)";
        }
        if ($uf == "SP") {
          $uf = "São Paulo (SP)";
        }
        if ($uf == "SE") {
          $uf = "Sergipe (SE)";
        }
        if ($uf == "TO") {
          $uf = "Tocantins (TO)";
        }
      }











      $query_editar = "UPDATE propostas set nome = '$nome', cpf = '$cpf', rg = '$rg',numerobeneficio = '$numerobeneficio', dataemissao = '$dataemissao',orgaoemissor = '$orgaoemissor', telefone = '$telefone', email = '$email', nascimento = '$nascimento',nomedamae = '$nomedamae', nomedopai = '$nomedopai', cep = '$cep', rua = '$rua', numero = '$numero', complemento = '$complemento', bairro = '$bairro', cidade = '$cidade', uf = '$uf' where idpropostas = '$id' ";

      $result_editar = mysqli_query($conexao, $query_editar);

      /*
      $queryeditar = "INSERT into loguser (nome, acao, data) VALUES ('$nomeusuario', 'Editou um pet de espécie: $especie', curDate())";
      $resulteditar = mysqli_query($conexao, $queryeditar);
      */
      if ($result_editar == '') {
        echo "<script language='javascript'> window.alert('Ocorreu um erro ao Editar!'); </script>";
      } else {
        echo "<script language='javascript'> window.alert('Editado com Sucesso!'); </script>";
        echo "<script language='javascript'> window.location='propostas.php'; </script>";
      }
    }
    ?>


<?php }
}  ?>



<script type="text/javascript">
  $(document).ready(function() {
    $('#txtcpf').mask('000.000.000-00'); // Másrcara para o input do cpf 
    //$('#txtdata').mask('0000-00-00'); 
  });
</script>




</script>







<!--inínio modal propostas-->
<?php
if (@$_GET['func'] == 'editarpropostas') {
  $id = $_GET['id'];
  $query = "select * from propostas where idpropostas = '$id'";
  $result = mysqli_query($conexao, $query);




  while ($res_1 = mysqli_fetch_array($result)) {


?>






    <!-- Modal  -->
    <div id="modalpropostas" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">EDITAR PROPOSTAS</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <div class="modal-header">


            <!-- INÍCIO DO CONTEÚDO TAB PROPOSTAS-->

            <form method="POST" action="">
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="inputConvenio">CONVÊNIO</label>
                  <select name="inputConvenio" class="form-control" id="inputConvenio">
                    <option selected><?php echo $res_1['convenio']; ?></option>
                    <option value="1">INSS</option>
                    <option value="2">FGTS</option>
                    <option value="3">AUXÍLIO BRASIL</option>
                    <option value="4">GOVERNO DE SÃO PAULO</option>
                    <option value="5">PREFEITURA DE SÃO PAULO</option>
                    <option value="6">GOVERNO DO RIO DE JANEIRO</option>
                    <option value="7">SIAPE</option>
                    <option value="8">GOVERNO DA BAHIA</option>
                    <option value="9">PESSOAL</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputOperacao">OPERAÇÃO</label>
                  <select name="inputOperacao" name="inputOperacao" class="form-control operacao required cadVenda select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                    <option selected><?php echo $res_1['operacao']; ?></option>
                    <option value="3">REFINANCIAMENTO </option>
                    <option value="2">PORTABILIDADE </option>
                    <option value="1">NOVO </option>
                    <option value="4">CARTÃO PLÁSTICO </option>
                    <option value="6">CARTÃO COM SAQUE </option>
                    <option value="5">PORTABILIDADE COM REFIN </option>
                    <option value="7">CARTÃO BENEFÍCIO COM SEGURO </option>
                    <option value="8">CARTÃO BENEFÍCIO SEM SEGURO </option>
                    <option value="9">CARTÃO BENEFÍCIO INSS </option>
                    <option value="10">NOVO REPRESENTANTE LEGAL </option>
                    <option value="11">NOVO AUMENTO DE SALARIO </option>
                    <option value="12">SAQUE CARTÃO BENEFÍCIO </option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputBanco">BANCO DA PROPOSTA</label>
                  <select name="inputBanco" id="inputBanco" class="form-control bancos required cadVenda select2-hidden-accessible" aria-hidden="true" tabindex="-1">
                    <option selected><?php echo $res_1['bancoproposta']; ?></option>
                    <?php

                    $query = "SELECT id, banco FROM bancos";
                    $result = mysqli_query($conexao, $query);




                    // Verificar se a consulta teve sucesso
                    if (!$result) {
                      die("Erro na consulta: " . mysqli_error($conexao));
                    }

                    while ($row = mysqli_fetch_assoc($result)) {
                      echo '<option value="' . $row['id'] . '">' . $row['banco'] . '</option>';
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="id_produto">Promotora</label>
                  <select name="promotora" class="custom-select" id="promotora">
                    <option selected><?php echo $res_1['promotora']; ?></option>
                    <?php

                    $query = "SELECT id, nome FROM promotoras";
                    $result = mysqli_query($conexao, $query);




                    // Verificar se a consulta teve sucesso
                    if (!$result) {
                      die("Erro na consulta: " . mysqli_error($conexao));
                    }

                    while ($row = mysqli_fetch_assoc($result)) {
                      echo '<option value="' . $row['id'] . '">' . $row['nome'] . '</option>';
                    }
                    ?>
                  </select>

                </div>
                <div class="form-group col-md-3">
                  <label for="inputMargem">MARGEM</label>
                  <input name="inputMargem" id="inputMargem" type="Text" class="form-control" size="12" onKeyUp="mascaraMoeda(this, event)" value="">
                </div>
                <div class="form-group col-md-3">
                  <label for="inputPrazo">PRAZO</label>
                  <select name="inputPrazo" class="form-control parcelas" data-gtm-form-interact-field-id="1">
                    <option selected><?php echo $res_1['prazo']; ?></option>
                    <option value="120">120x</option>
                    <option value="96">96x</option>
                    <option value="84">84x</option>
                    <option value="72">72x</option>
                    <option value="60">60x</option>
                    <option value="48">48x</option>
                    <option value="36">36x</option>
                    <option value="24">24x</option>
                    <option value="12">12x</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputValor">VALOR</label>
                  <input name="inputValor" id="inputValor" type="Text" class="form-control" size="12" onKeyUp="mascaraMoeda(this, event)" value="<?php echo $res_1['valor']; ?>">
                </div>
                <div class="form-group col-md-3">
                  <label for="inputValorParcelas">VALOR PARCELAS</label>
                  <input name="inputValorParcelas" id="inputValorParcelas" type="Text" class="form-control" size="12" onKeyUp="mascaraMoeda(this, event)" value="<?php echo $res_1['valorparcelas']; ?>">
                </div>
                <div class="form-group col-md-3">
                  <label for="inputFormalizacao">FORMALIZAÇÃO</label>
                  <select name="inputFormalizacao" id="inputFormalizacao" class="form-control canais required cadVenda select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                    <option selected><?php echo $res_1['formalizacao']; ?></option>
                    <option value="1">FÍSICO</option>
                    <option value="2">DIGITAL</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputCanal">CANAL</label>
                  <select name="inputCanal" id="inputCanal" class="form-control canais required cadVenda select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                    <option selected><?php echo $res_1['canal']; ?></option>
                    <option value="1">TELEMARKETING </option>
                    <option value="2">SMS </option>
                    <option value="3">OUTROS </option>
                    <option value="4">WHATSAPP </option>
                    <option value="5">FACEBOOK </option>
                    <option value="6">ANUNCIO DANIEL </option>
                    <option value="7">DISPAROS WATZAP </option>
                    <option value="8">INDICAÇÃO </option>
                    <option value="9">LIGAÇÃO </option>
                    <option value="10">CLIENTE BALCÃO </option>
                    <option value="11">CLIENTE LIGOU NA LOJA </option>
                    <option value="12">INSTAGRAM </option>
                    <option value="13">FACE </option>
                    <option value="14">CARTEIRA </option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputTabela">TABELA</label>
                  <select name="inputTabela" id="inputTabela" class="form-control operacao required cadVenda select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                    <option selected value="">Nada para selecionar</option>
                  </select>
                </div>
                <div class="form-group col-md-12">
                  <label for="inputDocumento" style="display: none;">Deseja anexar algum documento?</label>
                  <input name="imagens[]" multiple type="file" class="form-control-file" id="inputDocumento" accept=".pdf, .jpg, jpeg, .png" disabled>
                  <small class="text-muted">Para editar documentos, vá para a <a href="documentos.php"  target="_blank">área de Documentos</a>.</small>



                  <div class="form-group">
                    <br>
                    <label for="exampleFormControlTextarea1">Observação (opcional)</label>
                    <textarea name="inputObservacao" class="form-control" id="inputObservacao" rows="3"></textarea>
                  </div>
                </div>


              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary mb-3" name="buttonEditarProposta">Salvar </button>


            <button type="button" class="btn btn-secondary mb-3" data-dismiss="modal">Cancelar </button>
            </form>
          </div>
        </div>
      </div>
    </div>



    <script>
      $("#modalpropostas").modal("show");
    </script>


    <?php
    if (isset($_POST['buttonEditarProposta'])) {
      $convenio = $_POST['inputConvenio'];
      $operacao = $_POST['inputOperacao'];
      $banco = $_POST['inputBanco'];
      $promotora = ""; //Obtendo dado diretamente do banco de dados
      $margem = $_POST['inputMargem'];
      $prazo = $_POST['inputPrazo'];
      $valor = $_POST['inputValor'];
      $valorparcelas = $_POST['inputValorParcelas'];
      $formalizacao = $_POST['inputFormalizacao'];
      $canal = $_POST['inputCanal'];
      $observacao   = $_POST['inputObservacao'];
      

      

       //marcador para editar observacoes
       if($_POST['inputObservacao'] != ""){
        $nomeusuario = $_SESSION['nome_usuario'];
        $query = "INSERT into observacoes (usuario, observacao, idpropostas, data) VALUES ('$nomeusuario','$observacao','$id',curDate())";
        $result = mysqli_query($conexao, $query);

      }



      $query_editar = "UPDATE propostas set convenio = '$convenio', operacao = '$operacao', bancoproposta = '$banco', promotora = '$promotora', margem = '$margem', prazo = '$prazo', valor = '$valor', valorparcelas = '$valorparcelas', formalizacao = '$formalizacao', canal = '$canal', tabela = '$tabela', observacao = '$observacao' where idpropostas = '$id' ";

      $result_editar = mysqli_query($conexao, $query_editar);





      // Verifica se o formulário foi enviado
      if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Verifica se a chave 'nome' existe no $_POST
        if (isset($_POST["inputBanco"])) {

          // Obtém o valor selecionado no formulário
          $selectedValue = $_POST["inputBanco"];

          // Consulta SQL para obter o nome correspondente ao valor selecionado
          $query = "SELECT banco FROM bancos WHERE id = ?";
          $stmt = mysqli_prepare($conexao, $query);

          // Vincula o parâmetro e executa a consulta
          mysqli_stmt_bind_param($stmt, "i", $selectedValue);
          mysqli_stmt_execute($stmt);

          // Vincula o resultado da consulta
          mysqli_stmt_bind_result($stmt, $banco);

          // Obtém o resultado
          mysqli_stmt_fetch($stmt);

          // Fecha a consulta preparada
          mysqli_stmt_close($stmt);
        }
      }


      if ($_POST['inputValorParcelas'] == 120) {
        $parcela = "120x";
      } elseif ($_POST['inputValorParcelas'] == 96) {
        $parcela = "96x";
      } elseif ($_POST['inputValorParcelas'] == 84) {
        $parcela = "84x";
      } elseif ($_POST['inputValorParcelas'] == 72) {
        $parcela = "72x";
      } elseif ($_POST['inputValorParcelas'] == 60) {
        $parcela = "60x";
      } elseif ($_POST['inputValorParcelas'] == 48) {
        $parcela = "48x";
      } elseif ($_POST['inputValorParcelas'] == 36) {
        $parcela = "36x";
      } elseif ($_POST['inputValorParcelas'] == 24) {
        $parcela = "24x";
      } elseif ($_POST['inputValorParcelas'] == 12) {
        $parcela = "12x";
      }


      if ($_POST['inputCanal'] == 1) {
        $canal = "TELEMARKETING";
      } elseif ($_POST['inputCanal'] == 2) {
        $canal = "SMS";
      } elseif ($_POST['inputCanal'] == 3) {
        $canal = "OUTROS";
      } elseif ($_POST['inputCanal'] == 4) {
        $canal = "WHATSAPP";
      } elseif ($_POST['inputCanal'] == 5) {
        $canal = "FACEBOOK";
      } elseif ($_POST['inputCanal'] == 6) {
        $canal = "ANUNCIO";
      } elseif ($_POST['inputCanal'] == 7) {
        $canal = "DISPAROS WATZAP";
      } elseif ($_POST['inputCanal'] == 8) {
        $canal = "INDICAÇÃO";
      } elseif ($_POST['inputCanal'] == 9) {
        $canal = "LIGAÇÃO";
      } elseif ($_POST['inputCanal'] == 10) {
        $canal = "CLIENTE BALCÃO";
      } elseif ($_POST['inputCanal'] == 11) {
        $canal = "CLIENTE LIGOU NA LOJA";
      } elseif ($_POST['inputCanal'] == 12) {
        $canal = "INSTAGRAM";
      } elseif ($_POST['inputCanal'] == 13) {
        $canal = "FACE";
      } elseif ($_POST['inputCanal'] == 14) {
        $canal = "CARTEIRA";
      }


      // Verifica se o formulário foi enviado
      if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Verifica se a chave 'nome' existe no $_POST
        if (isset($_POST["promotora"])) {

          // Obtém o valor selecionado no formulário
          $selectedValue = $_POST["promotora"];

          // Consulta SQL para obter o nome correspondente ao valor selecionado
          $query = "SELECT nome FROM promotoras WHERE id = ?";
          $stmt = mysqli_prepare($conexao, $query);

          // Vincula o parâmetro e executa a consulta
          mysqli_stmt_bind_param($stmt, "i", $selectedValue);
          mysqli_stmt_execute($stmt);

          // Vincula o resultado da consulta
          mysqli_stmt_bind_result($stmt, $promotora);

          // Obtém o resultado
          mysqli_stmt_fetch($stmt);

          // Fecha a consulta preparada
          mysqli_stmt_close($stmt);
        }
      }


      if ($_POST['inputFormalizacao'] == 1) {
        $formalizacao = "FÍSICO";
      } elseif ($_POST['inputFormalizacao'] == 2) {
        $formalizacao = "DIGITAL";
      }

      if ($_POST['inputCanal'] == 1) {
        $canal = "TELEMARKETING";
      } elseif ($_POST['inputCanal'] == 2) {
        $canal = "SMS";
      }

      if ($_POST['inputConvenio'] == 1) {
        $convenio = "INSS";
      } elseif ($_POST['inputConvenio'] == 2) {
        $convenio = "FGTS";
      } elseif ($_POST['inputConvenio'] == 3) {
        $convenio = "AUXÍLIO BRASIL";
      } elseif ($_POST['inputConvenio'] == 4) {
        $convenio = "GOVERNO DE SÃO PAULO";
      } elseif ($_POST['inputConvenio'] == 5) {
        $convenio = "PREFEITURA DE SÃO PAULO";
      } elseif ($_POST['inputConvenio'] == 6) {
        $convenio = "GOVERNO DO RIO DE JANEIRO";
      } elseif ($_POST['inputConvenio'] == 7) {
        $convenio = "SIAPE";
      } elseif ($_POST['inputConvenio'] == 8) {
        $convenio = "GOVERNO DA BAHIA";
      } elseif ($_POST['inputConvenio'] == 9) {
        $convenio = "PESSOAL";
      }




      if ($_POST['inputOperacao'] == 1) {
        $operacao = "NOVO";
      } elseif ($_POST['inputOperacao'] == 2) {
        $operacao = "PORTABILIDADE";
      } elseif ($_POST['inputOperacao'] == 3) {
        $operacao = "REFINANCIAMENTO";
      } elseif ($_POST['inputOperacao'] == 4) {
        $operacao = "CARTÃO PLÁSTICO";
      } elseif ($_POST['inputOperacao'] == 5) {
        $operacao = "PORTABILIDADE COM REFIN";
      } elseif ($_POST['inputOperacao'] == 6) {
        $operacao = "CARTÃO COM SAQUE";
      } elseif ($_POST['inputOperacao'] == 7) {
        $operacao = "CARTÃO BENEFÍCIO COM SEGURO";
      } elseif ($_POST['inputOperacao'] == 8) {
        $operacao = "CARTÃO BENEFÍCIO SEM SEGURO";
      } elseif ($_POST['inputOperacao'] == 9) {
        $operacao = "CARTÃO BENEFÍCIO INSS";
      } elseif ($_POST['inputOperacao'] == 10) {
        $operacao = "NOVO REPRESENTANTE LEGAL";
      } elseif ($_POST['inputOperacao'] == 11) {
        $operacao = "NOVO AUMENTO DE SALÁRIO";
      } elseif ($_POST['inputOperacao'] == 12) {
        $operacao = "SAQUE CARTÃO BENEFÍCIO";
      }









      $query_editar = "UPDATE propostas set convenio = '$convenio', operacao = '$operacao', bancoproposta = '$banco', promotora = '$promotora', margem = '$margem',prazo = '$prazo', valor = '$valor', valorparcelas = '$valorparcelas', formalizacao = '$formalizacao', canal = '$canal', tabela = '$tabela', observacao = '$observacao' where idpropostas = '$id' ";

      $result_editar = mysqli_query($conexao, $query_editar);

      /*
      $queryeditar = "INSERT into loguser (nome, acao, data) VALUES ('$nomeusuario', 'Editou um pet de espécie: $especie', curDate())";
      $resulteditar = mysqli_query($conexao, $queryeditar);
      */
      if ($result_editar == '') {
        echo "<script language='javascript'> window.alert('Ocorreu um erro ao Editar!'); </script>";
      } else {
        echo "<script language='javascript'> window.alert('Editado com Sucesso!'); </script>";
        echo "<script language='javascript'> window.location='propostas.php'; </script>";
      }
    }
    ?>





<?php }
}  ?>
<!--final modal propostas -->



<!--inínio modal dados bancários-->
<?php
if (@$_GET['func'] == 'editardadosbancarios') {
  $id = $_GET['id'];
  $query = "select * from propostas where idpropostas = '$id'";
  $result = mysqli_query($conexao, $query);




  while ($res_1 = mysqli_fetch_array($result)) {


?>






    <!-- Modal  -->
    <div id="modaldadosbancarios" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">

            <h4 class="modal-title">EDITAR DADOS BANCÁRIOS</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <div class="modal-header">

            <!--marcador-->
            <!-- INÍCIO DO CONTEÚDO TAB DADOS BANCÁRIOS-->

            <div class="form-row">
              <div class="form-group col-md-6">
                <form method="POST" action="">
                  <label for="inputBanco" id="inputBanco">BANCO DADOS BANCÁRIOS</label>
                  <select name="inputBanco" class="form-control bancos required cadVenda select2-hidden-accessible" aria-hidden="true" tabindex="-1">
                    <option selected><?php echo $res_1['banco']; ?></option>
                    <?php

                    $query = "SELECT id, banco FROM bancos";
                    $result = mysqli_query($conexao, $query);




                    // Verificar se a consulta teve sucesso
                    if (!$result) {
                      die("Erro na consulta: " . mysqli_error($conexao));
                    }

                    while ($row = mysqli_fetch_assoc($result)) {
                      echo '<option value="' . $row['id'] . '">' . $row['banco'] . '</option>';
                    }
                    ?>
                  </select>
              </div>
              <div class="form-group col-md-6">
                <label for="inputTipoConta">TIPO DE CONTA</label>
                <input name="inputTipoConta" type="text" class="form-control" id="inputTipoConta" placeholder="" value="<?php echo $res_1['tipodeconta']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="inputAgencia">AGENCIA</label>
                <input name="inputAgencia" type="text" class="form-control" id="inputAgencia" placeholder="" value="<?php echo $res_1['agencia']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="inputConta">CONTA</label>
                <input name="inputConta" type="text" class="form-control" id="inputConta" placeholder="" value="<?php echo $res_1['conta']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="inputRenda">RENDA</label>
                <input name="inputRenda" type="text" class="form-control" id="inputRenda" placeholder="" value="<?php echo $res_1['renda']; ?>" size="12" onKeyUp="mascaraMoeda(this, event)">
              </div>
            </div>

            <!-- FINAL DO CONTEÚDO TAB DADOS BANCÁRIOS-->

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary mb-3" name="buttonEditarDadosBancarios">Salvar </button>


            <button type="button" class="btn btn-secondary mb-3" data-dismiss="modal">Cancelar </button>
            </form>
          </div>
        </div>
      </div>
    </div>



    <script>
      $("#modaldadosbancarios").modal("show");
    </script>



    <?php
    if (isset($_POST['buttonEditarDadosBancarios'])) {
      $banco = $_POST['inputBanco'];
      $tipodeconta = $_POST['inputTipoConta'];
      $agencia = $_POST['inputAgencia'];
      $conta = $_POST['inputConta'];
      $renda = $_POST['inputRenda'];



      // Verifica o valor selecionado e atualiza a variável $banco conforme necessário
      if ($_POST["inputBanco"] == 1) {
        $banco = "001 - BANCO DO BRASIL";
      } elseif ($_POST["inputBanco"] == 3) {
        $banco = "003 - BANCO DA AMAZÔNIA";
      } elseif ($_POST["inputBanco"] == 4) {
        $banco = "004 - BANCO DO NORDESTE DO BRASIL";
      } elseif ($_POST["inputBanco"] == 7) {
        $banco = "007 - BNDES";
      } elseif ($_POST["inputBanco"] == 10) {
        $banco = "010 - CREDICOAMO";
      } elseif ($_POST["inputBanco"] == 11) {
        $banco = "011 - Credit Suisse";
      } elseif ($_POST["inputBanco"] == 12) {
        $banco = "012 - BANCO INBURSA";
      } elseif ($_POST["inputBanco"] == 14) {
        $banco = "014 - NATIXIS BRASIL";
      } elseif ($_POST["inputBanco"] == 15) {
        $banco = "015 - UBS BRASIL CCTVM";
      } elseif ($_POST["inputBanco"] == 16) {
        $banco = "016 - CCM DESP TRANS SC E RS";
      } elseif ($_POST["inputBanco"] == 17) {
        $banco = "017 - BNY MELLON BANCO";
      } elseif ($_POST["inputBanco"] == 18) {
        $banco = "018 - BANCO TRICURY";
      } elseif ($_POST["inputBanco"] == 21) {
        $banco = "021 - BANCO BANESTES";
      } elseif ($_POST["inputBanco"] == 24) {
        $banco = "024 - BCO BANDEPE";
      } elseif ($_POST["inputBanco"] == 25) {
        $banco = "025 - BANCO ALFA";
      } elseif ($_POST["inputBanco"] == 29) {
        $banco = "029 - BANCO ITAU CONSIGNADO";
      } elseif ($_POST["inputBanco"] == 33) {
        $banco = "033 - BANCO SANTANDER BRASIL";
      } elseif ($_POST["inputBanco"] == 36) {
        $banco = "036 - BANCO BBI";
      } elseif ($_POST["inputBanco"] == 37) {
        $banco = "037 - BANCO DO ESTADO DO PARÁ";
      } elseif ($_POST["inputBanco"] == 40) {
        $banco = "040 - BANCO CARGILL";
      } elseif ($_POST["inputBanco"] == 41) {
        $banco = "041 - BANRISUL";
      } elseif ($_POST["inputBanco"] == 47) {
        $banco = "047 - BANCO DO ESTADO DE SERGIPE";
      } elseif ($_POST["inputBanco"] == 60) {
        $banco = "060 - CONFIDENCE CC";
      } elseif ($_POST["inputBanco"] == 62) {
        $banco = "062 - HIPERCARD BM";
      } elseif ($_POST["inputBanco"] == 63) {
        $banco = "063 - BANCO BRADESCARD";
      } elseif ($_POST["inputBanco"] == 64) {
        $banco = "064 - GOLDMAN SACHS DO BRASIL BM";
      } elseif ($_POST["inputBanco"] == 65) {
        $banco = "065 - BANCO ANDBANK";
      } elseif ($_POST["inputBanco"] == 66) {
        $banco = "066 - BANCO MORGAN STANLEY";
      } elseif ($_POST["inputBanco"] == 69) {
        $banco = "069 - BANCO CREFISA";
      } elseif ($_POST["inputBanco"] == 70) {
        $banco = "070 - BANCO DE BRASÍLIA (BRB)";
      } elseif ($_POST["inputBanco"] == 74) {
        $banco = "074 - BCO. J.SAFRA";
      } elseif ($_POST["inputBanco"] == 75) {
        $banco = "075 - BCO ABN AMRO";
      } elseif ($_POST["inputBanco"] == 76) {
        $banco = "076 - BANCO KDB BRASIL";
      } elseif ($_POST["inputBanco"] == 77) {
        $banco = "077 - BANCO INTER";
      } elseif ($_POST["inputBanco"] == 78) {
        $banco = "078 - HAITONG BI DO BRASIL";
      } elseif ($_POST["inputBanco"] == 79) {
        $banco = "079 - BANCO ORIGINAL DO AGRONEGÓCIO";
      } elseif ($_POST["inputBanco"] == 80) {
        $banco = "080 - B&T CC LTDA";
      } elseif ($_POST["inputBanco"] == 81) {
        $banco = "081 - BBN BANCO BRASILEIRO DE NEGÓCIOS";
      } elseif ($_POST["inputBanco"] == 82) {
        $banco = "082 - BANCO TOPÁZIO";
      } elseif ($_POST["inputBanco"] == 83) {
        $banco = "083 - BANCO DA CHINA BRASIL";
      } elseif ($_POST["inputBanco"] == 84) {
        $banco = "084 - UNIPRIME NORTE DO PARANÁ";
      } elseif ($_POST["inputBanco"] == 85) {
        $banco = "085 - COOP CENTRAL AILOS";
      } elseif ($_POST["inputBanco"] == 89) {
        $banco = "089 - CCR REG MOGIANA";
      } elseif ($_POST["inputBanco"] == 91) {
        $banco = "091 - UNICRED CENTRAL RS";
      } elseif ($_POST["inputBanco"] == 92) {
        $banco = "092 - BRK";
      } elseif ($_POST["inputBanco"] == 93) {
        $banco = "093 - PÓLOCRED SCMEPP LTDA";
      } elseif ($_POST["inputBanco"] == 94) {
        $banco = "094 - BANCO FINAXIS";
      } elseif ($_POST["inputBanco"] == 95) {
        $banco = "095 - BANCO CONFIDENCE DE CÂMBIO";
      } elseif ($_POST["inputBanco"] == 96) {
        $banco = "096 - BANCO B3";
      } elseif ($_POST["inputBanco"] == 97) {
        $banco = "097 - CCC NOROESTE BRASILEIRO LTDA";
      } elseif ($_POST["inputBanco"] == 98) {
        $banco = "098 - CREDIALIANÇA CCR";
      } elseif ($_POST["inputBanco"] == 99) {
        $banco = "099 - UNIPRIME CENTRAL CCC LTDA";
      } elseif ($_POST["inputBanco"] == 100) {
        $banco = "100 - PLANNER CORRETORA DE VALORES";
      } elseif ($_POST["inputBanco"] == 101) {
        $banco = "101 - RENASCENÇA DTVM LTDA";
      } elseif ($_POST["inputBanco"] == 102) {
        $banco = "102 - XP INVESTIMENTOS";
      } elseif ($_POST["inputBanco"] == 104) {
        $banco = "104 - CAIXA ECONÔMICA FEDERAL (CEF)";
      } elseif ($_POST["inputBanco"] == 105) {
        $banco = "105 - LECCA CFI";
      } elseif ($_POST["inputBanco"] == 107) {
        $banco = "107 - BANCO BOCOM BBM";
      } elseif ($_POST["inputBanco"] == 108) {
        $banco = "108 - PORTOCRED";
      } elseif ($_POST["inputBanco"] == 111) {
        $banco = "111 - BANCO OLIVEIRA TRUST DTVM";
      } elseif ($_POST["inputBanco"] == 113) {
        $banco = "113 - MAGLIANO";
      } elseif ($_POST["inputBanco"] == 114) {
        $banco = "114 - CENTRAL COOPERATIVA DE CRÉDITO NO ESTADO DO E";
      } elseif ($_POST["inputBanco"] == 117) {
        $banco = "117 - ADVANCED CC LTDA";
      } elseif ($_POST["inputBanco"] == 118) {
        $banco = "118 - STANDARD CHARTERED BI";
      } elseif ($_POST["inputBanco"] == 119) {
        $banco = "119 - BANCO WESTERN UNION";
      } elseif ($_POST["inputBanco"] == 120) {
        $banco = "120 - BANCO RODOBENS";
      } elseif ($_POST["inputBanco"] == 121) {
        $banco = "121 - BANCO AGIBANK";
      } elseif ($_POST["inputBanco"] == 122) {
        $banco = "122 - BANCO BRADESCO BERJ";
      } elseif ($_POST["inputBanco"] == 124) {
        $banco = "124 - BANCO WOORI BANK DO BRASIL";
      } elseif ($_POST["inputBanco"] == 125) {
        $banco = "125 - BRASIL PLURAL BANCO";
      } elseif ($_POST["inputBanco"] == 126) {
        $banco = "126 - BR PARTNERS BI";
      } elseif ($_POST["inputBanco"] == 127) {
        $banco = "127 - CODEPE CVC";
      } elseif ($_POST["inputBanco"] == 128) {
        $banco = "128 - MS BANK BANCO DE CÂMBIO";
      } elseif ($_POST["inputBanco"] == 129) {
        $banco = "129 - UBS BRASIL BI";
      } elseif ($_POST["inputBanco"] == 130) {
        $banco = "130 - CARUANA SCFI";
      } elseif ($_POST["inputBanco"] == 131) {
        $banco = "131 - TULLETT PREBON BRASIL CVC LTDA";
      } elseif ($_POST["inputBanco"] == 132) {
        $banco = "132 - ICBC DO BRASIL BM";
      } elseif ($_POST["inputBanco"] == 133) {
        $banco = "133 - CRESOL CONFEDERAÇÃO";
      } elseif ($_POST["inputBanco"] == 134) {
        $banco = "134 - BGC LIQUIDEZ DTVM LTDA";
      } elseif ($_POST["inputBanco"] == 136) {
        $banco = "136 - UNICRED COOPERATIVA";
      } elseif ($_POST["inputBanco"] == 137) {
        $banco = "137 - MULTIMONEY CC LTDA";
      } elseif ($_POST["inputBanco"] == 138) {
        $banco = "138 - GET MONEY CC LTDA";
      } elseif ($_POST["inputBanco"] == 139) {
        $banco = "139 - INTESA SANPAOLO BRASIL";
      } elseif ($_POST["inputBanco"] == 140) {
        $banco = "140 - EASYNVEST - TÍTULO CV";
      } elseif ($_POST["inputBanco"] == 142) {
        $banco = "142 - BROKER BRASIL CC LTDA";
      } elseif ($_POST["inputBanco"] == 143) {
        $banco = "143 - TREVISO CC";
      } elseif ($_POST["inputBanco"] == 144) {
        $banco = "144 - BEXS BANCO DE CÂMBIO";
      } elseif ($_POST["inputBanco"] == 145) {
        $banco = "145 - LEVYCAM CCV LTDA";
      } elseif ($_POST["inputBanco"] == 146) {
        $banco = "146 - GUITTA CC LTDA";
      } elseif ($_POST["inputBanco"] == 149) {
        $banco = "149 - FACTA . CFI";
      } elseif ($_POST["inputBanco"] == 157) {
        $banco = "157 - ICAP DO BRASIL CTVM LTDA";
      } elseif ($_POST["inputBanco"] == 159) {
        $banco = "159 - CASA CRÉDITO";
      } elseif ($_POST["inputBanco"] == 163) {
        $banco = "163 - COMMERZBANK BRASIL BANCO MÚLTIPLO";
      } elseif ($_POST["inputBanco"] == 169) {
        $banco = "169 - BANCO OLE CONSIGNADO";
      } elseif ($_POST["inputBanco"] == 172) {
        $banco = "172 - ALBATROSS CCV";
      } elseif ($_POST["inputBanco"] == 173) {
        $banco = "173 - BRL TRUST DTVM SA";
      } elseif ($_POST["inputBanco"] == 174) {
        $banco = "174 - PERNAMBUCANAS FINANC";
      } elseif ($_POST["inputBanco"] == 177) {
        $banco = "177 - GUIDE";
      } elseif ($_POST["inputBanco"] == 180) {
        $banco = "180 - CM CAPITAL MARKETS CCTVM LTDA";
      } elseif ($_POST["inputBanco"] == 182) {
        $banco = "182 - DACASA FINANCEIRA S/A";
      } elseif ($_POST["inputBanco"] == 183) {
        $banco = "183 - SOCRED";
      } elseif ($_POST["inputBanco"] == 184) {
        $banco = "184 - BANCO ITAÚ BBA";
      } elseif ($_POST["inputBanco"] == 188) {
        $banco = "188 - ATIVA INVESTIMENTOS";
      } elseif ($_POST["inputBanco"] == 189) {
        $banco = "189 - HS FINANCEIRA";
      } elseif ($_POST["inputBanco"] == 190) {
        $banco = "190 - SERVICOOP";
      } elseif ($_POST["inputBanco"] == 191) {
        $banco = "191 - NOVA FUTURA CTVM LTDA";
      } elseif ($_POST["inputBanco"] == 194) {
        $banco = "194 - PARMETAL DTVM LTDA";
      } elseif ($_POST["inputBanco"] == 196) {
        $banco = "196 - BANCO FAIR CC";
      } elseif ($_POST["inputBanco"] == 197) {
        $banco = "197 - STONE PAGAMENTOS";
      } elseif ($_POST["inputBanco"] == 204) {
        $banco = "204 - BANCO BRADESCO CARTÕES";
      } elseif ($_POST["inputBanco"] == 208) {
        $banco = "208 - BANCO BTG PACTUAL";
      } elseif ($_POST["inputBanco"] == 212) {
        $banco = "212 - BANCO ORIGINAL";
      } elseif ($_POST["inputBanco"] == 213) {
        $banco = "213 - BCO ARBI";
      } elseif ($_POST["inputBanco"] == 217) {
        $banco = "217 - BANCO JOHN DEERE";
      } elseif ($_POST["inputBanco"] == 218) {
        $banco = "218 - BANCO BS2";
      } elseif ($_POST["inputBanco"] == 222) {
        $banco = "222 - BANCO CREDIT AGRICOLE BR";
      } elseif ($_POST["inputBanco"] == 224) {
        $banco = "224 - BANCO FIBRA";
      } elseif ($_POST["inputBanco"] == 233) {
        $banco = "233 - BANCO CIFRA";
      } elseif ($_POST["inputBanco"] == 237) {
        $banco = "237 - BRADESCO";
      } elseif ($_POST["inputBanco"] == 241) {
        $banco = "241 - BANCO CLÁSSICO";
      } elseif ($_POST["inputBanco"] == 243) {
        $banco = "243 - BANCO MÁXIMA";
      } elseif ($_POST["inputBanco"] == 246) {
        $banco = "246 - BANCO ABC BRASIL";
      } elseif ($_POST["inputBanco"] == 249) {
        $banco = "249 - BANCO INVESTCRED UNIBANCO";
      } elseif ($_POST["inputBanco"] == 250) {
        $banco = "250 - BANCO BCV";
      } elseif ($_POST["inputBanco"] == 253) {
        $banco = "253 - BEXS CC";
      } elseif ($_POST["inputBanco"] == 254) {
        $banco = "254 - PARANÁ BANCO";
      } elseif ($_POST["inputBanco"] == 260) {
        $banco = "260 - NU PAGAMENTOS (NUBANK)";
      } elseif ($_POST["inputBanco"] == 265) {
        $banco = "265 - BANCO FATOR";
      } elseif ($_POST["inputBanco"] == 266) {
        $banco = "266 - BANCO CÉDULA";
      } elseif ($_POST["inputBanco"] == 268) {
        $banco = "268 - BARIGUI CH";
      } elseif ($_POST["inputBanco"] == 269) {
        $banco = "269 - HSBC BANCO DE INVESTIMENTO";
      } elseif ($_POST["inputBanco"] == 270) {
        $banco = "270 - SAGITUR CC LTDA";
      } elseif ($_POST["inputBanco"] == 271) {
        $banco = "271 - IB CCTVM LTDA";
      } elseif ($_POST["inputBanco"] == 273) {
        $banco = "273 - CCR DE SÃO MIGUEL DO OESTE";
      } elseif ($_POST["inputBanco"] == 276) {
        $banco = "276 - SENFF";
      } elseif ($_POST["inputBanco"] == 278) {
        $banco = "278 - GENIAL INVESTIMENTOS CVM";
      } elseif ($_POST["inputBanco"] == 279) {
        $banco = "279 - CCR DE PRIMAVERA DO LESTE";
      } elseif ($_POST["inputBanco"] == 280) {
        $banco = "280 - AVISTA";
      } elseif ($_POST["inputBanco"] == 283) {
        $banco = "283 - RB CAPITAL INVESTIMENTOS DTVM LTDA";
      } elseif ($_POST["inputBanco"] == 285) {
        $banco = "285 - FRENTE CC LTDA";
      } elseif ($_POST["inputBanco"] == 286) {
        $banco = "286 - CCR DE OURO";
      } elseif ($_POST["inputBanco"] == 288) {
        $banco = "288 - CAROL DTVM LTDA";
      } elseif ($_POST["inputBanco"] == 290) {
        $banco = "290 - PAGSEGURO INTERNET";
      } elseif ($_POST["inputBanco"] == 292) {
        $banco = "292 - BS2 DISTRIBUIDORA DE TÍTULOS E INVESTIMENTOS";
      } elseif ($_POST["inputBanco"] == 293) {
        $banco = "293 - LASTRO RDV DTVM LTDA";
      } elseif ($_POST["inputBanco"] == 298) {
        $banco = "298 - VIPS CC LTDA";
      } elseif ($_POST["inputBanco"] == 300) {
        $banco = "300 - BANCO LA NACION ARGENTINA";
      } elseif ($_POST["inputBanco"] == 301) {
        $banco = "301 - BPP INSTITUIÇÃO DE PAGAMENTOS";
      } elseif ($_POST["inputBanco"] == 310) {
        $banco = "310 - VORTX DTVM LTDA";
      } elseif ($_POST["inputBanco"] == 318) {
        $banco = "318 - BANCO BMG";
      } elseif ($_POST["inputBanco"] == 320) {
        $banco = "320 - BANCO CCB BRASIL";
      } elseif ($_POST["inputBanco"] == 321) {
        $banco = "321 - CREFAZ SCMEPP LTDA";
      } elseif ($_POST["inputBanco"] == 323) {
        $banco = "323 - MERCADO PAGO - CONTA DO MERCADO LIVRE";
      } elseif ($_POST["inputBanco"] == 329) {
        $banco = "329 - Q I SOC PAULISTA DE CREDITO FINANCIAMENTO E INVESTIMENTO";
      } elseif ($_POST["inputBanco"] == 341) {
        $banco = "341 - ITAÚ UNIBANCO";
      } elseif ($_POST["inputBanco"] == 366) {
        $banco = "366 - SOCINAL";
      } elseif ($_POST["inputBanco"] == 370) {
        $banco = "370 - BANCO MIZUHO";
      } elseif ($_POST["inputBanco"] == 376) {
        $banco = "376 - JP MORGAN";
      } elseif ($_POST["inputBanco"] == 389) {
        $banco = "389 - BANCO MERCANTIL DO BRASIL";
      } elseif ($_POST["inputBanco"] == 394) {
        $banco = "394 - BANCO BMG";
      } elseif ($_POST["inputBanco"] == 399) {
        $banco = "399 - HSBC";
      } elseif ($_POST["inputBanco"] == 409) {
        $banco = "409 - UNIBANCO - UNIÃO DE BANCOS BRASILEIROS";
      } elseif ($_POST["inputBanco"] == 412) {
        $banco = "412 - BANCO CAPITAL";
      } elseif ($_POST["inputBanco"] == 422) {
        $banco = "422 - BANCO SAFRA";
      } elseif ($_POST["inputBanco"] == 453) {
        $banco = "453 - BANCO RURAL";
      } elseif ($_POST["inputBanco"] == 456) {
        $banco = "456 - BANCO BARCLAYS";
      } elseif ($_POST["inputBanco"] == 464) {
        $banco = "464 - BANCO SUMITOMO MITSUI BRASILEIRO";
      } elseif ($_POST["inputBanco"] == 477) {
        $banco = "477 - CITIBANK";
      } elseif ($_POST["inputBanco"] == 479) {
        $banco = "479 - BANCO ITAUBANK";
      } elseif ($_POST["inputBanco"] == 487) {
        $banco = "487 - DEUTSCHE BANK";
      } elseif ($_POST["inputBanco"] == 488) {
        $banco = "488 - JPMORGAN CHASE BANK";
      } elseif ($_POST["inputBanco"] == 492) {
        $banco = "492 - ING BANK";
      } elseif ($_POST["inputBanco"] == 494) {
        $banco = "494 - BANCO DE LA NACION ARGENTINA";
      } elseif ($_POST["inputBanco"] == 495) {
        $banco = "495 - BANK OF AMERICA";
      } elseif ($_POST["inputBanco"] == 505) {
        $banco = "505 - BANCO CREDIT SUISSE";
      } elseif ($_POST["inputBanco"] == 545) {
        $banco = "545 - SENSO CCVM SA";
      } elseif ($_POST["inputBanco"] == 600) {
        $banco = "600 - BANCO LUSO BRASILEIRO";
      } elseif ($_POST["inputBanco"] == 604) {
        $banco = "604 - BANCO INDUSTRIAL DO BRASIL";
      } elseif ($_POST["inputBanco"] == 610) {
        $banco = "610 - VR CRED AC";
      } elseif ($_POST["inputBanco"] == 611) {
        $banco = "611 - COOPERATIVA UNIPRIME";
      } elseif ($_POST["inputBanco"] == 612) {
        $banco = "612 - BANCO GUANABARA";
      } elseif ($_POST["inputBanco"] == 613) {
        $banco = "613 - OMNI BANCO";
      } elseif ($_POST["inputBanco"] == 623) {
        $banco = "623 - BANCO PAN";
      } elseif ($_POST["inputBanco"] == 626) {
        $banco = "626 - BANCO FICSA";
      } elseif ($_POST["inputBanco"] == 630) {
        $banco = "630 - BANCO INTERCAP";
      } elseif ($_POST["inputBanco"] == 633) {
        $banco = "633 - BANCO REDENTOR";
      } elseif ($_POST["inputBanco"] == 634) {
        $banco = "634 - BANCO TRIANGULO";
      } elseif ($_POST["inputBanco"] == 637) {
        $banco = "637 - BANCO SOFISA";
      } elseif ($_POST["inputBanco"] == 641) {
        $banco = "641 - BANCO ALVORADA";
      } elseif ($_POST["inputBanco"] == 643) {
        $banco = "643 - BANCO PINE";
      } elseif ($_POST["inputBanco"] == 652) {
        $banco = "652 - ITAÚ UNIBANCO HOLDING BM";
      } elseif ($_POST["inputBanco"] == 653) {
        $banco = "653 - BANCO INDUSVAL";
      } elseif ($_POST["inputBanco"] == 654) {
        $banco = "654 - BANCO A.J. RENNER";
      } elseif ($_POST["inputBanco"] == 655) {
        $banco = "655 - BANCO VOTORANTIM";
      } elseif ($_POST["inputBanco"] == 707) {
        $banco = "707 - BANCO DAYCOVAL";
      } elseif ($_POST["inputBanco"] == 712) {
        $banco = "712 - BANCO OURINVEST";
      } elseif ($_POST["inputBanco"] == 756) {
        $banco = "756 - SICOOB";
      } elseif ($_POST["inputBanco"] == 999) {
        $banco = "999 - BANCO COOPERATIVO SICREDI";
      }

















      $query_editar = "UPDATE propostas set banco = '$banco', tipodeconta = '$tipodeconta', agencia = '$agencia', conta = '$conta',renda = '$renda' where idpropostas = '$id' ";

      $result_editar = mysqli_query($conexao, $query_editar);

      /*
      $queryeditar = "INSERT into loguser (nome, acao, data) VALUES ('$nomeusuario', 'Editou um pet de espécie: $especie', curDate())";
      $resulteditar = mysqli_query($conexao, $queryeditar);
      */
      if ($result_editar == '') {
        echo "<script language='javascript'> window.alert('Ocorreu um erro ao Editar!'); </script>";
      } else {
        echo "<script language='javascript'> window.alert('Editado com Sucesso!'); </script>";
        echo "<script language='javascript'> window.location='propostas.php'; </script>";
      }
    }
    ?>



<?php }
}  ?>
<!--final modal dados bancarios -->




<!-- Scripts de máscara dos inputs -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#inputTelefone').mask('(00) 00000-0000');
    $(".inputTelefone").mask("(00) 00000-0000");
    $('.inputCpf').mask('000.000.000-00'); // aplicando a máscara em todos os inputs que tem a classe inputCpf
    //$("#cep").mask("49095-999");
  });
</script>



<script>
  document.addEventListener("DOMContentLoaded", function() {
    var inputAgencia = document.getElementById("inputAgencia");

    inputAgencia.addEventListener("input", function() {
      // Remove todos os caracteres que não são números
      this.value = this.value.replace(/[^0-9]/g, "");
    });
  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    var inputAgencia = document.getElementById("inputConta");

    inputAgencia.addEventListener("input", function() {
      // Remove todos os caracteres que não são números
      this.value = this.value.replace(/[^0-9]/g, "");
    });
  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    var inputAgencia = document.getElementById("inputRenda");

    inputAgencia.addEventListener("input", function() {
      // Remove todos os caracteres que não são números
      this.value = this.value.replace(/[^0-9]/g, "");
    });
  });
</script>






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

<script>
  // lógica para obter o id corretamento no modal antes de excluir um registro.
  // Adicione um evento para quando o modal for exibido
  $('#confirmModal').on('show.bs.modal', function(event) {
    // Recupere o botão que acionou o modal
    var button = $(event.relatedTarget);

    // Recupere o valor do atributo data-id do botão
    var id = button.data('id');

    // Atualize o link dentro do modal com o ID correto
    var modal = $(this);
    modal.find('.btn-danger').attr('href', 'propostas.php?func=deleta&id=' + id);
  });
</script>


<!-- lógica para exclusão de registro -->
<?php
if (isset($_GET['func']) && $_GET['func'] == 'deleta') {
  $id = isset($_GET['id']) ? $_GET['id'] : null;

  if ($id !== null) {
    $query = "DELETE FROM propostas where idpropostas = '$id'";
    $result = mysqli_query($conexao, $query);

    if ($result) {
      echo "<script language='javascript'> window.alert('Excluído com sucesso!!!'); </script>";
    } else {
      echo "<script language='javascript'> window.alert('Ocorreu um erro ao excluir!'); </script>";
    }
  } else {
    echo "<script language='javascript'> window.alert('ID não foi capturado corretamente. Exclusão não é possível.'); </script>";
  }

  echo "<script language='javascript'> window.location='propostas.php'; </script>";
}
?>



<!--EDITAR -->
<?php
if (@$_GET['func'] == 'editarstatus') {
  $id = $_GET['id'];
  $query = "select * from propostas where idpropostas = '$id'";
  $result = mysqli_query($conexao, $query);


  while ($res_1 = mysqli_fetch_array($result)) {


?>

    <!-- Modal Editar Status -->
    <div id="modalEditarStatus" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">

            <h4 class="modal-title">Alterar status</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form method="POST" action="">
              <div class="form-group">
                <label for="id_produto">Cliente</label>
                <input type="text" class="form-control mr-2" name="txtnome" placeholder="Nome" value="<?php echo $res_1['nome']; ?>" required disabled>
              </div>




              <?php

              if ($_SESSION['cargo_usuario'] != 'Master' && $_SESSION['cargo_usuario'] != 'Adm') : // Verifica se o usuário NÃO é do tipo 'Master'
              ?>
                <div class="form-group">
                  <label for="id_produto">Status</label>
                  <select name="statusproposta" class="custom-select" id="statusproposta">
                    <?php
                    // Se o usuário não é 'Master', você continua com o código para exibir as opções de status
                    $query = "SELECT id, statusproposta FROM statusproposta WHERE statusproposta = 'AGUARD DIGITAÇÃO' OR statusproposta = 'PENDENCIA RESOLVIDA' OR statusproposta = 'PENDENTE'";

                    $result = mysqli_query($conexao, $query);

                    // Verificar se a consulta teve sucesso
                    if (!$result) {
                      die("Erro na consulta: " . mysqli_error($conexao));
                    }

                    while ($row = mysqli_fetch_assoc($result)) {
                      echo '<option value="' . $row['id'] . '">' . $row['statusproposta'] . '</option>';
                    }
                    ?>
                  </select>
                  <small class="text-muted">Selecione o novo status da proposta</small>
                </div>
              <?php else : // Se o usuário for 'Master', permite qualquer status no banco de dados 
              ?>
                <div class="form-group">
                  <label for="id_produto">Status</label>
                  <select name="statusproposta" class="custom-select" id="statusproposta">
                    <?php
                    $query = "SELECT id, statusproposta FROM statusproposta";
                    $result = mysqli_query($conexao, $query);

                    // Verificar se a consulta teve sucesso
                    if (!$result) {
                      die("Erro na consulta: " . mysqli_error($conexao));
                    }

                    while ($row = mysqli_fetch_assoc($result)) {
                      echo '<option value="' . $row['id'] . '">' . $row['statusproposta'] . '</option>';
                    }
                    ?>
                  </select>
                  <small class="text-muted">Selecione o novo status da proposta</small>
                </div>
              <?php endif; ?>



          </div>



          <div class="modal-footer">
            <button type="submit" class="btn btn-primary mb-3" name="buttonEditarStatus">Salvar </button>


            <button type="button" class="btn btn-secondary mb-3" data-dismiss="modal">Cancelar </button>
            </form>
          </div>
        </div>
      </div>
    </div>



    <script>
      $("#modalEditarStatus").modal("show");
    </script>

    <!--Comando para editar os dados UPDATE -->
    <?php
    if (isset($_POST['buttonEditarStatus'])) {
      $statusproposta = $_POST['statusproposta'];


      //marcador
      // Verifica se o formulário foi enviado
      if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Verifica se a chave 'statusproposta' existe no $_POST
        if (isset($_POST["statusproposta"])) {

          // Obtém o valor selecionado no formulário
          $selectedValue = $_POST["statusproposta"];

          // Consulta SQL para obter o status correspondente ao valor selecionado
          $query = "SELECT statusproposta FROM statusproposta WHERE id = ?";
          $stmt = mysqli_prepare($conexao, $query);

          // Vincula o parâmetro e executa a consulta
          mysqli_stmt_bind_param($stmt, "i", $selectedValue);
          mysqli_stmt_execute($stmt);

          // Vincula o resultado da consulta
          mysqli_stmt_bind_result($stmt, $statusproposta);

          // Obtém o resultado
          mysqli_stmt_fetch($stmt);

          // Fecha a consulta preparada
          mysqli_stmt_close($stmt);
        }
      }









      $query_editar = "UPDATE propostas set statusproposta = '$statusproposta' where idpropostas = '$id' ";

      $result_editar = mysqli_query($conexao, $query_editar);

      if ($result_editar == '') {
        echo "<script language='javascript'> window.alert('Ocorreu um erro ao Editar!'); </script>";
      } else {
        echo "<script language='javascript'> window.alert('Status alterado com Sucesso!'); </script>";
        echo "<script language='javascript'> window.location='propostas.php'; </script>";
      }
    }
    ?>


<?php }
} ?>






<?php
if (@$_GET['func'] == 'visualizarproposta') {
  $id = $_GET['id'];
  $queryProposta = "SELECT * FROM propostas WHERE idpropostas = '$id'";
  $resultProposta = mysqli_query($conexao, $queryProposta);

  while ($res_1 = mysqli_fetch_array($resultProposta)) {
?>
    <!-- Modal visualizar proposta -->
    <div id="modalVisualizarProposta" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <div class="container mt-5">
              <h2 class="mb-4">Visualização da proposta</h2>
              <?php
              if (isset($id)) {
                // Consulta para obter informações da proposta
                $queryProposta = "SELECT * FROM propostas WHERE idpropostas = '$id'";
                $resultProposta = mysqli_query($conexao, $queryProposta);



                if (!$resultProposta) {
                  die("Erro na consulta: " . mysqli_error($conexao));
                }

                while ($rowProposta = mysqli_fetch_assoc($resultProposta)) {
                  echo '<div class="card mb-4">';
                  echo '<div class="card-header"><strong>ID: </strong><span class="badge badge-primary" style="font-size: larger;">' . $rowProposta['idpropostas'] . '</span></div>';
                  echo '<div class="card-body">';

                  // Informações da proposta em duas colunas
                  echo '<div class="row">';
                  echo '<div class="col-md-6">';
                  echo '<p><strong>CPF: </strong>' . $rowProposta['cpf'] . '</p>';
                  echo '<p><strong>Número Benefício: </strong>' . $rowProposta['numerobeneficio'] . '</p>';
                  echo '<p><strong>Nome: </strong>' . $rowProposta['nome'] . '</p>';
                  echo '<p><strong>Data Nasc: </strong>' . date('d/m/Y', strtotime($rowProposta['nascimento'])) . '</p>';
                  echo '<p><strong>RG: </strong>' . $rowProposta['rg'] . '</p>';
                  echo '<p><strong>Órgão Emissor: </strong>' . $rowProposta['orgaoemissor'] . '</p>';
                  echo '<p><strong>Data Emissão: </strong>' . date('d/m/Y', strtotime($rowProposta['dataemissao'])) . '</p>';
                  echo '<p><strong>Naturalidade: </strong>' . $rowProposta['naturalidade'] . '</p>';
                  echo '<p><strong>Nome da Mãe: </strong>' . $rowProposta['nomedamae'] . '</p>';
                  echo '<p><strong>Nome do Pai: </strong>' . $rowProposta['nomedopai'] . '</p>';
                  echo '<p><strong>Telefone: </strong>' . $rowProposta['telefone'] . '</p>';
                  echo '<p><strong>CEP: </strong>' . $rowProposta['cep'] . '</p>';
                  echo '<p><strong>Rua: </strong>' . $rowProposta['rua'] . '</p>';
                  echo '<p><strong>Número: </strong>' . $rowProposta['numero'] . '</p>';
                  echo '<p><strong>Complemento: </strong>' . $rowProposta['complemento'] . '</p>';
                  echo '<p><strong>Bairro: </strong>' . $rowProposta['bairro'] . '</p>';
                  echo '<p><strong>Cidade: </strong>' . $rowProposta['cidade'] . '</p>';
                  echo '<p><strong>UF: </strong>' . $rowProposta['uf'] . '</p>';
                  echo '</div>'; // Fim da coluna 1
                  echo '<div class="col-md-6">';
                  echo '<p><strong>Email: </strong>' . $rowProposta['email'] . '</p>';
                  echo '<p><strong>Convênio: </strong>' . $rowProposta['convenio'] . '</p>';
                  echo '<p><strong>Banco da proposta: </strong>' . $rowProposta['bancoproposta'] . '</p>';
                  echo '<p><strong>Banco: </strong>' . $rowProposta['banco'] . '</p>';
                  echo '<p><strong>Tipo de Conta: </strong>' . $rowProposta['tipodeconta'] . '</p>';
                  echo '<p><strong>Agência: </strong>' . $rowProposta['agencia'] . '</p>';
                  echo '<p><strong>Conta: </strong>' . $rowProposta['conta'] . '</p>';
                  echo '<p><strong>Renda: </strong>' . $rowProposta['renda'] . '</p>';
                  echo '<p><strong>Operação: </strong>' . $rowProposta['operacao'] . '</p>';
                  echo '<p><strong>Tabela: </strong>' . $rowProposta['tabela'] . '</p>';
                  echo '<p><strong>Promotora: </strong>' . $rowProposta['promotora'] . '</p>';
                  echo '<p><strong>Margem: </strong>' . $rowProposta['margem'] . '</p>';
                  echo '<p><strong>Prazo: </strong>' . $rowProposta['prazo'] . '</p>';
                  echo '<p><strong>Valor: </strong>' . $rowProposta['valor'] . '</p>';
                  echo '<p><strong>Valor Parcelas: </strong>' . $rowProposta['valorparcelas'] . '</p>';
                  echo '<p><strong>Formalização: </strong>' . $rowProposta['formalizacao'] . '</p>';
                  echo '<p><strong>Canal: </strong>' . $rowProposta['canal'] . '</p>';
                  echo '</div>'; // Fim da coluna 2

                  echo '</div>'; // Fim da linha

                    
                            
                             // Adicione o código PHP para recuperar as observações da proposta
                    $queryObservacoes = "SELECT * FROM observacoes WHERE idpropostas = '$id'";
                    $resultObservacoes = mysqli_query($conexao, $queryObservacoes);

                    // Adicione o código para criar o botão de colapso
                    echo '<p>';
                    echo '<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#observacoesCollapse" aria-expanded="false" aria-controls="observacoesCollapse">';
                    echo 'Ver Observações';
                    echo '</button>';
                    echo '</p>';

                    // Adicione o código da tabela de observações dentro do colapso
                    echo '<div class="collapse" id="observacoesCollapse">';
                    echo '<table class="table table-striped">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>Usuário</th>';
                    echo '<th>Observação</th>';
                    echo '<th>Data</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';

                    if ($resultObservacoes && mysqli_num_rows($resultObservacoes) > 0) {
                        while ($rowObservacao = mysqli_fetch_assoc($resultObservacoes)) {
                            $usuarioObservacao = $rowObservacao['usuario'];
                            $observacao = $rowObservacao['observacao'];
                            $dataObservacao = date('d/m/Y', strtotime($rowObservacao['data']));

                            echo "<tr>";
                            echo "<td>$usuarioObservacao</td>";
                            echo "<td>$observacao</td>";
                            echo "<td>$dataObservacao</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>Nenhuma observação encontrada.</td></tr>";
                    }

                    echo '</tbody>';
                    echo '</table>';
                    echo '</div>'; // Fim do colapso

                  // Adicione o código PHP para recuperar os documentos do cliente
                  $id = $_GET['id'];
                  $queryDocumentos = "SELECT * FROM documentos WHERE idproposta = '$id'";
                  $resultDocumentos = mysqli_query($conexao, $queryDocumentos);

                  echo '<table class="table table-striped">';
                  echo '<thead>';
                  echo '<tr>';
                  echo '<th>Nome do cliente</th>';
                  echo '<th>Prévia</th>';
                  echo '<th>Ações</th>';
                  echo '</tr>';
                  echo '</thead>';
                  echo '<tbody>';

                  if ($resultDocumentos && mysqli_num_rows($resultDocumentos) > 0) {
                    while ($rowDocumento = mysqli_fetch_assoc($resultDocumentos)) {
                      $nomeDocumento = $rowDocumento['nome'];
                      $caminhoDocumento = $rowDocumento['caminho'];
                      $idDocumento = $rowDocumento["id"];

                      echo "<tr>";
                      echo "<td>$nomeDocumento</td>";
                      echo "<td><img src='documentos/$caminhoDocumento' class='img-thumbnail' width='100' height='100' alt='Prévia' /></td>";
                      echo "<td>";
                      echo "<a class='btn btn-primary' href='documentos/$caminhoDocumento' target='_blank'><i class='fa fa-eye'></i></a> ";
                      echo "<a class='btn btn-primary' href='documentos/$caminhoDocumento' download><i class='fa fa-download'></i></a> ";
                      if ($_SESSION['cargo_usuario'] == 'Master' || $_SESSION['cargo_usuario'] == 'Adm') {
                        echo "<a class='btn btn-danger' href='documentos.php?func=deletar&id=$idDocumento'><i class='fa fa-trash'></i></a>";
                      }
                      echo "</td>";
                      echo "</tr>";
                    }
                  } else {
                    echo "<tr><td colspan='3'>Nenhum documento encontrado.</td></tr>";
                  }

                  echo '</tbody>';
                  echo '</table>';
                  echo '</div>'; // Fim do corpo do cartão
                  echo '</div>'; // Fim do cartão
                }

                mysqli_close($conexao);
              } else {
                echo 'ID não especificado.';
              }
              ?>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger mb-3" data-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>


    <script>
      $("#modalVisualizarProposta").modal("show");
    </script>
<?php
  }
}
?>








<script>
  function consultaEndereco() {
    // Obter o valor do CEP digitado
    let cep = document.querySelector('#cep').value;

    if (cep.length !== 8) {
      alert('Cep inválido!');
    }

    let url = 'https://viacep.com.br/ws/' + cep + '/json/';

    fetch(url)
      .then(function(response) {
        if (!response.ok) {
          throw new Error('Erro na requisição');
        }
        return response.json();
      })
      .then(function(data) {
        console.log(data);
        mostrarEndereco(data); // Chama a função para preencher os inputs
      })
      .catch(function(error) {
        console.error('Erro:', error);
      });
  }

  function mostrarEndereco(dados) {
    document.getElementById('inputRua').value = dados.logradouro || '';
    document.getElementById('inputNumero').value = ''; // Defina a lógica para o número
    document.getElementById('inputComplemento').value = dados.complemento || '';
    document.getElementById('inputBairro').value = dados.bairro || '';
    document.getElementById('inputCidade').value = dados.localidade || '';
    document.getElementById('inputUf').value = dados.uf || '';
  }
</script>