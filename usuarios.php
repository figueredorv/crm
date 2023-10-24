<?php
session_start();
include('conexao.php');
include('verificar_login.php');
?>

<!DOCTYPE html>
<html>

<head>
  <title>Ocorrências</title>


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
            <button type="button" class="btn btn-secondary mb-3" data-toggle="modal" data-target="#modalExemplo">Novo usuário </button>



          </div>



        </div>


        <div class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title"> Cadastrar novo usuário</h4>

                </div>
                <div class="card-body">
                  <div class="table-responsive">


                    <!--LISTAR TODAS USUÁRIOSS -->

                    <?php

                    // novo codigo ( procurar usuários pelo nome)
                    if (isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] != '') {
                      $nome = $_GET['txtpesquisar'] . '%';
                      $query = "select * from usuarios where nome LIKE '$nome'  order by nome asc";
                      // novo codigo ( procurar usuários pelo protocolo)
                    }





                    //final do código

                    else {
                      $query = "select * from usuarios order by nome asc";
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
                            Usuário
                          </th>
                          <th>
                            Senha
                          </th>
                          <th>
                            Cargo
                          </th>
                          </th>
                          <th>
                            Ações
                          </th>
                        </thead>
                        <tbody>

                          <?php

                          while ($res_1 = mysqli_fetch_array($result)) {
                            $nome = $res_1["nome"];
                            $usuario = $res_1["usuario"];
                            $senha = $res_1["senha"];
                            $cargo = $res_1["cargo"];
                            $id = $res_1["idusuarios"];





                          ?>

                            <tr>

                              <td><?php echo $nome; ?></td>
                              <td><?php echo $usuario; ?></td>
                              <td><?php echo $senha; ?></td>
                              <td><?php echo $cargo; ?></td>







                              <td>
                                <a class="btn btn-info" href="usuarios.php?func=edita&id=<?php echo $id; ?>"><i class="fa fa-pencil-square-o"></i></a>

                                <a class="btn btn-danger" href="usuarios.php?func=deleta&id=<?php echo $id; ?>"><i class="fa fa-minus-square"></i></a>

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

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Nível de acesso</label>
                      </div>
                      <select name="tipo" class="custom-select" id="inputGroupSelect01">
                        <?php
                        // Query para buscar os valores do banco de dados
                        $sql = "SELECT idcargos, cargo FROM cargos";
                        $result = $conexao->query($sql);
                        if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                            $id = $row["idcargos"];
                            $cargo = $row["cargo"];
                            echo "<option value=\"$id\">$cargo</option>";
                          }
                        } else {
                          echo "<option value=\"\">Nenhum resultado encontrado</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <small class="text-muted"> Nível de acesso ao sistema</small>
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
if (isset($_POST['button'])) {
  $nome = $_POST['txtnome'];
  $usuario = $_POST['txtusuario'];
  $senha = $_POST['txtsenha'];
  $cargo = $_POST['tipo'];


  if ($_POST["tipo"] == "1") {
    $cargo = "Operador";
  }
  if ($_POST["tipo"] == "2") {
    $cargo = "Adm";
  }
  if ($_POST["tipo"] == "3") {
    $cargo = "Master";
  }

  //VERIFICAR SE O PROTOCOLO JÁ ESTÁ CADASTRADO
  $query_verificar = "select * from usuarios where usuario = '$usuario' ";

  $result_verificar = mysqli_query($conexao, $query_verificar);
  $row_verificar = mysqli_num_rows($result_verificar);

  if ($row_verificar > 0) {
    echo "<script language='javascript'> window.alert('Usuário já Cadastrado!'); </script>";
    exit();
  }


  $query = "INSERT into usuarios (nome, usuario, senha, cargo) VALUES ('$nome', '$usuario', '$senha', '$cargo')";

  $result = mysqli_query($conexao, $query);

  if ($result == '') {
    echo "<script language='javascript'> window.alert('Ocorreu um erro ao Cadastrar!'); </script>";
  } else {
    echo "<script language='javascript'> window.alert('Salvo com Sucesso!'); </script>";
    echo "<script language='javascript'> window.location='usuarios.php'; </script>";
  }
}
?>


<!--EXCLUIR -->
<?php
if (@$_GET['func'] == 'deleta') {
  $id = $_GET['id'];
  $query = "DELETE FROM usuarios where idusuarios = '$id'";
  mysqli_query($conexao, $query);
  echo "<script language='javascript'> window.location='usuarios.php'; </script>";
}
?>



<!--EDITAR -->
<?php
if (@$_GET['func'] == 'edita') {
  $id = $_GET['id'];
  $query = "select * from usuarios where idusuarios = '$id'";
  $result = mysqli_query($conexao, $query);

  while ($res_1 = mysqli_fetch_array($result)) {


?>

    <!-- Modal -->
    <div id="modalEditar" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">

            <h4 class="modal-title">Editar usuário</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form method="POST" action="">
              <div class="form-group">
                <label for="id_produto">Nome</label>
                <input type="text" class="form-control mr-2" name="txtnome" placeholder="Nome" value="<?php echo $res_1['nome']; ?>" required>
              </div>
              <div class="form-group">
                <label for="id_produto">Usuário</label>
                <input type="text" class="form-control mr-2" name="txtusuario" id="txtusuario" placeholder="Usuário" value="<?php echo $res_1['usuario']; ?>" required>
              </div>
              <div class="form-group">
                <label for="quantidade">Senha</label>
                <input type="text" class="form-control mr-2" name="txtsenha" placeholder="Senha" value="<?php echo $res_1['senha']; ?>" required>
              </div>

              <div class="form-group">
                    <label for="inputCanal">Cargo</label>
                    <select name="tipo" id="tipo" class="form-control canais required cadVenda select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                    <?php
                        // Query para buscar os valores do banco de dados
                        $sql = "SELECT idcargos, cargo FROM cargos";
                        $result = $conexao->query($sql);
                        if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                            $idcargos = $row["idcargos"];
                            $cargo = $row["cargo"];
                            echo "<option value=\"$idcargos\">$cargo</option>";
                          }
                        } else {
                          echo "<option value=\"\">Nenhum resultado encontrado</option>";
                        }
                        ?>
                    </select>
                  </div>


             
          </div>



          <div class="modal-footer">
            <button type="submit" class="btn btn-success mb-3" name="buttonEditar">Salvar </button>


            <button type="button" class="btn btn-danger mb-3" data-dismiss="modal">Cancelar </button>
            </form>
          </div>
        </div>
      </div>
    </div>



    <script>
      $("#modalEditar").modal("show");
    </script>

    <!--Comando para editar os dados UPDATE -->
    <?php
    if (isset($_POST['buttonEditar'])) {
      $nome = $_POST['txtnome'];
      $usuario = $_POST['txtusuario'];
      $senha = $_POST['txtsenha'];
      $cargo = $_POST['tipo'];


      if ($_POST["tipo"] == "1") {
        $cargo = "Operador";
      }
      if ($_POST["tipo"] == "2") {
        $cargo = "Adm";
      }
      if ($_POST["tipo"] == "3") {
        $cargo = "Master";
      }      







      $query_editar = "UPDATE usuarios set nome = '$nome', usuario = '$usuario', senha = '$senha', cargo = '$cargo' where idusuarios = '$id'";

      $result_editar = mysqli_query($conexao, $query_editar);

      if ($result_editar == '') {
        echo "<script language='javascript'> window.alert('Ocorreu um erro ao Editar!'); </script>";
      } else {
        echo "<script language='javascript'> window.alert('Editado com Sucesso!'); </script>";
        echo "<script language='javascript'> window.location='usuarios.php'; </script>";
      }
    }
    ?>


<?php }
}  ?>


<!--MASCARAS-->





</script>