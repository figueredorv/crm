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
              <i class="fa fa-search"></i>
              <p>Propostas</p>
            </a>
          </li>

          <li class="dropdown">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">
              <p>Campanhas <i class="fa fa-angle-right"></i></p>
            </a>
            <ul class="dropdown-menu">
              <li><a href="#">Minhas campanhas</a></li>
              <li><a href="#">Atendimento</a></li>
            </ul>
          </li>

          <li class="dropdown">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">
              <p>Relatórios<i class="fa fa-angle-right"></i></p>
            </a>
            <ul class="dropdown-menu">
              <a class="dropdown-item" href="#">Propostas</a>
              <a class="dropdown-item" href="#">Campanhas</a>
            </ul>
          </li>

          <li class="dropdown">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">
              <p>Financeiro<i class="fa fa-angle-right"></i></p>
            </a>
            <ul class="dropdown-menu">
              <a class="dropdown-item" href="#">Comissionamento</a>
              <a class="dropdown-item" href="#">Lançamentos</a>
              <a class="dropdown-item" href="#">Pagamentos</a>
            </ul>
          </li>

          <li class="dropdown">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">
              <p>Administração<i class="fa fa-angle-right"></i></p>
            </a>
            <ul class="dropdown-menu">
              <a class="dropdown-item" href="usuarios.php">Usuários</a>
              <a class="dropdown-item" href="#">Grupos</a>
              <a class="dropdown-item" href="#">Tabelas</a>
              <a class="dropdown-item" href="#">Status</a>
              <a class="dropdown-item" href="#">Promotoras</a>
              <a class="dropdown-item" href="#">Promotoras</a>
              <a class="dropdown-item" href="#">Tabulação</a>
              <a class="dropdown-item" href="#">Canais de vendas</a>
            </ul>
          </li>

          <style>
            .dropdown-toggle::after {
              display: none;
            }
          </style>

          <style>
            .dropdown-menu a {
              text-align: right;
            }
          </style>

          <li class="">
            <a href="documentos.php">
              <i class="fa fa-id-card-o"></i>
              <p>Documentos</p>
            </a>
          </li>



          <li class="">
            <a href="">
              <i class="fa fa-users"></i>
              <p>Bases</p>
            </a>
          </li>



          <li class="">
            <a href="https://jivo.chat/NYZp8NPK3K" target="_blank">
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
              <input type="text" value="" class="form-control" placeholder="Procurar..." name="buttonPesquisar">
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
        // verificando se a coluna status da tabela usuários tem o valor = 0 para mostrar a informação no topo da página de conta DEMO
        $id = $_SESSION['idusuarios']; // recebendo o id
        $query = "SELECT status FROM usuarios WHERE idusuarios = '$id' AND status = 0;";
        $result = mysqli_query($conexao, $query);
        $row = mysqli_num_rows($result);

        if ($row > 0) : ?>
          <div class="notice notice-warning"><strong>Atenção!</strong> Você está em uma conta de teste, todos os dados são apenas fictícios.</div>

        <?php

        endif;
        ?>




        

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
      <a href="#" style="text-decoration:none">
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
                    <p class="card-category">Valor das propostas </p>
                    <p class="card-title">

                      <?php

                      $query = "SELECT SUM(valor) AS total_valor
                      FROM propostas;";
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
                      ?>

                    <p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer ">
              <hr>
              <div class="stats">
                <i class="fa fa-money "></i> Valor das propostas cadastradas
              </div>
            </div>
          </div>
      </a>
    </div>
    <a href="#" style="text-decoration:none">
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
                  <p class="card-category">Média de vendas</p>
                  <p class="card-title">

                    <?php

                    $query = "SELECT AVG(valor) AS media FROM propostas";
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
                    ?>

                  <p>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="stats">
              <i class="fa fa-bar-chart"></i> Média de vendas diária
            </div>
          </div>
        </div>
    </a>
  </div>
  <a href="#" style="text-decoration:none">
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-warning">
                <i class="fa fa-users text-primary"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                <p class="card-category">Total de usuários</p>
                <p class="card-title">

                  <?php

                  $query = "select * from usuarios";
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
            <i class="fa fa-users"></i> Usuários cadastrados na plataforma
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
            <div class="row">
              <div class="col-12">
                <h5>Propostas registradas <span style="color:white;" class="badge bg-secondary">HOJE</span></h5>
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


              <!--LISTAR TODAS AS OCORRÊNCIAS -->

              <?php
              if (isset($_GET['buttonPesquisar'])) {
                $nome = $_GET['buttonPesquisar'] . '%';
                $query = "select * from propostas where nome LIKE '$nome'  order by nome asc";
              }
              // novo codigo ( procurar ocorrência pelo nome)
              else if (isset($_GET['buttonPesquisar'])) {
                $nome = $_GET['buttonPesquisar'] . '%';
                $query = "select * from propostas where nome LIKE '$nome'  order by nome asc where curdate()";
              }

              // novo codigo ( procurar por propostas pendentes)
              else if (isset($_GET['buttonMaisAlta'])) {

                $query = "SELECT *
                FROM propostas
                WHERE data = CURDATE()
                ORDER BY valor DESC
                LIMIT 1;";
              }
              // novo codigo ( procurar por propostas nao adotados)
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
              }


              //final do código

              else {
                $query = "select * from propostas where data = curdate()   order by data asc ";
              }





              $result = mysqli_query($conexao, $query);
              //$dado = mysqli_fetch_array($result);
              $row = mysqli_num_rows($result);

              if ($row == '') {

                echo "<h3> Não existem propostas cadastradas na data de hoje! </h3>";
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
                      $convenio = $res_1["convenio"];
                      $banco = $res_1["banco"];
                      $valor = $res_1["valor"];
                      $promotora = $res_1["promotora"];
                      $usuario_id = $res_1["idusuario"]; // Aqui armazenamos o ID do usuário
                      $statusproposta = $res_1["statusproposta"];
                      $id = $res_1["idpropostas"];


                      // Agora, vamos buscar o nome do usuário com base no ID
                      $query_usuario = "SELECT usuario FROM usuarios WHERE idusuarios = $usuario_id";
                      $result_usuario = mysqli_query($conexao, $query_usuario);
                      $row_usuario = mysqli_fetch_assoc($result_usuario);
                      $nome_usuario = $row_usuario['usuario'];


                    ?>

                      <tr>
                        <td><?php echo $nome; ?></td>
                        <td><?php echo  $cpf; ?></td>
                        <td><?php echo  $operacao;  ?></td>
                        <td><?php echo $tabela;  ?></td>
                        <td><?php echo $convenio; ?></td>
                        <td><?php echo $banco; ?></td>
                        <td><?php echo  $valor . " R$"; ?></td>
                        <td><?php echo  $promotora; ?></td>
                        <td><?php echo  $nome_usuario; ?></td>





                        <?php
                        if ($statusproposta == "PENDENTE") {
                          echo '<td class="badge badge-pill badge-warning">' . $statusproposta . '</td>';
                        } elseif ($statusproposta == "CONCLUÍDA" || $statusproposta == "PAGO") {
                          echo '<td class="badge badge-pill badge-success">' . $statusproposta . '</td>';
                        } elseif ($statusproposta == "CANCELADO" || $statusproposta == "SALDO RETORNADO") {
                          echo '<td class="badge badge-pill badge-danger">' . $statusproposta . '</td>';
                        } else {
                          echo '<td class="badge badge-pill badge-info">' . $statusproposta . '</td>';
                        }
                        ?>



                        <td>
                          <a class="btn btn-info" href="propostas.php?func=editarpropostas&id=<?php echo $id; ?>"><i class="fa fa-pencil-square-o"></i></a>

                          <a class="btn btn-danger" href="painel_funcionario.php?func=deletaproposta&id=<?php echo $id; ?>"><i class="fa fa-minus-square"></i></a>

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
          <!-- início de tabela de usuários mais ativos -->

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h5>Usuário que mais cadastrou <span style="color:white;" class="badge bg-secondary">PROPOSTAS</span></h5>





                </div>
                <div class="card-body">
                  <div class="table-responsive">




                    <?php









                    //contabilizando o usuáio que mais cadastrou propostas
                    $query = "SELECT u.usuario, COALESCE(COUNT(p.idusuario), 0) as propostas
                    FROM usuarios u
                    LEFT JOIN propostas p ON u.idusuarios = p.idusuario
                    GROUP BY u.usuario
                    ORDER BY propostas DESC;";






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
                            Usuário
                          </th>
                          <th>
                            Propostas cadastradas
                          </th>



                        </thead>
                        <tbody>

                          <?php

                          while ($res_1 = mysqli_fetch_array($result)) {
                            $nome = $res_1["usuario"];
                            $propostas = $res_1["propostas"];
                            $nomeexcluido = $nome; // Variavel criada somente para enviar LOG do nome da proposta que foi excluída





                          ?>

                            <tr>
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


          <!-- final de tabela de usuários mais ativos -->

        </div>
      </div>
      <div class="col-md-8">
        <div class="card card-chart">
          <div class="card-header">
            <h5 class="card-title">GRÁFICO</h5>

            <div class="row">
              <div class="col-md-12">


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
                      }
                    };

                    var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
                    chart.draw(data, options);
                  }
                </script>

                <div id="chart_div" style="width: 100%; height: auto;"></div>

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


<!--EXCLUIR PROPOSTA DO CARD DAS PROPOSTAS CRIADAS HOJE DO PAINEL FUNCIONÁRIO -->
<?php
if (@$_GET['func'] == 'deletaproposta') {
  $id = $_GET['id'];
  $query = "DELETE FROM propostas where idpropostas = '$id'";
  mysqli_query($conexao, $query);

  if ($result == '') {
    echo "<script language='javascript'> window.alert('Ocorreu um erro ao excluir!'); </script>";
  } else {

    echo "<script language='javascript'> window.alert('Excluído com Sucesso!'); </script>";
    echo "<script language='javascript'> window.location='painel_funcionario.php'; </script>";
  }
}
?>