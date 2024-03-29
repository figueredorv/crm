<?php

session_start();
include('verificar_login.php');
include("conexao.php");
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />


    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <script src="//code.jivosite.com/widget/fgSW8k1Bo7" async></script>






    <title>
        CRM CORBAN
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/demo/demo.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/painel-funcionario.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="//code.jivosite.com/widget/fgSW8k1Bo7" async></script>
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="blue" data-active-color="danger">
            <div class="logo">
                <a href="" class="simple-text logo-mini">

                </a>
                <a href="" class="simple-text logo-normal">
                    CRM CORBAN
                    <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">

                    <li class="">
                        <a href="painel_funcionario.php">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <p>Dashboard</p>

                        </a>
                    </li>

                    <li class="">
                    <a class="nav-link" href="propostas.php">
                    <i class="fa fa-search"></i>
                    <span>Propostas</span></a>
                    </li>

                    <li class="">
                    <a class="nav-link" href="documentos.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Documentos</span></a>
                    </li>

                    <li class="">
                    <a class="nav-link" href="observacoes.php">
                    <i class="fa fa-comment"></i>
                    <span>Observações</span></a>
                    </li>








                    <li class="active-pro">
                        <a href="logout.php">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                            <p>SAIR</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="javascript:;">Minha conta</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">

                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link btn-magnify" href="painel_funcionario.php">
                                    <i class="nc-icon nc-layout-11"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Stats</span>
                                    </p>
                                </a>
                            </li>


                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="assets/img/damir-bosnjak.jpg" alt="...">
                            </div>
                            <div class="card-body">
                                <div class="author">
                                    <a href="#">

                                        <div>
                                            <div class="form-group col-md-12">
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
                                                <img id="imagem-preview" class="avatar border-gray" src="<?php echo $caminhoDaImagem; ?>" alt="Imagem de Perfil">


                                            </div>
                                        </div>
                                        <h5 class="title"><?php echo $_SESSION['nome_usuario']; ?></h5>
                                    </a>
                                    <p class="description">
                                        <?php echo "Usuário: " . $_SESSION['usuario']; ?>
                                    </p>
                                    <p class="description">
                                        <?php echo "Nível: " . $_SESSION['cargo_usuario']; ?>
                                    </p>
                                </div>
                                <p class="description text-center">
                                    "<?php echo $_SESSION['sobremim']; ?>"
                                </p>
                            </div>
                            <div class="card-footer">
                                <hr>
                                <div class="button-container">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6 col-6 ml-auto">
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
                                            ?><small>Minhas propotas</small></h5>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                                            <?php
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
                                            ?>
                                            <small>Proposta mais alta que cadastrei</small></h5>
                                        </div>
                                        <div class="col-lg-3 mr-auto">
                                            <?php
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
                                            ?>
                                            <small>Valor total que cadastrei</small></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card" >
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
                                                $query = "SELECT u.idusuarios, u.usuario, COALESCE(COUNT(p.idusuario), 0) as propostas, u.ultima_autenticacao
                                                FROM usuarios u
                                                LEFT JOIN propostas p ON u.idusuarios = p.idusuario
                                                GROUP BY u.idusuarios, u.usuario, u.ultima_autenticacao
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
                                                                    <td><?php echo $nome ?></td>
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
                        </div>
                    </div>
                    <div class="col-md-8">
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
                                                <label>Sobre mim</label>
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
            <footer class="footer footer-black  footer-white ">
                <div class="container-fluid">
                    <div class="row">
                        <nav class="footer-nav">
                            <ul>
                                <li><a href="" target="_blank">CRMCORBAN</a></li>
                                <li><a href="" target="_blank">Blog</a></li>
                                <li><a href="" target="_blank">Licenses</a></li>
                            </ul>
                        </nav>
                        <div class="credits ml-auto">
                            <span class="copyright">
                                © <script>
                                    document.write(new Date().getFullYear())
                                </script>, made with <i class="fa fa-heart heart"></i> by figueiredorv
                            </span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="assets/demo/demo.js"></script>
    <script>
      $(document).ready(function() {
        // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
        demo.initChartsPages();
      });
    </script>
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