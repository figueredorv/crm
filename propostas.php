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

        <style>
          /* formatando tabela de propostas */
          /* Estilo para evitar que a célula de nome quebre a linha */
          .table td:nth-child(1) {
            white-space: nowrap;
            /* Evita que o texto quebre a linha */
            overflow: hidden;
            /* Esconde qualquer conteúdo que não caiba */
            text-overflow: ellipsis;
            /* Adiciona reticências (...) se o texto for cortado */
          }
        </style>


        <div class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title"> Registro de propostas</h4>

                </div>
                <div class="card-body">
                  <div class="table-responsive">


                    <!--LISTAR TODAS AS PROPOSTAS -->

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
            <div class="modal-dialog modal-lg">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">

                  <h4 class="modal-title">CADASTRAR PROPOSTA</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                  <!-- INÍCIO DO CÓDIGO DAS TABS DE CADASTRO DE NOVA PROPOSTA-->
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="cliente-tab" data-toggle="tab" href="#cliente" role="tab" aria-controls="cliente" aria-selected="true">CLIENTE</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="contato-tab" data-toggle="tab" href="#contato" role="tab" aria-controls="contato" aria-selected="false">CONTATO</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="propostas-tab" data-toggle="tab" href="#propostas" role="tab" aria-controls="propostas" aria-selected="false">PROPOSTAS</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="dadosbancarios-tab" data-toggle="tab" href="#dadosbancarios" role="tab" aria-controls="dadosbancarios" aria-selected="false">DADOS BANCÁRIOS</a>
                    </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="cliente" role="tabpanel" aria-labelledby="cliente-tab">
                      <!-- CONTEÚDO TAB CLIENTE-->
                      <form>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="inputEmail4">NOME</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="" required>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputPassword4">CPF</label>
                            <input type="text" class="form-control" id="inputCpf" placeholder="">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputPassword4">RG</label>
                            <input type="text" class="form-control" id="inputRg" placeholder="">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputPassword4">DATA DE NASCIMENTO</label>
                            <input type="text" class="form-control" id="inputDataNascimento" placeholder="">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputPassword4">NOME DA MÃE</label>
                            <input type="password" class="form-control" id="inputPassword4" placeholder="">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputPassword4">NOME DO PAI</label>
                            <input type="password" class="form-control" id="inputPassword4" placeholder="">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputPassword4">CEP</label>
                            <input type="text" class="form-control" id="inputCep" placeholder="">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputPassword4">RUA</label>
                            <input type="password" class="form-control" id="inputPassword4" placeholder="">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputPassword4">NÚMERO</label>
                            <input type="password" class="form-control" id="inputPassword4" placeholder="">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputPassword4">COMPLEMENTO</label>
                            <input type="password" class="form-control" id="inputPassword4" placeholder="">
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="inputCity">BAIRRO</label>
                            <input type="text" class="form-control" id="inputCity">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputCity">CIDADE</label>
                            <input type="text" class="form-control" id="inputCity">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputEstado">UF</label>
                            <select id="inputEstado" class="form-control">
                              <option selected>Escolher...</option>
                              <option value="AC">Acre (AC)</option>
                              <option value="AL">Alagoas (AL)</option>
                              <option value="AP">Amapá (AP)</option>
                              <option value="AM">Amazonas (AM)</option>
                              <option value="BA">Bahia (BA)</option>
                              <option value="CE">Ceará (CE)</option>
                              <option value="DF">Distrito Federal (DF)</option>
                              <option value="ES">Espírito Santo (ES)</option>
                              <option value="GO">Goiás (GO)</option>
                              <option value="MA">Maranhão (MA)</option>
                              <option value="MT">Mato Grosso (MT)</option>
                              <option value="MS">Mato Grosso do Sul (MS)</option>
                              <option value="MG">Minas Gerais (MG)</option>
                              <option value="PA">Pará (PA)</option>
                              <option value="PB">Paraíba (PB)</option>
                              <option value="PR">Paraná (PR)</option>
                              <option value="PE">Pernambuco (PE)</option>
                              <option value="PI">Piauí (PI)</option>
                              <option value="RJ">Rio de Janeiro (RJ)</option>
                              <option value="RN">Rio Grande do Norte (RN)</option>
                              <option value="RS">Rio Grande do Sul (RS)</option>
                              <option value="RO">Rondônia (RO)</option>
                              <option value="RR">Roraima (RR)</option>
                              <option value="SC">Santa Catarina (SC)</option>
                              <option value="SP">São Paulo (SP)</option>
                              <option value="SE">Sergipe (SE)</option>
                              <option value="TO">Tocantins (TO)</option>
                            </select>
                          </div>
                        </div>

                        <!-- FINAL DO CONTEÚDO TAB CLIENTE-->

                    </div>
                    <div class="tab-pane fade" id="contato" role="tabpanel" aria-labelledby="contato-tab">
                      <!-- INÍCIO DO CONTEÚDO TAB CONTATO-->
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">TELEFONE</label>
                        <input type="text" class="form-control" id="inputTelefone" placeholder="">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">EMAIL</label>
                        <input type="email" class="form-control" id="inputPassword4" placeholder="">
                      </div>
                      <!-- FINAL DO CONTEÚDO TAB CONTATO-->
                    </div>
                    <div class="tab-pane fade" id="dadosbancarios" role="tabpanel" aria-labelledby="dadosbancarios-tab">

                      <!-- INÍCIO DO CONTEÚDO TAB DADOS BANCÁRIOS-->

                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputPassword4">BANCO</label>
                          <input type="password" class="form-control" id="inputPassword4" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4">TIPO DE CONTA</label>
                          <input type="password" class="form-control" id="inputPassword4" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4">AGENCIA</label>
                          <input type="password" class="form-control" id="inputPassword4" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4">AGENCIA DV</label>
                          <input type="password" class="form-control" id="inputPassword4" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4">CONTA</label>
                          <input type="password" class="form-control" id="inputPassword4" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4">DIGITO</label>
                          <input type="password" class="form-control" id="inputPassword4" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4">RENDA</label>
                          <input type="password" class="form-control" id="inputPassword4" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4">NÚMERO</label>
                          <input type="password" class="form-control" id="inputPassword4" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4">COMPLEMENTO</label>
                          <input type="password" class="form-control" id="inputPassword4" placeholder="">
                        </div>
                      </div>

                      <!-- FINAL DO CONTEÚDO TAB DADOS BANCÁRIOS-->


                    </div>
                    <div class="tab-pane fade" id="propostas" role="tabpanel" aria-labelledby="propostas-tab">
                      <!-- INÍCIO DO CONTEÚDO TAB PROPOSTAS-->
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputEmail4">CONVÊNIO</label>
                          <select class="form-control" id="exampleFormControlSelect1">
                          <option value="1">INSS</option>
                          <option value="2">FGTS</option>
                          <option value="3">AUXÍLIO BRASIL</option>
                          <option value="4">GOVERNO DE SÃO PAULO</option>
                          <option value="5">PREFEITURA DE SÃO PAULO</option>
                          <option value="6">GOVERNO DO RIO DE JANEIRO</option>
                          <option value="7">SIAPE</option>
                          <option value="8">GOVERNO DA BAHIA</option>
                          <option value="9">PESSOAL</option>
                        </select>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4">OPERAÇÃO</label>
                          <input type="password" class="form-control" id="inputPassword4" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4">BANCO</label>
                          <input type="password" class="form-control" id="inputPassword4" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4">PROMOTORA</label>
                          <input type="password" class="form-control" id="inputPassword4" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4">MARGEM</label>
                          <input type="password" class="form-control" id="inputPassword4" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4">PRAZO</label>
                          <input type="password" class="form-control" id="inputPassword4" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4">VALOR</label>
                          <input type="password" class="form-control" id="inputPassword4" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4">VALOR PARCELAS</label>
                          <input type="password" class="form-control" id="inputPassword4" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4">FORMALIZAÇÃO</label>
                          <input type="password" class="form-control" id="inputPassword4" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4">CANAL</label>
                          <input type="password" class="form-control" id="inputPassword4" placeholder="">
                        </div>
                        <div class="form-group col-md-12">
                          <label for="exampleFormControlFile1">Deseja anexar algum documento?</label>
                          <input type="file" class="form-control-file" id="exampleFormControlFile1">
                          <div class="form-group">
                          <label for="exampleFormControlTextarea1">Observação (opcional)</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        </div>
                        
                      </div>
                      <!-- FINAL DO CONTEÚDO TAB DADOS BANCÁRIOS-->
                    </div>
                  </div>
                  <!-- FINAL DO CÓDIGO DAS TABS DE CADASTRO DE NOVA PROPOSTA-->



                </div>

                <div class="modal-footer">


                  <button id="salvarBotao" type="submit" class="btn btn-success mb-3 btn-lg" name="button">Salvar </button>


                  <button type="button" class="btn btn-danger mb-3 btn-lg" data-dismiss="modal">Cancelar </button>


                  </form>
                </div>
              </div>
            </div>
          </div>

          <script>
            var estadoAba = "cliente"; // Inicialmente, a aba "CLIENTE" está ativa

            $("#selecionarAba").click(function() {
              if (estadoAba === "cliente") {
                // Se a aba "CLIENTE" estiver ativa, selecione a aba "CONTATO"
                $("#cliente-tab").removeClass('active');
                $("#contato-tab").addClass('active');
                $("#cliente").removeClass('show active');
                $("#contato").addClass('show active');
                estadoAba = "contato";
              } else if (estadoAba === "contato") {
                // Se a aba "CONTATO" estiver ativa, selecione a aba "DADOS BANCÁRIOS"
                $("#contato-tab").removeClass('active');
                $("#dadosbancarios-tab").addClass('active');
                $("#contato").removeClass('show active');
                $("#dadosbancarios").addClass('show active');
                estadoAba = "dadosbancarios";
              } else if (estadoAba === "dadosbancarios") {
                // Se a aba "DADOS BANCÁRIOS" estiver ativa, selecione a aba "PROPOSTAS"
                $("#dadosbancarios-tab").removeClass('active');
                $("#propostas-tab").addClass('active');
                $("#dadosbancarios").removeClass('show active');
                $("#propostas").addClass('show active');
                estadoAba = "propostas";
              } else {
                // Se a aba "PROPOSTAS" estiver ativa, selecione a aba "CLIENTE"
                $("#propostas-tab").removeClass('active');
                $("#cliente-tab").addClass('active');
                $("#propostas").removeClass('show active');
                $("#cliente").addClass('show active');
                estadoAba = "cliente";
              }
            });
          </script>




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




<script type="text/javascript">
  $(document).ready(function() {
    $('#inputTelefone').mask('(00) 00000-0000');
    $('#inputCpf').mask('000.000.000-00');
    $("#inputDataNascimento").mask("00/00/0000");
    $("#inputCep").mask("99999-999");
  });
</script>


<!--MASCARAS PARA UTILIZAR 

$("#telefone").mask("(99) 9999-9999");     // Máscara para TELEFONE

$("#cep").mask("99999-999");    // Máscara para CEP

$("#data").mask("99/99/9999");    // Máscara para DATA

$("#cnpj").mask("99.999.999/9999-99");    // Máscara para CNPJ

$('#rg').mask('99.999.999-9');    // Máscara para RG<br/>

$('#agencia').mask('9999-9');    // Máscara para AGÊNCIA BANCÁRIA

$('#conta').mask('99.999-9');    // Máscara para CONTA BANCÁRIA


-->