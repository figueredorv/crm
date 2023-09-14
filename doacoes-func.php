<?php
session_start();
include('conexao.php');
include('verificar_login.php');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Doações financeiras</title>


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
      <input name="txtpesquisar" class="form-control mr-sm-2" type="search" placeholder="Buscar pelo Nome" aria-label="Pesquisar">
      <button name="buttonPesquisar" class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
      
    </form>


        


  </div>

     



</nav>



<div class="container">


    

      <br>


      <div class="row">
           <div class="col-sm-12">
           
           
              <div class="container">
              <div class="row">
              <button type="button" class="btn btn-secondary mb-3" data-toggle="modal" data-target="#modalExemplo"  >Nova Doação </button>
              
              
              
           </div>
             

          
      </div>


          <div class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Doações financeiras</h4>
                    
                  </div>
                  <div class="card-body">
                    <div class="table-responsive" >
                      

                      <!--LISTAR TODAS USUÁRIOSS -->

                      <?php

                        // novo codigo ( procurar usuários pelo nome)
                        if(isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] != ''){
                          $nome = $_GET['txtpesquisar'] . '%';
                           $query = "select * from doacoes where nome LIKE '$nome'  order by nome asc"; 
                           // novo codigo ( procurar usuários pelo protocolo)
                        }
                        
                       
                        


                        //final do código

                        else{ 
                         $query = "select * from doacoes order by nome asc"; 
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
                           Endereço
                          </th>
                          <th>
                            Cpf
                          </th>
                           <th>
                            Valor
                          </th>
                          <th>
                            Tipo
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
                            $endereco = $res_1["endereco"];
                            $cpf = $res_1["cpf"];
                            $valor = $res_1["valor"];
                            $tipo = $res_1["tipo"];
                            $id = $res_1["id"];
                            

                            

                            

                            ?>

                            <tr>

                             <td><?php echo $nome; ?></td> 
                             <td><?php echo $endereco; ?></td>
                             <td><?php echo $cpf; ?></td>
                             <td><?php  echo 'R$'. number_format($valor, 2, ',', '.'); ?></td>
                             <td><?php echo $tipo; ?></td>
                             
                             

                                 
          

                             
                             <td>
                             <a class="btn btn-info" href="doacoes-func.php?func=edita&id=<?php echo $id; ?>"><i class="fa fa-pencil-square-o"></i></a>

                             <a  class="btn btn-danger" href="doacoes-func.php?func=deleta&id=<?php echo $id; ?>"><i class="fa fa-minus-square"></i></a>

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
              
              <h4 class="modal-title">Registrar doações.</h4> 
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

<?php
if(isset($_POST['button'])){
  $nome = $_POST['txtnome'];
  $endereco = $_POST['txtendereco'];
  $cpf = $_POST['txtcpf'];
  $valor = $_POST['txtvalor'];
  $tipo = $_POST['tipo'];
  
  //Marcando o tipo de registro financeiro ( Entrada ou Saída)
  if($_POST["tipo"] == "1"){
    $tipo = "Doação";
  }
  
  
  

 


$query = "INSERT into doacoes (nome, endereco, cpf, valor, tipo) VALUES ('$nome', '$endereco', '$cpf', '$valor', '$tipo')";

$result = mysqli_query($conexao, $query);

if($result == ''){
  echo "<script language='javascript'> window.alert('Ocorreu um erro ao Cadastrar!'); </script>";
}else{
    echo "<script language='javascript'> window.alert('Salvo com Sucesso!'); </script>";
    echo "<script language='javascript'> window.location='doacoes-func.php'; </script>";
}

}
?>


<!--EXCLUIR -->
<?php
if(@$_GET['func'] == 'deleta'){
  $id = $_GET['id'];
  $query = "DELETE FROM doacoes where id = '$id'";
  mysqli_query($conexao, $query);
  echo "<script language='javascript'> window.location='doacoes-func.php'; </script>";
}
?>



<!--EDITAR -->
<?php
if(@$_GET['func'] == 'edita'){  
$id = $_GET['id'];
$query = "select * from doacoes where id = '$id'";
$result = mysqli_query($conexao, $query);

 while($res_1 = mysqli_fetch_array($result)){


?>

  <!-- Modal -->
      <div id="modalEditar" class="modal fade" role="dialog">
        <div class="modal-dialog">
         <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title">Editar transação</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form method="POST" action="">
              <div class="form-group">
                <label for="id_produto">Nome</label>
                <input type="text" class="form-control mr-2" name="txtnome" placeholder="txtnome" value="<?php echo $res_1['nome']; ?>" required>
              </div>
              <div class="form-group">
                <label for="id_produto">Endereço</label>
                <input type="text" class="form-control mr-2" name="txtendereco" id="txtendereco" placeholder="Usuário" value="<?php echo $res_1['endereco']; ?>" required>
              </div>
              <div class="form-group">
                <label for="quantidade">Cpf</label>
                <input type="text" class="form-control mr-2" name="txtcpf"  id="txtcpf" placeholder="Cpf" value="<?php echo $res_1['cpf']; ?>" required>
              </div>
               <div class="form-group">
                <label for="fornecedor">Valor</label>
                 <input type="text" class="form-control mr-2" name="txtvalor" placeholder="Valor" value="<?php echo $res_1['valor']; ?>" required>
              </div>
                
              <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="inputGroupSelect01">Tipo da operação</label>
                        </div>
                        <select name="tipo" class="custom-select" id="inputGroupSelect01">
                          <option seleced value="1">Doação</option>
                        </select>
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
  $nome = $_POST['txtnome'];
  $endereco = $_POST['txtendereco'];
  $cpf = $_POST['txtcpf'];
  $valor = $_POST['txtvalor'];
  $tipo = $_POST['tipo'];


  //Marcando o tipo de movimentação financeira ( entrada ou saída)
  if($_POST["tipo"] == "1"){
    $tipo = "Doação";
  }
  
 




  /*if ($res_1['usuario'] != $usuario){

       //VERIFICAR SE O PROTOCOLO JÁ ESTÁ CADASTRADO
    $query_verificar = "select * from usuarios where usuario = '$usuario' ";

    $result_verificar = mysqli_query($conexao, $query_verificar);
    $row_verificar = mysqli_num_rows($result_verificar);

    if($row_verificar > 0){
    echo "<script language='javascript'> window.alert('Usuário já Cadastrado!'); </script>";
    exit();
    }

  }

 */


$query_editar = "UPDATE doacoes set nome = '$nome', endereco = '$endereco', cpf = '$cpf', valor = '$valor', tipo = '$tipo' where id = '$id' ";

$result_editar = mysqli_query($conexao, $query_editar);

if($result_editar == ''){
  echo "<script language='javascript'> window.alert('Ocorreu um erro ao Editar!'); </script>";
}else{
    echo "<script language='javascript'> window.alert('Editado com Sucesso!'); </script>";
    echo "<script language='javascript'> window.location='doacoes-func.php'; </script>";
}

}
?>


<?php } }  ?>


<!--MASCARAS-->


<script type="text/javascript">
    $(document).ready(function(){
      $('#txtcpf').mask('000.000.000-00'); // Másrcara para o input do cpf 
      });
</script>





</script>

   