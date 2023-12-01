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

  <link rel="stylesheet" href="css/tela-propostas.css">
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
      <form class="form-inline my-2 my-lg-0 mr-5">
        <input name="txtpesquisarcpf" id="txtcpf" class="form-control mr-sm-2" type="search" placeholder="Buscar pelo cpf" aria-label="Pesquisar">
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



  <div class=col-sm-12>




    <br>


    <div class="row">
      <div class="col-sm-12">


        <div class="d-flex align-items-left">
          <div class="row">
            <form class="form-inline my-2 my-lg-0" style="margin-left:20px;">
              <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalExemplo">ADICIONAR</button>
            </form>


            <form class="form-inline my-2 my-lg-0" style="margin-left:20px;">
              <button name="buttonpropostamaisnova" class="btn btn-secondary mb-3" type="submit"><i class="fa fa-filter"> MAIS NOVA</i></button>
            </form>

            <form class="form-inline my-2 my-lg-0" style="margin-left:20px;">
              <button name="buttonpropostamaisantiga" class="btn btn-secondary mb-3" type="submit"><i class="fa fa-filter"> MAIS ANTIGA</i></button>
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
                  <h5 class="card-title"> MINHAS PROPOSTAS</h5>

                </div>
                <div class="card-body">
                  <div class="table-responsive h-100">


                    <!--LISTAR TODAS AS PROPOSTAS -->

                    <?php



                    // novo codigo ( procurar proposta pelo nome da pessoa)
                    if (isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] != '') {
                      $id = $_SESSION['idusuarios'];
                      $nome = $_GET['txtpesquisar'] . '%';
                      $query = "select * from propostas where nome LIKE '$nome' and idusuario = $id order by nome asc";
                      // novo codigo ( procurar proposta pelo cpf)
                    } else if (isset($_GET['buttonPesquisarcpf'])) {
                      $id = $_SESSION['idusuarios'];
                      $nome = $_GET['txtpesquisarcpf'];
                      $query = "SELECT * FROM propostas
                      WHERE cpf = '$nome' and idusuario = $id
                      ORDER BY idpropostas DESC";
                    }
                    // novo codigo ( procurar proposta pela data)
                    else if (isset($_GET['buttonPesquisardata']) and $_GET['txtpesquisardata'] != '') {
                      $id = $_SESSION['idusuarios'];
                      $nome = $_GET['txtpesquisardata'];
                      $query = "select * from propostas where data = '$nome' and idusuario = $id  order by idpropostas DESC";
                    }
                    // novo codigo ( procurar propostas MAIS NOVA)
                    else if (isset($_GET['buttonpropostamaisnova'])) {
                      $id = $_SESSION['idusuarios'];
                      $query = "SELECT * FROM propostas WHERE idusuario = $id
                      ORDER BY `data` DESC;";
                    }
                    // novo codigo ( procurar por propostas MAIS ANTIGA)
                    else if (isset($_GET['buttonpropostamaisantiga'])) {
                      $id = $_SESSION['idusuarios'];
                      $query = "SELECT * FROM propostas WHERE idusuario = $id
                      ORDER BY `data` ASC;";
                    } else if (isset($_GET['buttonOcNaoAtendidas'])) {
                      $nome = 'Disponivel';
                      $query = "select * from animais where situacao = '$nome'   order by data asc";
                    }



                    //verificando se o cargo do usuário é == Master, se for, consegue visualizar todas as propostas sem limitar apenas para o usuário que cadastrou.
                    else if ($_SESSION['cargo_usuario'] == 'Master') {
                      $query = "SELECT * FROM propostas
      
                      ORDER BY idpropostas DESC";
                    }


                    //final do código

                    else {
                      $id = $_SESSION['idusuarios'];
                      $query = "SELECT * FROM propostas
                      WHERE idusuario = $id
                      ORDER BY idpropostas DESC";
                    }





                    $result = mysqli_query($conexao, $query);
                    //$dado = mysqli_fetch_array($result);
                    $row = mysqli_num_rows($result);

                    if ($row == '') {

                      echo "<h3> Não existem propostas cadastradas por você!</h3>";
                    } else {

                    ?>



                      <table class="table table-borderless">
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
                          // Supondo que você já tenha uma conexão com o banco de dados ($conexao)
                          $query_cores = "SELECT statusproposta, cor FROM statusproposta";
                          $result_cores = mysqli_query($conexao, $query_cores);

                          // Criar um array associativo para armazenar as cores
                          $status_cores = array();
                          while ($row_cores = mysqli_fetch_assoc($result_cores)) {
                            $status_cores[$row_cores['statusproposta']] = $row_cores['cor'];
                          }
                          while ($res_1 = mysqli_fetch_array($result)) {
                            $id = $res_1["idpropostas"];
                            $nome = $res_1["nome"];
                            $cpf = $res_1["cpf"];
                            $operacao = $res_1["operacao"];
                            $tabela = $res_1["tabela"];
                            $convenio = $res_1["convenio"];
                            $banco = $res_1["bancoproposta"];
                            $valor = $res_1["valor"];
                            $promotora = $res_1["promotora"];
                            $usuario_id = $res_1["idusuario"]; // Aqui armazenamos o ID do usuário
                            $statusproposta = $res_1["statusproposta"];
                            $data = $res_1["data"];


                            $data2 = implode('/', array_reverse(explode('-', $data)));


                            // Agora, vamos buscar o nome do usuário com base no ID
                            $query_usuario = "SELECT usuario FROM usuarios WHERE idusuarios = $usuario_id";
                            $result_usuario = mysqli_query($conexao, $query_usuario);
                            $row_usuario = mysqli_fetch_assoc($result_usuario);
                            $nome_usuario = $row_usuario['usuario'];



                          ?>

                            <tr>
                              <td><?php echo $nome; ?></td>
                              <td><?php echo  $cpf; ?></td>
                              <td><?php echo  $operacao;  ?></td>
                              <td><?php echo $convenio; ?></td>
                              <td><?php echo $banco; ?></td>
                              <td><?php echo number_format($valor, 2, ",", "."); ?></td>
                              <td><?php echo  $promotora; ?></td>
                              <td><?php echo  $nome_usuario; ?></td>
                              <td><?php echo  $data2; ?></td>





                              <?php
                              if (array_key_exists($statusproposta, $status_cores)) {
                                $cor_badge = $status_cores[$statusproposta];
                                echo "<td class='badge badge-pill badge-custom' style='background-color: $cor_badge; color: #000000;'>$statusproposta</td>";
                              } else {
                                echo "<td class='badge badge-pill badge-info'>$statusproposta</td>";
                              }
                              ?>






                              <td>





                                <div class="btn-group" role="group" aria-label="Exemplo básico">

                                  <?php
                                  // lógica para só conseguir editar a proposta quem for master do sistema
                                  if ($_SESSION['cargo_usuario'] == 'Master') : ?>
                                    <div class="dropdown">
                                      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-cog" aria-hidden="true"></i><span class="caret"></span></button>
                                      <ul class="dropdown-menu">
                                        <li><a href="propostas.php?func=editarcliente&id=<?php echo $id; ?>" style="white-space: nowrap;">Editar cliente</a></li>
                                        <li><a href="propostas.php?func=editarpropostas&id=<?php echo $id; ?>" style="white-space: nowrap;">Editar propostas</a></li>
                                        <li><a href="propostas.php?func=editardadosbancarios&id=<?php echo $id; ?>" style="white-space: nowrap;">Editar dados bancários</a></li>
                                      </ul>
                                    </div>

                                  <?php
                                  endif;
                                  ?>




                                  <span style="margin-right: 5px;"></span> <!-- Isso vai criar um espaçamento de 10 pixels -->

                                  <!-- Botão de exclusão de proposta -->


                                  <span style="margin-right: 5px;"></span> <!-- Isso vai criar um espaçamento de 10 pixels -->

                                  <!-- Botão de edição de status da proposta -->
                                  <a class='btn btn-primary' href="propostas.php?func=editarstatus&id=<?php echo $id; ?>"><i class='fa fa-check-square-o'></i></a>

                                  <span style="margin-right: 5px;"></span> <!-- Isso vai criar um espaçamento de 10 pixels -->

                                  <!-- Botão de visualizar proposta -->
                                  <a class='btn btn-primary' href="propostas.php?func=visualizarproposta&id=<?php echo $id; ?>"><i class='fa fa-eye'></i></a>

                                  <span style="margin-right: 5px;"></span> <!-- Isso vai criar um espaçamento de 10 pixels -->


                                  <?php
                                  // lógica para só conseguir alterar o status da proposta quem for master do sistema
                                  if ($_SESSION['cargo_usuario'] == 'Master') : ?>
                                    <a class="btn btn-primary btn btn-danger" style="color: white;" data-toggle="modal" data-target="#confirmModal" data-id="<?php echo $id; ?>">
                                      <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </a>

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
                      <a class="nav-link" id="propostas-tab" data-toggle="tab" href="#propostas" role="tab" aria-controls="propostas" aria-selected="false">PROPOSTAS</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="dadosbancarios-tab" data-toggle="tab" href="#dadosbancarios" role="tab" aria-controls="dadosbancarios" aria-selected="false">DADOS BANCÁRIOS</a>
                    </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="cliente" role="tabpanel" aria-labelledby="cliente-tab">
                      <!-- CONTEÚDO TAB CLIENTE-->
                      <form method="POST" action="propostas.php" enctype="multipart/form-data">
                        <div class="form-row">
                          <div class="form-group col-md-4">
                            <label for="inputNome">NOME*</label>
                            <input name="inputNome" type="text" class="form-control" id="inputNome" placeholder="" required>
                          </div>
                          <div class="form-group col-md-4">
                            <label for="inputCpf">CPF</label>
                            <input name="inputCpf" type="text" class="form-control inputCpf" id="inputCpf" placeholder="">
                          </div>
                          <div class="form-group col-md-4">
                            <label for="inputRg">RG</label>
                            <input name="inputRg" type="text" class="form-control" id="inputRg" placeholder="">
                          </div>
                          <div class="form-group col-md-4">
                            <label for="inputNumeroBeneficio">NÚMERO DO BENEFÍCIO</label>
                            <input name="inputNumeroBeneficio" type="text" class="form-control" id="inputNumeroBeneficio" placeholder="">
                          </div>
                          <div class="form-group col-md-4">
                            <label for="inputDataEmissao">DATA EMISSÃO</label>
                            <input name="inputDataEmissao" type="date" class="form-control" id="inputDataEmissao" placeholder="">
                          </div>
                          <div class="form-group col-md-4">
                            <label for="inputOrgaoEmissor">ORGÃO EMISSOR</label>
                            <input name="inputOrgaoEmissor" type="text" class="form-control" id="inputOrgaoEmissor" placeholder="">
                          </div>
                          <div class="form-group col-md-4">
                            <label for="inputNaturalidade">NATURALIDADE</label>
                            <input name="inputNaturalidade" type="text" class="form-control" id="inputNaturalidade">
                          </div>
                          <!-- INÍCIO DO CONTEÚDO CONTATO-->
                          <div class="form-group col-md-4">
                            <label for="inputTelefone">TELEFONE</label>
                            <input name="inputTelefone" type="text" class="form-control" id="inputTelefone" placeholder="">
                          </div>
                          <div class="form-group col-md-4">
                            <label for="inputEmail">EMAIL</label>
                            <input name="inputEmail" type="email" class="form-control" id="inputEmail" placeholder="">
                          </div>
                          <!-- FINAL DO CONTEÚDO CONTATO-->
                          <div class="form-group col-md-4">
                            <label for="inputDataNascimento">DATA DE NASCIMENTO</label>
                            <input name="inputDataNascimento" type="date" class="form-control" id="inputDataNascimento" placeholder="">
                          </div>
                          <div class="form-group col-md-4">
                            <label for="inputNomeMae">NOME DA MÃE</label>
                            <input name="inputNomeMae" type="text" class="form-control" id="inputNomeMae" placeholder="">
                          </div>
                          <div class="form-group col-md-4">
                            <label for="inputNomePai">NOME DO PAI</label>
                            <input name="inputNomePai" type="text" class="form-control" id="inputNomePai" placeholder="">
                          </div>
                          <div class="form-group col-md-2">
                            <label for="inputCep">CEP</label>
                            <input name="inputCep" type="number" class="form-control" id="cep" name="cep" placeholder="">
                            <button type="button" class="btn btn-outline-dark btn-block" onclick="consultaEndereco()">BUSCAR CEP</button>
                          </div>

                          <div class="form-group col-md-4">
                            <label for="inputRua">RUA</label>
                            <input name="inputRua" type="text" class="form-control" id="inputRua" placeholder="">
                          </div>
                          <div class="form-group col-md-3">
                            <label for="inputNumero">NÚMERO</label>
                            <input name="inputNumero" type="text" class="form-control" id="inputNumero" placeholder="">
                          </div>
                          <div class="form-group col-md-3">
                            <label for="inputComplemento">COMPLEMENTO</label>
                            <input name="inputComplemento" type="text" class="form-control" id="inputComplemento" placeholder="">
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-3">
                            <label for="inputBairro">BAIRRO</label>
                            <input name="inputBairro" type="text" class="form-control" id="inputBairro">
                          </div>
                          <div class="form-group col-md-3">
                            <label for="inputCidade">CIDADE</label>
                            <input name="inputCidade" type="text" class="form-control" id="inputCidade">
                          </div>
                          <div class="form-group col-md-3">
                            <label for="inputUf">UF</label>
                            <select name="inputUf" id="inputUf" class="form-control">
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

                    <div class="tab-pane fade" id="dadosbancarios" role="tabpanel" aria-labelledby="dadosbancarios-tab">

                      <!-- INÍCIO DO CONTEÚDO TAB DADOS BANCÁRIOS-->

                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputBanco" id="inputBanco">BANCO</label>
                          <select name="inputBanco" class="form-control bancos required cadVenda select2-hidden-accessible" aria-hidden="true" tabindex="-1">
                            <?php

                            $query = "SELECT id, banco FROM bancos";
                            $result = mysqli_query($conexao, $query);




                            // Verificar se a consulta teve sucesso
                            if (!$result) {
                              die("Erro na consulta: " . mysqli_error($conexao));
                            }

                            while ($row = mysqli_fetch_assoc($result)) {
                              echo '<option value="' . $row['id'] . '">' . $row['banco'] . '</option>';
                            }
                            ?>
                          </select>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputTipoConta">TIPO DE CONTA</label>
                          <select name="inputTipoConta" class="form-control" id="inputTipoConta">
                            <option value="1">CONTA CORRENTE</option>
                            <option value="2">CONTA SALÁRIO</option>
                          </select>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputAgencia">AGENCIA</label>
                          <input name="inputAgencia" type="text" class="form-control" id="inputAgencia" placeholder="">
                          <small class="text-muted">Com o dígito verificador se existir</small>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputConta">CONTA</label>
                          <input name="inputConta" type="text" class="form-control" id="inputConta" placeholder="">
                          <small class="text-muted">Com o dígito verificador</small>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputRenda">RENDA</label>
                          <input name="inputRenda" type="text" class="form-control" id="inputRenda" placeholder="" size="12" onKeyUp="mascaraMoeda(this, event)">
                        </div>
                      </div>

                      <!-- FINAL DO CONTEÚDO TAB DADOS BANCÁRIOS-->


                    </div>
                    <div class="tab-pane fade" id="propostas" role="tabpanel" aria-labelledby="propostas-tab">
                      <!-- INÍCIO DO CONTEÚDO TAB PROPOSTAS-->
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputConvenio">CONVÊNIO</label>
                          <select name="inputConvenio" class="form-control" id="inputConvenio">
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
                          <label for="inputOperacao">OPERAÇÃO</label>
                          <select name="inputOperacao" name="inputOperacao" class="form-control operacao required cadVenda select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                            <option value="3">REFINANCIAMENTO </option>
                            <option value="2">PORTABILIDADE </option>
                            <option value="1">NOVO </option>
                            <option value="4">CARTÃO PLÁSTICO </option>
                            <option value="6">CARTÃO COM SAQUE </option>
                            <option value="5">PORTABILIDADE COM REFIN </option>
                            <option value="7">CARTÃO BENEFÍCIO COM SEGURO </option>
                            <option value="8">CARTÃO BENEFÍCIO SEM SEGURO </option>
                            <option value="9">CARTÃO BENEFÍCIO INSS </option>
                            <option value="10">NOVO REPRESENTANTE LEGAL </option>
                            <option value="11">NOVO AUMENTO DE SALARIO </option>
                            <option value="12">SAQUE CARTÃO BENEFÍCIO </option>
                          </select>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputBanco">BANCO</label>
                          <select name="inputBancoProposta" id="inputBancoProposta" class="form-control bancos required cadVenda select2-hidden-accessible" aria-hidden="true" tabindex="-1">
                            <?php

                            $query = "SELECT id, banco FROM bancos";
                            $result = mysqli_query($conexao, $query);




                            // Verificar se a consulta teve sucesso
                            if (!$result) {
                              die("Erro na consulta: " . mysqli_error($conexao));
                            }

                            while ($row = mysqli_fetch_assoc($result)) {
                              echo '<option value="' . $row['id'] . '">' . $row['banco'] . '</option>';
                            }
                            ?>
                          </select>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="id_produto">Promotora</label>
                          <select name="promotora" class="custom-select" id="promotora">
                            <?php

                            $query = "SELECT id, nome FROM promotoras";
                            $result = mysqli_query($conexao, $query);




                            // Verificar se a consulta teve sucesso
                            if (!$result) {
                              die("Erro na consulta: " . mysqli_error($conexao));
                            }

                            while ($row = mysqli_fetch_assoc($result)) {
                              echo '<option value="' . $row['id'] . '">' . $row['nome'] . '</option>';
                            }
                            ?>
                          </select>

                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputMargem">MARGEM</label>
                          <input name="inputMargem" id="inputMargem" type="Text" class="form-control" size="12" onKeyUp="mascaraMoeda(this, event)" value="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPrazo">PRAZO</label>
                          <select name="inputPrazo" class="form-control parcelas" data-gtm-form-interact-field-id="1">
                            <option value="120">120x</option>
                            <option value="96">96x</option>
                            <option value="84">84x</option>
                            <option value="72">72x</option>
                            <option value="60">60x</option>
                            <option value="48">48x</option>
                            <option value="36">36x</option>
                            <option value="24">24x</option>
                            <option value="12">12x</option>
                          </select>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputValor">VALOR</label>
                          <input name="inputValor" id="inputValor" type="Text" class="form-control" size="12" onKeyUp="mascaraMoeda(this, event)" value="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputValorParcelas">VALOR PARCELAS</label>
                          <input name="inputValorParcelas" id="inputValorParcelas" type="Text" class="form-control" size="12" onKeyUp="mascaraMoeda(this, event)" value="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputFormalizacao">FORMALIZAÇÃO</label>
                          <select name="inputFormalizacao" id="inputFormalizacao" class="form-control canais required cadVenda select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                            <option value="1">FÍSICO</option>
                            <option value="2">DIGITAL</option>
                          </select>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputCanal">CANAL</label>
                          <select name="inputCanal" id="inputCanal" class="form-control canais required cadVenda select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                            <option value="1">TELEMARKETING </option>
                            <option value="2">SMS </option>
                            <option value="3">OUTROS </option>
                            <option value="4">WHATSAPP </option>
                            <option value="5">FACEBOOK </option>
                            <option value="6">ANUNCIO DANIEL </option>
                            <option value="7">DISPAROS Whatsapp </option>
                            <option value="8">INDICAÇÃO </option>
                            <option value="9">LIGAÇÃO </option>
                            <option value="10">CLIENTE BALCÃO </option>
                            <option value="11">CLIENTE LIGOU NA LOJA </option>
                            <option value="12">INSTAGRAM </option>
                            <option value="13">FACE </option>
                            <option value="14">CARTEIRA </option>
                          </select>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputTabela">TABELA</label>
                          <select name="inputTabela" id="inputTabela" class="form-control operacao required cadVenda select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                            <option selected value="">Nada para selecionar</option>
                          </select>
                        </div>
                        <div class="form-group col-md-12">
                          <label for="inputDocumento">Deseja anexar algum documento?</label>
                          <input name="imagens[]" multiple type="file" class="form-control-file" id="inputDocumento" accept=".pdf, .jpg, jpeg, .png">
                          <div class="form-group">
                            <br>
                            <label for="exampleFormControlTextarea1">Observação (opcional)</label>
                            <textarea name="inputObservacao" class="form-control" id="inputObservacao" rows="3"></textarea>
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



          <script>
            function formatarMoeda(input) {
              // Obtém o valor sem formatação (removendo pontos e vírgulas)
              var valor = input.value.replace(/[.,]/g, '');

              // Formata o valor como moeda brasileira
              valor = parseFloat(valor).toFixed(2);
              valor = valor.replace('.', ',');

              // Atualiza o valor no input
              input.value = valor;
            }
            // final do script para os inputs de moeda
          </script>


</body>

</html>




<!--CADASTRAR -->

<?php








if (isset($_POST['button'])) {
  $usuario = $_SESSION['idusuarios'];
  $nome = $_POST['inputNome'];
  $cpf = $_POST["inputCpf"];
  $rg = $_POST['inputRg'];
  $numerobeneficio = $_POST['inputNumeroBeneficio'];
  $dataemissao = $_POST['inputDataEmissao'];
  $orgaoemissor = $_POST['inputOrgaoEmissor'];
  $nascimento = $_POST['inputDataNascimento'];
  $nomedamae = $_POST["inputNomeMae"];
  $nomedopai = $_POST['inputNomePai'];
  $cep = $_POST['inputCep'];
  $rua = $_POST['inputRua'];
  $numero = $_POST['inputNumero'];
  $complemento = $_POST['inputComplemento'];
  $bairro = $_POST['inputBairro'];
  $cidade = $_POST['inputCidade'];
  $naturalidade = $_POST['inputNaturalidade'];
  $uf = $_POST['inputUf'];
  $telefone = $_POST['inputTelefone'];
  $email = $_POST['inputEmail'];
  $convenio = $_POST['inputConvenio'];
  $banco = $_POST['inputBanco'];
  $bancoproposta = $_POST['inputBancoProposta'];
  $tipodeconta = $_POST['inputTipoConta'];
  $agencia = $_POST['inputAgencia'];
  $conta = $_POST['inputConta'];
  $renda = $_POST['inputRenda'];
  $operacao = $_POST['inputOperacao'];
  $tabela = $_POST['inputTabela'];
  $promotora = ""; //Obtendo dado diretamente do banco de dados
  $margem = $_POST['inputMargem'];
  $prazo = $_POST['inputPrazo'];
  $valor = $_POST['inputValor'];
  $valorparcelas = $_POST['inputValorParcelas'];
  $formalizacao = $_POST['inputFormalizacao'];
  $canal = $_POST['inputCanal'];
  $documentoanexado   = $_FILES['imagens'];
  $observacao   = $_POST['inputObservacao'];
  $statusproposta = 'AGUARD DIGITAÇÃO';
  $data = date('d/m/Y H:i');





  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $imagens = $_FILES['imagens'];
    $novo_nome = '';
    foreach ($imagens['name'] as $key => $nomedocumento) {
      if ($imagens['error'][$key] === 0) {
        $extensao = pathinfo($nomedocumento, PATHINFO_EXTENSION);
        $novo_nome = md5(uniqid()) . '.' . $extensao;

        if (move_uploaded_file($imagens['tmp_name'][$key], 'documentos/' . $novo_nome)) {
          // Insira o nome do arquivo no banco de dados
          $query = "INSERT INTO documentos (nome, caminho) VALUES ('$nome','$novo_nome')";
          mysqli_query($conexao, $query);
        }
      }
    }
  }



  if ($_POST["inputTipoConta"] == 1) {
    $tipodeconta = "CONTA CORRENTE";
  } elseif ($_POST["inputTipoConta"] == 2) {
    $tipodeconta = "CONTA SALÁRIO";
  }

  // Verifica se o formulário foi enviado
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Verifica se a chave 'nome' existe no $_POST
    if (isset($_POST["inputBanco"])) {

      // Obtém o valor selecionado no formulário
      $selectedValue = $_POST["inputBanco"];

      // Consulta SQL para obter o nome correspondente ao valor selecionado
      $query = "SELECT banco FROM bancos WHERE id = ?";
      $stmt = mysqli_prepare($conexao, $query);

      // Vincula o parâmetro e executa a consulta
      mysqli_stmt_bind_param($stmt, "i", $selectedValue);
      mysqli_stmt_execute($stmt);

      // Vincula o resultado da consulta
      mysqli_stmt_bind_result($stmt, $banco);

      // Obtém o resultado
      mysqli_stmt_fetch($stmt);

      // Fecha a consulta preparada
      mysqli_stmt_close($stmt);
    }
  }


  // Verifica se o formulário foi enviado
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Verifica se a chave 'nome' existe no $_POST
    if (isset($_POST["inputBancoProposta"])) {

      // Obtém o valor selecionado no formulário
      $selectedValue = $_POST["inputBancoProposta"];

      // Consulta SQL para obter o nome correspondente ao valor selecionado
      $query = "SELECT banco FROM bancos WHERE id = ?";
      $stmt = mysqli_prepare($conexao, $query);

      // Vincula o parâmetro e executa a consulta
      mysqli_stmt_bind_param($stmt, "i", $selectedValue);
      mysqli_stmt_execute($stmt);

      // Vincula o resultado da consulta
      mysqli_stmt_bind_result($stmt, $bancoproposta);

      // Obtém o resultado
      mysqli_stmt_fetch($stmt);

      // Fecha a consulta preparada
      mysqli_stmt_close($stmt);
    }
  }





  if ($_POST['inputValorParcelas'] == 120) {
    $parcela = "120x";
  } elseif ($_POST['inputValorParcelas'] == 96) {
    $parcela = "96x";
  } elseif ($_POST['inputValorParcelas'] == 84) {
    $parcela = "84x";
  } elseif ($_POST['inputValorParcelas'] == 72) {
    $parcela = "72x";
  } elseif ($_POST['inputValorParcelas'] == 60) {
    $parcela = "60x";
  } elseif ($_POST['inputValorParcelas'] == 48) {
    $parcela = "48x";
  } elseif ($_POST['inputValorParcelas'] == 36) {
    $parcela = "36x";
  } elseif ($_POST['inputValorParcelas'] == 24) {
    $parcela = "24x";
  } elseif ($_POST['inputValorParcelas'] == 12) {
    $parcela = "12x";
  }


  if ($_POST['inputCanal'] == 1) {
    $canal = "TELEMARKETING";
  } elseif ($_POST['inputCanal'] == 2) {
    $canal = "SMS";
  } elseif ($_POST['inputCanal'] == 3) {
    $canal = "OUTROS";
  } elseif ($_POST['inputCanal'] == 4) {
    $canal = "WHATSAPP";
  } elseif ($_POST['inputCanal'] == 5) {
    $canal = "FACEBOOK";
  } elseif ($_POST['inputCanal'] == 6) {
    $canal = "ANUNCIO";
  } elseif ($_POST['inputCanal'] == 7) {
    $canal = "DISPAROS WATZAP";
  } elseif ($_POST['inputCanal'] == 8) {
    $canal = "INDICAÇÃO";
  } elseif ($_POST['inputCanal'] == 9) {
    $canal = "LIGAÇÃO";
  } elseif ($_POST['inputCanal'] == 10) {
    $canal = "CLIENTE BALCÃO";
  } elseif ($_POST['inputCanal'] == 11) {
    $canal = "CLIENTE LIGOU NA LOJA";
  } elseif ($_POST['inputCanal'] == 12) {
    $canal = "INSTAGRAM";
  } elseif ($_POST['inputCanal'] == 13) {
    $canal = "FACE";
  } elseif ($_POST['inputCanal'] == 14) {
    $canal = "CARTEIRA";
  }


  // Verifica se o formulário foi enviado
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Verifica se a chave 'nome' existe no $_POST
    if (isset($_POST["promotora"])) {

      // Obtém o valor selecionado no formulário
      $selectedValue = $_POST["promotora"];

      // Consulta SQL para obter o nome correspondente ao valor selecionado
      $query = "SELECT nome FROM promotoras WHERE id = ?";
      $stmt = mysqli_prepare($conexao, $query);

      // Vincula o parâmetro e executa a consulta
      mysqli_stmt_bind_param($stmt, "i", $selectedValue);
      mysqli_stmt_execute($stmt);

      // Vincula o resultado da consulta
      mysqli_stmt_bind_result($stmt, $promotora);

      // Obtém o resultado
      mysqli_stmt_fetch($stmt);

      // Fecha a consulta preparada
      mysqli_stmt_close($stmt);
    }
  }


  if ($_POST['inputFormalizacao'] == 1) {
    $formalizacao = "DIGITAL";
  } elseif ($_POST['inputFormalizacao'] == 2) {
    $formalizacao = "FÍSICO";
  }

  if ($_POST['inputCanal'] == 1) {
    $canal = "TELEMARKETING";
  } elseif ($_POST['inputCanal'] == 2) {
    $canal = "SMS";
  }

  if ($_POST['inputConvenio'] == 1) {
    $convenio = "INSS";
  } elseif ($_POST['inputConvenio'] == 2) {
    $convenio = "FGTS";
  } elseif ($_POST['inputConvenio'] == 3) {
    $convenio = "AUXÍLIO BRASIL";
  } elseif ($_POST['inputConvenio'] == 4) {
    $convenio = "GOVERNO DE SÃO PAULO";
  } elseif ($_POST['inputConvenio'] == 5) {
    $convenio = "PREFEITURA DE SÃO PAULO";
  } elseif ($_POST['inputConvenio'] == 6) {
    $convenio = "GOVERNO DO RIO DE JANEIRO";
  } elseif ($_POST['inputConvenio'] == 7) {
    $convenio = "SIAPE";
  } elseif ($_POST['inputConvenio'] == 8) {
    $convenio = "GOVERNO DA BAHIA";
  } elseif ($_POST['inputConvenio'] == 9) {
    $convenio = "PESSOAL";
  }




  if ($_POST['inputOperacao'] == 1) {
    $operacao = "NOVO";
  } elseif ($_POST['inputOperacao'] == 2) {
    $operacao = "PORTABILIDADE";
  } elseif ($_POST['inputOperacao'] == 3) {
    $operacao = "REFINANCIAMENTO";
  } elseif ($_POST['inputOperacao'] == 4) {
    $operacao = "CARTÃO PLÁSTICO";
  } elseif ($_POST['inputOperacao'] == 5) {
    $operacao = "PORTABILIDADE COM REFIN";
  } elseif ($_POST['inputOperacao'] == 6) {
    $operacao = "CARTÃO COM SAQUE";
  } elseif ($_POST['inputOperacao'] == 7) {
    $operacao = "CARTÃO BENEFÍCIO COM SEGURO";
  } elseif ($_POST['inputOperacao'] == 8) {
    $operacao = "CARTÃO BENEFÍCIO SEM SEGURO";
  } elseif ($_POST['inputOperacao'] == 9) {
    $operacao = "CARTÃO BENEFÍCIO INSS";
  } elseif ($_POST['inputOperacao'] == 10) {
    $operacao = "NOVO REPRESENTANTE LEGAL";
  } elseif ($_POST['inputOperacao'] == 11) {
    $operacao = "NOVO AUMENTO DE SALÁRIO";
  } elseif ($_POST['inputOperacao'] == 12) {
    $operacao = "SAQUE CARTÃO BENEFÍCIO";
  }




  //VERIFICAR SE O NOME JÁ ESTÁ CADASTRADO ANTES DE CADASTRAR UMA NOVA
  /*$query_verificar = "select * from propostas where nome = '$nome' ";

  $result_verificar = mysqli_query($conexao, $query_verificar);
  $row_verificar = mysqli_num_rows($result_verificar);

  if ($row_verificar > 0) {
    echo "<script language='javascript'> window.alert('Proposta para esse cliente já Cadastrada!'); </scrip>";
    exit();
  }
*/


  $query = "INSERT into propostas (idusuario, nome,cpf, rg, numerobeneficio, dataemissao, orgaoemissor, nascimento, nomedamae, nomedopai, cep, rua, numero, complemento, bairro, cidade, naturalidade, uf, telefone, email, convenio, banco, bancoproposta, tipodeconta, agencia, conta, renda, operacao, tabela, promotora, margem, prazo, valor, valorparcelas, formalizacao, canal, documentoanexado, observacao, statusproposta, data) VALUES ('$usuario','$nome','$cpf', '$rg','$numerobeneficio','$dataemissao','$orgaoemissor', '$nascimento','$nomedamae', '$nomedopai', '$cep', '$rua', '$numero','$complemento','$bairro','$cidade','$naturalidade','$uf','$telefone','$email','$convenio','$banco','$bancoproposta','$tipodeconta','$agencia','$conta','$renda','$operacao','$tabela','$promotora','$margem','$prazo','$valor','$valorparcelas','$formalizacao','$canal',' $novo_nome','$observacao','$statusproposta',curDate())";
  $result = mysqli_query($conexao, $query);



  //Editando LOG de usuário, informando que foi adicionada uma nova ocorrÊncia por ele
  /*
  if ($row_verificar > 0) {
    echo "<script language='javascript'> window.alert('Nome já Cadastrado!'); </script>";
    exit();
  }
  */

  /*
  $querylog = "INSERT into loguser (nome, acao, data) VALUES ('$nomeusuario', 'Cadastrou uma proposta: $especie', curDate())";
  $resultlog = mysqli_query($conexao, $querylog);
  // Final do LOG de usuário
*/



  if ($result == '') {
    echo "<script language='javascript'> window.alert('Ocorreu um erro ao Cadastrar!'); </script>";
  } else {

    echo "<script language='javascript'> window.alert('Proposta cadastrada com sucesso!'); </script>";
    echo "<script language='javascript'> window.location='propostas.php'; </script>";
  }
}

