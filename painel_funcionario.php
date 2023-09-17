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
  <link rel="stylesheet" href="css/style.css">






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



</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="https://www.pngall.com/wp-content/uploads/5/User-Profile-PNG-File.png">
          </div>
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
            <a href="propostas.php">
              <i class="fa fa-product-hunt"></i>
              <p>Propostas</p>
            </a>
          </li>



          <li class="">
            <a href="propostas.php">
              <i class="fa fa-search"></i>
              <p>Consultas</p>
            </a>
          </li>

          <li class="">
            <a href="mensagens.php">
              <i class="fa fa-users"></i>
              <p>Bases</p>
            </a>
          </li>



          <li class="">
            <a href="https://wa.link/1quja8" target="_blank">
              <i class="fa fa-life-ring"></i>
              <p>Suporte</p>
            </a>
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
            <a class="navbar-brand" href="#pablo"></a>
          </div>

          <form>
            <div class="input-group no-border">
              <input type="text" value="" class="form-control" placeholder="Search...">
              <div class="input-group-append">
                <div class="input-group-text">
                  <i class="nc-icon nc-zoom-split"></i>
                </div>
              </div>
            </div>
          </form>



          <div class="collapse navbar-collapse justify-content-end" id="navigation">

            <ul class="navbar-nav">

              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo $_SESSION['nome_usuario']; ?>
                  <i class="nc-icon nc-single-02"></i>
                  <p>

                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">


                  <?php
                  if ($_SESSION['cargo_usuario'] == 'Administrador' || $_SESSION['cargo_usuario'] == 'Desenvolvedor') {


                  ?>

                    <a class="dropdown-item" href="painel_admin.php">Painél do Administrador</a>
                    <a class="dropdown-item" href="painel_funcionario.php">Painél do Funcionário</a>

                  <?php } ?>

                  <a class="dropdown-item" href="logout.php">Sair</a>



                </div>



              </li>

            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <!-- <div class="panel-header panel-header-lg">

  <canvas id="bigDashboardChart"></canvas>


