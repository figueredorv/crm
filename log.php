<?php
session_start();
include('conexao.php');
include('verificar_login.php');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Log de Atividades</title>


<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
 
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>



</head>


<body>



  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="painel_admin.php"><big><big><i class="fa fa-arrow-left"></i></big></big></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav mr-auto">
      
    </ul>
    


    <form class="form-inline my-2 my-lg-0">
      <input name="txtpesquisar" class="form-control mr-sm-2" type="search" placeholder="Buscar pelo Nome" aria-label="Pesquisar">
      <button name="buttonPesquisar" class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
      
    </form>


        


  </div>

     



</nav>



<div class="container">


    

      <br>




          <div class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title"> LOG DE USUÁRIOS</h4>
                    
                  </div>
                  <div class="card-body">
                    <div class="table-responsive" >
                      

                      <!--LISTAR TODAS USUÁRIOSS -->

                      <?php

                        // novo codigo ( procurar usuários pelo nome)
                        if(isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] != ''){
                          $nome = $_GET['txtpesquisar'] . '%';
                           $query = "select * from loguser where nome LIKE '$nome'  order by nome asc"; 
                           // novo codigo ( procurar usuários pelo protocolo)
                        }
                        
                       
                        


                        //final do código

                        else{ 
                         $query = "select * from loguser order by data desc"; 
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
                            Ação
                          </th>
                          <th>
                            Data 
                          </th>
                           
                           </th>
                      
                        </thead>
                        <tbody>
                         
                         <?php 

                          while($res_1 = mysqli_fetch_array($result)){
                            $nome = $res_1["nome"];
                            $acao = $res_1["acao"];
                            $data = $res_1["data"];
                            $id = $res_1["id"];

                            

                            

                            ?>

                            <tr>

                             <td><?php echo $nome; ?></td> 
                             <td><?php echo $acao; ?></td>
                             <td><?php echo $data; ?></td>
                             
                             
                             

                                 
          

                             
                             
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




 <!-- Modal -->
      <div id="modalExemplo" class="modal fade" role="dialog">
        <div class="modal-dialog">
         <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title">Registrar usuarios.</h4> 
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form method="POST" action="">
              <div class="form-group">
                <label for="id_produto">Nome</label>
                <input type="text" class="form-control mr-2" name="txtnome" placeholder="Nome" required>
              </div>
              <div class="form-group">
                <label for="id_produto">Usuario</label>
                <input type="text" class="form-control mr-2" name="txtusuario" id="txtusuario" placeholder="Usuário" required>
              </div>
              <div class="form-group">
                <label for="quantidade">Senha</label>
                <input type="text" class="form-control mr-2" name="txtsenha" placeholder="Senha" required>
              </div>
               <div class="form-group">
                <label for="fornecedor">Cargo</label>
                 <input type="text" class="form-control mr-2" name="txtcargo" placeholder="Descrição" required>
              </div>
              




              
            </div>
                   
            <div class="modal-footer">
               <button type="submit" class="btn btn-success mb-3" name="button">Salvar </button>


                <button type="button" class="btn btn-danger mb-3" data-dismiss="modal">Cancelar </button>
            </form>

            
</form>

            </div>
          </div>
        </div>
      </div>    




</body>
</html>













