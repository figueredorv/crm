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
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">

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
            <img src="https://i.imgur.com/dx8LGUd.png">
          </div>
        </a>
        <a href="" class="simple-text logo-normal">
          ANJOS DE 4 PATAS
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
            <a href="animais.php">
              <i class="fa fa-plus"></i>
              <p>Cadastrar pet</p>
            </a>
          </li>

          
          <li class="">
            <a href="doacoes-func.php">
              <i class="fa fa-money"></i>
              <p>Doações</p>
            </a>
          </li>

          

          <li class="">
            <a href="adocoes.php">
              <i class="fa fa-users"></i>
              <p>Tutores</p>
            </a>
          </li>

          <li class="">
            <a href="mensagens.php">
              <i class="fa fa-light fa-envelope"></i>
              <p>Mensagens</p>
            </a>
          </li>

          <li class="">
          <a href="donate.html"  target="_blank">
              <i class="fa fa-rocket"></i>
              <p>CONTRIBUA</p>
            </a>
          </li>

          <li class="">
            <a href="https://wa.link/1quja8"  target="_blank">
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
                  <a class="dropdown-item" href="logout.php">Sair</a>

                <?php 
                if($_SESSION['cargo_usuario'] == 'Administrador' || $_SESSION['cargo_usuario'] == 'Desenvolvedor'){
                  

                 ?>

                  <a class="dropdown-item" href="painel_admin.php">Painél do Administrador</a>
                 <a class="dropdown-item" href="painel_funcionario.php">Painél do Funcionário</a>

                 <?php } ?>

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
        

                    
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container mt-5 mb-5">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<h4>Útimas atualizações</h4>
			<ul class="timeline">
      <li>
					<a href="#">O sistema será lançado em breve, aguarde!</a>
					<a href="#" class="float-right">20 Março, 2022</a>
					<p> Em breve terá muitas novidades. </p>
				</li>
      
				
			</ul>
		</div>
	</div>
</div>







        
      
    
    




    
  </head>
  <body>
  
      
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
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