?>





















<!--EDITAR -->
<?php
if (@$_GET['func'] == 'editarcliente') {
  $id = $_GET['id'];
  $query = "select * from propostas where idpropostas = '$id'";
  $result = mysqli_query($conexao, $query);




  while ($res_1 = mysqli_fetch_array($result)) {


?>






    <!-- Modal -->
    <div id="modalEditar" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">

            <h4 class="modal-title">EDITAR CLIENTE</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">

            <!-- INÍCIO DO CÓDIGO DAS TABS DE EDIÇÃO DE PROPOSTA-->
            <!-- CONTEÚDO TAB CLIENTE-->
            <form method="POST" action="">
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputNome">NOME*</label>
                  <input name="inputNome" type="text" class="form-control" id="inputNome" placeholder="" required value="<?php echo $res_1['nome']; ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputCpf">CPF</label>
                  <input name="inputCpf" type="text" class="form-control inputCpf" id="inputCpf" placeholder="" value="<?php echo $res_1['cpf']; ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputRg">RG</label>
                  <input name="inputRg" type="text" class="form-control" id="inputRg" placeholder="" value="<?php echo $res_1['rg']; ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputNumeroBeneficio">NÚMERO DO BENEFÍCIO</label>
                  <input name="inputNumeroBeneficio" type="text" class="form-control" id="inputNumeroBeneficio" placeholder="" value="<?php echo $res_1['numerobeneficio']; ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputDataEmissao">DATA DE EMISSÃO</label>
                  <input name="inputDataEmissao" type="text" class="form-control" id="inputDataEmissao" placeholder="" value="<?php echo $res_1['dataemissao']; ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputOrgaoEmissor">ORGÃO EMISSOR</label>
                  <input name="inputOrgaoEmissor" type="text" class="form-control" id="inputOrgaoEmissor" placeholder="" value="<?php echo $res_1['orgaoemissor']; ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputCidade">NATURALIDADE</label>
                  <input name="inputNaturalidade" type="text" class="form-control" id="inputNaturalidade" value="<?php echo $res_1['naturalidade']; ?>">
                </div>
                <div class="form-group col-md-4">
                  <form method="POST" action="">
                    <label for="inputTelefone">TELEFONE</label>
                    <input name="inputTelefone" type="text" class="form-control inputTelefone" id="inputTelefone" placeholder="" value="<?php echo $res_1['telefone']; ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputEmail">EMAIL</label>
                  <input name="inputEmail" type="email" class="form-control" id="inputEmail" placeholder="" value="<?php echo $res_1['email']; ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputDataNascimento">DATA DE NASCIMENTO</label>
                  <input name="inputDataNascimento" type="text" class="form-control inputDataNascimento" id="inputDataNascimento" placeholder="" value="<?php echo $res_1['nascimento']; ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputNomeMae">NOME DA MÃE</label>
                  <input name="inputNomeMae" type="text" class="form-control" id="inputNomeMae" placeholder="" value="<?php echo $res_1['nomedamae']; ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputNomePai">NOME DO PAI</label>
                  <input name="inputNomePai" type="text" class="form-control" id="inputNomePai" placeholder="" value="<?php echo $res_1['nomedopai']; ?>">
                </div>
                <div class="form-group col-md-2">
                  <label for="inputCep">CEP</label>
                  <input name="inputCep" type="text" class="form-control" id="inputCep" placeholder="" value="<?php echo $res_1['cep']; ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputRua">RUA</label>
                  <input name="inputRua" type="text" class="form-control" id="inputRua" placeholder="" value="<?php echo $res_1['rua']; ?>">
                </div>
                <div class="form-group col-md-3">
                  <label for="inputNumero">NÚMERO</label>
                  <input name="inputNumero" type="text" class="form-control" id="inputNumero" placeholder="" value="<?php echo $res_1['numero']; ?>">
                </div>
                <div class="form-group col-md-3">
                  <label for="inputComplemento">COMPLEMENTO</label>
                  <input name="inputComplemento" type="text" class="form-control" id="inputComplemento" placeholder="" value="<?php echo $res_1['complemento']; ?>">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-2">
                  <label for="inputBairro">BAIRRO</label>
                  <input name="inputBairro" type="text" class="form-control" id="inputBairro" value="<?php echo $res_1['bairro']; ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputCidade">CIDADE</label>
                  <input name="inputCidade" type="text" class="form-control" id="inputCidade" value="<?php echo $res_1['cidade']; ?>">
                </div>
                <div class="form-group col-md-3">
                  <label for="inputUf">UF</label>
                  <select name="inputUf" id="inputUf" class="form-control">
                    <option selected><?php echo $res_1['uf']; ?></option>
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

          <div class="modal-footer">


            <button id="salvarBotao" type="submit" class="btn btn-success mb-3 btn-lg" name="buttonEditar">Editar</button>


            <button type="button" class="btn btn-danger mb-3 btn-lg" data-dismiss="modal">Cancelar </button>


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
      $usuario = $_SESSION['nome_usuario'];
      $nome = $_POST['inputNome'];
      $cpf = $_POST["inputCpf"];
      $rg = $_POST['inputRg'];
      $numerobeneficio = $_POST['inputNumeroBeneficio'];
      $dataemissao = $_POST['inputDataEmissao'];
      $orgaoemissor = $_POST['inputOrgaoEmissor'];
      $telefone = $_POST['inputTelefone'];
      $email = $_POST['inputEmail'];
      $nascimento = $_POST['inputDataNascimento'];
      $nomedamae = $_POST["inputNomeMae"];
      $nomedopai = $_POST['inputNomePai'];
      $cep = $_POST['inputCep'];
      $rua = $_POST['inputRua'];
      $numero = $_POST['inputNumero'];
      $complemento = $_POST['inputComplemento'];
      $bairro = $_POST['inputBairro'];
      $cidade = $_POST['inputCidade'];
      $uf = $_POST['inputUf'];
      $data = date('d/m/Y H:i');







      //Marcando o uf com base no valor do input bairro
      if (isset($_POST["inputUf"])) {
        $inputUf = $_POST["inputUf"];

        if ($uf == "AC") {
          $uf = "Acre (AC)";
        }
        if ($uf == "AL") {
          $$uf = "Alagoas (AL)";
        }
        if ($uf == "AP") {
          $uf = "Amapá (AP)";
        }
        if ($uf == "AM") {
          $uf = "Amazonas (AM)";
        }
        if ($uf == "BA") {
          $uf = "Bahia (BA)";
        }
        if ($uf == "CE") {
          $uf = "Ceará (CE)";
        }
        if ($uf == "DF") {
          $uf = "Distrito Federal (DF)";
        }
        if ($inputUf == "ES") {
          $bairro = "Espírito Santo (ES)";
        }
        if ($uf == "GO") {
          $uf = "Goiás (GO)";
        }
        if ($uf == "MA") {
          $uf = "Maranhão (MA)";
        }
        if ($uf == "MT") {
          $uf = "Mato Grosso (MT)";
        }
        if ($uf == "MS") {
          $uf = "Mato Grosso do Sul (MS)";
        }
        if ($uf == "MG") {
          $uf = "Minas Gerais (MG)";
        }
        if ($uf == "PA") {
          $uf = "Pará (PA)";
        }
        if ($uf == "PB") {
          $uf = "Paraíba (PB)";
        }
        if ($uf == "PR") {
          $uf = "Paraná (PR)";
        }
        if ($uf == "PE") {
          $uf = "Pernambuco (PE)";
        }
        if ($uf == "PI") {
          $uf = "Piauí (PI)";
        }
        if ($uf == "RJ") {
          $uf = "Rio de Janeiro (RJ)";
        }
        if ($uf == "RN") {
          $uf = "Rio Grande do Norte (RN)";
        }
        if ($uf == "RS") {
          $uf = "Rio Grande do Sul (RS)";
        }
        if ($uf == "RO") {
          $uf = "Rondônia (RO)";
        }
        if ($uf == "RR") {
          $uf = "Roraima (RR)";
        }
        if ($uf == "SC") {
          $uf = "Santa Catarina (SC)";
        }
        if ($uf == "SP") {
          $uf = "São Paulo (SP)";
        }
        if ($uf == "SE") {
          $uf = "Sergipe (SE)";
        }
        if ($uf == "TO") {
          $uf = "Tocantins (TO)";
        }
      }











      $query_editar = "UPDATE propostas set nome = '$nome', cpf = '$cpf', rg = '$rg',numerobeneficio = '$numerobeneficio', dataemissao = '$dataemissao',orgaoemissor = '$orgaoemissor', telefone = '$telefone', email = '$email', nascimento = '$nascimento',nomedamae = '$nomedamae', nomedopai = '$nomedopai', cep = '$cep', rua = '$rua', numero = '$numero', complemento = '$complemento', bairro = '$bairro', cidade = '$cidade', uf = '$uf' where idpropostas = '$id' ";

      $result_editar = mysqli_query($conexao, $query_editar);

      /*
      $queryeditar = "INSERT into loguser (nome, acao, data) VALUES ('$nomeusuario', 'Editou um pet de espécie: $especie', curDate())";
      $resulteditar = mysqli_query($conexao, $queryeditar);
      */
      if ($result_editar == '') {
        echo "<script language='javascript'> window.alert('Ocorreu um erro ao Editar!'); </script>";
      } else {
        echo "<script language='javascript'> window.alert('Editado com Sucesso!'); </script>";
        echo "<script language='javascript'> window.location='propostas.php'; </script>";
      }
    }
    ?>


<?php }
}  ?>