</div> -->




      <div class="content">




        <?php

        $query = "select * from propostas where status = 'Pendente'";
        $result = mysqli_query($conexao, $query);
        //$dado = mysqli_fetch_array($result);
        $row = mysqli_num_rows($result);

        if ($row > 0) : ?>
          <div class="notice notice-warning"><strong>Atenção!</strong> Existem propostas pendentes.</div>

        <?php

        endif;
        ?>




        



        <!-- Botões dropdowns em cima da dashboard -->
        <div class="btn-group dropright">
          <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Campanhas
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Minhas campanhas</a>
            <a class="dropdown-item" href="#">Atendimento</a>
          </div>
        </div>

        <div class="btn-group dropright">
          <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Relatórios
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Propostas</a>
            <a class="dropdown-item" href="#">Campanhas</a>
          </div>
        </div>

        <div class="btn-group dropright">
          <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Financeiro
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Comissionamento</a>
            <a class="dropdown-item" href="#">Lançamentos</a>
            <a class="dropdown-item" href="#">Pagamentos</a>
          </div>
        </div>

        <div class="btn-group dropright">
          <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Administração
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Usuários</a>
            <a class="dropdown-item" href="#">Grupos</a>
            <a class="dropdown-item" href="#">Tabelas</a>
            <a class="dropdown-item" href="#">Status</a>
            <a class="dropdown-item" href="#">Promotoras</a>
            <a class="dropdown-item" href="#">Promotoras</a>
            <a class="dropdown-item" href="#">Tabulação</a>
            <a class="dropdown-item" href="#">Canais de vendas</a>
          </div>
        </div>







        <!--  final Botões dropdowns em cima da dashboard -->










        <a href="propostas.php" style="text-decoration:none">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-body ">
                  <div class="row">
                    <div class="col-5 col-md-4">
                      <div class="icon-big text-center icon-warning">
                        <i class="bi bi-cone-striped"></i>
                        <i class="fa fa-cart-arrow-down text-warning "></i>
                      </div>
                    </div>
                    <div class="col-7 col-md-8">
                      <div class="numbers">
                        <p class="card-category">Total de propostas</p>
                        <p class="card-title">

                          <?php

                          $query = "select * from propostas order by nome asc";
                          $result = mysqli_query($conexao, $query);
                          //$dado = mysqli_fetch_array($result);
                          $row = mysqli_num_rows($result);

                          if ($row == '') {

                            echo "<h5> 0 </h5>";
                          } else {
                            echo "<h5> $row </h5>";
                          }
                          ?>


                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer ">
                  <hr>
                  <div class="stats">
                    <i class="fa fa-cart-arrow-down "></i> Quantidade total de propostas
                  </div>
                </div>
              </div>
        </a>
      </div>
      <a href="propostas.php?buttonOcNaoAtendidas=" style="text-decoration:none">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-body ">
              <div class="row">
                <div class="col-5 col-md-4">
                  <div class="icon-big text-center icon-warning">
                    <i class="fa fa-money text-danger"></i>
                  </div>
                </div>
                <div class="col-7 col-md-8">
                  <div class="numbers">
                    <p class="card-category">Valor total das propostas </p>
                    <p class="card-title">

                      <?php

                      $query = "select * from propostas where nome = 'Ruan'";
                      $result = mysqli_query($conexao, $query);
                      //$dado = mysqli_fetch_array($result);
                      $row = mysqli_num_rows($result);

                      if ($row == '') {

                        echo "<h5> 0 </h5>";
                      } else {
                        echo "<h5> $row </h5>";
                      }
                      ?>

                    <p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer ">
              <hr>
              <div class="stats">
                <i class="fa fa-money "></i> Média de vendas diárias
              </div>
            </div>
          </div>
      </a>
    </div>
    <a href="propostas.php?buttonOcAtendidas=" style="text-decoration:none">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-body ">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                  <i class="fa fa-bar-chart text-success"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">Média de vendas diárias</p>
                  <p class="card-title">

                    <?php

                    $query = "select * from propostas where nome = 'Ruan'";
                    $result = mysqli_query($conexao, $query);
                    //$dado = mysqli_fetch_array($result);
                    $row = mysqli_num_rows($result);

                    if ($row == '') {

                      echo "<h5> 0 </h5>";
                    } else {
                      echo "<h5> $row </h5>";
                    }
                    ?>

                  <p>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="stats">
              <i class="fa fa-bar-chart"></i> Total de média diária
            </div>
          </div>
        </div>
    </a>
  </div>
  <a href="propostas.php?buttonpetsemvacina=" style="text-decoration:none">
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-warning">
                <i class="fa fa-circle-o-notch text-primary"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                <p class="card-category">Valor das propostas</p>
                <p class="card-title">

                  <?php

                  $query = "select * from propostas where status = 'Pendente'";
                  $result = mysqli_query($conexao, $query);
                  //$dado = mysqli_fetch_array($result);
                  $row = mysqli_num_rows($result);

                  if ($row == '') {

                    echo "<h5> 0 </h5>";
                  } else {
                    echo "<h5> $row </h5>";
                  }
                  ?>


                <p>

              </div>
            </div>
          </div>
        </div>

        <div class="card-footer ">
          <hr>
          <div class="stats">
            <i class="fa fa-circle-o-notch "></i> Média do valor das propostas
          </div>
        </div>
      </div>
  </a>
  </div>
  </div>













  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5>Propostas registradas <span style="color:white;" class="badge bg-secondary">HOJE</span></h5>

            <div class="btn-group" role="group" aria-label="Basic example">
              <form class="form-inline my-2 my-lg-0">
                <button name="buttonOcAtendidas" type="submit" class="btn btn-primary">Mais alta</button>
                <form>

                  <form class="form-inline my-2 my-lg-0">
                    <button name="buttonOcNaoAtendidas" type="submit" class="btn btn-primary">Mais baixa</button>
                    <form>


                      <form class="form-inline my-2 my-lg-0">
                        <button name="buttonPesquisar" type="submit" class="btn btn-primary">Todas</button>
                        <form>

            </div>



          </div>
          <div class="card-body">
            <div class="table-responsive">


              <!--LISTAR TODAS AS OCORRÊNCIAS -->

              <?php

              // novo codigo ( procurar ocorrência pelo nome)
              if (isset($_GET['buttonPesquisar'])) {
                $query = "select * from propostas where data = curdate()";
              }

              // novo codigo ( procurar por propostas pendentes)
              else if (isset($_GET['buttonOcAtendidas'])) {
                $nome = 'Pendentes';
                $query = "select * from propostas where status = '$nome'  and data = curdate()";
              }
              // novo codigo ( procurar por propostas nao adotados)
              else if (isset($_GET['buttonOcNaoAtendidas'])) {
                $nome = 'Finalizada';
                $query = "select * from propostas where status = '$nome'  and data = curdate()";
              }
              // novo codigo ( procurar por propostas sem nenhuma vacina)
              else if (isset($_GET['buttonpetsemvacina'])) {
                $nome = '';
                $query = "select * from propostas where status = '$nome'";
              }


              //final do código

              else {
                $query = "select * from propostas where data = curdate()   order by data asc ";
              }





              $result = mysqli_query($conexao, $query);
              //$dado = mysqli_fetch_array($result);
              $row = mysqli_num_rows($result);

              if ($row == '') {

                echo "<h3> Não existem dados cadastrados no banco </h3>";
              } else {

              ?>



                <table class="table">
                  <thead class=" text-primary">

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
                      Tabela
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
                      Status
                    </th>
                    
                    
                    
                    <th>
                      Ações
                    </th>
                  </thead>
                  <tbody>

                    <?php

                    while ($res_1 = mysqli_fetch_array($result)) {
                      $nome = $res_1["nome"];
                      $cpf = $res_1["cpf"];
                      $operacao = $res_1["operacao"];
                      $tabela = $res_1["tabela"];
                      $convenio = $res_1["covenio"];
                      $banco = $res_1["banco"];
                      $valor = $res_1["valor"];
                      $promotora = $res_1["promotora"];
                      $usuario = $res_1["idusuario"];
                      $status = $res_1["status"];
                      $id = $res_1["idpropostas"];
                      $nomeexcluido = $nome; // Variavel criada somente para enviar LOG do nome do pet que foi excluído





                    ?>

                      <tr>
                        <td><?php echo $nome; ?></td>
                        <td><?php echo  $cpf; ?></td>
                        <td><?php echo  $operacao;  ?></td>
                        <td><?php echo $tabela;  ?></td>
                        <td><?php echo $convenio; ?></td>
                        <td><?php echo $banco; ?></td>
                        <td><?php echo  $valor; ?></td>
                        <td><?php echo  $promotora; ?></td>
                        <td><?php echo  $usuario; ?></td>
                        
                        



                        <?php
                        if ($status == "Pendente") : ?>
                          <td class="badge badge-pill badge-warning"><?php echo $status; ?></td>
                        <?php
                        endif;

                        ?>
                        <?php
                        if ($status == "Finalizada") : ?>
                          <td class="badge badge-pill badge-success"><?php echo $status; ?></td>
                        <?php
                        endif;

                        ?>
                        <?php
                        if ($status == "Cancelada") : ?>
                          <td class="badge badge-pill badge-danger"><?php echo $status; ?></td>
                        <?php
                        endif;

                        ?>



                        <td>
                          <a class="btn btn-info" href="propostas.php?func=edita&id=<?php echo $id; ?>"><i class="fa fa-pencil-square-o"></i></a>

                          <a class="btn btn-danger" href="propostas.php?func=deleta&id=<?php echo $id; ?>"><i class="fa fa-minus-square"></i></a>

                          <br>




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
      </div>

    </div>


    <!-- início de tabelas que ficam em baixo de Propostas registradas -->

    <div class="row">
      <div class="col-md-4">
        <div class="card ">
          <div class="card-header ">
            <h5 class="card-title">Email Statistics</h5>
            <p class="card-category">Last Campaign Performance</p>
          </div>
          <div class="card-body ">
            <canvas id="chartEmail"></canvas>
          </div>
          <div class="card-footer ">
            <div class="legend">
              <i class="fa fa-circle text-primary"></i> Opened
              <i class="fa fa-circle text-warning"></i> Read
              <i class="fa fa-circle text-danger"></i> Deleted
              <i class="fa fa-circle text-gray"></i> Unopened
            </div>
            <hr>
            <div class="stats">
              <i class="fa fa-calendar"></i> Number of emails sent
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card card-chart">
          <div class="card-header">
            <h5 class="card-title">NASDAQ: AAPL</h5>

            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title"> Simple Table</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" text-primary">
                          <th>
                            Name
                          </th>
                          <th>
                            Country
                          </th>
                          <th>
                            City
                          </th>
                          <th class="text-right">
                            Salary
                          </th>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              Dakota Rice
                            </td>
                            <td>
                              Niger
                            </td>
                            <td>
                              Oud-Turnhout
                            </td>
                            <td class="text-right">
                              $36,738
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Minerva Hooper
                            </td>
                            <td>
                              Curaçao
                            </td>
                            <td>
                              Sinaai-Waas
                            </td>
                            <td class="text-right">
                              $23,789
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Sage Rodriguez
                            </td>
                            <td>
                              Netherlands
                            </td>
                            <td>
                              Baileux
                            </td>
                            <td class="text-right">
                              $56,142
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Philip Chaney
                            </td>
                            <td>
                              Korea, South
                            </td>
                            <td>
                              Overland Park
                            </td>
                            <td class="text-right">
                              $38,735
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Doris Greene
                            </td>
                            <td>
                              Malawi
                            </td>
                            <td>
                              Feldkirchen in Kärnten
                            </td>
                            <td class="text-right">
                              $63,542
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Mason Porter
                            </td>
                            <td>
                              Chile
                            </td>
                            <td>
                              Gloucester
                            </td>
                            <td class="text-right">
                              $78,615
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Jon Porter
                            </td>
                            <td>
                              Portugal
                            </td>
                            <td>
                              Gloucester
                            </td>
                            <td class="text-right">
                              $98,615
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Final de tabelas que ficam em baixo de Propostas registradas -->




    </head>

    <body>






      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li>
                  <a href="https://wa.link/1quja8" target="_blank">SUPORTE</a>
                </li>
              </ul>
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script>, CRM CORBAN <i class="fa fa-heart heart"></i>
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