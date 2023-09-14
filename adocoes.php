<?php
session_start();
include('conexao.php');
include('verificar_login.php');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Adoções</title>


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
  <a class="navbar-brand" href="painel_funcionario.php"><big><big><i class="fa fa-arrow-left"></i></big></big></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav mr-auto">
      
    </ul>
    


    <form class="form-inline my-2 my-lg-0">
      <input name="txtpesquisar" class="form-control mr-sm-2" type="search" placeholder="Buscar nome do animal" aria-label="Pesquisar">
      <button name="buttonPesquisar" class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
      
    </form>


        


  </div>

     



</nav>



<div class="container">


    

      <br>


      <div class="row">
             

          
      </div>


          <div class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Animais adotados</h4>
                    
                  </div>
                  <div class="card-body">
                    <div class="table-responsive" >
                      

                      <!--LISTAR TODAS USUÁRIOSS -->

                      <?php

                        // novo codigo ( procurar adções pelo nome do animal)
                        if(isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] != ''){
                          $nome = $_GET['txtpesquisar'] . '%';
                           $query = "select * from adocoes where nomeanimal LIKE '$nome'"; 
                           
                        }
                        
                       
                        


                        //final do código

                        else{ 
                         $query = "select * from adocoes"; 
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
                           Nome do animal
                          </th>
                          <th>
                           Espécie
                          </th>
                          <th>
                           Nome do tutor
                          </th>
                          <th>
                            Cpf
                          </th>
                           <th>
                            Endereço
                          </th>
                          <th>
                            Telefone
                          </th>
                           </th>
                            <th>
                            Ações
                          </th>
                        </thead>
                        <tbody>
                         
                         <?php 

                          while($res_1 = mysqli_fetch_array($result)){
                            $nomeanimal = $res_1["nomeanimal"];
                            $especie = $res_1["especie"];
                            $nometutor = $res_1["nometutor"];
                            $cpf = $res_1["cpftutor"];
                            $endereco = $res_1["enderecotutor"];
                            $telefone = $res_1["telefone"];
                            $id = $res_1["id"];
                            

                            

                            

                            ?>

                            <tr>

                             <td><?php echo $nomeanimal; ?></td> 
                             <td><?php echo $especie; ?></td>
                             <td><?php echo $nometutor; ?></td>
                             <td><?php echo $cpf; ?></td>
                             <td><?php echo $endereco; ?></td>
                             <td><?php echo $telefone; ?></td>
                             
                             

                                 
          

                             
                             <td>
                             <a class="btn btn-info" href="adocoes.php?func=edita&id=<?php echo $id; ?>"><i class="fa fa-pencil-square-o"></i></a>

                             <a  class="btn btn-danger" href="adocoes.php?func=deleta&id=<?php echo $id; ?>"><i class="fa fa-minus-square"></i></a>

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




 <!-- Modal -->
      <div id="modalExemplo" class="modal fade" role="dialog">
        <div class="modal-dialog">
         <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title">Registrar adoações.</h4> 
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form method="POST" action="">
              <div class="form-group">
                <label for="id_produto">Nome</label>
                <input type="text" class="form-control mr-2" name="txtnome" placeholder="Nome" required>
              </div>
              <div class="form-group">
                <label for="id_produto">Endereço</label>
                <input type="text" class="form-control mr-2" name="txtendereco" id="txtendereco" placeholder="Endereço" required>
              </div>
              <div class="form-group">
                <label for="quantidade">Cpf</label>
                <input type="text" class="form-control mr-2" name="txtcpf"  id="txtcpf" placeholder="Cpf" required>
              </div>
               <div class="form-group">
                <label for="fornecedor">Valor</label>
                 <input type="text" class="form-control mr-2" name="txtvalor" placeholder="Valor" required>
              </div>
              
              <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="inputGroupSelect01">Tipo da operação</label>
                        </div>
                        <select name="tipo" class="custom-select" id="inputGroupSelect01">
                          <option seleced value="1">Doação</option>
                        </select>
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




<!--CADASTRAR -->


  
  

 




<!--EXCLUIR -->
<?php
if(@$_GET['func'] == 'deleta'){
  $id = $_GET['id'];
  $query = "DELETE FROM adocoes where id = '$id'";
  mysqli_query($conexao, $query);
  echo "<script language='javascript'> window.location='adocoes.php'; </script>";
}
?>



<!--EDITAR -->
<?php
if(@$_GET['func'] == 'edita'){  
$id = $_GET['id'];
$query = "select * from adocoes where id = '$id'";
$result = mysqli_query($conexao, $query);

 while($res_1 = mysqli_fetch_array($result)){


?>

  <!-- Modal -->
      <div id="modalEditar" class="modal fade" role="dialog">
        <div class="modal-dialog">
         <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title">Editar adoção</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form method="POST" action="">
              <div class="form-group">
                <label for="id_produto">Nome do animal</label>
                <input type="text" class="form-control mr-2" name="txtnomeanimal" placeholder="txtnomeanimal" value="<?php echo $res_1['nomeanimal']; ?>" required>
              </div>
              <div class="form-group">
                <label for="id_produto">Espécie</label>
                <input type="text" class="form-control mr-2" name="txtespecie" id="txtespecie" placeholder="Espécie" value="<?php echo $res_1['especie']; ?>" required>
              </div>
              <div class="form-group">
                <label for="quantidade">Nome do tutor</label>
                <input type="text" class="form-control mr-2" name="txtnometutor"  id="txtnometutor" placeholder="Nome do tutor" value="<?php echo $res_1['nometutor']; ?>" required>
              </div>
               <div class="form-group">
                <label for="fornecedor">Cpf</label>
                 <input type="text" class="form-control mr-2" name="txtcpftutor" placeholder="Cpf do tutor" value="<?php echo $res_1['cpftutor']; ?>" required>
              </div>

              <div class="form-group">
                <label for="fornecedor">Endereço</label>
                 <input type="text" class="form-control mr-2" name="txtendereco" placeholder="Endereço do tutor" value="<?php echo $res_1['enderecotutor']; ?>" required>
              </div>

              <div class="form-group">
                <label for="fornecedor">Telefone</label>
                 <input type="text" class="form-control mr-2" name="txttelefone" placeholder="Telefone do tutor" value="<?php echo $res_1['telefone']; ?>" required>
              </div>
                
              

            <div class="modal-footer">
               <button type="submit" class="btn btn-success mb-3" name="buttonEditar">Salvar </button>


                <button type="button" class="btn btn-danger mb-3" data-dismiss="modal">Cancelar </button>
            </form>
            </div>
          </div>
        </div>
      </div>    

 

 <script> $("#modalEditar").modal("show"); </script> 

<!--Comando para editar os dados UPDATE -->
<?php
if(isset($_POST['buttonEditar'])){
  $nomeanimal = $_POST['txtnomeanimal'];
  $especie = $_POST['txtespecie'];
  $nometutor = $_POST['txtnometutor'];
  $cpf = $_POST['txtcpftutor'];
  $endereco = $_POST['txtendereco'];
  $telefone = $_POST['txttelefone'];



                           
                           




$query_editar = "UPDATE adocoes set nomeanimal = '$nomeanimal', especie = '$especie', nometutor = '$nometutor', cpftutor = '$cpf', enderecotutor = '$endereco' , telefone = '$telefone' where id = '$id' ";

$result_editar = mysqli_query($conexao, $query_editar);

if($result_editar == ''){
  echo "<script language='javascript'> window.alert('Ocorreu um erro ao Editar!'); </script>";
}else{
    echo "<script language='javascript'> window.alert('Editado com Sucesso!'); </script>";
    echo "<script language='javascript'> window.location='adocoes.php'; </script>";
}

}
?>


<?php } }  ?>


<!--MASCARAS-->


<script type="text/javascript">
    $(document).ready(function(){
      $('#txtcpf').mask('000.000.000-00'); // Másrcara para o input do cpf 
      //$('#txtdata').mask('0000-00-00'); 
      });
</script>





</script>

   