<script type="text/javascript">
  $(document).ready(function() {
    $('#txtcpf').mask('000.000.000-00'); // Másrcara para o input do cpf 
    //$('#txtdata').mask('0000-00-00'); 
  });
</script>




</script>







<!--inínio modal propostas-->
<?php
if (@$_GET['func'] == 'editarpropostas') {
  $id = $_GET['id'];
  $query = "select * from propostas where idpropostas = '$id'";
  $result = mysqli_query($conexao, $query);




  while ($res_1 = mysqli_fetch_array($result)) {


?>






    <!-- Modal  -->
    <div id="modalpropostas" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">EDITAR PROPOSTAS</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <div class="modal-header">


            <!-- INÍCIO DO CONTEÚDO TAB PROPOSTAS-->

            <form method="POST" action="">
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="inputConvenio">CONVÊNIO</label>
                  <select name="inputConvenio" class="form-control" id="inputConvenio">
                    <option selected><?php echo $res_1['convenio']; ?></option>
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
                <div class="form-group col-md-3">
                  <label for="inputOperacao">OPERAÇÃO</label>
                  <select name="inputOperacao" name="inputOperacao" class="form-control operacao required cadVenda select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                    <option selected><?php echo $res_1['operacao']; ?></option>
                    <option value="3">REFINANCIAMENTO </option>
                    <option value="2">PORTABILIDADE </option>
                    <option value="1">NOVO </option>
                    <option value="4">CARTÃO PLÁSTICO </option>
                    <option value="6">CARTÃO COM SAQUE </option>
                    <option value="5">PORTABILIDADE COM REFIN </option>
                    <option value="7">CARTÃO BENEFÍCIO COM SEGURO </option>
                    <option value="8">CARTÃO BENEFÍCIO SEM SEGURO </option>
                    <option value="9">CARTÃO BENEFÍCIO INSS </option>
                    <option value="10">NOVO REPRESENTANTE LEGAL </option>
                    <option value="11">NOVO AUMENTO DE SALARIO </option>
                    <option value="12">SAQUE CARTÃO BENEFÍCIO </option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputBanco">BANCO DA PROPOSTA</label>
                  <select name="inputBanco" id="inputBanco" class="form-control bancos required cadVenda select2-hidden-accessible" aria-hidden="true" tabindex="-1">
                    <option selected><?php echo $res_1['bancoproposta']; ?></option>
                    <?php

                    $query = "SELECT id, banco FROM bancos";
                    $result = mysqli_query($conexao, $query);




                    // Verificar se a consulta teve sucesso
                    if (!$result) {
                      die("Erro na consulta: " . mysqli_error($conexao));
                    }

                    while ($row = mysqli_fetch_assoc($result)) {
                      echo '<option value="' . $row['id'] . '">' . $row['banco'] . '</option>';
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="id_produto">Promotora</label>
                  <select name="promotora" class="custom-select" id="promotora">
                    <?php

                    $query = "SELECT id, nome FROM promotoras";
                    $result = mysqli_query($conexao, $query);




                    // Verificar se a consulta teve sucesso
                    if (!$result) {
                      die("Erro na consulta: " . mysqli_error($conexao));
                    }

                    while ($row = mysqli_fetch_assoc($result)) {
                      echo '<option value="' . $row['id'] . '">' . $row['nome'] . '</option>';
                    }
                    ?>
                  </select>

                </div>
                <div class="form-group col-md-3">
                  <label for="inputMargem">MARGEM</label>
                  <input name="inputMargem" id="inputMargem" type="Text" class="form-control" size="12" onKeyUp="mascaraMoeda(this, event)" value="">
                </div>
                <div class="form-group col-md-3">
                  <label for="inputPrazo">PRAZO</label>
                  <select name="inputPrazo" class="form-control parcelas" data-gtm-form-interact-field-id="1">
                    <option selected><?php echo $res_1['prazo']; ?></option>
                    <option value="120">120x</option>
                    <option value="96">96x</option>
                    <option value="84">84x</option>
                    <option value="72">72x</option>
                    <option value="60">60x</option>
                    <option value="48">48x</option>
                    <option value="36">36x</option>
                    <option value="24">24x</option>
                    <option value="12">12x</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputValor">VALOR</label>
                  <input name="inputValor" id="inputValor" type="Text" class="form-control" size="12" onKeyUp="mascaraMoeda(this, event)" value="<?php echo $res_1['valor']; ?>">
                </div>
                <div class="form-group col-md-3">
                  <label for="inputValorParcelas">VALOR PARCELAS</label>
                  <input name="inputValorParcelas" id="inputValorParcelas" type="Text" class="form-control" size="12" onKeyUp="mascaraMoeda(this, event)" value="<?php echo $res_1['valorparcelas']; ?>">
                </div>
                <div class="form-group col-md-3">
                  <label for="inputFormalizacao">FORMALIZAÇÃO</label>
                  <select name="inputFormalizacao" id="inputFormalizacao" class="form-control canais required cadVenda select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                    <option selected><?php echo $res_1['formalizacao']; ?></option>
                    <option value="1">FÍSICO</option>
                    <option value="2">DIGITAL</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputCanal">CANAL</label>
                  <select name="inputCanal" id="inputCanal" class="form-control canais required cadVenda select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                    <option selected><?php echo $res_1['canal']; ?></option>
                    <option value="1">TELEMARKETING </option>
                    <option value="2">SMS </option>
                    <option value="3">OUTROS </option>
                    <option value="4">WHATSAPP </option>
                    <option value="5">FACEBOOK </option>
                    <option value="6">ANUNCIO DANIEL </option>
                    <option value="7">DISPAROS WATZAP </option>
                    <option value="8">INDICAÇÃO </option>
                    <option value="9">LIGAÇÃO </option>
                    <option value="10">CLIENTE BALCÃO </option>
                    <option value="11">CLIENTE LIGOU NA LOJA </option>
                    <option value="12">INSTAGRAM </option>
                    <option value="13">FACE </option>
                    <option value="14">CARTEIRA </option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputTabela">TABELA</label>
                  <select name="inputTabela" id="inputTabela" class="form-control operacao required cadVenda select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                    <option selected value="">Nada para selecionar</option>
                  </select>
                </div>
                <div class="form-group col-md-12">
                  <small class="text-muted">Para adicionar novos documentos a esse cliente vá para a área de documentos na página principal.</small>
                  <input name="imagens[]" multiple type="file" class="form-control-file" id="inputDocumento" accept=".pdf, .jpg, jpeg, .png" disabled>
                  <div class="form-group">
                    <br>
                    <label for="exampleFormControlTextarea1">Observação (opcional)</label>
                    <textarea name="inputObservacao" class="form-control" id="inputObservacao" rows="3"><?php echo $res_1['observacao']; ?></textarea>
                  </div>
                </div>


              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success mb-3" name="buttonEditarProposta">Salvar </button>


            <button type="button" class="btn btn-danger mb-3" data-dismiss="modal">Cancelar </button>
            </form>
          </div>
        </div>
      </div>
    </div>



    <script>
      $("#modalpropostas").modal("show");
    </script>


    <?php
    if (isset($_POST['buttonEditarProposta'])) {
      $convenio = $_POST['inputConvenio'];
      $operacao = $_POST['inputOperacao'];
      $banco = $_POST['inputBanco'];
      $promotora = ""; //Obtendo dado diretamente do banco de dados
      $margem = $_POST['inputMargem'];
      $prazo = $_POST['inputPrazo'];
      $valor = $_POST['inputValor'];
      $valorparcelas = $_POST['inputValorParcelas'];
      $formalizacao = $_POST['inputFormalizacao'];
      $canal = $_POST['inputCanal'];

      $observacao   = $_POST['inputObservacao'];





      $query_editar = "UPDATE propostas set convenio = '$convenio', operacao = '$operacao', bancoproposta = '$banco', promotora = '$promotora', margem = '$margem', prazo = '$prazo', valor = '$valor', valorparcelas = '$valorparcelas', formalizacao = '$formalizacao', canal = '$canal', tabela = '$tabela', observacao = '$observacao' where idpropostas = '$id' ";

      $result_editar = mysqli_query($conexao, $query_editar);


      // Verifica se o formulário foi enviado
      if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Verifica se a chave 'nome' existe no $_POST
        if (isset($_POST["inputBanco"])) {

          // Obtém o valor selecionado no formulário
          $selectedValue = $_POST["inputBanco"];

          // Consulta SQL para obter o nome correspondente ao valor selecionado
          $query = "SELECT banco FROM bancos WHERE id = ?";
          $stmt = mysqli_prepare($conexao, $query);

          // Vincula o parâmetro e executa a consulta
          mysqli_stmt_bind_param($stmt, "i", $selectedValue);
          mysqli_stmt_execute($stmt);

          // Vincula o resultado da consulta
          mysqli_stmt_bind_result($stmt, $banco);

          // Obtém o resultado
          mysqli_stmt_fetch($stmt);

          // Fecha a consulta preparada
          mysqli_stmt_close($stmt);
        }
      }


      if ($_POST['inputValorParcelas'] == 120) {
        $parcela = "120x";
      } elseif ($_POST['inputValorParcelas'] == 96) {
        $parcela = "96x";
      } elseif ($_POST['inputValorParcelas'] == 84) {
        $parcela = "84x";
      } elseif ($_POST['inputValorParcelas'] == 72) {
        $parcela = "72x";
      } elseif ($_POST['inputValorParcelas'] == 60) {
        $parcela = "60x";
      } elseif ($_POST['inputValorParcelas'] == 48) {
        $parcela = "48x";
      } elseif ($_POST['inputValorParcelas'] == 36) {
        $parcela = "36x";
      } elseif ($_POST['inputValorParcelas'] == 24) {
        $parcela = "24x";
      } elseif ($_POST['inputValorParcelas'] == 12) {
        $parcela = "12x";
      }


      if ($_POST['inputCanal'] == 1) {
        $canal = "TELEMARKETING";
      } elseif ($_POST['inputCanal'] == 2) {
        $canal = "SMS";
      } elseif ($_POST['inputCanal'] == 3) {
        $canal = "OUTROS";
      } elseif ($_POST['inputCanal'] == 4) {
        $canal = "WHATSAPP";
      } elseif ($_POST['inputCanal'] == 5) {
        $canal = "FACEBOOK";
      } elseif ($_POST['inputCanal'] == 6) {
        $canal = "ANUNCIO";
      } elseif ($_POST['inputCanal'] == 7) {
        $canal = "DISPAROS WATZAP";
      } elseif ($_POST['inputCanal'] == 8) {
        $canal = "INDICAÇÃO";
      } elseif ($_POST['inputCanal'] == 9) {
        $canal = "LIGAÇÃO";
      } elseif ($_POST['inputCanal'] == 10) {
        $canal = "CLIENTE BALCÃO";
      } elseif ($_POST['inputCanal'] == 11) {
        $canal = "CLIENTE LIGOU NA LOJA";
      } elseif ($_POST['inputCanal'] == 12) {
        $canal = "INSTAGRAM";
      } elseif ($_POST['inputCanal'] == 13) {
        $canal = "FACE";
      } elseif ($_POST['inputCanal'] == 14) {
        $canal = "CARTEIRA";
      }


      // Verifica se o formulário foi enviado
      if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Verifica se a chave 'nome' existe no $_POST
        if (isset($_POST["promotora"])) {

          // Obtém o valor selecionado no formulário
          $selectedValue = $_POST["promotora"];

          // Consulta SQL para obter o nome correspondente ao valor selecionado
          $query = "SELECT nome FROM promotoras WHERE id = ?";
          $stmt = mysqli_prepare($conexao, $query);

          // Vincula o parâmetro e executa a consulta
          mysqli_stmt_bind_param($stmt, "i", $selectedValue);
          mysqli_stmt_execute($stmt);

          // Vincula o resultado da consulta
          mysqli_stmt_bind_result($stmt, $promotora);

          // Obtém o resultado
          mysqli_stmt_fetch($stmt);

          // Fecha a consulta preparada
          mysqli_stmt_close($stmt);
        }
      }


      if ($_POST['inputFormalizacao'] == 1) {
        $formalizacao = "DIGITAL";
      } elseif ($_POST['inputFormalizacao'] == 2) {
        $formalizacao = "FÍSICO";
      }

      if ($_POST['inputCanal'] == 1) {
        $canal = "TELEMARKETING";
      } elseif ($_POST['inputCanal'] == 2) {
        $canal = "SMS";
      }

      if ($_POST['inputConvenio'] == 1) {
        $convenio = "INSS";
      } elseif ($_POST['inputConvenio'] == 2) {
        $convenio = "FGTS";
      } elseif ($_POST['inputConvenio'] == 3) {
        $convenio = "AUXÍLIO BRASIL";
      } elseif ($_POST['inputConvenio'] == 4) {
        $convenio = "GOVERNO DE SÃO PAULO";
      } elseif ($_POST['inputConvenio'] == 5) {
        $convenio = "PREFEITURA DE SÃO PAULO";
      } elseif ($_POST['inputConvenio'] == 6) {
        $convenio = "GOVERNO DO RIO DE JANEIRO";
      } elseif ($_POST['inputConvenio'] == 7) {
        $convenio = "SIAPE";
      } elseif ($_POST['inputConvenio'] == 8) {
        $convenio = "GOVERNO DA BAHIA";
      } elseif ($_POST['inputConvenio'] == 9) {
        $convenio = "PESSOAL";
      }




      if ($_POST['inputOperacao'] == 1) {
        $operacao = "NOVO";
      } elseif ($_POST['inputOperacao'] == 2) {
        $operacao = "PORTABILIDADE";
      } elseif ($_POST['inputOperacao'] == 3) {
        $operacao = "REFINANCIAMENTO";
      } elseif ($_POST['inputOperacao'] == 4) {
        $operacao = "CARTÃO PLÁSTICO";
      } elseif ($_POST['inputOperacao'] == 5) {
        $operacao = "PORTABILIDADE COM REFIN";
      } elseif ($_POST['inputOperacao'] == 6) {
        $operacao = "CARTÃO COM SAQUE";
      } elseif ($_POST['inputOperacao'] == 7) {
        $operacao = "CARTÃO BENEFÍCIO COM SEGURO";
      } elseif ($_POST['inputOperacao'] == 8) {
        $operacao = "CARTÃO BENEFÍCIO SEM SEGURO";
      } elseif ($_POST['inputOperacao'] == 9) {
        $operacao = "CARTÃO BENEFÍCIO INSS";
      } elseif ($_POST['inputOperacao'] == 10) {
        $operacao = "NOVO REPRESENTANTE LEGAL";
      } elseif ($_POST['inputOperacao'] == 11) {
        $operacao = "NOVO AUMENTO DE SALÁRIO";
      } elseif ($_POST['inputOperacao'] == 12) {
        $operacao = "SAQUE CARTÃO BENEFÍCIO";
      }









      $query_editar = "UPDATE propostas set convenio = '$convenio', operacao = '$operacao', bancoproposta = '$banco', promotora = '$promotora', margem = '$margem',prazo = '$prazo', valor = '$valor', valorparcelas = '$valorparcelas', formalizacao = '$formalizacao', canal = '$canal', tabela = '$tabela', observacao = '$observacao' where idpropostas = '$id' ";

      $result_editar = mysqli_query($conexao, $query_editar);

      /*
      $queryeditar = "INSERT into loguser (nome, acao, data) VALUES ('$nomeusuario', 'Editou um pet de espécie: $especie', curDate())";
      $resulteditar = mysqli_query($conexao, $queryeditar);
      */
      if ($result_editar == '') {
        echo "<script language='javascript'> window.alert('Ocorreu um erro ao Editar!'); </script>";
      } else {
        echo "<script language='javascript'> window.alert('Editado com Sucesso!'); </script>";
        echo "<script language='javascript'> window.location='propostas.php'; </script>";
      }
    }
    ?>





<?php }
}  ?>
<!--final modal propostas -->



