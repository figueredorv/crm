<?php
session_start();
include('conexao.php');
include('verificar_login.php');

?>



<?php

$nomeusuario = $_SESSION['nome_usuario'];

?>


<!DOCTYPE html>
<html>

<head>
  <title>Propostas</title>


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
      <form class="form-inline my-2 my-lg-0 mr-5">
        <input name="txtpesquisaridade" id="txtidade" class="form-control mr-sm-2" type="search" placeholder="Buscar pelo cpf" aria-label="Pesquisar">
        <button name="buttonPesquisarcpf" class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
      </form>

      </ul>
      <form class="form-inline my-2 my-lg-0 mr-5">
        <input name="txtpesquisardata" id="txtdata" class="form-control mr-sm-2" type="date" placeholder="2022-04-05" aria-label="Pesquisar">
        <button name="buttonPesquisardata" class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
      </form>

      <form class="form-inline my-2 my-lg-0">
        <input name="txtpesquisar" class="form-control mr-sm-2" type="search" placeholder="Buscar pelo nome" aria-label="Pesquisar">
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
            <form class="form-inline my-2 my-lg-0" style="margin-left:20px;">
              <button type="button" class="btn btn-secondary mb-3" data-toggle="modal" data-target="#modalExemplo"><i class="fa fa-plus"> NOVA PROPOSTA</i></button>
            </form>

            <form class="form-inline my-2 my-lg-0" style="margin-left:20px;">
              <button name="buttonpropostamaisnova" class="btn btn-warning  mb-3" type="submit"><i class="fa fa-search"> MAIS NOVA</i></button>
            </form>
            <form class="form-inline my-2 my-lg-0" style="margin-left:20px;">
              <button name="buttonpropostamaisantiga" class="btn btn-success mb-3" type="submit"><i class="fa fa-search"> MAIS ANTIGA</i></button>
            </form>



          </div>



        </div>


        <div class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title"> Registro de propostas</h4>

                </div>
                <div class="card-body">
                  <div class="table-responsive">


                    <!--LISTAR TODos os animais -->

                    <?php

                    // novo codigo ( procurar proposta pelo nome da pessoa)
                    if (isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] != '') {
                      $nome = $_GET['txtpesquisar'] . '%';
                      $query = "select * from propostas where nome LIKE '$nome'  order by nome asc";
                      // novo codigo ( procurar proposta pelo cpf)
                    } else if (isset($_GET['buttonPesquisarcpf']) and $_GET['buttonPesquisarcpf'] != '') {
                      $nome = $_GET['txtpesquisaridade'];
                      $query = "select * from propostas where idade = '$nome'  order by cpf asc";
                    }
                    // novo codigo ( procurar proposta pela data)
                    else if (isset($_GET['buttonPesquisardata']) and $_GET['txtpesquisardata'] != '') {
                      $nome = $_GET['txtpesquisardata'];
                      $query = "select * from propostas where data = '$nome'  order by data asc";
                    }
                    // novo codigo ( procurar propostas MAIS NOVA)
                    else if (isset($_GET['buttonpropostamaisnova'])) {
                      
                      $query = "SELECT * FROM propostas
                      ORDER BY `data` ASC;";
                    }
                    // novo codigo ( procurar por propostas MAIS ANTIGA)
                    else if (isset($_GET['buttonpropostamaisantiga'])) {
                      
                      $query = "SELECT * FROM propostas
                      ORDER BY `data` DESC;";
                    } else if (isset($_GET['buttonOcNaoAtendidas'])) {
                      $nome = 'Disponivel';
                      $query = "select * from animais where situacao = '$nome'   order by data asc";
                    }
                    // novo codigo ( procurar por animais não adotados)
                    else if (isset($_GET['buttonpetsemvacina'])) {
                      $nome = '';
                      $query = "select * from animais where vacinas = '$nome'   order by data asc";
                    }






                    //final do código

                    else {
                      $query = "select * from propostas order by idpropostas desc";
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
                            Data
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
                            $data = $res_1["data"];
                            $id = $res_1["idpropostas"];
                            $nomeexcluido = $nome; // Variavel criada somente para enviar LOG do nome do pet que foi excluído

                            $data2 = implode('/', array_reverse(explode('-', $data)));



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
                              <td><?php echo  $data2; ?></td>
                              
                              



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

                                <div class="btn-group" role="group" aria-label="Exemplo básico">
                                  <a class="btn btn-info btn-sm" href="animais.php?func=edita&id=<?php echo $id; ?>"><i class="fa fa-pencil-square-o"> Editar</i></a>

                                  <a class="btn btn-danger btn-sm" href="animais.php?func=deleta&id=<?php echo $id; ?>"><i class="fa fa-minus-square"> Deletar</i></a>





                                  <?php
                                  if ($status == "Pendente") : ?>
                                    <a class="btn btn-warning btn-sm disabled" href="animais.php?func=adotar&id=<?php echo $id; ?>"><i class="fa fa-check-square-o"> Adotar</i></a>
                                  <?php

                                  endif;

                                  ?>


                                  <?php
                                  if ($status == "Finalizado") : ?>
                                    <a class="btn btn-warning btn-sm" href="animais.php?func=adotar&id=<?php echo $id; ?>"><i class="fa fa-check-square-o"> Adotar</i></a>
                                  <?php

                                  endif;
                                  ?>



                                  <?php
                                  if ($status == "Cancelado") : ?>
                                    <a class="btn btn-warning btn-sm disabled" href="animais.php?func=adotar&id=<?php echo $id; ?>"><i class="fa fa-check-square-o"> Adotar</i></a>
                                  <?php

                                  endif;

                                  ?>




                                </div>

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

                  <h4 class="modal-title">Cadastrar Animal</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="">
                    <div class="form-group">
                      <label for="id_produto">Nome</label>
                      <input type="text" class="form-control mr-2" name="txtnome" placeholder="Nome do animal">
                    </div>
                    <div class="form-group">
                      <label for="id_produto">Especie</label>
                      <input type="text" class="form-control mr-2" name="txtespecie" id="txtespecie" placeholder="Informe qual a raça do animal." required>
                    </div>

                    <div class="form-group">
                      <label for="fornecedor">Cartão de vacinas</label>
                      <textarea class="form-control mr-2" name="txtvacinas" placeholder="Informe aqui todas as vacinas que o animal recebeu." rows="6"></textarea>
                      <small class="text-muted"> Deixar em branco caso não tenha tomado nenhuma vacina </small>
                    </div>

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Castrado</label>
                      </div>
                      <select name="castrado" class="custom-select" id="inputGroupSelect01">
                        <option selected>O animal é castrado?</option>
                        <option value="1">Sim</option>
                        <option value="2">Não</option>
                      </select>
                    </div>


                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Sexo</label>
                      </div>
                      <select name="sexo" class="custom-select" id="inputGroupSelect01">
                        <option selected>Sexo do animal...</option>
                        <option value="1">Macho</option>
                        <option value="2">Fêmea</option>
                      </select>
                    </div>

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Tipo</label>
                      </div>
                      <select name="tipo" class="custom-select" id="inputGroupSelect01">
                        <option selected>Tipo de recebimento...</option>
                        <option value="1">Resgatado pela ong</option>
                        <option value="2">Resgatado por terceiros</option>
                        <option value="3">Doado</option>
                        <option value="4">Temporário</option>
                      </select>
                    </div>


                    <div class="form-group">
                      <label for="fornecedor">Observação</label>
                      <textarea class="form-control mr-2" name="txtobservacao" placeholder="Observação" rows="3"> </textarea>
                    </div>
                    <div class="form-group">
                      <label for="fornecedor">Idade</label>
                      <input type="number" class="form-control mr-2" name="txtidade" id="txtidade" placeholder="Idade do animal">
                    </div>
                    <div class="form-group">
                      <label for="fornecedor">Situação</label>
                      <input type="radio" name="radiosituacao" value="Disponivel" checked> Disponível para adoção
                      <input type="radio" name="radiosituacao" value="Adotado"> Adotado
                      <input type="radio" name="radiosituacao" value="Naodisponivel"> Não disponível

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
if (isset($_POST['button'])) {
  $sexo = $_POST["sexo"];
  $nome = $_POST['txtnome'];
  $especie = $_POST['txtespecie'];
  $vacinas = $_POST['txtvacinas'];
  $castrado = $_POST["castrado"];
  $observacao = $_POST['txtobservacao'];
  $tipo = $_POST['tipo'];
  $idade = $_POST['txtidade'];



  //Marcando se o animal esta disponivel ou nao para adoção(RadioButon)
  if ($_POST["radiosituacao"] == "Disponivel") {
    $situacao = "Disponivel";
  } elseif ($_POST["radiosituacao"] == "Disponivel") {
    $situacao = "Adotado";
  } elseif ($_POST["radiosituacao"] == "Naodisponivel") {
    $situacao = "Naodisponivel";
  }


  //Marcando sexo do animal
  if ($_POST["sexo"] == "1") {
    $sexo = "Macho";
  }
  if ($_POST["sexo"] == "2") {
    $sexo = "Fêmea";
  }


  //Marcando o tipo de registro do animal
  if ($_POST["tipo"] == "1") {
    $tipo = "Resgatado pela ong";
  }
  if ($_POST["tipo"] == "2") {
    $tipo = "Resgatado por terceiros";
  }
  if ($_POST["tipo"] == "3") {
    $tipo = "Doado";
  }
  if ($_POST["tipo"] == "4") {
    $tipo = "Temporário";
  }


  //Marcando se o animal é castrado ou nao antes de cadastrar
  if ($_POST["castrado"] == "1") {
    $castrado = "Sim";
  }
  if ($_POST["castrado"] == "2") {
    $Castrado = "Não";
  }











  //VERIFICAR SE O NOME JÁ ESTÁ CADASTRADO
  $query_verificar = "select * from animais where nome = '$nome' ";

  $result_verificar = mysqli_query($conexao, $query_verificar);
  $row_verificar = mysqli_num_rows($result_verificar);

  if ($row_verificar > 0) {
    echo "<script language='javascript'> window.alert('Nome já Cadastrado!'); </script>";
    exit();
  }



  $query = "INSERT into animais (sexo,nome, especie, vacinas, castrado, observacao, tipo, idade, situacao, data) VALUES ('$sexo','$nome', '$especie', '$vacinas','$castrado', '$observacao', '$tipo', '$idade', '$situacao', curDate())";
  $result = mysqli_query($conexao, $query);



  //Editando LOG de usuário, informando que foi adicionada uma nova ocorrÊncia por ele
  if ($row_verificar > 0) {
    echo "<script language='javascript'> window.alert('Nome já Cadastrado!'); </script>";
    exit();
  }


  $querylog = "INSERT into loguser (nome, acao, data) VALUES ('$nomeusuario', 'Cadastrou um pet de espécie: $especie', curDate())";
  $resultlog = mysqli_query($conexao, $querylog);
  // Final do LOG de usuário




  if ($result == '') {
    echo "<script language='javascript'> window.alert('Ocorreu um erro ao Cadastrar!'); </script>";
  } else {

    echo "<script language='javascript'> window.alert('Salvo com Sucesso!'); </script>";
    echo "<script language='javascript'> window.location='animais.php'; </script>";
  }
}

?>

















<!--EXCLUIR -->
<?php
if (@$_GET['func'] == 'deleta') {
  $id = $_GET['id'];
  $query = "DELETE FROM animais where id = '$id'";
  mysqli_query($conexao, $query);


  // Registrando LOG de usuário, informando que usuário excluiu um pet
  $nome = $_SESSION['nome_usuario'];


  $queryexcluir = "INSERT into loguser (nome, acao, data) VALUES ('$nomeusuario', 'Excluiu um pet de espécie: $especie', curDate())";
  $resultexcluir = mysqli_query($conexao, $queryexcluir);
  // Final do registro de log

  echo "<script language='javascript'> window.location='animais.php'; </script>";
}
?>



<!--EDITAR -->
<?php
if (@$_GET['func'] == 'edita') {
  $id = $_GET['id'];
  $query = "select * from animais where id = '$id'";
  $result = mysqli_query($conexao, $query);




  while ($res_1 = mysqli_fetch_array($result)) {


?>






    <!-- Modal -->
    <div id="modalEditar" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">

            <h4 class="modal-title">Editar registro</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form method="POST" action="">
              <div class="form-group">
                <label for="id_produto">Nome</label>
                <input type="text" class="form-control mr-2" name="txtnome" placeholder="Nome do animal" value="<?php echo $res_1['nome']; ?>">
              </div>
              <div class="form-group">
                <label for="id_produto">Espécie</label>
                <input type="text" class="form-control mr-2" name="txtespecie" id="txtespecie" placeholder="Espécie" value="<?php echo $res_1['especie']; ?>" required>
              </div>



              <div class="form-group">
                <label for="quantidade">Vacinas</label>
                <input type="text" class="form-control mr-2" name="txtvacinas" placeholder="Vacinas" value="<?php echo $res_1['vacinas']; ?>">
              </div>




              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">castrado</label>
                </div>
                <select name="castrado" class="custom-select" id="inputGroupSelect01">
                  <option selected><?php echo $res_1['castrado']; ?></option>
                  <option value="1">Sim</option>
                  <option value="2">Não</option>

                </select>
              </div>


              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Sexo</label>
                </div>
                <select name="sexo" class="custom-select" id="inputGroupSelect01">
                  <option selected><?php echo $res_1['sexo']; ?></option>
                  <option value="1">Macho</option>
                  <option value="2">Fêmea</option>

                </select>
              </div>


              <div class="form-group">
                <label for="fornecedor">Observação</label>
                <input type="text" class="form-control mr-2" name="txtobservacao" placeholder="Observação" value="<?php echo $res_1['observacao']; ?>" required>
              </div>


              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Tipo</label>
                </div>
                <select name="tipo" class="custom-select" id="inputGroupSelect01">
                  <option selected><?php echo $res_1['tipo']; ?></option>
                  <option value="1">Resgatado pela ong</option>
                  <option value="2">Resgatado por terceiros</option>
                  <option value="3">Doado</option>
                  <option value="4">Temporário</option>
                </select>
              </div>




              <div class="form-group">
                <label for="fornecedor">Idade</label>
                <input type="number" class="form-control mr-2" name="txtidade" id="txtidade" placeholder="Idade do animal" value="<?php echo $res_1['idade']; ?>">
              </div>


              <div class="form-group">
                <label for="fornecedor">Situação</label>


                <input type="radio" name="radiosituacao" value="Disponivel" required> Disponível para adoção
                <input type="radio" name="radiosituacao" value="Adotado" required> Adotado
                <input type="radio" name="radiosituacao" value="Naodisponivel" required> Não disponível

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
      $sexo = $_POST['sexo'];
      $nome = $_POST['txtnome'];
      $especie = $_POST['txtespecie'];
      $castrado = $_POST['castrado'];
      $vacinas = $_POST['txtvacinas'];
      $observacao = $_POST['txtobservacao'];
      $tipo = $_POST['tipo'];
      $idade = $_POST['txtidade'];
      $situacao = $_POST['radiosituacao'];




      //Marcando por onde a solicitação da ocorrência entrou ex: 199, Defesa Civil, e etc. Para realizar o cadastro da oc
      if ($_POST["sexo"] == "1") {
        $sexo = "Macho";
      }
      if ($_POST["sexo"] == "2") {
        $sexo = "Fêmea";
      }


      //Marcando o tipo de cadastro do animal
      if ($_POST["tipo"] == "1") {
        $tipo = "Resgatado pela ong";
      } elseif ($_POST["tipo"] == "2") {
        $tipo = "Resgatado por terceiros";
      } elseif ($_POST["tipo"] == "3") {
        $tipo = "Doado";
      } elseif ($_POST["tipo"] == "4") {
        $tipo = "Temporário";
      }


      //Marcando se o animal é castrado ou não
      if ($_POST["castrado"] == "1") {
        $castrado = "Sim";
      }
      if ($_POST["castrado"] == "2") {
        $castrado = "Não";
      }



      //Marcando se o animal esta disponivel ou nao para adoção (RadioButon)
      if ($_POST["radiosituacao"] == "Disponivel") {
        $situacao = "Disponivel";
      } elseif ($_POST["radiosituacao"] == "Disponivel") {
        $situacao = "Adotado";
      } elseif ($_POST["radiosituacao"] == "Naodisponivel") {
        $situacao = "Naodisponivel";
      }







      $query_editar = "UPDATE animais set sexo = '$sexo', nome = '$nome', especie = '$especie', vacinas = '$vacinas',castrado = '$castrado', observacao = '$observacao', tipo = '$tipo', idade = '$idade', situacao = '$situacao' where id = '$id' ";

      $result_editar = mysqli_query($conexao, $query_editar);


      $queryeditar = "INSERT into loguser (nome, acao, data) VALUES ('$nomeusuario', 'Editou um pet de espécie: $especie', curDate())";
      $resulteditar = mysqli_query($conexao, $queryeditar);

      if ($result_editar == '') {
        echo "<script language='javascript'> window.alert('Ocorreu um erro ao Editar!'); </script>";
      } else {
        echo "<script language='javascript'> window.alert('Editado com Sucesso!'); </script>";
        echo "<script language='javascript'> window.location='animais.php'; </script>";
      }
    }
    ?>


<?php }
}  ?>



