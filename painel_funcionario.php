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
    ANJOS DE 4 PATAS
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
        
      


                              <?php 

                              $query = "select * from animais where vacinas = ''"; 
                              $result = mysqli_query($conexao, $query);
                              //$dado = mysqli_fetch_array($result);
                              $row = mysqli_num_rows($result);

                              if($row > 0): ?>
                                  <div class="notice notice-warning"><strong>Atenção!</strong> Existem pets que ainda não foram vacinados.</div>
                             
                            <?php 
                              endif;            
                              ?>




                            

                              

                              

                                

                                



        
      <a href ="animais.php" style="text-decoration:none"> 
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="bi bi-cone-striped"></i>
                      <i class="fa fa-paw text-warning "></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Pets cadastrados</p>
                      <p class="card-title">
                        
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
                        
                    
                    </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-paw"></i> Total de pets cadastrados
                </div>
              </div>
            </div>
            </a>
          </div>
          <a href ="animais.php?buttonOcNaoAtendidas=" style="text-decoration:none">          
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="fa fa-heart text-danger"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Pets disponíveis </p>
                      <p class="card-title">

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

                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-heart "></i> Disponíveis para adoção
                </div>
              </div>
            </div>
            </a>
          </div>
          <a href ="animais.php?buttonOcAtendidas=" style="text-decoration:none">          
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="fa fa-check text-success"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Pets adotados</p>
                      <p class="card-title">

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

                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-check"></i> Pets que já foram adotados
                </div>
              </div>
            </div>
            </a>
          </div>
          <a href ="animais.php?buttonpetsemvacina=" style="text-decoration:none"> 
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="fa fa-stethoscope text-primary"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Não vacinados</p>
                      <p class="card-title"> 

                      <?php 

                        $query = "select * from animais where vacinas = ''"; 
                        $result = mysqli_query($conexao, $query);
                        //$dado = mysqli_fetch_array($result);
                        $row = mysqli_num_rows($result);

                        if($row == ''){

                          echo "<h5> 0 </h5>";

                        }else{
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
                  <i class="fa fa-stethoscope "></i> Pets que ainda não foram vacinados
                </div>
              </div>
            </div>
            </a> 
          </div>
        </div>




        

                        

           




            <div class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card" >
                  <div class="card-header">
                  <h5>Pets registrados <span  style="color:white;" class="badge bg-secondary" >HOJE</span></h5>

                    <div class="btn-group" role="group" aria-label="Basic example">
                    <form class="form-inline my-2 my-lg-0">
                    <button  name= "buttonOcAtendidas" type="submit" class="btn btn-primary">Adotados</button>
                    <form>

                    <form class="form-inline my-2 my-lg-0">
                    <button name= "buttonOcNaoAtendidas" type="submit" class="btn btn-primary">Não adotados</button>
                    <form>


                    <form class="form-inline my-2 my-lg-0">
                    <button name= "buttonPesquisar" type="submit" class="btn btn-primary">Todos</button>
                    <form>
                      
                    </div>
                    


                  </div>
                  <div class="card-body">
                    <div class="table-responsive" >
                      

                      <!--LISTAR TODAS AS OCORRÊNCIAS -->

                      <?php

                        // novo codigo ( procurar ocorrência pelo nome)
                        if(isset($_GET['buttonPesquisar'])){
                           $query = "select * from animais where data = curdate()"; 
                           
                        }
                        
                        // novo codigo ( procurar por animais adotados)
                        else if(isset($_GET['buttonOcAtendidas'])){
                          $nome = 'Adotado';
                          $query = "select * from animais where situacao = '$nome'  and data = curdate()"; 
                       }
                       // novo codigo ( procurar por animais nao adotados)
                       else if(isset($_GET['buttonOcNaoAtendidas'])){
                        $nome = 'Disponivel';
                        $query = "select * from animais where situacao = '$nome'  and data = curdate()"; 
                     }
                        // novo codigo ( procurar por animais sem nenhuma vacina)
                       else if(isset($_GET['buttonpetsemvacina'])){
                        $nome = '';
                        $query = "select * from animais where vacinas = '$nome'"; 
                     }


                        //final do código

                        else{ 
                         $query = "select * from animais where data = curdate()   order by data asc "; 
                        }


                      
                        

                        $result = mysqli_query($conexao, $query);
                        //$dado = mysqli_fetch_array($result);
                        $row = mysqli_num_rows($result);

                        if($row == ''){

                            echo "<h3> Não existem dados cadastrados no banco </h3>";

                        }else{

                           ?>

                          

                      <table class="table">
                        <thead class=" text-primary">
                          
                          <th>
                            Nome
                          </th>
                          <th>
                            Espécie
                          </th>
                          <th>
                            Vacinas
                          </th>
                          <th>
                            Castrado
                          </th>
                           <th>
                            Observação
                          </th>
                            <th>
                            Idade
                          </th>
                           </th>
                          <th>
                            Situação
                          </th>
                           </th>
                            <th>
                            Ações
                          </th>
                        </thead>
                        <tbody>
                         
                         <?php 

                          while($res_1 = mysqli_fetch_array($result)){
                            $nome = $res_1["nome"];
                            $especie = $res_1["especie"];
                            $vacinas= $res_1["vacinas"];
                            $castrado = $res_1["castrado"];
                            $observacao = $res_1["observacao"];
                            $idade = $res_1["idade"];
                            $situacao = $res_1["situacao"];
                            $id = $res_1["id"];
                            $nomeexcluido = $nome; // Variavel criada somente para enviar LOG do nome do pet que foi excluído

                            

                            

                            ?>

                            <tr>

                             <td><?php echo $nome; ?></td> 
                             <td><?php echo $especie; ?></td>
                             <td><?php echo $vacinas;  ?></td> 
                             <td><?php echo $castrado;  ?></td> 
                             <td><?php echo $observacao; ?></td>
                             <td><?php echo $idade; ?></td>
                             
                             

                                  <?php 
                              if($situacao == "Disponivel"): ?>
                                  <td class="badge badge-pill badge-warning" ><?php echo $situacao; ?></td>
                            <?php 
                              endif;
                              
                              ?>
                              <?php 
                              if($situacao == "Adotado"): ?>
                                  <td class="badge badge-pill badge-success" ><?php echo $situacao; ?></td>
                            <?php 
                              endif;
                              
                              ?>
                              <?php 
                              if($situacao == "Cancelada"): ?>
                                  <td class="badge badge-pill badge-danger" ><?php echo $situacao; ?></td>
                            <?php 
                              endif;
                              
                              ?>
          

                             
                             <td>
                             <a class="btn btn-info" href="animais.php?func=edita&id=<?php echo $id; ?>"><i class="fa fa-pencil-square-o"></i></a>

                             <a  class="btn btn-danger" href="animais.php?func=deleta&id=<?php echo $id; ?>"><i class="fa fa-minus-square"></i></a>
                              
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
                </script>, Anjos de quatro patas <i class="fa fa-heart heart"></i> 
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