<!--inínio modal dados bancários-->
<?php
if (@$_GET['func'] == 'editardadosbancarios') {
  $id = $_GET['id'];
  $query = "select * from propostas where idpropostas = '$id'";
  $result = mysqli_query($conexao, $query);




  while ($res_1 = mysqli_fetch_array($result)) {


?>






    <!-- Modal  -->
    <div id="modaldadosbancarios" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">

            <h4 class="modal-title">EDITAR DADOS BANCÁRIOS</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <div class="modal-header">

            <!--marcador-->
            <!-- INÍCIO DO CONTEÚDO TAB DADOS BANCÁRIOS-->

            <div class="form-row">
              <div class="form-group col-md-6">
                <form method="POST" action="">
                  <label for="inputBanco" id="inputBanco">BANCO DADOS BANCÁRIOS</label>
                  <select name="inputBanco" class="form-control bancos required cadVenda select2-hidden-accessible" aria-hidden="true" tabindex="-1">
                    <option selected><?php echo $res_1['banco']; ?></option>
                    <?php

                    $query = "SELECT id, banco FROM bancos";
                    $result = mysqli_query($conexao, $query);




                    // Verificar se a consulta teve sucesso
                    if (!$result) {
                      die("Erro na consulta: " . mysqli_error($conexao));
                    }

                    while ($row = mysqli_fetch_assoc($result)) {
                      echo '<option value="' . $row['id'] . '">' . $row['banco'] . '</option>';
                    }
                    ?>
                  </select>
              </div>
              <div class="form-group col-md-6">
                <label for="inputTipoConta">TIPO DE CONTA</label>
                <input name="inputTipoConta" type="text" class="form-control" id="inputTipoConta" placeholder="" value="<?php echo $res_1['tipodeconta']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="inputAgencia">AGENCIA</label>
                <input name="inputAgencia" type="text" class="form-control" id="inputAgencia" placeholder="" value="<?php echo $res_1['agencia']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="inputConta">CONTA</label>
                <input name="inputConta" type="text" class="form-control" id="inputConta" placeholder="" value="<?php echo $res_1['conta']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="inputRenda">RENDA</label>
                <input name="inputRenda" type="text" class="form-control" id="inputRenda" placeholder="" value="<?php echo $res_1['renda']; ?>" size="12" onKeyUp="mascaraMoeda(this, event)">
              </div>
            </div>

            <!-- FINAL DO CONTEÚDO TAB DADOS BANCÁRIOS-->

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success mb-3" name="buttonEditarDadosBancarios">Salvar </button>


            <button type="button" class="btn btn-danger mb-3" data-dismiss="modal">Cancelar </button>
            </form>
          </div>
        </div>
      </div>
    </div>



    <script>
      $("#modaldadosbancarios").modal("show");
    </script>



    <?php
    if (isset($_POST['buttonEditarDadosBancarios'])) {
      $banco = $_POST['inputBanco'];
      $tipodeconta = $_POST['inputTipoConta'];
      $agencia = $_POST['inputAgencia'];
      $conta = $_POST['inputConta'];
      $renda = $_POST['inputRenda'];



      // Verifica o valor selecionado e atualiza a variável $banco conforme necessário
      if ($_POST["inputBanco"] == 1) {
        $banco = "001 - BANCO DO BRASIL";
      } elseif ($_POST["inputBanco"] == 3) {
        $banco = "003 - BANCO DA AMAZÔNIA";
      } elseif ($_POST["inputBanco"] == 4) {
        $banco = "004 - BANCO DO NORDESTE DO BRASIL";
      } elseif ($_POST["inputBanco"] == 7) {
        $banco = "007 - BNDES";
      } elseif ($_POST["inputBanco"] == 10) {
        $banco = "010 - CREDICOAMO";
      } elseif ($_POST["inputBanco"] == 11) {
        $banco = "011 - Credit Suisse";
      } elseif ($_POST["inputBanco"] == 12) {
        $banco = "012 - BANCO INBURSA";
      } elseif ($_POST["inputBanco"] == 14) {
        $banco = "014 - NATIXIS BRASIL";
      } elseif ($_POST["inputBanco"] == 15) {
        $banco = "015 - UBS BRASIL CCTVM";
      } elseif ($_POST["inputBanco"] == 16) {
        $banco = "016 - CCM DESP TRANS SC E RS";
      } elseif ($_POST["inputBanco"] == 17) {
        $banco = "017 - BNY MELLON BANCO";
      } elseif ($_POST["inputBanco"] == 18) {
        $banco = "018 - BANCO TRICURY";
      } elseif ($_POST["inputBanco"] == 21) {
        $banco = "021 - BANCO BANESTES";
      } elseif ($_POST["inputBanco"] == 24) {
        $banco = "024 - BCO BANDEPE";
      } elseif ($_POST["inputBanco"] == 25) {
        $banco = "025 - BANCO ALFA";
      } elseif ($_POST["inputBanco"] == 29) {
        $banco = "029 - BANCO ITAU CONSIGNADO";
      } elseif ($_POST["inputBanco"] == 33) {
        $banco = "033 - BANCO SANTANDER BRASIL";
      } elseif ($_POST["inputBanco"] == 36) {
        $banco = "036 - BANCO BBI";
      } elseif ($_POST["inputBanco"] == 37) {
        $banco = "037 - BANCO DO ESTADO DO PARÁ";
      } elseif ($_POST["inputBanco"] == 40) {
        $banco = "040 - BANCO CARGILL";
      } elseif ($_POST["inputBanco"] == 41) {
        $banco = "041 - BANRISUL";
      } elseif ($_POST["inputBanco"] == 47) {
        $banco = "047 - BANCO DO ESTADO DE SERGIPE";
      } elseif ($_POST["inputBanco"] == 60) {
        $banco = "060 - CONFIDENCE CC";
      } elseif ($_POST["inputBanco"] == 62) {
        $banco = "062 - HIPERCARD BM";
      } elseif ($_POST["inputBanco"] == 63) {
        $banco = "063 - BANCO BRADESCARD";
      } elseif ($_POST["inputBanco"] == 64) {
        $banco = "064 - GOLDMAN SACHS DO BRASIL BM";
      } elseif ($_POST["inputBanco"] == 65) {
        $banco = "065 - BANCO ANDBANK";
      } elseif ($_POST["inputBanco"] == 66) {
        $banco = "066 - BANCO MORGAN STANLEY";
      } elseif ($_POST["inputBanco"] == 69) {
        $banco = "069 - BANCO CREFISA";
      } elseif ($_POST["inputBanco"] == 70) {
        $banco = "070 - BANCO DE BRASÍLIA (BRB)";
      } elseif ($_POST["inputBanco"] == 74) {
        $banco = "074 - BCO. J.SAFRA";
      } elseif ($_POST["inputBanco"] == 75) {
        $banco = "075 - BCO ABN AMRO";
      } elseif ($_POST["inputBanco"] == 76) {
        $banco = "076 - BANCO KDB BRASIL";
      } elseif ($_POST["inputBanco"] == 77) {
        $banco = "077 - BANCO INTER";
      } elseif ($_POST["inputBanco"] == 78) {
        $banco = "078 - HAITONG BI DO BRASIL";
      } elseif ($_POST["inputBanco"] == 79) {
        $banco = "079 - BANCO ORIGINAL DO AGRONEGÓCIO";
      } elseif ($_POST["inputBanco"] == 80) {
        $banco = "080 - B&T CC LTDA";
      } elseif ($_POST["inputBanco"] == 81) {
        $banco = "081 - BBN BANCO BRASILEIRO DE NEGÓCIOS";
      } elseif ($_POST["inputBanco"] == 82) {
        $banco = "082 - BANCO TOPÁZIO";
      } elseif ($_POST["inputBanco"] == 83) {
        $banco = "083 - BANCO DA CHINA BRASIL";
      } elseif ($_POST["inputBanco"] == 84) {
        $banco = "084 - UNIPRIME NORTE DO PARANÁ";
      } elseif ($_POST["inputBanco"] == 85) {
        $banco = "085 - COOP CENTRAL AILOS";
      } elseif ($_POST["inputBanco"] == 89) {
        $banco = "089 - CCR REG MOGIANA";
      } elseif ($_POST["inputBanco"] == 91) {
        $banco = "091 - UNICRED CENTRAL RS";
      } elseif ($_POST["inputBanco"] == 92) {
        $banco = "092 - BRK";
      } elseif ($_POST["inputBanco"] == 93) {
        $banco = "093 - PÓLOCRED SCMEPP LTDA";
      } elseif ($_POST["inputBanco"] == 94) {
        $banco = "094 - BANCO FINAXIS";
      } elseif ($_POST["inputBanco"] == 95) {
        $banco = "095 - BANCO CONFIDENCE DE CÂMBIO";
      } elseif ($_POST["inputBanco"] == 96) {
        $banco = "096 - BANCO B3";
      } elseif ($_POST["inputBanco"] == 97) {
        $banco = "097 - CCC NOROESTE BRASILEIRO LTDA";
      } elseif ($_POST["inputBanco"] == 98) {
        $banco = "098 - CREDIALIANÇA CCR";
      } elseif ($_POST["inputBanco"] == 99) {
        $banco = "099 - UNIPRIME CENTRAL CCC LTDA";
      } elseif ($_POST["inputBanco"] == 100) {
        $banco = "100 - PLANNER CORRETORA DE VALORES";
      } elseif ($_POST["inputBanco"] == 101) {
        $banco = "101 - RENASCENÇA DTVM LTDA";
      } elseif ($_POST["inputBanco"] == 102) {
        $banco = "102 - XP INVESTIMENTOS";
      } elseif ($_POST["inputBanco"] == 104) {
        $banco = "104 - CAIXA ECONÔMICA FEDERAL (CEF)";
      } elseif ($_POST["inputBanco"] == 105) {
        $banco = "105 - LECCA CFI";
      } elseif ($_POST["inputBanco"] == 107) {
        $banco = "107 - BANCO BOCOM BBM";
      } elseif ($_POST["inputBanco"] == 108) {
        $banco = "108 - PORTOCRED";
      } elseif ($_POST["inputBanco"] == 111) {
        $banco = "111 - BANCO OLIVEIRA TRUST DTVM";
      } elseif ($_POST["inputBanco"] == 113) {
        $banco = "113 - MAGLIANO";
      } elseif ($_POST["inputBanco"] == 114) {
        $banco = "114 - CENTRAL COOPERATIVA DE CRÉDITO NO ESTADO DO E";
      } elseif ($_POST["inputBanco"] == 117) {
        $banco = "117 - ADVANCED CC LTDA";
      } elseif ($_POST["inputBanco"] == 118) {
        $banco = "118 - STANDARD CHARTERED BI";
      } elseif ($_POST["inputBanco"] == 119) {
        $banco = "119 - BANCO WESTERN UNION";
      } elseif ($_POST["inputBanco"] == 120) {
        $banco = "120 - BANCO RODOBENS";
      } elseif ($_POST["inputBanco"] == 121) {
        $banco = "121 - BANCO AGIBANK";
      } elseif ($_POST["inputBanco"] == 122) {
        $banco = "122 - BANCO BRADESCO BERJ";
      } elseif ($_POST["inputBanco"] == 124) {
        $banco = "124 - BANCO WOORI BANK DO BRASIL";
      } elseif ($_POST["inputBanco"] == 125) {
        $banco = "125 - BRASIL PLURAL BANCO";
      } elseif ($_POST["inputBanco"] == 126) {
        $banco = "126 - BR PARTNERS BI";
      } elseif ($_POST["inputBanco"] == 127) {
        $banco = "127 - CODEPE CVC";
      } elseif ($_POST["inputBanco"] == 128) {
        $banco = "128 - MS BANK BANCO DE CÂMBIO";
      } elseif ($_POST["inputBanco"] == 129) {
        $banco = "129 - UBS BRASIL BI";
      } elseif ($_POST["inputBanco"] == 130) {
        $banco = "130 - CARUANA SCFI";
      } elseif ($_POST["inputBanco"] == 131) {
        $banco = "131 - TULLETT PREBON BRASIL CVC LTDA";
      } elseif ($_POST["inputBanco"] == 132) {
        $banco = "132 - ICBC DO BRASIL BM";
      } elseif ($_POST["inputBanco"] == 133) {
        $banco = "133 - CRESOL CONFEDERAÇÃO";
      } elseif ($_POST["inputBanco"] == 134) {
        $banco = "134 - BGC LIQUIDEZ DTVM LTDA";
      } elseif ($_POST["inputBanco"] == 136) {
        $banco = "136 - UNICRED COOPERATIVA";
      } elseif ($_POST["inputBanco"] == 137) {
        $banco = "137 - MULTIMONEY CC LTDA";
      } elseif ($_POST["inputBanco"] == 138) {
        $banco = "138 - GET MONEY CC LTDA";
      } elseif ($_POST["inputBanco"] == 139) {
        $banco = "139 - INTESA SANPAOLO BRASIL";
      } elseif ($_POST["inputBanco"] == 140) {
        $banco = "140 - EASYNVEST - TÍTULO CV";
      } elseif ($_POST["inputBanco"] == 142) {
        $banco = "142 - BROKER BRASIL CC LTDA";
      } elseif ($_POST["inputBanco"] == 143) {
        $banco = "143 - TREVISO CC";
      } elseif ($_POST["inputBanco"] == 144) {
        $banco = "144 - BEXS BANCO DE CÂMBIO";
      } elseif ($_POST["inputBanco"] == 145) {
        $banco = "145 - LEVYCAM CCV LTDA";
      } elseif ($_POST["inputBanco"] == 146) {
        $banco = "146 - GUITTA CC LTDA";
      } elseif ($_POST["inputBanco"] == 149) {
        $banco = "149 - FACTA . CFI";
      } elseif ($_POST["inputBanco"] == 157) {
        $banco = "157 - ICAP DO BRASIL CTVM LTDA";
      } elseif ($_POST["inputBanco"] == 159) {
        $banco = "159 - CASA CRÉDITO";
      } elseif ($_POST["inputBanco"] == 163) {
        $banco = "163 - COMMERZBANK BRASIL BANCO MÚLTIPLO";
      } elseif ($_POST["inputBanco"] == 169) {
        $banco = "169 - BANCO OLE CONSIGNADO";
      } elseif ($_POST["inputBanco"] == 172) {
        $banco = "172 - ALBATROSS CCV";
      } elseif ($_POST["inputBanco"] == 173) {
        $banco = "173 - BRL TRUST DTVM SA";
      } elseif ($_POST["inputBanco"] == 174) {
        $banco = "174 - PERNAMBUCANAS FINANC";
      } elseif ($_POST["inputBanco"] == 177) {
        $banco = "177 - GUIDE";
      } elseif ($_POST["inputBanco"] == 180) {
        $banco = "180 - CM CAPITAL MARKETS CCTVM LTDA";
      } elseif ($_POST["inputBanco"] == 182) {
        $banco = "182 - DACASA FINANCEIRA S/A";
      } elseif ($_POST["inputBanco"] == 183) {
        $banco = "183 - SOCRED";
      } elseif ($_POST["inputBanco"] == 184) {
        $banco = "184 - BANCO ITAÚ BBA";
      } elseif ($_POST["inputBanco"] == 188) {
        $banco = "188 - ATIVA INVESTIMENTOS";
      } elseif ($_POST["inputBanco"] == 189) {
        $banco = "189 - HS FINANCEIRA";
      } elseif ($_POST["inputBanco"] == 190) {
        $banco = "190 - SERVICOOP";
      } elseif ($_POST["inputBanco"] == 191) {
        $banco = "191 - NOVA FUTURA CTVM LTDA";
      } elseif ($_POST["inputBanco"] == 194) {
        $banco = "194 - PARMETAL DTVM LTDA";
      } elseif ($_POST["inputBanco"] == 196) {
        $banco = "196 - BANCO FAIR CC";
      } elseif ($_POST["inputBanco"] == 197) {
        $banco = "197 - STONE PAGAMENTOS";
      } elseif ($_POST["inputBanco"] == 204) {
        $banco = "204 - BANCO BRADESCO CARTÕES";
      } elseif ($_POST["inputBanco"] == 208) {
        $banco = "208 - BANCO BTG PACTUAL";
      } elseif ($_POST["inputBanco"] == 212) {
        $banco = "212 - BANCO ORIGINAL";
      } elseif ($_POST["inputBanco"] == 213) {
        $banco = "213 - BCO ARBI";
      } elseif ($_POST["inputBanco"] == 217) {
        $banco = "217 - BANCO JOHN DEERE";
      } elseif ($_POST["inputBanco"] == 218) {
        $banco = "218 - BANCO BS2";
      } elseif ($_POST["inputBanco"] == 222) {
        $banco = "222 - BANCO CREDIT AGRICOLE BR";
      } elseif ($_POST["inputBanco"] == 224) {
        $banco = "224 - BANCO FIBRA";
      } elseif ($_POST["inputBanco"] == 233) {
        $banco = "233 - BANCO CIFRA";
      } elseif ($_POST["inputBanco"] == 237) {
        $banco = "237 - BRADESCO";
      } elseif ($_POST["inputBanco"] == 241) {
        $banco = "241 - BANCO CLÁSSICO";
      } elseif ($_POST["inputBanco"] == 243) {
        $banco = "243 - BANCO MÁXIMA";
      } elseif ($_POST["inputBanco"] == 246) {
        $banco = "246 - BANCO ABC BRASIL";
      } elseif ($_POST["inputBanco"] == 249) {
        $banco = "249 - BANCO INVESTCRED UNIBANCO";
      } elseif ($_POST["inputBanco"] == 250) {
        $banco = "250 - BANCO BCV";
      } elseif ($_POST["inputBanco"] == 253) {
        $banco = "253 - BEXS CC";
      } elseif ($_POST["inputBanco"] == 254) {
        $banco = "254 - PARANÁ BANCO";
      } elseif ($_POST["inputBanco"] == 260) {
        $banco = "260 - NU PAGAMENTOS (NUBANK)";
      } elseif ($_POST["inputBanco"] == 265) {
        $banco = "265 - BANCO FATOR";
      } elseif ($_POST["inputBanco"] == 266) {
        $banco = "266 - BANCO CÉDULA";
      } elseif ($_POST["inputBanco"] == 268) {
        $banco = "268 - BARIGUI CH";
      } elseif ($_POST["inputBanco"] == 269) {
        $banco = "269 - HSBC BANCO DE INVESTIMENTO";
      } elseif ($_POST["inputBanco"] == 270) {
        $banco = "270 - SAGITUR CC LTDA";
      } elseif ($_POST["inputBanco"] == 271) {
        $banco = "271 - IB CCTVM LTDA";
      } elseif ($_POST["inputBanco"] == 273) {
        $banco = "273 - CCR DE SÃO MIGUEL DO OESTE";
      } elseif ($_POST["inputBanco"] == 276) {
        $banco = "276 - SENFF";
      } elseif ($_POST["inputBanco"] == 278) {
        $banco = "278 - GENIAL INVESTIMENTOS CVM";
      } elseif ($_POST["inputBanco"] == 279) {
        $banco = "279 - CCR DE PRIMAVERA DO LESTE";
      } elseif ($_POST["inputBanco"] == 280) {
        $banco = "280 - AVISTA";
      } elseif ($_POST["inputBanco"] == 283) {
        $banco = "283 - RB CAPITAL INVESTIMENTOS DTVM LTDA";
      } elseif ($_POST["inputBanco"] == 285) {
        $banco = "285 - FRENTE CC LTDA";
      } elseif ($_POST["inputBanco"] == 286) {
        $banco = "286 - CCR DE OURO";
      } elseif ($_POST["inputBanco"] == 288) {
        $banco = "288 - CAROL DTVM LTDA";
      } elseif ($_POST["inputBanco"] == 290) {
        $banco = "290 - PAGSEGURO INTERNET";
      } elseif ($_POST["inputBanco"] == 292) {
        $banco = "292 - BS2 DISTRIBUIDORA DE TÍTULOS E INVESTIMENTOS";
      } elseif ($_POST["inputBanco"] == 293) {
        $banco = "293 - LASTRO RDV DTVM LTDA";
      } elseif ($_POST["inputBanco"] == 298) {
        $banco = "298 - VIPS CC LTDA";
      } elseif ($_POST["inputBanco"] == 300) {
        $banco = "300 - BANCO LA NACION ARGENTINA";
      } elseif ($_POST["inputBanco"] == 301) {
        $banco = "301 - BPP INSTITUIÇÃO DE PAGAMENTOS";
      } elseif ($_POST["inputBanco"] == 310) {
        $banco = "310 - VORTX DTVM LTDA";
      } elseif ($_POST["inputBanco"] == 318) {
        $banco = "318 - BANCO BMG";
      } elseif ($_POST["inputBanco"] == 320) {
        $banco = "320 - BANCO CCB BRASIL";
      } elseif ($_POST["inputBanco"] == 321) {
        $banco = "321 - CREFAZ SCMEPP LTDA";
      } elseif ($_POST["inputBanco"] == 323) {
        $banco = "323 - MERCADO PAGO - CONTA DO MERCADO LIVRE";
      } elseif ($_POST["inputBanco"] == 329) {
        $banco = "329 - Q I SOC PAULISTA DE CREDITO FINANCIAMENTO E INVESTIMENTO";
      } elseif ($_POST["inputBanco"] == 341) {
        $banco = "341 - ITAÚ UNIBANCO";
      } elseif ($_POST["inputBanco"] == 366) {
        $banco = "366 - SOCINAL";
      } elseif ($_POST["inputBanco"] == 370) {
        $banco = "370 - BANCO MIZUHO";
      } elseif ($_POST["inputBanco"] == 376) {
        $banco = "376 - JP MORGAN";
      } elseif ($_POST["inputBanco"] == 389) {
        $banco = "389 - BANCO MERCANTIL DO BRASIL";
      } elseif ($_POST["inputBanco"] == 394) {
        $banco = "394 - BANCO BMG";
      } elseif ($_POST["inputBanco"] == 399) {
        $banco = "399 - HSBC";
      } elseif ($_POST["inputBanco"] == 409) {
        $banco = "409 - UNIBANCO - UNIÃO DE BANCOS BRASILEIROS";
      } elseif ($_POST["inputBanco"] == 412) {
        $banco = "412 - BANCO CAPITAL";
      } elseif ($_POST["inputBanco"] == 422) {
        $banco = "422 - BANCO SAFRA";
      } elseif ($_POST["inputBanco"] == 453) {
        $banco = "453 - BANCO RURAL";
      } elseif ($_POST["inputBanco"] == 456) {
        $banco = "456 - BANCO BARCLAYS";
      } elseif ($_POST["inputBanco"] == 464) {
        $banco = "464 - BANCO SUMITOMO MITSUI BRASILEIRO";
      } elseif ($_POST["inputBanco"] == 477) {
        $banco = "477 - CITIBANK";
      } elseif ($_POST["inputBanco"] == 479) {
        $banco = "479 - BANCO ITAUBANK";
      } elseif ($_POST["inputBanco"] == 487) {
        $banco = "487 - DEUTSCHE BANK";
      } elseif ($_POST["inputBanco"] == 488) {
        $banco = "488 - JPMORGAN CHASE BANK";
      } elseif ($_POST["inputBanco"] == 492) {
        $banco = "492 - ING BANK";
      } elseif ($_POST["inputBanco"] == 494) {
        $banco = "494 - BANCO DE LA NACION ARGENTINA";
      } elseif ($_POST["inputBanco"] == 495) {
        $banco = "495 - BANK OF AMERICA";
      } elseif ($_POST["inputBanco"] == 505) {
        $banco = "505 - BANCO CREDIT SUISSE";
      } elseif ($_POST["inputBanco"] == 545) {
        $banco = "545 - SENSO CCVM SA";
      } elseif ($_POST["inputBanco"] == 600) {
        $banco = "600 - BANCO LUSO BRASILEIRO";
      } elseif ($_POST["inputBanco"] == 604) {
        $banco = "604 - BANCO INDUSTRIAL DO BRASIL";
      } elseif ($_POST["inputBanco"] == 610) {
        $banco = "610 - VR CRED AC";
      } elseif ($_POST["inputBanco"] == 611) {
        $banco = "611 - COOPERATIVA UNIPRIME";
      } elseif ($_POST["inputBanco"] == 612) {
        $banco = "612 - BANCO GUANABARA";
      } elseif ($_POST["inputBanco"] == 613) {
        $banco = "613 - OMNI BANCO";
      } elseif ($_POST["inputBanco"] == 623) {
        $banco = "623 - BANCO PAN";
      } elseif ($_POST["inputBanco"] == 626) {
        $banco = "626 - BANCO FICSA";
      } elseif ($_POST["inputBanco"] == 630) {
        $banco = "630 - BANCO INTERCAP";
      } elseif ($_POST["inputBanco"] == 633) {
        $banco = "633 - BANCO REDENTOR";
      } elseif ($_POST["inputBanco"] == 634) {
        $banco = "634 - BANCO TRIANGULO";
      } elseif ($_POST["inputBanco"] == 637) {
        $banco = "637 - BANCO SOFISA";
      } elseif ($_POST["inputBanco"] == 641) {
        $banco = "641 - BANCO ALVORADA";
      } elseif ($_POST["inputBanco"] == 643) {
        $banco = "643 - BANCO PINE";
      } elseif ($_POST["inputBanco"] == 652) {
        $banco = "652 - ITAÚ UNIBANCO HOLDING BM";
      } elseif ($_POST["inputBanco"] == 653) {
        $banco = "653 - BANCO INDUSVAL";
      } elseif ($_POST["inputBanco"] == 654) {
        $banco = "654 - BANCO A.J. RENNER";
      } elseif ($_POST["inputBanco"] == 655) {
        $banco = "655 - BANCO VOTORANTIM";
      } elseif ($_POST["inputBanco"] == 707) {
        $banco = "707 - BANCO DAYCOVAL";
      } elseif ($_POST["inputBanco"] == 712) {
        $banco = "712 - BANCO OURINVEST";
      } elseif ($_POST["inputBanco"] == 756) {
        $banco = "756 - SICOOB";
      } elseif ($_POST["inputBanco"] == 999) {
        $banco = "999 - BANCO COOPERATIVO SICREDI";
      }

















      $query_editar = "UPDATE propostas set banco = '$banco', tipodeconta = '$tipodeconta', agencia = '$agencia', conta = '$conta',renda = '$renda' where idpropostas = '$id' ";

      $result_editar = mysqli_query($conexao, $query_editar);

      /*
      $queryeditar = "INSERT into loguser (nome, acao, data) VALUES ('$nomeusuario', 'Editou um pet de espécie: $especie', curDate())";
      $resulteditar = mysqli_query($conexao, $queryeditar);
      */
      if ($result_editar == '') {
        echo "<script language='javascript'> window.alert('Ocorreu um erro ao Editar!'); </script>";
      } else {
        echo "<script language='javascript'> window.alert('Editado com Sucesso!'); </script>";
        echo "<script language='javascript'> window.location='propostas.php'; </script>";
      }
    }
    ?>



<?php }
}  ?>
<!--final modal dados bancarios -->