<script type="text/javascript">
  $(document).ready(function() {
    $('#txtcpftutor').mask('000.000.000-00'); // Másrcara para o input do cpf da pessoa que irá adotar o animal.
    //$('#txtdata').mask('0000-00-00'); 
  });
</script>




</script>






<!--adotar -->
<?php
if (@$_GET['func'] == 'adotar') {
  $id = $_GET['id'];
  $query = "select * from animais where id = '$id'";
  $result = mysqli_query($conexao, $query);




  while ($res_1 = mysqli_fetch_array($result)) {


?>






    <!-- Modal  -->
    <div id="modaladotar" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">

            <h4 class="modal-title">Adotar animal</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form method="POST" action="">
              <div class="form-group">
                <label for="id_produto">Animal que será adotado</label>
                <input type="text" class="form-control mr-2" name="txtnome" placeholder="Nome do animal" value="<?php echo $res_1['nome']; ?>" readonly>
              </div>
              <div class="form-group">
                <label for="id_produto">Espécie</label>
                <input type="text" class="form-control mr-2" name="txtespecie" id="txtespecie" placeholder="Espécie" value="<?php echo $res_1['especie']; ?>" readonly>
              </div>




              <div class="form-group">
                <label for="fornecedor">Nome do tutor</label>
                <input type="text" class="form-control mr-2" name="txtnometutor" placeholder="Nome de quem está adotando" required>
              </div>




              <div class="form-group">
                <label for="fornecedor">CPF do tutor</label>
                <input type="text" class="form-control mr-2" name="txtcpftutor" id="txtcpftutor" placeholder="CPF do tutor">
              </div>

              <div class="form-group">
                <label for="fornecedor">Endereço</label>
                <input type="text" class="form-control mr-2" name="txtendereco" id="txtendereco" placeholder="Endereço do tutor">
              </div>

              <div class="form-group">
                <label for="fornecedor">Telefone</label>
                <input type="text" class="form-control mr-2" name="txttelefone" id="txttelefone" placeholder="Telefone do tutor">
              </div>



              <div class="modal-footer">
                <button type="submit" class="btn btn-success mb-3" name="buttonadotar">Salvar </button>


                <button type="button" class="btn btn-danger mb-3" data-dismiss="modal">Cancelar </button>
            </form>
          </div>
        </div>
      </div>
    </div>



    <script>
      $("#modaladotar").modal("show");
    </script>

    <!--Comando para editar os dados UPDATE -->
    <?php
    if (isset($_POST['buttonadotar'])) {
      $nomeanimal = $_POST['txtnome'];
      $especie = $_POST['txtespecie'];
      $nometutor = $_POST['txtnometutor'];
      $cpftutor = $_POST['txtcpftutor'];
      $enderecotutor = $_POST['txtendereco'];
      $telefone = $_POST['txttelefone'];







      // Marcando a situção do animal como adotado ao clicar no botão adotar.
      $query_editar = "UPDATE animais set  situacao = 'Adotado' where id = '$id' ";
      $result_editar = mysqli_query($conexao, $query_editar);


      $queryeditar = "INSERT into loguser (nome, acao, data) VALUES ('$nomeusuario', 'Editou um pet de espécie: $especie', curDate())";
      $resulteditar = mysqli_query($conexao, $queryeditar);

      // Marcando a pessoa que adotou o animal na tabela adoções
      $query = "INSERT into adocoes (	nomeanimal,especie, nometutor,cpftutor,enderecotutor, telefone) VALUES ('$nomeanimal', '$especie', ' $nometutor',' $cpftutor', '$enderecotutor', '$telefone')";
      $result = mysqli_query($conexao, $query);


      if ($result_editar == '') {
        echo "<script language='javascript'> window.alert('Ocorreu um erro ao Editar!'); </script>";
      } else {
        echo "<script language='javascript'> window.alert('Editado com Sucesso!'); </script>";
        echo "<script language='javascript'> window.location='animais.php'; </script>";
      }
    }
    ?>


<?php }
}  ?>