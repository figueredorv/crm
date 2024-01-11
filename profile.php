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

    <title>CRMCORBAN 2 - Perfil</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/userprofile.css" rel="stylesheet">
    <link href="assets" rel="stylesheet">
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


                <!-- início Dashboard -->

                <div class="row dashboard-profile">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Minhas propostas</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php

                                            $query = "SELECT * FROM `propostas` WHERE `idusuario` = '$idUsuario';";
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
                                            Proposta mais alta que cadastrei</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <h5><?php
                                                $query = "SELECT MAX(valor) AS max_valor FROM propostas WHERE idusuario = '$idUsuario'";
                                                $result = mysqli_query($conexao, $query);

                                                if ($result) {
                                                    $row = mysqli_fetch_assoc($result);
                                                    $max_valor = $row['max_valor'];

                                                    if ($max_valor !== null) {
                                                        $max_valor_em_reais = number_format($max_valor, 2, ",", "."); // Dividimos por 100 para converter de centavos para reais
                                                        echo "<h5>R$ $max_valor_em_reais</h5>";
                                                    } else {
                                                        echo "<h5>R$ 0,00</h5>";
                                                    }
                                                } else {
                                                    echo "<h5>R$ 0,00</h5>";
                                                }
                                                ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa fa-hand-o-up fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                            Valor total que cadastrei</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <h5><?php
                                                $query = "SELECT SUM(valor) AS soma_valor FROM propostas WHERE idusuario = '$idUsuario'";
                                                $result = mysqli_query($conexao, $query);

                                                if ($result) {
                                                    $row = mysqli_fetch_assoc($result);
                                                    $somaValor = $row['soma_valor']; // Alterei de $maxValor para $somaValor

                                                    if (isset($somaValor)) {
                                                        echo "<h5>R$ " . number_format($somaValor, 2, ',', '.') . "</h5>";
                                                    } else {
                                                        echo "<h5>R$ 0,00</h5>";
                                                    }
                                                } else {
                                                    echo "<h5>R$ 0,00</h5>";
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

                <!-- final Dashboard -->




                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Meu perfil</h1>




                    <div class="row">
                        <div class="col-md-6">
                            <article class="card">
                                <!-- Conteúdo do primeiro card aqui -->

                                <div class="card-header">
                                    <h4 class="card-title">Equipe</h4>
                                </div>
                                <div class="card-body col-md-12">
                                    <ul class="list-unstyled team-members">
                                        <div class="card">
                                            <!-- início de tabela de usuários mais ativos -->


                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <?php
                                                    $query = "SELECT u.idusuarios, u.usuario, u.sobremim, COALESCE(COUNT(p.idusuario), 0) as propostas, u.ultima_autenticacao
                                                    FROM usuarios u
                                                    LEFT JOIN propostas p ON u.idusuarios = p.idusuario
                                                    GROUP BY u.idusuarios, u.usuario, u.sobremim, u.ultima_autenticacao
                                                    ORDER BY propostas DESC;";
                                          





                                                    $result = mysqli_query($conexao, $query);
                                                    $row = mysqli_num_rows($result);



                                                    if ($row == 0) {
                                                        echo "<h3>Não existem dados cadastrados no banco</h3>";
                                                    } else {
                                                    ?>
                                                        <table class="table table-">
                                                            <thead class="text-primary">

                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                while ($res_1 = mysqli_fetch_array($result)) {
                                                                    $nome = $res_1["usuario"];
                                                                    $propostas = $res_1["propostas"];
                                                                    $idUsuario = $res_1["idusuarios"];
                                                                    $ultima_autenticacao = $res_1["ultima_autenticacao"];
                                                                    $sobreMim = $res_1["sobremim"]; 






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
                                                                            <span style="vertical-align: middle; margin-right: 5px;"></span>
                                                                        </td>
                                                                        <td>
                                                                            <h3><?php echo $nome ?></h3>
                                                                            <p><?php echo $sobreMim ?><p>

                                                                        </td>
                                                                        <td><?php
                                                                            $ultima_autenticacao = strtotime($ultima_autenticacao); // Converte a última autenticação para um timestamp

                                                                            // Obtém a data atual
                                                                            $data_atual = strtotime(date('Y-m-d'));

                                                                            if ($ultima_autenticacao >= $data_atual) {
                                                                                // O usuário foi ativo hoje, então o badge será verde
                                                                                $badge_color = 'badge-success';
                                                                                $status_text = 'Online';
                                                                            } else {
                                                                                // O usuário não foi ativo hoje, o badge será vermelho
                                                                                $badge_color = 'badge-danger';
                                                                                $status_text = 'Inativo';
                                                                            }
                                                                            ?>

                                                                            <span class="badge <?php echo $badge_color; ?>">
                                                                                <?php echo $status_text; ?>
                                                                            </span>

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



                                            <!-- final de tabela de usuários mais ativos -->

                                        </div>
                                    </ul>
                                </div>

                            </article>
                        </div>
                        <div class="col-md-6">

                            <!-- Conteúdo do segundo card aqui -->
                            <div class="col-md-12">
                                <div class="card card-user">
                                    <div class="card-header">
                                        <h5 class="card-title">Editar perfil</h5>
                                        <small class="text-muted">Ao atualizar seus dados você precisará fazer o login novamente.</small>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-5 pr-1">
                                                    <div class="form-group">
                                                        <label>Nome</label>
                                                        <input type="text" class="form-control" disabled="" placeholder="Company" value="<?php echo $_SESSION['nome_usuario']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-3 px-1">
                                                    <div class="form-group">
                                                        <label>Usuário</label>
                                                        <input type="text" name="inputUsuario" class="form-control" placeholder="Username" value="<?php echo $_SESSION['usuario']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 pl-1">
                                                    <div class="form-group">
                                                        <label for="InputSenha">Senha</label>
                                                        <input type="password" name="inputSenha" class="form-control" placeholder="" value="<?php echo $_SESSION['senha']; ?>">
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Descrição</label>
                                                        <textarea name="inputSobreMim" class="form-control textarea"><?php echo $_SESSION['sobremim']; ?></textarea>
                                                    </div>
                                                    <label>Atualizar imagem do perfil</label>
                                                    <input name="imagens[]" type="file" class="form-control-file" id="imagem-preview" accept=".pdf, .jpg, jpeg, .png" onchange="mostrarImagem(this)">
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="update ml-auto mr-auto">
                                                    <button type="salvar" name="salvar" id="salvar" class="btn btn-primary btn-round">Atualizar perfil</button>
                                                </div>
                                            </div>
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

</body>

</html>



<!--EDITAR -->
<?php
if (isset($_POST['salvar'])) {
    $id = $_SESSION['idusuarios'];
    $usuario = $_POST['inputUsuario'];
    $senha = $_POST['inputSenha'];
    $sobremim = $_POST['inputSobreMim'];
    $imagens = $_FILES['imagens'];

    $query = "SELECT * FROM usuarios WHERE idusuarios = '$id'";
    $resultado = mysqli_query($conexao, $query);



    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $imagens = $_FILES['imagens'];
        $novo_nome = '';
        foreach ($imagens['name'] as $key => $nomedocumento) {
            if ($imagens['error'][$key] === 0) {
                $extensao = pathinfo($nomedocumento, PATHINFO_EXTENSION);
                $novo_nome = md5(uniqid()) . '.' . $extensao;

                if (move_uploaded_file($imagens['tmp_name'][$key], 'assets/img/faces/' . $novo_nome)) {
                    // Insira o nome do arquivo no banco de dados
                    $query = "UPDATE usuarios set imagem = '$novo_nome' where idusuarios = '$id'";
                    mysqli_query($conexao, $query);
                }
            }
        }
    }

    $query = "UPDATE usuarios set usuario = '$usuario', senha = '$senha', sobremim = '$sobremim' where idusuarios = '$id'";
    mysqli_query($conexao, $query);

    echo "<script language='javascript'> window.alert('Atualizado com sucesso! Você precisa fazer login novamente.'); </script>";
    echo "<script language='javascript'> window.location='profile.php'; </script>";
    session_destroy();
}
?>

<script>
    // função para mostrar imagem ao usuário selecionar e fazer upload.
    function mostrarImagem(input) {
        if (input.files && input.files[0]) {
            var leitor = new FileReader();

            leitor.onload = function(e) {
                // Define a imagem selecionada como src da imagem de pré-visualização
                document.getElementById('imagem-preview').src = e.target.result;
            };

            leitor.readAsDataURL(input.files[0]);
        }
    }
</script>