<!-- Scripts de máscara dos inputs -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#inputTelefone').mask('(00) 00000-0000');
    $(".inputTelefone").mask("(00) 00000-0000");
    $('.inputCpf').mask('000.000.000-00'); // aplicando a máscara em todos os inputs que tem a classe inputCpf
    $("#inputCep").mask("99999-999");
  });
</script>



<script>
  document.addEventListener("DOMContentLoaded", function() {
    var inputAgencia = document.getElementById("inputAgencia");

    inputAgencia.addEventListener("input", function() {
      // Remove todos os caracteres que não são números
      this.value = this.value.replace(/[^0-9]/g, "");
    });
  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    var inputAgencia = document.getElementById("inputConta");

    inputAgencia.addEventListener("input", function() {
      // Remove todos os caracteres que não são números
      this.value = this.value.replace(/[^0-9]/g, "");
    });
  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    var inputAgencia = document.getElementById("inputRenda");

    inputAgencia.addEventListener("input", function() {
      // Remove todos os caracteres que não são números
      this.value = this.value.replace(/[^0-9]/g, "");
    });
  });
</script>






<!-- Modal de confirmação de exclusão de registro -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmModalLabel">Confirmação de Exclusão</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Tem certeza de que deseja excluir este registro?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <a class="btn btn-primary btn btn-danger" href="propostas.php?func=deleta&id=<?php echo $id; ?>">Excluir</a>
      </div>
    </div>
  </div>
