<?php
session_start();
include('conexao.php');
include('verificar_login.php');
?>

<!DOCTYPE html>
<html>

<head>
  <title>Enviar notificação</title>


  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
  <script src="//code.jivosite.com/widget/fgSW8k1Bo7" async></script>

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



   





    </div>





  </nav>



  <div class="container">




    <br>


    <div class="row">
      <div class="col-sm-12">


        <div class="container">
          <div class="row">
            <button type="button" class="btn btn-secondary mb-3" data-toggle="modal" data-target="#modalExemplo">Nova notificação </button>



          </div>



        </div>


        <div class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Notificações</h4>

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
                      $query = "select * from notificacoes order by id asc";
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
                            Título
                          </th>
                          <th>
                           Data
                          </th>
                          <th>
                           Descrição
                          </th>
                          <th>
                          Link
                          </th>
                          </th>
                          <th>
                            Ações
                          </th>
                        </thead>
                        <tbody>

                          <?php

                          while ($res_1 = mysqli_fetch_array($result)) {
                            $titulo = $res_1["titulo"];
                            $data_publicacao = $res_1["data_publicacao"];
                            $descricao = $res_1["descricao"];
                            $link = $res_1["link"];
                            $id = $res_1["id"];





                          ?>

                            <tr>

                              <td><?php echo $titulo; ?></td>
                              <td><?php echo $data_publicacao; ?></td>
                              <td><?php echo $descricao; ?></td>
                              <td><?php echo  $link; ?></td>







                              <td>
                                <a class="btn btn-info" href="novanotificacao.php?func=edita&id=<?php echo $id; ?>"><i class="fa fa-pencil-square-o"></i></a>

                                <a class="btn btn-danger" href="novanotificacao.php?func=deleta&id=<?php echo $id; ?>"><i class="fa fa-minus-square"></i></a>

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

                  <h4 class="modal-title">Enviar notificação.</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="">
                    <div class="form-group">
                      <label for="id_produto">Título</label>
                      <input type="text" class="form-control mr-2" name="txttitulo" placeholder="Título da notificação" required>
                    </div>
                    <div class="form-group">
                      <label for="id_produto">Descrição</label>
                      <textarea type="text" class="form-control mr-2" name="txtdescricao" id="txtdescricao" placeholder="Descrição da notificação" required rows="3"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="quantidade">Link</label>
                      <input type="text" class="form-control mr-2" name="txtlink" placeholder="Link a ser direcionado ao clicar">
                      <small class="text-muted">Caso não tenha nenhum link deixe em branco.</small>
                    </div>
                </div>


                <div class="modal-footer">
                  <button type="submit" class="btn btn-success mb-3" name="button">Enviar </button>


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
  $titulo= $_POST['txttitulo'];
  $descricao = $_POST['txtdescricao'];
  $link = $_POST['txtlink'];
  $data = date('d/m/Y H:i');





  $query = "INSERT into notificacoes (titulo, descricao, link, data_publicacao) VALUES ('$titulo', '$descricao', '$link', curDate())";

  $result = mysqli_query($conexao, $query);

  if ($result == '') {
    echo "<script language='javascript'> window.alert('Ocorreu um erro ao Cadastrar!'); </script>";
  } else {
    echo "<script language='javascript'> window.alert('Salvo com Sucesso!'); </script>";
    echo "<script language='javascript'> window.location='novanotificacao.php'; </script>";
  }
}
?>


<!--EXCLUIR -->
<?php
if (@$_GET['func'] == 'deleta') {
  $id = $_GET['id'];
  $query = "DELETE FROM notificacoes where id = '$id'";
  mysqli_query($conexao, $query);
  echo "<script language='javascript'> window.location='novanotificacao.php'; </script>";
}
?>



<!--EDITAR -->
<?php
if (@$_GET['func'] == 'edita') {
  $id = $_GET['id'];
  $query = "select * from notificacoes where id = '$id'";
  $result = mysqli_query($conexao, $query);

  while ($res_1 = mysqli_fetch_array($result)) {


?>

    <!-- Modal -->
    <div id="modalEditar" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">

            <h4 class="modal-title">Editar notificação</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form method="POST" action="">
              <div class="form-group">
                <label for="id_produto">Título</label>
                <input type="text" class="form-control mr-2" name="txttitulo" placeholder="Nome" value="<?php echo $res_1['titulo']; ?>" required>
              </div>
              <div class="form-group">
                <label for="id_produto">Descrição</label>
                <textarea type="text" class="form-control mr-2" name="txtdescricao" id="txtdescricao" placeholder="Usuário" value="<?php echo $res_1['descricao']; ?>" required  rows="3"><?php echo $res_1['descricao']; ?></textarea>
              </div>
              <div class="form-group">
                <label for="quantidade">Link</label>
                <input type="text" class="form-control mr-2" name="txtlink" placeholder="Senha" value="<?php echo $res_1['link']; ?>" required>
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
      $titulo = $_POST['txttitulo'];
      $descricao = $_POST['txtdescricao'];
      $link = $_POST['txtlink'];




      $query_editar = "UPDATE notificacoes set titulo = '$titulo', descricao = '$descricao', link = '$link' where id = '$id'";

      $result_editar = mysqli_query($conexao, $query_editar);

      if ($result_editar == '') {
        echo "<script language='javascript'> window.alert('Ocorreu um erro ao Editar!'); </script>";
      } else {
        echo "<script language='javascript'> window.alert('Editado com Sucesso!'); </script>";
        echo "<script language='javascript'> window.location='novanotificacao.php'; </script>";
      }
    }
    ?>


<?php }
}  ?>


<!--MASCARAS-->





</script>