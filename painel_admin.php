<?php 

session_start();
include('verificar_login.php');
include('conexao.php');


if($_SESSION['cargo_usuario'] != 'Administrador' && $_SESSION['cargo_usuario'] != 'Desenvolvedor'){
	header('Location:index.php');
	exit();
}

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
    DEFESA CIVIL
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
            <img src="https://cdn-icons-png.flaticon.com/512/6941/6941697.png">
          </div>
        </a>
        <a href="" class="simple-text logo-normal">
          PAINEL ADMIN
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
      
        <ul class="nav">


          <li class="">
          <a href="usuarios.php">
          <i class="nc-icon nc-single-02"></i>
          <p>Usuarios</p>
          </a>
          </li>



        
          
          <ul class="nav">
        <li class="">
            <a href="log.php">
              <i class="fa fa-file-text-o"></i>
              <p>LOG DE USUÁRIOS</p>
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
                if($_SESSION['cargo_usuario'] == 'Administrador' || $_SESSION['cargo_usuario'] == 'Desenvolvedor'){
                  

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


<a href ="" style="text-decoration:none"> 
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="bi bi-cone-striped"></i>
                      <i class="fa fa-money text-success "></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Entradas</p>
                      <p class="card-title">

                      <?php 

                      $resultado = mysqli_query($conexao, "SELECT sum(valor) FROM financeiro WHERE tipo = 'Entrada'");
                      $linhas = mysqli_num_rows($resultado);


                      while($linhas = mysqli_fetch_array($resultado)){
                       $linha = $linhas['sum(valor)'];
                        echo 'R$'. number_format($linha, 0, ',', '.');
                              
                              ?>

                              <?php
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
                  <i class="fa fa-money "></i> Total de entradas
                </div>
              </div>
            </div>
            </a>
          </div>
          <a href ="" style="text-decoration:none">          
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="fa fa-external-link-square text-danger"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Saídas </p>
                      <p class="card-title">
                        
                      <?php 

                    $resultado = mysqli_query($conexao, "SELECT sum(valor) FROM financeiro WHERE tipo = 'Saida'");
                    $linhas = mysqli_num_rows($resultado);
                    

                      while($linhas = mysqli_fetch_array($resultado)){
                        $linha = $linhas['sum(valor)'];
                        echo 'R$'. number_format($linha, 2, ',', '.');
                              
                              ?>

                              <?php
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
                  <i class="fa fa-external-link-square "></i> Total de despesas
                </div>
              </div>
            </div>
            </a>
          </div>
          
          <a href ="" style="text-decoration:none"> 
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="fa fa-handshake-o text-primary"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Doações</p>
                      <p class="card-title"> 
                        
                      <?php 

                      $resultado = mysqli_query($conexao, "SELECT sum(valor) FROM doacoes");
                      $linhas = mysqli_num_rows($resultado);


                      while($linhas = mysqli_fetch_array($resultado)){
                        $linha = $linhas['sum(valor)'];
                        echo 'R$'. number_format($linha, 1, ',', '.');
                              
                              ?>

                              <?php
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
                  <i class="fa fa-handshake-o"></i> Total de doações
                </div>
              </div>
            </div>
            </a> 
          </div>
        </div>
        
        
      
        <a class="btn btn-primary" href="financeiro.php" role="button">Financeiro</a> 
        <a class="btn btn-primary" href="doacoes-adm.php" role="button">Doações</a>
                          
       



<!-- Content Row -->
<div class="row">


<!-- Content Column -->
<div class="col-lg-6 mb-4">



    <!-- Project Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Dashboard</h6>
        </div>
        <div class="card-body">
            <h4 class="small font-weight-bold">Total de animais registrados <span
                    class="float-right">
                  
                  
                    <?php 

                      $query = "select * from animais order by nome asc"; 
                      $result = mysqli_query($conexao, $query);
                      //$dado = mysqli_fetch_array($result);
                      $row = mysqli_num_rows($result);
                      
                      if($row == ''){

                          echo "<h5> 0 </h5>";

                      }else{
                        echo "<h5> $row </h5>";
                      }
                        ?>
                  
                  
                  </span></h4>
            <div class="progress mb-4">
                <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo "$row"."%" ?>"
                    aria-valuenow="<?php echo "$row"."%" ?>" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <h4 class="small font-weight-bold">Total de animais disponíveis para adoção <span
                    class="float-right">
                  
                    <?php 

                    $query = "select * from animais where situacao = 'Disponivel'"; 
                    $result = mysqli_query($conexao, $query);
                    //$dado = mysqli_fetch_array($result);
                    $row = mysqli_num_rows($result);

                    if($row == ''){

                      echo "<h5> 0 </h5>";

                    }else{
                      echo "<h5> $row </h5>";
                    }
                      ?>
                  
                  
                  </span></h4>
            <div class="progress mb-4">
                <div class="progress-bar bg-warning" role="progressbar" style="width:  <?php echo "$row"."%" ?>"
                    aria-valuenow="<?php echo "$row"."%" ?>" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <h4 class="small font-weight-bold">Total de animais adotados <span
                    class="float-right">
                  
                    <?php 

                    $query = "select * from animais where situacao = 'Adotado'"; 
                    $result = mysqli_query($conexao, $query);
                    //$dado = mysqli_fetch_array($result);
                    $row = mysqli_num_rows($result);

                    if($row == ''){

                      echo "<h5> 0 </h5>";

                    }else{
                      echo "<h5> $row </h5>";
                    }
                      ?>
                  
                  </span></h4>
            <div class="progress mb-4">
                <div class="progress-bar" role="progressbar"  style="width:  <?php echo "$row"."%" ?>"
                    aria-valuenow="<?php echo "$row"."%"?>" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <h4 class="small font-weight-bold">Total de animais castrados<span
                    class="float-right">
                  
                    <?php 

                    $query = "select * from animais where castrado = 'Sim'"; 
                    $result = mysqli_query($conexao, $query);
                    //$dado = mysqli_fetch_array($result);
                    $row = mysqli_num_rows($result);

                    if($row == ''){

                      echo "<h5> 0 </h5>";

                    }else{
                      echo "<h5> $row </h5>";
                    }
                      ?>
                  
                  </span></h4>
            <div class="progress mb-4">
            <div class="progress-bar bg-success" role="progressbar"  style="width:  <?php echo "$row"."%" ?>"
                    aria-valuenow="<?php echo "$row"."%" ?>" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div>
</div>



<div class="col-lg-6 mb-4">

    <!-- Illustrations -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Informações</h6>
        </div>
        <div class="card-body">
            <div class="text-center">
                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                    src="img/undraw_posting_photo.svg" alt="...">
            </div>
            <p>Aqui é o seu painel administrativo. 
                Nessa página é onde você encontra as informações de gerenciamento do seu sistema! 
                Caso precise de ajuda, entre em contato com o suporte no link abaixo.</p>
            <a target="_blank" rel="nofollow" href="https://wa.link/1quja8">Preciso de ajuda! &rarr;</a>
        </div>
    </div>


</div>
</div>











      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li>
                  <a href="" target="_blank"></a>
                </li>
                <li>
                  <a href="" target="_blank"></a>
                </li>
              </ul>
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script>,  Anjos de quatro patas <i class="fa fa-heart heart"></i> 
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