</div>

<script>
  // lógica para obter o id corretamento no modal antes de excluir um registro.
  // Adicione um evento para quando o modal for exibido
  $('#confirmModal').on('show.bs.modal', function(event) {
    // Recupere o botão que acionou o modal
    var button = $(event.relatedTarget);

    // Recupere o valor do atributo data-id do botão
    var id = button.data('id');

    // Atualize o link dentro do modal com o ID correto
    var modal = $(this);
    modal.find('.btn-danger').attr('href', 'propostas.php?func=deleta&id=' + id);
  });
</script>


<!-- lógica para exclusão de registro -->
<?php
if (isset($_GET['func']) && $_GET['func'] == 'deleta') {
  $id = isset($_GET['id']) ? $_GET['id'] : null;

  if ($id !== null) {
    $query = "DELETE FROM propostas where idpropostas = '$id'";
    $result = mysqli_query($conexao, $query);

    if ($result) {
      echo "<script language='javascript'> window.alert('Excluído com sucesso!!!'); </script>";
    } else {
      echo "<script language='javascript'> window.alert('Ocorreu um erro ao excluir!'); </script>";
    }
  } else {
    echo "<script language='javascript'> window.alert('ID não foi capturado corretamente. Exclusão não é possível.'); </script>";
  }

  echo "<script language='javascript'> window.location='propostas.php'; </script>";
}
?>



<!--EDITAR -->
<?php
if (@$_GET['func'] == 'editarstatus') {
  $id = $_GET['id'];
  $query = "select * from propostas where idpropostas = '$id'";
  $result = mysqli_query($conexao, $query);


  while ($res_1 = mysqli_fetch_array($result)) {


?>

    <!-- Modal Editar Status -->
    <div id="modalEditarStatus" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">

            <h4 class="modal-title">Alterar status</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form method="POST" action="">
              <div class="form-group">
                <label for="id_produto">Cliente</label>
                <input type="text" class="form-control mr-2" name="txtnome" placeholder="Nome" value="<?php echo $res_1['nome']; ?>" required disabled>
              </div>




              <?php

if ($_SESSION['cargo_usuario'] != 'Master' && $_SESSION['cargo_usuario'] != 'Adm') : // Verifica se o usuário NÃO é do tipo 'Master'
?>
    <div class="form-group">
        <label for="id_produto">Status</label>
        <select name="statusproposta" class="custom-select" id="statusproposta">
            <?php
            // Se o usuário não é 'Master', você continua com o código para exibir as opções de status
            $query = "SELECT id, statusproposta FROM statusproposta WHERE statusproposta = 'AGUARD DIGITAÇÃO' OR statusproposta = 'PENDENCIA RESOLVIDA'";
            $result = mysqli_query($conexao, $query);

            // Verificar se a consulta teve sucesso
            if (!$result) {
                die("Erro na consulta: " . mysqli_error($conexao));
            }

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $row['id'] . '">' . $row['statusproposta'] . '</option>';
            }
            ?>
        </select>
        <small class="text-muted">Selecione o novo status da proposta</small>
    </div>
<?php else : // Se o usuário for 'Master', permite qualquer status no banco de dados ?>
    <div class="form-group">
        <label for="id_produto">Status</label>
        <select name="statusproposta" class="custom-select" id="statusproposta">
            <?php
            $query = "SELECT id, statusproposta FROM statusproposta";
            $result = mysqli_query($conexao, $query);

            // Verificar se a consulta teve sucesso
            if (!$result) {
                die("Erro na consulta: " . mysqli_error($conexao));
            }

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $row['id'] . '">' . $row['statusproposta'] . '</option>';
            }
            ?>
        </select>
        <small class="text-muted">Selecione o novo status da proposta</small>
    </div>
<?php endif; ?>



          </div>



          <div class="modal-footer">
            <button type="submit" class="btn btn-success mb-3" name="buttonEditarStatus">Salvar </button>


            <button type="button" class="btn btn-danger mb-3" data-dismiss="modal">Cancelar </button>
            </form>
          </div>
        </div>
      </div>
    </div>



    <script>
      $("#modalEditarStatus").modal("show");
    </script>

    <!--Comando para editar os dados UPDATE -->
    <?php
    if (isset($_POST['buttonEditarStatus'])) {
      $statusproposta = $_POST['statusproposta'];


      //marcador
      // Verifica se o formulário foi enviado
      if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Verifica se a chave 'statusproposta' existe no $_POST
        if (isset($_POST["statusproposta"])) {

          // Obtém o valor selecionado no formulário
          $selectedValue = $_POST["statusproposta"];

          // Consulta SQL para obter o status correspondente ao valor selecionado
          $query = "SELECT statusproposta FROM statusproposta WHERE id = ?";
          $stmt = mysqli_prepare($conexao, $query);

          // Vincula o parâmetro e executa a consulta
          mysqli_stmt_bind_param($stmt, "i", $selectedValue);
          mysqli_stmt_execute($stmt);

          // Vincula o resultado da consulta
          mysqli_stmt_bind_result($stmt, $statusproposta);

          // Obtém o resultado
          mysqli_stmt_fetch($stmt);

          // Fecha a consulta preparada
          mysqli_stmt_close($stmt);
        }
      }









      $query_editar = "UPDATE propostas set statusproposta = '$statusproposta' where idpropostas = '$id' ";

      $result_editar = mysqli_query($conexao, $query_editar);

      if ($result_editar == '') {
        echo "<script language='javascript'> window.alert('Ocorreu um erro ao Editar!'); </script>";
      } else {
        echo "<script language='javascript'> window.alert('Status alterado com Sucesso!'); </script>";
        echo "<script language='javascript'> window.location='propostas.php'; </script>";
      }
    }
    ?>


<?php }
} ?>






<?php
if (@$_GET['func'] == 'visualizarproposta') {
  $id = $_GET['id'];
  $queryProposta = "SELECT * FROM propostas WHERE idpropostas = '$id'";
  $resultProposta = mysqli_query($conexao, $queryProposta);

  while ($res_1 = mysqli_fetch_array($resultProposta)) {
?>
    <!-- Modal visualizar proposta -->
    <div id="modalVisualizarProposta" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <div class="container mt-5">
              <h2 class="mb-4">Visualização da proposta</h2>
              <?php
              if (isset($id)) {
                // Consulta para obter informações da proposta
                $queryProposta = "SELECT * FROM propostas WHERE idpropostas = '$id'";
                $resultProposta = mysqli_query($conexao, $queryProposta);



                if (!$resultProposta) {
                  die("Erro na consulta: " . mysqli_error($conexao));
                }

                while ($rowProposta = mysqli_fetch_assoc($resultProposta)) {
                  echo '<div class="card mb-4">';
                  echo '<div class="card-header"><strong>ID: </strong>' . $rowProposta['idpropostas'] . '</div>';
                  echo '<div class="card-body">';

                  // Informações da proposta em duas colunas
                  echo '<div class="row">';
                  echo '<div class="col-md-6">';
                  echo '<p><strong>Nome: </strong>' . $rowProposta['nome'] . '</p>';
                  echo '<p><strong>CPF: </strong>' . $rowProposta['cpf'] . '</p>';
                  echo '<p><strong>RG: </strong>' . $rowProposta['rg'] . '</p>';
                  echo '<p><strong>Número Benefício: </strong>' . $rowProposta['numerobeneficio'] . '</p>';
                  echo '<p><strong>Data Emissão: </strong>' . date('d/m/Y', strtotime($rowProposta['dataemissao'])) . '</p>';
                  echo '<p><strong>Órgão Emissor: </strong>' . $rowProposta['orgaoemissor'] . '</p>';
                  echo '<p><strong>Data de Nascimento: </strong>' . date('d/m/Y', strtotime($rowProposta['nascimento'])) . '</p>';
                  echo '<p><strong>Nome da Mãe: </strong>' . $rowProposta['nomedamae'] . '</p>';
                  echo '<p><strong>Nome do Pai: </strong>' . $rowProposta['nomedopai'] . '</p>';
                  echo '<p><strong>CEP: </strong>' . $rowProposta['cep'] . '</p>';
                  echo '<p><strong>Rua: </strong>' . $rowProposta['rua'] . '</p>';
                  echo '<p><strong>Número: </strong>' . $rowProposta['numero'] . '</p>';
                  echo '<p><strong>Complemento: </strong>' . $rowProposta['complemento'] . '</p>';
                  echo '<p><strong>Bairro: </strong>' . $rowProposta['bairro'] . '</p>';
                  echo '</div>'; // Fim da coluna 1

                  echo '<div class="col-md-6">';
                  echo '<p><strong>Cidade: </strong>' . $rowProposta['cidade'] . '</p>';
                  echo '<p><strong>Naturalidade: </strong>' . $rowProposta['naturalidade'] . '</p>';
                  echo '<p><strong>UF: </strong>' . $rowProposta['uf'] . '</p>';
                  echo '<p><strong>Telefone: </strong>' . $rowProposta['telefone'] . '</p>';
                  echo '<p><strong>Email: </strong>' . $rowProposta['email'] . '</p>';
                  echo '<p><strong>Convênio: </strong>' . $rowProposta['convenio'] . '</p>';
                  echo '<p><strong>Banco da proposta: </strong>' . $rowProposta['bancoproposta'] . '</p>';
                  echo '<p><strong>Banco: </strong>' . $rowProposta['banco'] . '</p>';
                  echo '<p><strong>Tipo de Conta: </strong>' . $rowProposta['tipodeconta'] . '</p>';
                  echo '<p><strong>Agência: </strong>' . $rowProposta['agencia'] . '</p>';
                  echo '<p><strong>Conta: </strong>' . $rowProposta['conta'] . '</p>';
                  echo '<p><strong>Renda: </strong>' . $rowProposta['renda'] . '</p>';
                  echo '<p><strong>Operação: </strong>' . $rowProposta['operacao'] . '</p>';
                  echo '<p><strong>Tabela: </strong>' . $rowProposta['tabela'] . '</p>';
                  echo '<p><strong>Promotora: </strong>' . $rowProposta['promotora'] . '</p>';
                  echo '<p><strong>Margem: </strong>' . $rowProposta['margem'] . '</p>';
                  echo '<p><strong>Prazo: </strong>' . $rowProposta['prazo'] . '</p>';
                  echo '<p><strong>Valor: </strong>' . $rowProposta['valor'] . '</p>';
                  echo '<p><strong>Valor Parcelas: </strong>' . $rowProposta['valorparcelas'] . '</p>';
                  echo '<p><strong>Formalização: </strong>' . $rowProposta['formalizacao'] . '</p>';
                  echo '<p><strong>Canal: </strong>' . $rowProposta['canal'] . '</p>';
                  echo '</div>'; // Fim da coluna 2

                  echo '</div>'; // Fim da linha


                  // Adicione o código PHP para recuperar os documentos do cliente
                  $nome =  $rowProposta['nome'];
                  $queryDocumentos = "SELECT * FROM documentos WHERE nome = '$nome'";
                  $resultDocumentos = mysqli_query($conexao, $queryDocumentos);

                  echo '<table class="table table-striped">';
                  echo '<thead>';
                  echo '<tr>';
                  echo '<th>Nome do Documento</th>';
                  echo '<th>Prévia</th>';
                  echo '<th>Ações</th>';
                  echo '</tr>';
                  echo '</thead>';
                  echo '<tbody>';

                  if ($resultDocumentos && mysqli_num_rows($resultDocumentos) > 0) {
                    while ($rowDocumento = mysqli_fetch_assoc($resultDocumentos)) {
                      $nomeDocumento = $rowDocumento['nome'];
                      $caminhoDocumento = $rowDocumento['caminho'];
                      $idDocumento = $rowDocumento["id"];

                      echo "<tr>";
                      echo "<td>$nomeDocumento</td>";
                      echo "<td><img src='documentos/$caminhoDocumento' class='img-thumbnail' width='100' height='100' alt='Prévia' /></td>";
                      echo "<td>";
                      echo "<a class='btn btn-primary' href='documentos/$caminhoDocumento' target='_blank'><i class='fa fa-eye'></i></a> ";
                      echo "<a class='btn btn-primary' href='documentos/$caminhoDocumento' download><i class='fa fa-download'></i></a> ";
                      if ($_SESSION['cargo_usuario'] == 'Master' || $_SESSION['cargo_usuario'] == 'Adm') {
                        echo "<a class='btn btn-danger' href='documentos.php?func=deletar&id=$idDocumento'><i class='fa fa-trash'></i></a>";
                      }
                      echo "</td>";
                      echo "</tr>";
                    }
                  } else {
                    echo "<tr><td colspan='3'>Nenhum documento encontrado.</td></tr>";
                  }

                  echo '</tbody>';
                  echo '</table>';
                  echo '</div>'; // Fim do corpo do cartão
                  echo '</div>'; // Fim do cartão
                }

                mysqli_close($conexao);
              } else {
                echo 'ID não especificado.';
              }
              ?>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger mb-3" data-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>


    <script>
      $("#modalVisualizarProposta").modal("show");
    </script>
<?php
  }
}
?>








<script>
  function consultaEndereco() {
    // Obter o valor do CEP digitado
    let cep = document.querySelector('#cep').value;

    if (cep.length !== 8) {
      alert('Cep inválido!');
    }

    let url = 'https://viacep.com.br/ws/' + cep + '/json/';

    fetch(url)
      .then(function(response) {
        if (!response.ok) {
          throw new Error('Erro na requisição');
        }
        return response.json();
      })
      .then(function(data) {
        console.log(data);
        mostrarEndereco(data); // Chama a função para preencher os inputs
      })
      .catch(function(error) {
        console.error('Erro:', error);
      });
  }

  function mostrarEndereco(dados) {
    document.getElementById('inputRua').value = dados.logradouro || '';
    document.getElementById('inputNumero').value = ''; // Defina a lógica para o número
    document.getElementById('inputComplemento').value = dados.complemento || '';
    document.getElementById('inputBairro').value = dados.bairro || '';
    document.getElementById('inputCidade').value = dados.localidade || '';
    document.getElementById('inputUf').value = dados.uf || '';
  }
</script>