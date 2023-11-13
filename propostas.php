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
              <button type="button" class="btn btn-secondary mb-3" data-toggle="modal" data-target="#modalExemplo"><i class="fa fa-plus-square"> ADICIONAR </i></button>
            </form>


            <form class="form-inline my-2 my-lg-0" style="margin-left:20px;">
              <button name="buttonpropostamaisnova" class="btn btn-success mb-3" type="submit"><i class="fa fa-search"> BUCAR POR MAIS NOVA</i></button>
            </form>

            <form class="form-inline my-2 my-lg-0" style="margin-left:20px;">
              <button name="buttonpropostamaisantiga" class="btn btn-warning  mb-3" type="submit"><i class="fa fa-search"> BUCAR POR MAIS ANTIGA</i></button>
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
                  <div class="table-responsive h-100">


                    <!--LISTAR TODAS AS PROPOSTAS -->

                    <?php



                    // novo codigo ( procurar proposta pelo nome da pessoa)
                    if (isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] != '') {
                      $nome = $_GET['txtpesquisar'] . '%';
                      $query = "select * from propostas where nome LIKE '$nome'  order by nome asc";
                      // novo codigo ( procurar proposta pelo cpf)
                    } else if (isset($_GET['buttonPesquisarcpf'])) {
                      $nome = $_GET['txtpesquisarcpf'];
                      $query = "select * from propostas where cpf = '$nome'  order by cpf asc";
                    }
                    // novo codigo ( procurar proposta pela data)
                    else if (isset($_GET['buttonPesquisardata']) and $_GET['txtpesquisardata'] != '') {
                      $nome = $_GET['txtpesquisardata'];
                      $query = "select * from propostas where data = '$nome'  order by data asc";
                    }
                    // novo codigo ( procurar propostas MAIS NOVA)
                    else if (isset($_GET['buttonpropostamaisnova'])) {

                      $query = "SELECT * FROM propostas
                      ORDER BY `data` DESC;";
                    }
                    // novo codigo ( procurar por propostas MAIS ANTIGA)
                    else if (isset($_GET['buttonpropostamaisantiga'])) {

                      $query = "SELECT * FROM propostas
                      ORDER BY `data` ASC;";
                    } else if (isset($_GET['buttonOcNaoAtendidas'])) {
                      $nome = 'Disponivel';
                      $query = "select * from animais where situacao = '$nome'   order by data asc";
                    }







                    //final do código

                    else {
                      $query = "select * from propostas order by idpropostas ASC";
                    }





                    $result = mysqli_query($conexao, $query);
                    //$dado = mysqli_fetch_array($result);
                    $row = mysqli_num_rows($result);

                    if ($row == '') {

                      echo "<h3> Não existem dados cadastrados no banco </h3>";
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
                            $convenio = $res_1["convenio"];
                            $banco = $res_1["banco"];
                            $valor = $res_1["valor"];
                            $promotora = $res_1["promotora"];
                            $usuario_id = $res_1["idusuario"]; // Aqui armazenamos o ID do usuário
                            $statusproposta = $res_1["statusproposta"];
                            $data = $res_1["data"];
                            $id = $res_1["idpropostas"];

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
                              <td><?php echo $tabela;  ?></td>
                              <td><?php echo $convenio; ?></td>
                              <td><?php echo $banco; ?></td>
                              <td><?php echo number_format($valor, 2, ",", "."); ?></td>
                              <td><?php echo  $promotora; ?></td>
                              <td><?php echo  $nome_usuario; ?></td>
                              <td><?php echo  $data2; ?></td>





                              <?php
                              if ($statusproposta == "PENDENTE") {
                                echo '<td class="badge badge-pill badge-warning">' . $statusproposta . '</td>';
                              } elseif ($statusproposta == "CONCLUÍDA" || $statusproposta == "PAGO") {
                                echo '<td class="badge badge-pill badge-success">' . $statusproposta . '</td>';
                              } elseif ($statusproposta == "CANCELADO" || $statusproposta == "SALDO RETORNADO") {
                                echo '<td class="badge badge-pill badge-danger">' . $statusproposta . '</td>';
                              } else {
                                echo '<td class="badge badge-pill badge-info">' . $statusproposta . '</td>';
                              }
                              ?>





                              <td>





                                <div class="btn-group" role="group" aria-label="Exemplo básico">


                                  <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-cog" aria-hidden="true"></i><span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                      <li><a href="propostas.php?func=editarcliente&id=<?php echo $id; ?>" style="white-space: nowrap;">Editar cliente</a></li>
                                      <li><a href="propostas.php?func=editarpropostas&id=<?php echo $id; ?>" style="white-space: nowrap;">Editar propostas</a></li>
                                      <li><a href="propostas.php?func=editardadosbancarios&id=<?php echo $id; ?>" style="white-space: nowrap;">Editar dados bancários</a></li>
                                    </ul>
                                  </div>

                                  <span style="margin-right: 5px;"></span> <!-- Isso vai criar um espaçamento de 10 pixels -->

                                  <!-- Botão de exclusão de proposta -->


                                  <span style="margin-right: 5px;"></span> <!-- Isso vai criar um espaçamento de 10 pixels -->

                                  <!-- Botão de edição de status da proposta -->
                                  <a class='btn btn-primary' href="propostas.php?func=editarstatus&id=<?php echo $id; ?>"><i class='fa fa-check-square-o'></i></a>

                                  <span style="margin-right: 5px;"></span> <!-- Isso vai criar um espaçamento de 10 pixels -->

                                  <?php
                                  // lógica para só conseguir alterar o status da proposta quem for master do sistema
                                  if ($_SESSION['cargo_usuario'] == 'Master') : ?>
                                    <a class="btn btn-danger" data-toggle="modal" data-target="#confirmModal">
                                      <i class="fa fa-minus-square text-white"></i>
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
                          <div class="form-group col-md-6">
                            <label for="inputNome">NOME*</label>
                            <input name="inputNome" type="text" class="form-control" id="inputNome" placeholder="" required>
                          </div>
                          <div class="form-group col-md-3">
                            <label for="inputCpf">CPF</label>
                            <input name="inputCpf" type="text" class="form-control inputCpf" id="inputCpf" placeholder="">
                          </div>
                          <div class="form-group col-md-3">
                            <label for="inputRg">RG</label>
                            <input name="inputRg" type="text" class="form-control" id="inputRg" placeholder="">
                          </div>
                          <!-- INÍCIO DO CONTEÚDO CONTATO-->
                          <div class="form-group col-md-6">
                            <label for="inputTelefone">TELEFONE</label>
                            <input name="inputTelefone" type="text" class="form-control" id="inputTelefone" placeholder="">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputEmail">EMAIL</label>
                            <input name="inputEmail" type="email" class="form-control" id="inputEmail" placeholder="">
                          </div>
                          <!-- FINAL DO CONTEÚDO CONTATO-->
                          <div class="form-group col-md-3">
                            <label for="inputDataNascimento">DATA DE NASCIMENTO</label>
                            <input name="inputDataNascimento" type="text" class="form-control" id="inputDataNascimento" placeholder="">
                          </div>
                          <div class="form-group col-md-3">
                            <label for="inputNomeMae">NOME DA MÃE</label>
                            <input name="inputNomeMae" type="text" class="form-control" id="inputNomeMae" placeholder="">
                          </div>
                          <div class="form-group col-md-3">
                            <label for="inputNomePai">NOME DO PAI</label>
                            <input name="inputNomePai" type="text" class="form-control" id="inputNomePai" placeholder="">
                          </div>
                          <div class="form-group col-md-3">
                            <label for="inputCep">CEP</label>
                            <input name="inputCep" type="number" class="form-control" id="cep" name="cep" placeholder="">
                            <button type="button" class="btn btn-outline-dark btn-block" onclick="consultaEndereco()">BUSCAR CEP</button>
                          </div>

                          <div class="form-group col-md-6">
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
                          <div class="form-group col-md-4">
                            <label for="inputBairro">BAIRRO</label>
                            <input name="inputBairro" type="text" class="form-control" id="inputBairro">
                          </div>
                          <div class="form-group col-md-4">
                            <label for="inputCidade">CIDADE</label>
                            <input name="inputCidade" type="text" class="form-control" id="inputCidade">
                          </div>
                          <div class="form-group col-md-4">
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
                            <option value="1">001 - BANCO DO BRASIL </option>
                            <option value="3">003 - BANCO DA AMAZONIA </option>
                            <option value="4">004 - BANCO DO NORDESTE DO BRASIL </option>
                            <option value="7">007 - BNDES </option>
                            <option value="10">010 - CREDICOAMO </option>
                            <option value="11">011 - Credit Suisse </option>
                            <option value="12">012 - BANCO INBURSA </option>
                            <option value="14">014 - NATIXIS BRASIL </option>
                            <option value="15">015 - UBS BRASIL CCTVM </option>
                            <option value="16">016 - CCM DESP TRANS SC E RS </option>
                            <option value="17">017 - BNY MELLON BANCO </option>
                            <option value="18">018 - BANCO TRICURY </option>
                            <option value="21">021 - BANCO BANESTES </option>
                            <option value="24">024 - BCO BANDEPE </option>
                            <option value="25">025 - BANCO ALFA . </option>
                            <option value="29">029 - BANCO ITAU CONSIGNADO </option>
                            <option value="33">033 - BANCO SANTANDER BRASIL </option>
                            <option value="36">036 - BANCO BBI </option>
                            <option value="37">037 - BANCO DO ESTADO DO PARA </option>
                            <option value="40">040 - BANCO CARGILL </option>
                            <option value="41">041 - BANRISUL </option>
                            <option value="47">047 - BANCO DO ESTADO DE SERGIPE </option>
                            <option value="60">060 - CONFIDENCE CC </option>
                            <option value="62">062 - HIPERCARD BM </option>
                            <option value="63">063 - BANCO BRADESCARD </option>
                            <option value="64">064 - GOLDMAN SACHS DO BRASIL BM </option>
                            <option value="65">065 - BANCO ANDBANK </option>
                            <option value="66">066 - BANCO MORGAN STANLEY </option>
                            <option value="69">069 - BANCO CREFISA </option>
                            <option value="70">070 - BANCO DE BRASILIA (BRB) </option>
                            <option value="74">074 - BCO. J.SAFRA </option>
                            <option value="75">075 - BCO ABN AMRO </option>
                            <option value="76">076 - BANCO KDB BRASIL . </option>
                            <option value="77">077 - BANCO INTER </option>
                            <option value="78">078 - HAITONG BI DO BRASIL </option>
                            <option value="79">079 - BANCO ORIGINAL DO AGRONEGÓCIO </option>
                            <option value="80">080 - B&amp;T CC LTDA </option>
                            <option value="81">081 - BBN BANCO BRASILEIRO DE NEGOCIOS </option>
                            <option value="82">082 - BANCO TOPAZIO </option>
                            <option value="83">083 - BANCO DA CHINA BRASIL </option>
                            <option value="84">084 - UNIPRIME NORTE DO PARANA </option>
                            <option value="85">085 - COOP CENTRAL AILOS </option>
                            <option value="89">089 - CCR REG MOGIANA </option>
                            <option value="91">091 - UNICRED CENTRAL RS </option>
                            <option value="92">092 - BRK </option>
                            <option value="93">093 - PÓLOCRED SCMEPP LTDA </option>
                            <option value="94">094 - BANCO FINAXIS </option>
                            <option value="95">095 - BANCO CONFIDENCE DE CAMBIO </option>
                            <option value="96">096 - BANCO B3 </option>
                            <option value="97">097 - CCC NOROESTE BRASILEIRO LTDA </option>
                            <option value="98">098 - CREDIALIANÇA CCR </option>
                            <option value="99">099 - UNIPRIME CENTRAL CCC LTDA </option>
                            <option value="100">100 - PLANNER CORRETORA DE VALORES </option>
                            <option value="101">101 - RENASCENCA DTVM LTDA </option>
                            <option value="102">102 - XP INVESTIMENTOS </option>
                            <option value="104">104 - CAIXA ECONOMICA FEDERAL (CEF) </option>
                            <option value="105">105 - LECCA CFI </option>
                            <option value="107">107 - BANCO BOCOM BBM </option>
                            <option value="108">108 - PORTOCRED </option>
                            <option value="111">111 - BANCO OLIVEIRA TRUST DTVM </option>
                            <option value="113">113 - MAGLIANO </option>
                            <option value="114">114 - CENTRAL COOPERATIVA DE CREDITO NO ESTADO DO E </option>
                            <option value="117">117 - ADVANCED CC LTDA </option>
                            <option value="118">118 - STANDARD CHARTERED BI </option>
                            <option value="119">119 - BANCO WESTERN UNION </option>
                            <option value="120">120 - BANCO RODOBENS </option>
                            <option value="121">121 - BANCO AGIBANK </option>
                            <option value="122">122 - BANCO BRADESCO BERJ </option>
                            <option value="124">124 - BANCO WOORI BANK DO BRASIL </option>
                            <option value="125">125 - BRASIL PLURAL BANCO </option>
                            <option value="126">126 - BR PARTNERS BI </option>
                            <option value="127">127 - CODEPE CVC </option>
                            <option value="128">128 - MS BANK BANCO DE CAMBIO </option>
                            <option value="129">129 - UBS BRASIL BI </option>
                            <option value="130">130 - CARUANA SCFI </option>
                            <option value="131">131 - TULLETT PREBON BRASIL CVC LTDA </option>
                            <option value="132">132 - ICBC DO BRASIL BM </option>
                            <option value="133">133 - CRESOL CONFEDERAÇÃO </option>
                            <option value="134">134 - BGC LIQUIDEZ DTVM LTDA </option>
                            <option value="136">136 - UNICRED COOPERATIVA </option>
                            <option value="137">137 - MULTIMONEY CC LTDA </option>
                            <option value="138">138 - GET MONEY CC LTDA </option>
                            <option value="139">139 - INTESA SANPAOLO BRASIL </option>
                            <option value="140">140 - EASYNVEST - TITULO CV </option>
                            <option value="142">142 - BROKER BRASIL CC LTDA </option>
                            <option value="143">143 - TREVISO CC </option>
                            <option value="144">144 - BEXS BANCO DE CAMBIO . </option>
                            <option value="145">145 - LEVYCAM CCV LTDA </option>
                            <option value="146">146 - GUITTA CC LTDA </option>
                            <option value="149">149 - FACTA . CFI </option>
                            <option value="157">157 - ICAP DO BRASIL CTVM LTDA </option>
                            <option value="159">159 - CASA CREDITO </option>
                            <option value="163">163 - COMMERZBANK BRASIL BANCO MULTIPLO </option>
                            <option value="169">169 - BANCO OLE CONSIGNADO </option>
                            <option value="172">172 - ALBATROSS CCV </option>
                            <option value="173">173 - BRL TRUST DTVM SA </option>
                            <option value="174">174 - PERNAMBUCANAS FINANC </option>
                            <option value="177">177 - GUIDE </option>
                            <option value="180">180 - CM CAPITAL MARKETS CCTVM LTDA </option>
                            <option value="182">182 - DACASA FINANCEIRA S/A </option>
                            <option value="183">183 - SOCRED </option>
                            <option value="184">184 - BANCO ITAU BBA </option>
                            <option value="188">188 - ATIVA INVESTIMENTOS </option>
                            <option value="189">189 - HS FINANCEIRA </option>
                            <option value="190">190 - SERVICOOP </option>
                            <option value="191">191 - NOVA FUTURA CTVM LTDA </option>
                            <option value="194">194 - PARMETAL DTVM LTDA </option>
                            <option value="196">196 - BANCO FAIR CC </option>
                            <option value="197">197 - STONE PAGAMENTOS </option>
                            <option value="204">204 - BANCO BRADESCO CARTOES </option>
                            <option value="208">208 - BANCO BTG PACTUAL </option>
                            <option value="212">212 - BANCO ORIGINAL </option>
                            <option value="213">213 - BCO ARBI </option>
                            <option value="217">217 - BANCO JOHN DEERE </option>
                            <option value="218">218 - BANCO BS2 </option>
                            <option value="222">222 - BANCO CREDIT AGRICOLE BR </option>
                            <option value="224">224 - BANCO FIBRA </option>
                            <option value="233">233 - BANCO CIFRA </option>
                            <option value="237">237 - BRADESCO </option>
                            <option value="241">241 - BANCO CLASSICO </option>
                            <option value="243">243 - BANCO MAXIMA </option>
                            <option value="246">246 - BANCO ABC BRASIL </option>
                            <option value="249">249 - BANCO INVESTCRED UNIBANCO </option>
                            <option value="250">250 - BANCO BCV </option>
                            <option value="253">253 - BEXS CC </option>
                            <option value="254">254 - PARANA BANCO </option>
                            <option value="260">260 - NU PAGAMENTOS (NUBANK) </option>
                            <option value="265">265 - BANCO FATOR </option>
                            <option value="266">266 - BANCO CEDULA </option>
                            <option value="268">268 - BARIGUI CH </option>
                            <option value="269">269 - HSBC BANCO DE INVESTIMENTO </option>
                            <option value="270">270 - SAGITUR CC LTDA </option>
                            <option value="271">271 - IB CCTVM LTDA </option>
                            <option value="273">273 - CCR DE SÃO MIGUEL DO OESTE </option>
                            <option value="276">276 - SENFF </option>
                            <option value="278">278 - GENIAL INVESTIMENTOS CVM </option>
                            <option value="279">279 - CCR DE PRIMAVERA DO LESTE </option>
                            <option value="280">280 - AVISTA </option>
                            <option value="283">283 - RB CAPITAL INVESTIMENTOS DTVM LTDA </option>
                            <option value="285">285 - FRENTE CC LTDA </option>
                            <option value="286">286 - CCR DE OURO </option>
                            <option value="288">288 - CAROL DTVM LTDA </option>
                            <option value="290">290 - Pagseguro Internet </option>
                            <option value="292">292 - BS2 DISTRIBUIDORA DE TITULOS E INVESTIMENTOS </option>
                            <option value="293">293 - LASTRO RDV DTVM LTDA </option>
                            <option value="298">298 - VIPS CC LTDA </option>
                            <option value="300">300 - BANCO LA NACION ARGENTINA </option>
                            <option value="301">301 - BPP INSTITUIÇÃO DE PAGAMENTOS </option>
                            <option value="310">310 - VORTX DTVM LTDA </option>
                            <option value="318">318 - BANCO BMG </option>
                            <option value="320">320 - BANCO CCB BRASIL </option>
                            <option value="321">321 - CREFAZ SCMEPP LTDA </option>
                            <option value="323">323 - Mercado Pago - conta do Mercado Livre </option>
                            <option value="329">329 - Q I Sociedade </option>
                            <option value="335">335 - Banco Digio </option>
                            <option value="336">336 - C6 BANK </option>
                            <option value="340">340 - SUPER PAGAMENTOS S/A (SUPERDITAL) </option>
                            <option value="341">341 - ITAU UNIBANCO </option>
                            <option value="348">348 - BANCO XP S/A </option>
                            <option value="359">359 - ZEMA CFI S/A </option>
                            <option value="364">364 - GERENCIANET PAGAMENTOS DO BRASIL </option>
                            <option value="366">366 - BANCO SOCIETE GENERALE BRASIL </option>
                            <option value="370">370 - BANCO MIZUHO </option>
                            <option value="376">376 - BANCO J.P. MORGAN </option>
                            <option value="389">389 - BANCO MERCANTIL DO BRASIL </option>
                            <option value="394">394 - BANCO BRADESCO FINANCIAMENTOS </option>
                            <option value="399">399 - KIRTON BANK </option>
                            <option value="412">412 - BANCO CAPITAL </option>
                            <option value="413">413 - BANCO BV </option>
                            <option value="422">422 - BANCO SAFRA </option>
                            <option value="456">456 - BANCO MUFG BRASIL </option>
                            <option value="464">464 - BANCO SUMITOMO MITSUI BRASIL </option>
                            <option value="473">473 - BANCO CAIXA GERAL BRASIL </option>
                            <option value="477">477 - CITIBANK N.A </option>
                            <option value="479">479 - BANCO ITAUBANK </option>
                            <option value="487">487 - DEUTSCHE BANK BANCO ALEMÃO </option>
                            <option value="488">488 - JPMORGAN CHASE BANK </option>
                            <option value="492">492 - ING BANK N.V </option>
                            <option value="494">494 - BANCO REP ORIENTAL URUGUAY </option>
                            <option value="495">495 - LA PROVINCIA BUENOS AIRES BANCO </option>
                            <option value="505">505 - BANCO CREDIT SUISSE (BRL) </option>
                            <option value="545">545 - SENSO CCVM </option>
                            <option value="600">600 - BANCO LUSO BRASILEIRO </option>
                            <option value="604">604 - BANCO INDUSTRIAL DO BRASIL </option>
                            <option value="610">610 - BANCO VR </option>
                            <option value="611">611 - BANCO PAULISTA </option>
                            <option value="612">612 - BANCO GUANABARA </option>
                            <option value="613">613 - OMNI BANCO </option>
                            <option value="623">623 - BANCO PAN </option>
                            <option value="626">626 - BANCO FICSA </option>
                            <option value="630">630 - BANCO INTERCAP </option>
                            <option value="633">633 - BANCO RENDIMENTO </option>
                            <option value="634">634 - BANCO TRIANGULO (BANCO TRIANGULO) </option>
                            <option value="637">637 - BANCO SOFISA (SOFISA DIRETO) </option>
                            <option value="641">641 - BANCO ALVORADA </option>
                            <option value="643">643 - BANCO PINE </option>
                            <option value="652">652 - ITAU UNIBANCO HOLDING BM </option>
                            <option value="653">653 - BANCO INDUSVAL </option>
                            <option value="654">654 - BANCO A.J. RENNER </option>
                            <option value="655">655 - NEON PAGAMENTOS </option>
                            <option value="707">707 - BANCO DAYCOVAL </option>
                            <option value="712">712 - BANCO OURINVEST </option>
                            <option value="739">739 - BANCO CETELEM </option>
                            <option value="741">741 - BANCO RIBEIRÃO PRETO </option>
                            <option value="743">743 - BANCO SEMEAR </option>
                            <option value="745">745 - BANCO CITIBANK </option>
                            <option value="746">746 - BANCO MODAL </option>
                            <option value="747">747 - Banco RABOBANK INTERNACIONAL DO BRASIL </option>
                            <option value="748">748 - SICREDI </option>
                            <option value="751">751 - SCOTIABANK BRASIL </option>
                            <option value="752">752 - BNP PARIBAS BRASIL </option>
                            <option value="753">753 - NOVO BANCO CONTINENTAL BM </option>
                            <option value="754">754 - BANCO SISTEMA </option>
                            <option value="755">755 - BOFA MERRILL LYNCH BM </option>
                            <option value="756">756 - BANCOOB (BANCO COOPERATIVO DO BRASIL) </option>
                            <option value="757">757 - BANCO KEB HANA DO BRASIL </option>
                            <option value="908">908 - PARATI – CREDITO FINANCIAMENTO E INVESTIMENTO </option>
                            <option value="954">954 - BANCO CBSS </option>
                            <option value="955">955 - BANCO BONSUCESSO CONSIGNADO </option>
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
                            <option value="1">001 - BANCO DO BRASIL </option>
                            <option value="3">003 - BANCO DA AMAZONIA </option>
                            <option value="4">004 - BANCO DO NORDESTE DO BRASIL </option>
                            <option value="7">007 - BNDES </option>
                            <option value="10">010 - CREDICOAMO </option>
                            <option value="11">011 - Credit Suisse </option>
                            <option value="12">012 - BANCO INBURSA </option>
                            <option value="14">014 - NATIXIS BRASIL </option>
                            <option value="15">015 - UBS BRASIL CCTVM </option>
                            <option value="16">016 - CCM DESP TRANS SC E RS </option>
                            <option value="17">017 - BNY MELLON BANCO </option>
                            <option value="18">018 - BANCO TRICURY </option>
                            <option value="21">021 - BANCO BANESTES </option>
                            <option value="24">024 - BCO BANDEPE </option>
                            <option value="25">025 - BANCO ALFA . </option>
                            <option value="29">029 - BANCO ITAU CONSIGNADO </option>
                            <option value="33">033 - BANCO SANTANDER BRASIL </option>
                            <option value="36">036 - BANCO BBI </option>
                            <option value="37">037 - BANCO DO ESTADO DO PARA </option>
                            <option value="40">040 - BANCO CARGILL </option>
                            <option value="41">041 - BANRISUL </option>
                            <option value="47">047 - BANCO DO ESTADO DE SERGIPE </option>
                            <option value="60">060 - CONFIDENCE CC </option>
                            <option value="62">062 - HIPERCARD BM </option>
                            <option value="63">063 - BANCO BRADESCARD </option>
                            <option value="64">064 - GOLDMAN SACHS DO BRASIL BM </option>
                            <option value="65">065 - BANCO ANDBANK </option>
                            <option value="66">066 - BANCO MORGAN STANLEY </option>
                            <option value="69">069 - BANCO CREFISA </option>
                            <option value="70">070 - BANCO DE BRASILIA (BRB) </option>
                            <option value="74">074 - BCO. J.SAFRA </option>
                            <option value="75">075 - BCO ABN AMRO </option>
                            <option value="76">076 - BANCO KDB BRASIL . </option>
                            <option value="77">077 - BANCO INTER </option>
                            <option value="78">078 - HAITONG BI DO BRASIL </option>
                            <option value="79">079 - BANCO ORIGINAL DO AGRONEGÓCIO </option>
                            <option value="80">080 - B&amp;T CC LTDA </option>
                            <option value="81">081 - BBN BANCO BRASILEIRO DE NEGOCIOS </option>
                            <option value="82">082 - BANCO TOPAZIO </option>
                            <option value="83">083 - BANCO DA CHINA BRASIL </option>
                            <option value="84">084 - UNIPRIME NORTE DO PARANA </option>
                            <option value="85">085 - COOP CENTRAL AILOS </option>
                            <option value="89">089 - CCR REG MOGIANA </option>
                            <option value="91">091 - UNICRED CENTRAL RS </option>
                            <option value="92">092 - BRK </option>
                            <option value="93">093 - PÓLOCRED SCMEPP LTDA </option>
                            <option value="94">094 - BANCO FINAXIS </option>
                            <option value="95">095 - BANCO CONFIDENCE DE CAMBIO </option>
                            <option value="96">096 - BANCO B3 </option>
                            <option value="97">097 - CCC NOROESTE BRASILEIRO LTDA </option>
                            <option value="98">098 - CREDIALIANÇA CCR </option>
                            <option value="99">099 - UNIPRIME CENTRAL CCC LTDA </option>
                            <option value="100">100 - PLANNER CORRETORA DE VALORES </option>
                            <option value="101">101 - RENASCENCA DTVM LTDA </option>
                            <option value="102">102 - XP INVESTIMENTOS </option>
                            <option value="104">104 - CAIXA ECONOMICA FEDERAL (CEF) </option>
                            <option value="105">105 - LECCA CFI </option>
                            <option value="107">107 - BANCO BOCOM BBM </option>
                            <option value="108">108 - PORTOCRED </option>
                            <option value="111">111 - BANCO OLIVEIRA TRUST DTVM </option>
                            <option value="113">113 - MAGLIANO </option>
                            <option value="114">114 - CENTRAL COOPERATIVA DE CREDITO NO ESTADO DO E </option>
                            <option value="117">117 - ADVANCED CC LTDA </option>
                            <option value="118">118 - STANDARD CHARTERED BI </option>
                            <option value="119">119 - BANCO WESTERN UNION </option>
                            <option value="120">120 - BANCO RODOBENS </option>
                            <option value="121">121 - BANCO AGIBANK </option>
                            <option value="122">122 - BANCO BRADESCO BERJ </option>
                            <option value="124">124 - BANCO WOORI BANK DO BRASIL </option>
                            <option value="125">125 - BRASIL PLURAL BANCO </option>
                            <option value="126">126 - BR PARTNERS BI </option>
                            <option value="127">127 - CODEPE CVC </option>
                            <option value="128">128 - MS BANK BANCO DE CAMBIO </option>
                            <option value="129">129 - UBS BRASIL BI </option>
                            <option value="130">130 - CARUANA SCFI </option>
                            <option value="131">131 - TULLETT PREBON BRASIL CVC LTDA </option>
                            <option value="132">132 - ICBC DO BRASIL BM </option>
                            <option value="133">133 - CRESOL CONFEDERAÇÃO </option>
                            <option value="134">134 - BGC LIQUIDEZ DTVM LTDA </option>
                            <option value="136">136 - UNICRED COOPERATIVA </option>
                            <option value="137">137 - MULTIMONEY CC LTDA </option>
                            <option value="138">138 - GET MONEY CC LTDA </option>
                            <option value="139">139 - INTESA SANPAOLO BRASIL </option>
                            <option value="140">140 - EASYNVEST - TITULO CV </option>
                            <option value="142">142 - BROKER BRASIL CC LTDA </option>
                            <option value="143">143 - TREVISO CC </option>
                            <option value="144">144 - BEXS BANCO DE CAMBIO . </option>
                            <option value="145">145 - LEVYCAM CCV LTDA </option>
                            <option value="146">146 - GUITTA CC LTDA </option>
                            <option value="149">149 - FACTA . CFI </option>
                            <option value="157">157 - ICAP DO BRASIL CTVM LTDA </option>
                            <option value="159">159 - CASA CREDITO </option>
                            <option value="163">163 - COMMERZBANK BRASIL BANCO MULTIPLO </option>
                            <option value="169">169 - BANCO OLE CONSIGNADO </option>
                            <option value="172">172 - ALBATROSS CCV </option>
                            <option value="173">173 - BRL TRUST DTVM SA </option>
                            <option value="174">174 - PERNAMBUCANAS FINANC </option>
                            <option value="177">177 - GUIDE </option>
                            <option value="180">180 - CM CAPITAL MARKETS CCTVM LTDA </option>
                            <option value="182">182 - DACASA FINANCEIRA S/A </option>
                            <option value="183">183 - SOCRED </option>
                            <option value="184">184 - BANCO ITAU BBA </option>
                            <option value="188">188 - ATIVA INVESTIMENTOS </option>
                            <option value="189">189 - HS FINANCEIRA </option>
                            <option value="190">190 - SERVICOOP </option>
                            <option value="191">191 - NOVA FUTURA CTVM LTDA </option>
                            <option value="194">194 - PARMETAL DTVM LTDA </option>
                            <option value="196">196 - BANCO FAIR CC </option>
                            <option value="197">197 - STONE PAGAMENTOS </option>
                            <option value="204">204 - BANCO BRADESCO CARTOES </option>
                            <option value="208">208 - BANCO BTG PACTUAL </option>
                            <option value="212">212 - BANCO ORIGINAL </option>
                            <option value="213">213 - BCO ARBI </option>
                            <option value="217">217 - BANCO JOHN DEERE </option>
                            <option value="218">218 - BANCO BS2 </option>
                            <option value="222">222 - BANCO CREDIT AGRICOLE BR </option>
                            <option value="224">224 - BANCO FIBRA </option>
                            <option value="233">233 - BANCO CIFRA </option>
                            <option value="237">237 - BRADESCO </option>
                            <option value="241">241 - BANCO CLASSICO </option>
                            <option value="243">243 - BANCO MAXIMA </option>
                            <option value="246">246 - BANCO ABC BRASIL </option>
                            <option value="249">249 - BANCO INVESTCRED UNIBANCO </option>
                            <option value="250">250 - BANCO BCV </option>
                            <option value="253">253 - BEXS CC </option>
                            <option value="254">254 - PARANA BANCO </option>
                            <option value="260">260 - NU PAGAMENTOS (NUBANK) </option>
                            <option value="265">265 - BANCO FATOR </option>
                            <option value="266">266 - BANCO CEDULA </option>
                            <option value="268">268 - BARIGUI CH </option>
                            <option value="269">269 - HSBC BANCO DE INVESTIMENTO </option>
                            <option value="270">270 - SAGITUR CC LTDA </option>
                            <option value="271">271 - IB CCTVM LTDA </option>
                            <option value="273">273 - CCR DE SÃO MIGUEL DO OESTE </option>
                            <option value="276">276 - SENFF </option>
                            <option value="278">278 - GENIAL INVESTIMENTOS CVM </option>
                            <option value="279">279 - CCR DE PRIMAVERA DO LESTE </option>
                            <option value="280">280 - AVISTA </option>
                            <option value="283">283 - RB CAPITAL INVESTIMENTOS DTVM LTDA </option>
                            <option value="285">285 - FRENTE CC LTDA </option>
                            <option value="286">286 - CCR DE OURO </option>
                            <option value="288">288 - CAROL DTVM LTDA </option>
                            <option value="290">290 - Pagseguro Internet </option>
                            <option value="292">292 - BS2 DISTRIBUIDORA DE TITULOS E INVESTIMENTOS </option>
                            <option value="293">293 - LASTRO RDV DTVM LTDA </option>
                            <option value="298">298 - VIPS CC LTDA </option>
                            <option value="300">300 - BANCO LA NACION ARGENTINA </option>
                            <option value="301">301 - BPP INSTITUIÇÃO DE PAGAMENTOS </option>
                            <option value="310">310 - VORTX DTVM LTDA </option>
                            <option value="318">318 - BANCO BMG </option>
                            <option value="320">320 - BANCO CCB BRASIL </option>
                            <option value="321">321 - CREFAZ SCMEPP LTDA </option>
                            <option value="323">323 - Mercado Pago - conta do Mercado Livre </option>
                            <option value="329">329 - Q I Sociedade </option>
                            <option value="335">335 - Banco Digio </option>
                            <option value="336">336 - C6 BANK </option>
                            <option value="340">340 - SUPER PAGAMENTOS S/A (SUPERDITAL) </option>
                            <option value="341">341 - ITAU UNIBANCO </option>
                            <option value="348">348 - BANCO XP S/A </option>
                            <option value="359">359 - ZEMA CFI S/A </option>
                            <option value="364">364 - GERENCIANET PAGAMENTOS DO BRASIL </option>
                            <option value="366">366 - BANCO SOCIETE GENERALE BRASIL </option>
                            <option value="370">370 - BANCO MIZUHO </option>
                            <option value="376">376 - BANCO J.P. MORGAN </option>
                            <option value="389">389 - BANCO MERCANTIL DO BRASIL </option>
                            <option value="394">394 - BANCO BRADESCO FINANCIAMENTOS </option>
                            <option value="399">399 - KIRTON BANK </option>
                            <option value="412">412 - BANCO CAPITAL </option>
                            <option value="413">413 - BANCO BV </option>
                            <option value="422">422 - BANCO SAFRA </option>
                            <option value="456">456 - BANCO MUFG BRASIL </option>
                            <option value="464">464 - BANCO SUMITOMO MITSUI BRASIL </option>
                            <option value="473">473 - BANCO CAIXA GERAL BRASIL </option>
                            <option value="477">477 - CITIBANK N.A </option>
                            <option value="479">479 - BANCO ITAUBANK </option>
                            <option value="487">487 - DEUTSCHE BANK BANCO ALEMÃO </option>
                            <option value="488">488 - JPMORGAN CHASE BANK </option>
                            <option value="492">492 - ING BANK N.V </option>
                            <option value="494">494 - BANCO REP ORIENTAL URUGUAY </option>
                            <option value="495">495 - LA PROVINCIA BUENOS AIRES BANCO </option>
                            <option value="505">505 - BANCO CREDIT SUISSE (BRL) </option>
                            <option value="545">545 - SENSO CCVM </option>
                            <option value="600">600 - BANCO LUSO BRASILEIRO </option>
                            <option value="604">604 - BANCO INDUSTRIAL DO BRASIL </option>
                            <option value="610">610 - BANCO VR </option>
                            <option value="611">611 - BANCO PAULISTA </option>
                            <option value="612">612 - BANCO GUANABARA </option>
                            <option value="613">613 - OMNI BANCO </option>
                            <option value="623">623 - BANCO PAN </option>
                            <option value="626">626 - BANCO FICSA </option>
                            <option value="630">630 - BANCO INTERCAP </option>
                            <option value="633">633 - BANCO RENDIMENTO </option>
                            <option value="634">634 - BANCO TRIANGULO (BANCO TRIANGULO) </option>
                            <option value="637">637 - BANCO SOFISA (SOFISA DIRETO) </option>
                            <option value="641">641 - BANCO ALVORADA </option>
                            <option value="643">643 - BANCO PINE </option>
                            <option value="652">652 - ITAU UNIBANCO HOLDING BM </option>
                            <option value="653">653 - BANCO INDUSVAL </option>
                            <option value="654">654 - BANCO A.J. RENNER </option>
                            <option value="655">655 - NEON PAGAMENTOS </option>
                            <option value="707">707 - BANCO DAYCOVAL </option>
                            <option value="712">712 - BANCO OURINVEST </option>
                            <option value="739">739 - BANCO CETELEM </option>
                            <option value="741">741 - BANCO RIBEIRÃO PRETO </option>
                            <option value="743">743 - BANCO SEMEAR </option>
                            <option value="745">745 - BANCO CITIBANK </option>
                            <option value="746">746 - BANCO MODAL </option>
                            <option value="747">747 - Banco RABOBANK INTERNACIONAL DO BRASIL </option>
                            <option value="748">748 - SICREDI </option>
                            <option value="751">751 - SCOTIABANK BRASIL </option>
                            <option value="752">752 - BNP PARIBAS BRASIL </option>
                            <option value="753">753 - NOVO BANCO CONTINENTAL BM </option>
                            <option value="754">754 - BANCO SISTEMA </option>
                            <option value="755">755 - BOFA MERRILL LYNCH BM </option>
                            <option value="756">756 - BANCOOB (BANCO COOPERATIVO DO BRASIL) </option>
                            <option value="757">757 - BANCO KEB HANA DO BRASIL </option>
                            <option value="908">908 - PARATI – CREDITO FINANCIAMENTO E INVESTIMENTO </option>
                            <option value="954">954 - BANCO CBSS </option>
                            <option value="955">955 - BANCO BONSUCESSO CONSIGNADO </option>
                          </select>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPromotora">PROMOTORA</label>
                          <select name="inputPromotora" id="inputPromotora" class="form-control operacao required cadVenda select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                            <option value="1">CREDIBRASIL LOJAS </option>
                            <option value="2">CREDIBRASIL CONSIGNADO </option>
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




</body>

</html>




<!--CADASTRAR -->

<?php








if (isset($_POST['button'])) {
  $usuario = $_SESSION['idusuarios'];
  $nome = $_POST['inputNome'];
  $cpf = $_POST["inputCpf"];
  $rg = $_POST['inputRg'];
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
  $telefone = $_POST['inputTelefone'];
  $email = $_POST['inputEmail'];
  $convenio = $_POST['inputConvenio'];
  $banco = $_POST['inputBanco'];
  $bancoproposta = $_POST['inputBancoProposta']; //marcador
  $tipodeconta = $_POST['inputTipoConta'];
  $agencia = $_POST['inputAgencia'];
  $conta = $_POST['inputConta'];
  $renda = $_POST['inputRenda'];
  $operacao = $_POST['inputOperacao'];
  $tabela = $_POST['inputTabela'];
  $promotora = $_POST['inputPromotora'];
  $margem = $_POST['inputMargem'];
  $prazo = $_POST['inputPrazo'];
  $valor = $_POST['inputValor'];
  $valorparcelas = $_POST['inputValorParcelas'];
  $formalizacao = $_POST['inputFormalizacao'];
  $canal = $_POST['inputCanal'];
  $documentoanexado   = $_FILES['imagens'];
  $observacao   = $_POST['inputObservacao'];
  $statusproposta = 'PENDENTE';
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



  // Verifica o valor selecionado e atualiza a variável $bancoproposta conforme necessário
  if ($_POST["inputBancoProposta"] == 1) {
    $bancoproposta = "001 - BANCO DO BRASIL";
  } elseif ($_POST["inputBancoProposta"] == 3) {
    $bancoproposta = "003 - BANCO DA AMAZÔNIA";
  } elseif ($_POST["inputBancoProposta"] == 4) {
    $bancoproposta = "004 - BANCO DO NORDESTE DO BRASIL";
  } elseif ($_POST["inputBancoProposta"] == 7) {
    $bancoproposta = "007 - BNDES";
  } elseif ($_POST["inputBancoProposta"] == 10) {
    $bancoproposta = "010 - CREDICOAMO";
  } elseif ($_POST["inputBancoProposta"] == 11) {
    $bancoproposta = "011 - Credit Suisse";
  } elseif ($_POST["inputBancoProposta"] == 12) {
    $bancoproposta = "012 - BANCO INBURSA";
  } elseif ($_POST["inputBancoProposta"] == 14) {
    $bancoproposta = "014 - NATIXIS BRASIL";
  } elseif ($_POST["inputBancoProposta"] == 15) {
    $bancoproposta = "015 - UBS BRASIL CCTVM";
  } elseif ($_POST["inputBancoProposta"] == 16) {
    $bancoproposta = "016 - CCM DESP TRANS SC E RS";
  } elseif ($_POST["inputBancoProposta"] == 17) {
    $bancoproposta = "017 - BNY MELLON BANCO";
  } elseif ($_POST["inputBancoProposta"] == 18) {
    $bancoproposta = "018 - BANCO TRICURY";
  } elseif ($_POST["inputBancoProposta"] == 21) {
    $bancoproposta = "021 - BANCO BANESTES";
  } elseif ($_POST["inputBancoProposta"] == 24) {
    $bancoproposta = "024 - BCO BANDEPE";
  } elseif ($_POST["inputBancoProposta"] == 25) {
    $bancoproposta = "025 - BANCO ALFA";
  } elseif ($_POST["inputBancoProposta"] == 29) {
    $bancoproposta = "029 - BANCO ITAU CONSIGNADO";
  } elseif ($_POST["inputBancoProposta"] == 33) {
    $bancoproposta = "033 - BANCO SANTANDER BRASIL";
  } elseif ($_POST["inputBancoProposta"] == 36) {
    $bancoproposta = "036 - BANCO BBI";
  } elseif ($_POST["inputBancoProposta"] == 37) {
    $bancoproposta = "037 - BANCO DO ESTADO DO PARÁ";
  } elseif ($_POST["inputBancoProposta"] == 40) {
    $bancoproposta = "040 - BANCO CARGILL";
  } elseif ($_POST["inputBancoProposta"] == 41) {
    $bancoproposta = "041 - BANRISUL";
  } elseif ($_POST["inputBancoProposta"] == 47) {
    $bancoproposta = "047 - BANCO DO ESTADO DE SERGIPE";
  } elseif ($_POST["inputBancoProposta"] == 60) {
    $bancoproposta = "060 - CONFIDENCE CC";
  } elseif ($_POST["inputBancoProposta"] == 62) {
    $bancoproposta = "062 - HIPERCARD BM";
  } elseif ($_POST["inputBancoProposta"] == 63) {
    $bancoproposta = "063 - BANCO BRADESCARD";
  } elseif ($_POST["inputBancoProposta"] == 64) {
    $bancoproposta = "064 - GOLDMAN SACHS DO BRASIL BM";
  } elseif ($_POST["inputBancoProposta"] == 65) {
    $bancoproposta = "065 - BANCO ANDBANK";
  } elseif ($_POST["inputBancoProposta"] == 66) {
    $bancoproposta = "066 - BANCO MORGAN STANLEY";
  } elseif ($_POST["inputBancoProposta"] == 69) {
    $bancoproposta = "069 - BANCO CREFISA";
  } elseif ($_POST["inputBancoProposta"] == 70) {
    $bancoproposta = "070 - BANCO DE BRASÍLIA (BRB)";
  } elseif ($_POST["inputBancoProposta"] == 74) {
    $bancoproposta = "074 - BCO. J.SAFRA";
  } elseif ($_POST["inputBancoProposta"] == 75) {
    $bancoproposta = "075 - BCO ABN AMRO";
  } elseif ($_POST["inputBancoProposta"] == 76) {
    $bancoproposta = "076 - BANCO KDB BRASIL";
  } elseif ($_POST["inputBancoProposta"] == 77) {
    $bancoproposta = "077 - BANCO INTER";
  } elseif ($_POST["inputBancoProposta"] == 78) {
    $bancoproposta = "078 - HAITONG BI DO BRASIL";
  } elseif ($_POST["inputBancoProposta"] == 79) {
    $bancoproposta = "079 - BANCO ORIGINAL DO AGRONEGÓCIO";
  } elseif ($_POST["inputBancoProposta"] == 80) {
    $bancoproposta = "080 - B&T CC LTDA";
  } elseif ($_POST["inputBancoProposta"] == 81) {
    $bancoproposta = "081 - BBN BANCO BRASILEIRO DE NEGÓCIOS";
  } elseif ($_POST["inputBancoProposta"] == 82) {
    $bancoproposta = "082 - BANCO TOPÁZIO";
  } elseif ($_POST["inputBancoProposta"] == 83) {
    $bancoproposta = "083 - BANCO DA CHINA BRASIL";
  } elseif ($_POST["inputBancoProposta"] == 84) {
    $bancoproposta = "084 - UNIPRIME NORTE DO PARANÁ";
  } elseif ($_POST["inputBancoProposta"] == 85) {
    $bancoproposta = "085 - COOP CENTRAL AILOS";
  } elseif ($_POST["inputBancoProposta"] == 89) {
    $bancoproposta = "089 - CCR REG MOGIANA";
  } elseif ($_POST["inputBancoProposta"] == 91) {
    $bancoproposta = "091 - BRB - CFI";
  } elseif ($_POST["inputBancoProposta"] == 94) {
    $bancoproposta = "094 - BCO FINAXIS";
  } elseif ($_POST["inputBancoProposta"] == 95) {
    $bancoproposta = "095 - TRAVELEX BANCO DE CÂMBIO";
  } elseif ($_POST["inputBancoProposta"] == 96) {
    $bancoproposta = "096 - BANCO B3";
  } elseif ($_POST["inputBancoProposta"] == 104) {
    $bancoproposta = "104 - CAIXA ECONOMICA FEDERAL";
  } elseif ($_POST["inputBancoProposta"] == 107) {
    $bancoproposta = "107 - BANCO BOCOM BBM";
  } elseif ($_POST["inputBancoProposta"] == 217) {
    $bancoproposta = "217 - BANCO JOHN DEERE";
  } elseif ($_POST["inputBancoProposta"] == 218) {
    $bancoproposta = "218 - BCO BS2";
  } elseif ($_POST["inputBancoProposta"] == 222) {
    $bancoproposta = "222 - BANCO CALYON BRASIL";
  } elseif ($_POST["inputBancoProposta"] == 224) {
    $bancoproposta = "224 - BCO FIBRA";
  } elseif ($_POST["inputBancoProposta"] == 233) {
    $bancoproposta = "233 - BANCO CIFRA";
  } elseif ($_POST["inputBancoProposta"] == 237) {
    $bancoproposta = "237 - BCO BRL BROKER BRASIL";
  } elseif ($_POST["inputBancoProposta"] == 241) {
    $bancoproposta = "241 - BCO CLASSICO";
  } elseif ($_POST["inputBancoProposta"] == 243) {
    $bancoproposta = "243 - BCO MÁXIMA";
  } elseif ($_POST["inputBancoProposta"] == 246) {
    $bancoproposta = "246 - BCO ABC BRASIL";
  } elseif ($_POST["inputBancoProposta"] == 249) {
    $bancoproposta = "249 - BANCO INVESTCRED UNIBANCO";
  } elseif ($_POST["inputBancoProposta"] == 250) {
    $bancoproposta = "250 - BCO SCHAHIN";
  } elseif ($_POST["inputBancoProposta"] == 318) {
    $bancoproposta = "318 - BANCO BMG";
  } elseif ($_POST["inputBancoProposta"] == 320) {
    $bancoproposta = "320 - BCO CCB BRASIL";
  } elseif ($_POST["inputBancoProposta"] == 325) {
    $bancoproposta = "325 - ÓRAMA DTVM";
  } elseif ($_POST["inputBancoProposta"] == 326) {
    $bancoproposta = "326 - PARANÁ BANCO";
  } elseif ($_POST["inputBancoProposta"] == 260) {
    $bancoproposta = "260 - NU PAGAMENTOS S.A (NUBANK)";
  } elseif ($_POST["inputBancoProposta"] == 329) {
    $bancoproposta = "329 - BCO BPP";
  } elseif ($_POST["inputBancoProposta"] == 330) {
    $bancoproposta = "330 - BCO BANDEIRANTES";
  } elseif ($_POST["inputBancoProposta"] == 332) {
    $bancoproposta = "332 - ACESSO BANK";
  } elseif ($_POST["inputBancoProposta"] == 336) {
    $bancoproposta = "336 - BCO C6";
  } elseif ($_POST["inputBancoProposta"] == 341) {
    $bancoproposta = "341 - ITAÚ UNIBANCO";
  } elseif ($_POST["inputBancoProposta"] == 366) {
    $bancoproposta = "366 - CCM BRASIL";
  } elseif ($_POST["inputBancoProposta"] == 370) {
    $bancoproposta = "370 - BCO MIZUHO";
  } elseif ($_POST["inputBancoProposta"] == 376) {
    $bancoproposta = "376 - BCO J.P. MORGAN";
  } elseif ($_POST["inputBancoProposta"] == 389) {
    $bancoproposta = "389 - BANCO MERCANTIL DO BRASIL";
  } elseif ($_POST["inputBancoProposta"] == 394) {
    $bancoproposta = "394 - BANCO BRADESCO FINANCIAMENTOS";
  } elseif ($_POST["inputBancoProposta"] == 412) {
    $bancoproposta = "412 - BANCO CAPITAL";
  } elseif ($_POST["inputBancoProposta"] == 422) {
    $bancoproposta = "422 - BANCO SAFRA";
  } elseif ($_POST["inputBancoProposta"] == 453) {
    $bancoproposta = "453 - BCO RURAL";
  } elseif ($_POST["inputBancoProposta"] == 456) {
    $bancoproposta = "456 - BANCO DE TOKYO-MITSUBISHI UFJ BRASIL";
  } elseif ($_POST["inputBancoProposta"] == 464) {
    $bancoproposta = "464 - BCO SUMITOMO MITSUI BRASIL";
  } elseif ($_POST["inputBancoProposta"] == 473) {
    $bancoproposta = "473 - BCO CAIXA GERAL - BRASIL";
  } elseif ($_POST["inputBancoProposta"] == 477) {
    $bancoproposta = "477 - CITIBANK";
  } elseif ($_POST["inputBancoProposta"] == 479) {
    $bancoproposta = "479 - BANCO ITAUBANK";
  } elseif ($_POST["inputBancoProposta"] == 487) {
    $bancoproposta = "487 - DEUTSCHE BANK";
  } elseif ($_POST["inputBancoProposta"] == 488) {
    $bancoproposta = "488 - JPMORGAN CHASE BANK";
  } elseif ($_POST["inputBancoProposta"] == 492) {
    $bancoproposta = "492 - ING BANK";
  } elseif ($_POST["inputBancoProposta"] == 494) {
    $bancoproposta = "494 - BCO LA PROVINCIA BNCO CORDOBA";
  } elseif ($_POST["inputBancoProposta"] == 495) {
    $bancoproposta = "495 - BANCO LA NACION";
  } elseif ($_POST["inputBancoProposta"] == 505) {
    $bancoproposta = "505 - BANCO CREDIT SUISSE (BRASIL)";
  } elseif ($_POST["inputBancoProposta"] == 600) {
    $bancoproposta = "600 - BCO LUSO BRASILEIRO";
  } elseif ($_POST["inputBancoProposta"] == 604) {
    $bancoproposta = "604 - BANCO INDUSTRIAL DO BRASIL";
  } elseif ($_POST["inputBancoProposta"] == 610) {
    $bancoproposta = "610 - BCO INDUSVAL";
  } elseif ($_POST["inputBancoProposta"] == 611) {
    $bancoproposta = "611 - BCO PAULISTA";
  } elseif ($_POST["inputBancoProposta"] == 612) {
    $bancoproposta = "612 - BCO GUANABARA";
  } elseif ($_POST["inputBancoProposta"] == 613) {
    $bancoproposta = "613 - OMNI BANCO";
  } elseif ($_POST["inputBancoProposta"] == 623) {
    $bancoproposta = "623 - BANCO PAN";
  } elseif ($_POST["inputBancoProposta"] == 626) {
    $bancoproposta = "626 - BCO FIP";
  } elseif ($_POST["inputBancoProposta"] == 630) {
    $bancoproposta = "630 - BCO BARI";
  } elseif ($_POST["inputBancoProposta"] == 633) {
    $bancoproposta = "633 - BCO RENDIMENTO";
  } elseif ($_POST["inputBancoProposta"] == 634) {
    $bancoproposta = "634 - BCO TRIANGULO";
  } elseif ($_POST["inputBancoProposta"] == 637) {
    $bancoproposta = "637 - BCO SOFISA";
  } elseif ($_POST["inputBancoProposta"] == 641) {
    $bancoproposta = "641 - BCO ALVORADA";
  } elseif ($_POST["inputBancoProposta"] == 643) {
    $bancoproposta = "643 - BCO PINE";
  } elseif ($_POST["inputBancoProposta"] == 652) {
    $bancoproposta = "652 - ITAÚ UNIBANCO HOLDING";
  } elseif ($_POST["inputBancoProposta"] == 653) {
    $bancoproposta = "653 - BANCO INDUSVAL";
  } elseif ($_POST["inputBancoProposta"] == 654) {
    $bancoproposta = "654 - BANCO A.J. RENNER";
  } elseif ($_POST["inputBancoProposta"] == 655) {
    $bancoproposta = "655 - BANCO VOTORANTIM";
  } elseif ($_POST["inputBancoProposta"] == 707) {
    $bancoproposta = "707 - BCO DAYCOVAL";
  } elseif ($_POST["inputBancoProposta"] == 712) {
    $bancoproposta = "712 - BCO OURINVEST";
  } elseif ($_POST["inputBancoProposta"] == 739) {
    $bancoproposta = "739 - BCO CETELEM";
  } elseif ($_POST["inputBancoProposta"] == 741) {
    $bancoproposta = "741 - BCO RIBEIRAO PRETO";
  } elseif ($_POST["inputBancoProposta"] == 743) {
    $bancoproposta = "743 - BCO SEMEAR";
  } elseif ($_POST["inputBancoProposta"] == 745) {
    $bancoproposta = "745 - BANCO CITIBANK";
  } elseif ($_POST["inputBancoProposta"] == 746) {
    $bancoproposta = "746 - BANCO MODAL";
  } elseif ($_POST["inputBancoProposta"] == 747) {
    $bancoproposta = "747 - BCO RABOBANK INTL BRASIL";
  } elseif ($_POST["inputBancoProposta"] == 748) {
    $bancoproposta = "748 - BCO COOPERATIVO SICOOB";
  } elseif ($_POST["inputBancoProposta"] == 751) {
    $bancoproposta = "751 - SCOTIABANK BRASIL";
  } elseif ($_POST["inputBancoProposta"] == 752) {
    $bancoproposta = "752 - BCO BANCOOB";
  } elseif ($_POST["inputBancoProposta"] == 753) {
    $bancoproposta = "753 - NOVO BCO CONTINENTAL";
  } elseif ($_POST["inputBancoProposta"] == 755) {
    $bancoproposta = "755 - BCO MERRILL LYNCH";
  } elseif ($_POST["inputBancoProposta"] == 756) {
    $bancoproposta = "756 - BANCOOB";
  } else {
    $bancoproposta = "Código de banco inválido";
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


  //Marcando o tipo de promotora com base no valor do input 
  if ($_POST["inputPromotora"] == 1) {
    $promotora = "CREDIBRASIL LOJAS";
  }
  if ($_POST["inputPromotora"] == 2) {
    $promotora = "CREDIBRASIL CONSIGNADO";
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




  //VERIFICAR SE O NOME JÁ ESTÁ CADASTRADO
  $query_verificar = "select * from propostas where nome = '$nome' ";

  $result_verificar = mysqli_query($conexao, $query_verificar);
  $row_verificar = mysqli_num_rows($result_verificar);

  if ($row_verificar > 0) {
    echo "<script language='javascript'> window.alert('Proposta para esse cliente já Cadastrada!'); </scrip>";
    exit();
  }


  //marcador
  $query = "INSERT into propostas (idusuario, nome,cpf, rg, nascimento, nomedamae, nomedopai, cep, rua, numero, complemento, bairro, cidade, uf, telefone, email, convenio, banco, bancoproposta, tipodeconta, agencia, conta, renda, operacao, tabela, promotora, margem, prazo, valor, valorparcelas, formalizacao, canal, documentoanexado, observacao, statusproposta, data) VALUES ('$usuario','$nome','$cpf', '$rg', '$nascimento','$nomedamae', '$nomedopai', '$cep', '$rua', '$numero','$complemento','$bairro','$cidade','$uf','$telefone','$email','$convenio','$banco','$bancoproposta','$tipodeconta','$agencia','$conta','$renda','$operacao','$tabela','$promotora','$margem','$prazo','$valor','$valorparcelas','$formalizacao','$canal',' $novo_nome','$observacao','$statusproposta',curDate())";
  $result = mysqli_query($conexao, $query);



  //Editando LOG de usuário, informando que foi adicionada uma nova ocorrÊncia por ele
  if ($row_verificar > 0) {
    echo "<script language='javascript'> window.alert('Nome já Cadastrado!'); </script>";
    exit();
  }

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
                <div class="form-group col-md-6">
                  <label for="inputNome">NOME</label>
                  <input name="inputNome" type="text" class="form-control" id="inputNome" placeholder="" required value="<?php echo $res_1['nome']; ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputCpf">CPF</label>
                  <input name="inputCpf" type="text" class="form-control inputCpf" id="inputCpf" placeholder="" value="<?php echo $res_1['cpf']; ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputRg">RG</label>
                  <input name="inputRg" type="text" class="form-control" id="inputRg" placeholder="" value="<?php echo $res_1['rg']; ?>">
                </div>
                <div class="form-group col-md-6">
                  <form method="POST" action="">
                    <label for="inputTelefone">TELEFONE</label>
                    <input name="inputTelefone" type="text" class="form-control inputTelefone" id="inputTelefone" placeholder="" value="<?php echo $res_1['telefone']; ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail">EMAIL</label>
                  <input name="inputEmail" type="email" class="form-control" id="inputEmail" placeholder="" value="<?php echo $res_1['email']; ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputDataNascimento">DATA DE NASCIMENTO</label>
                  <input name="inputDataNascimento" type="text" class="form-control inputDataNascimento" id="inputDataNascimento" placeholder="" value="<?php echo $res_1['nascimento']; ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputNomeMae">NOME DA MÃE</label>
                  <input name="inputNomeMae" type="text" class="form-control" id="inputNomeMae" placeholder="" value="<?php echo $res_1['nomedamae']; ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputNomePai">NOME DO PAI</label>
                  <input name="inputNomePai" type="text" class="form-control" id="inputNomePai" placeholder="" value="<?php echo $res_1['nomedopai']; ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputCep">CEP</label>
                  <input name="inputCep" type="text" class="form-control" id="inputCep" placeholder="" value="<?php echo $res_1['cep']; ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputRua">RUA</label>
                  <input name="inputRua" type="text" class="form-control" id="inputRua" placeholder="" value="<?php echo $res_1['rua']; ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputNumero">NÚMERO</label>
                  <input name="inputNumero" type="text" class="form-control" id="inputNumero" placeholder="" value="<?php echo $res_1['numero']; ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputComplemento">COMPLEMENTO</label>
                  <input name="inputComplemento" type="text" class="form-control" id="inputComplemento" placeholder="" value="<?php echo $res_1['complemento']; ?>">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputBairro">BAIRRO</label>
                  <input name="inputBairro" type="text" class="form-control" id="inputBairro" value="<?php echo $res_1['bairro']; ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputCidade">CIDADE</label>
                  <input name="inputCidade" type="text" class="form-control" id="inputCidade" value="<?php echo $res_1['cidade']; ?>">
                </div>
                <div class="form-group col-md-6">
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











      $query_editar = "UPDATE propostas set nome = '$nome', cpf = '$cpf', rg = '$rg', telefone = '$telefone', email = '$email', nascimento = '$nascimento',nomedamae = '$nomedamae', nomedopai = '$nomedopai', cep = '$cep', rua = '$rua', numero = '$numero', complemento = '$complemento', bairro = '$bairro', cidade = '$cidade', uf = '$uf' where idpropostas = '$id' ";

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
                  <label for="inputBanco">BANCO</label>
                  <select name="inputBanco" id="inputBanco" class="form-control bancos required cadVenda select2-hidden-accessible" aria-hidden="true" tabindex="-1">
                    <option selected><?php echo $res_1['banco']; ?></option>
                    <option value="1">001 - BANCO DO BRASIL </option>
                    <option value="3">003 - BANCO DA AMAZONIA </option>
                    <option value="4">004 - BANCO DO NORDESTE DO BRASIL </option>
                    <option value="7">007 - BNDES </option>
                    <option value="10">010 - CREDICOAMO </option>
                    <option value="11">011 - Credit Suisse </option>
                    <option value="12">012 - BANCO INBURSA </option>
                    <option value="14">014 - NATIXIS BRASIL </option>
                    <option value="15">015 - UBS BRASIL CCTVM </option>
                    <option value="16">016 - CCM DESP TRANS SC E RS </option>
                    <option value="17">017 - BNY MELLON BANCO </option>
                    <option value="18">018 - BANCO TRICURY </option>
                    <option value="21">021 - BANCO BANESTES </option>
                    <option value="24">024 - BCO BANDEPE </option>
                    <option value="25">025 - BANCO ALFA . </option>
                    <option value="29">029 - BANCO ITAU CONSIGNADO </option>
                    <option value="33">033 - BANCO SANTANDER BRASIL </option>
                    <option value="36">036 - BANCO BBI </option>
                    <option value="37">037 - BANCO DO ESTADO DO PARA </option>
                    <option value="40">040 - BANCO CARGILL </option>
                    <option value="41">041 - BANRISUL </option>
                    <option value="47">047 - BANCO DO ESTADO DE SERGIPE </option>
                    <option value="60">060 - CONFIDENCE CC </option>
                    <option value="62">062 - HIPERCARD BM </option>
                    <option value="63">063 - BANCO BRADESCARD </option>
                    <option value="64">064 - GOLDMAN SACHS DO BRASIL BM </option>
                    <option value="65">065 - BANCO ANDBANK </option>
                    <option value="66">066 - BANCO MORGAN STANLEY </option>
                    <option value="69">069 - BANCO CREFISA </option>
                    <option value="70">070 - BANCO DE BRASILIA (BRB) </option>
                    <option value="74">074 - BCO. J.SAFRA </option>
                    <option value="75">075 - BCO ABN AMRO </option>
                    <option value="76">076 - BANCO KDB BRASIL . </option>
                    <option value="77">077 - BANCO INTER </option>
                    <option value="78">078 - HAITONG BI DO BRASIL </option>
                    <option value="79">079 - BANCO ORIGINAL DO AGRONEGÓCIO </option>
                    <option value="80">080 - B&amp;T CC LTDA </option>
                    <option value="81">081 - BBN BANCO BRASILEIRO DE NEGOCIOS </option>
                    <option value="82">082 - BANCO TOPAZIO </option>
                    <option value="83">083 - BANCO DA CHINA BRASIL </option>
                    <option value="84">084 - UNIPRIME NORTE DO PARANA </option>
                    <option value="85">085 - COOP CENTRAL AILOS </option>
                    <option value="89">089 - CCR REG MOGIANA </option>
                    <option value="91">091 - UNICRED CENTRAL RS </option>
                    <option value="92">092 - BRK </option>
                    <option value="93">093 - PÓLOCRED SCMEPP LTDA </option>
                    <option value="94">094 - BANCO FINAXIS </option>
                    <option value="95">095 - BANCO CONFIDENCE DE CAMBIO </option>
                    <option value="96">096 - BANCO B3 </option>
                    <option value="97">097 - CCC NOROESTE BRASILEIRO LTDA </option>
                    <option value="98">098 - CREDIALIANÇA CCR </option>
                    <option value="99">099 - UNIPRIME CENTRAL CCC LTDA </option>
                    <option value="100">100 - PLANNER CORRETORA DE VALORES </option>
                    <option value="101">101 - RENASCENCA DTVM LTDA </option>
                    <option value="102">102 - XP INVESTIMENTOS </option>
                    <option value="104">104 - CAIXA ECONOMICA FEDERAL (CEF) </option>
                    <option value="105">105 - LECCA CFI </option>
                    <option value="107">107 - BANCO BOCOM BBM </option>
                    <option value="108">108 - PORTOCRED </option>
                    <option value="111">111 - BANCO OLIVEIRA TRUST DTVM </option>
                    <option value="113">113 - MAGLIANO </option>
                    <option value="114">114 - CENTRAL COOPERATIVA DE CREDITO NO ESTADO DO E </option>
                    <option value="117">117 - ADVANCED CC LTDA </option>
                    <option value="118">118 - STANDARD CHARTERED BI </option>
                    <option value="119">119 - BANCO WESTERN UNION </option>
                    <option value="120">120 - BANCO RODOBENS </option>
                    <option value="121">121 - BANCO AGIBANK </option>
                    <option value="122">122 - BANCO BRADESCO BERJ </option>
                    <option value="124">124 - BANCO WOORI BANK DO BRASIL </option>
                    <option value="125">125 - BRASIL PLURAL BANCO </option>
                    <option value="126">126 - BR PARTNERS BI </option>
                    <option value="127">127 - CODEPE CVC </option>
                    <option value="128">128 - MS BANK BANCO DE CAMBIO </option>
                    <option value="129">129 - UBS BRASIL BI </option>
                    <option value="130">130 - CARUANA SCFI </option>
                    <option value="131">131 - TULLETT PREBON BRASIL CVC LTDA </option>
                    <option value="132">132 - ICBC DO BRASIL BM </option>
                    <option value="133">133 - CRESOL CONFEDERAÇÃO </option>
                    <option value="134">134 - BGC LIQUIDEZ DTVM LTDA </option>
                    <option value="136">136 - UNICRED COOPERATIVA </option>
                    <option value="137">137 - MULTIMONEY CC LTDA </option>
                    <option value="138">138 - GET MONEY CC LTDA </option>
                    <option value="139">139 - INTESA SANPAOLO BRASIL </option>
                    <option value="140">140 - EASYNVEST - TITULO CV </option>
                    <option value="142">142 - BROKER BRASIL CC LTDA </option>
                    <option value="143">143 - TREVISO CC </option>
                    <option value="144">144 - BEXS BANCO DE CAMBIO . </option>
                    <option value="145">145 - LEVYCAM CCV LTDA </option>
                    <option value="146">146 - GUITTA CC LTDA </option>
                    <option value="149">149 - FACTA . CFI </option>
                    <option value="157">157 - ICAP DO BRASIL CTVM LTDA </option>
                    <option value="159">159 - CASA CREDITO </option>
                    <option value="163">163 - COMMERZBANK BRASIL BANCO MULTIPLO </option>
                    <option value="169">169 - BANCO OLE CONSIGNADO </option>
                    <option value="172">172 - ALBATROSS CCV </option>
                    <option value="173">173 - BRL TRUST DTVM SA </option>
                    <option value="174">174 - PERNAMBUCANAS FINANC </option>
                    <option value="177">177 - GUIDE </option>
                    <option value="180">180 - CM CAPITAL MARKETS CCTVM LTDA </option>
                    <option value="182">182 - DACASA FINANCEIRA S/A </option>
                    <option value="183">183 - SOCRED </option>
                    <option value="184">184 - BANCO ITAU BBA </option>
                    <option value="188">188 - ATIVA INVESTIMENTOS </option>
                    <option value="189">189 - HS FINANCEIRA </option>
                    <option value="190">190 - SERVICOOP </option>
                    <option value="191">191 - NOVA FUTURA CTVM LTDA </option>
                    <option value="194">194 - PARMETAL DTVM LTDA </option>
                    <option value="196">196 - BANCO FAIR CC </option>
                    <option value="197">197 - STONE PAGAMENTOS </option>
                    <option value="204">204 - BANCO BRADESCO CARTOES </option>
                    <option value="208">208 - BANCO BTG PACTUAL </option>
                    <option value="212">212 - BANCO ORIGINAL </option>
                    <option value="213">213 - BCO ARBI </option>
                    <option value="217">217 - BANCO JOHN DEERE </option>
                    <option value="218">218 - BANCO BS2 </option>
                    <option value="222">222 - BANCO CREDIT AGRICOLE BR </option>
                    <option value="224">224 - BANCO FIBRA </option>
                    <option value="233">233 - BANCO CIFRA </option>
                    <option value="237">237 - BRADESCO </option>
                    <option value="241">241 - BANCO CLASSICO </option>
                    <option value="243">243 - BANCO MAXIMA </option>
                    <option value="246">246 - BANCO ABC BRASIL </option>
                    <option value="249">249 - BANCO INVESTCRED UNIBANCO </option>
                    <option value="250">250 - BANCO BCV </option>
                    <option value="253">253 - BEXS CC </option>
                    <option value="254">254 - PARANA BANCO </option>
                    <option value="260">260 - NU PAGAMENTOS (NUBANK) </option>
                    <option value="265">265 - BANCO FATOR </option>
                    <option value="266">266 - BANCO CEDULA </option>
                    <option value="268">268 - BARIGUI CH </option>
                    <option value="269">269 - HSBC BANCO DE INVESTIMENTO </option>
                    <option value="270">270 - SAGITUR CC LTDA </option>
                    <option value="271">271 - IB CCTVM LTDA </option>
                    <option value="273">273 - CCR DE SÃO MIGUEL DO OESTE </option>
                    <option value="276">276 - SENFF </option>
                    <option value="278">278 - GENIAL INVESTIMENTOS CVM </option>
                    <option value="279">279 - CCR DE PRIMAVERA DO LESTE </option>
                    <option value="280">280 - AVISTA </option>
                    <option value="283">283 - RB CAPITAL INVESTIMENTOS DTVM LTDA </option>
                    <option value="285">285 - FRENTE CC LTDA </option>
                    <option value="286">286 - CCR DE OURO </option>
                    <option value="288">288 - CAROL DTVM LTDA </option>
                    <option value="290">290 - Pagseguro Internet </option>
                    <option value="292">292 - BS2 DISTRIBUIDORA DE TITULOS E INVESTIMENTOS </option>
                    <option value="293">293 - LASTRO RDV DTVM LTDA </option>
                    <option value="298">298 - VIPS CC LTDA </option>
                    <option value="300">300 - BANCO LA NACION ARGENTINA </option>
                    <option value="301">301 - BPP INSTITUIÇÃO DE PAGAMENTOS </option>
                    <option value="310">310 - VORTX DTVM LTDA </option>
                    <option value="318">318 - BANCO BMG </option>
                    <option value="320">320 - BANCO CCB BRASIL </option>
                    <option value="321">321 - CREFAZ SCMEPP LTDA </option>
                    <option value="323">323 - Mercado Pago - conta do Mercado Livre </option>
                    <option value="329">329 - Q I Sociedade </option>
                    <option value="335">335 - Banco Digio </option>
                    <option value="336">336 - C6 BANK </option>
                    <option value="340">340 - SUPER PAGAMENTOS S/A (SUPERDITAL) </option>
                    <option value="341">341 - ITAU UNIBANCO </option>
                    <option value="348">348 - BANCO XP S/A </option>
                    <option value="359">359 - ZEMA CFI S/A </option>
                    <option value="364">364 - GERENCIANET PAGAMENTOS DO BRASIL </option>
                    <option value="366">366 - BANCO SOCIETE GENERALE BRASIL </option>
                    <option value="370">370 - BANCO MIZUHO </option>
                    <option value="376">376 - BANCO J.P. MORGAN </option>
                    <option value="389">389 - BANCO MERCANTIL DO BRASIL </option>
                    <option value="394">394 - BANCO BRADESCO FINANCIAMENTOS </option>
                    <option value="399">399 - KIRTON BANK </option>
                    <option value="412">412 - BANCO CAPITAL </option>
                    <option value="413">413 - BANCO BV </option>
                    <option value="422">422 - BANCO SAFRA </option>
                    <option value="456">456 - BANCO MUFG BRASIL </option>
                    <option value="464">464 - BANCO SUMITOMO MITSUI BRASIL </option>
                    <option value="473">473 - BANCO CAIXA GERAL BRASIL </option>
                    <option value="477">477 - CITIBANK N.A </option>
                    <option value="479">479 - BANCO ITAUBANK </option>
                    <option value="487">487 - DEUTSCHE BANK BANCO ALEMÃO </option>
                    <option value="488">488 - JPMORGAN CHASE BANK </option>
                    <option value="492">492 - ING BANK N.V </option>
                    <option value="494">494 - BANCO REP ORIENTAL URUGUAY </option>
                    <option value="495">495 - LA PROVINCIA BUENOS AIRES BANCO </option>
                    <option value="505">505 - BANCO CREDIT SUISSE (BRL) </option>
                    <option value="545">545 - SENSO CCVM </option>
                    <option value="600">600 - BANCO LUSO BRASILEIRO </option>
                    <option value="604">604 - BANCO INDUSTRIAL DO BRASIL </option>
                    <option value="610">610 - BANCO VR </option>
                    <option value="611">611 - BANCO PAULISTA </option>
                    <option value="612">612 - BANCO GUANABARA </option>
                    <option value="613">613 - OMNI BANCO </option>
                    <option value="623">623 - BANCO PAN </option>
                    <option value="626">626 - BANCO FICSA </option>
                    <option value="630">630 - BANCO INTERCAP </option>
                    <option value="633">633 - BANCO RENDIMENTO </option>
                    <option value="634">634 - BANCO TRIANGULO (BANCO TRIANGULO) </option>
                    <option value="637">637 - BANCO SOFISA (SOFISA DIRETO) </option>
                    <option value="641">641 - BANCO ALVORADA </option>
                    <option value="643">643 - BANCO PINE </option>
                    <option value="652">652 - ITAU UNIBANCO HOLDING BM </option>
                    <option value="653">653 - BANCO INDUSVAL </option>
                    <option value="654">654 - BANCO A.J. RENNER </option>
                    <option value="655">655 - NEON PAGAMENTOS </option>
                    <option value="707">707 - BANCO DAYCOVAL </option>
                    <option value="712">712 - BANCO OURINVEST </option>
                    <option value="739">739 - BANCO CETELEM </option>
                    <option value="741">741 - BANCO RIBEIRÃO PRETO </option>
                    <option value="743">743 - BANCO SEMEAR </option>
                    <option value="745">745 - BANCO CITIBANK </option>
                    <option value="746">746 - BANCO MODAL </option>
                    <option value="747">747 - Banco RABOBANK INTERNACIONAL DO BRASIL </option>
                    <option value="748">748 - SICREDI </option>
                    <option value="751">751 - SCOTIABANK BRASIL </option>
                    <option value="752">752 - BNP PARIBAS BRASIL </option>
                    <option value="753">753 - NOVO BANCO CONTINENTAL BM </option>
                    <option value="754">754 - BANCO SISTEMA </option>
                    <option value="755">755 - BOFA MERRILL LYNCH BM </option>
                    <option value="756">756 - BANCOOB (BANCO COOPERATIVO DO BRASIL) </option>
                    <option value="757">757 - BANCO KEB HANA DO BRASIL </option>
                    <option value="908">908 - PARATI – CREDITO FINANCIAMENTO E INVESTIMENTO </option>
                    <option value="954">954 - BANCO CBSS </option>
                    <option value="955">955 - BANCO BONSUCESSO CONSIGNADO </option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputPromotora">PROMOTORA</label>
                  <select name="inputPromotora" id="inputPromotora" class="form-control operacao required cadVenda select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                    <option selected><?php echo $res_1['promotora']; ?></option>
                    <option value="1">CREDIBRASIL LOJAS </option>
                    <option value="2">CREDIBRASIL CONSIGNADO </option>
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
      $promotora = $_POST['inputPromotora'];
      $margem = $_POST['inputMargem'];
      $prazo = $_POST['inputPrazo'];
      $valor = $_POST['inputValor'];
      $valorparcelas = $_POST['inputValorParcelas'];
      $formalizacao = $_POST['inputFormalizacao'];
      $canal = $_POST['inputCanal'];

      $observacao   = $_POST['inputObservacao'];





      $query_editar = "UPDATE propostas set convenio = '$convenio', operacao = '$operacao', banco = '$banco', promotora = '$promotora', margem = '$margem', prazo = '$prazo', valor = '$valor', valorparcelas = '$valorparcelas', formalizacao = '$formalizacao', canal = '$canal', tabela = '$tabela', observacao = '$observacao' where idpropostas = '$id' ";

      $result_editar = mysqli_query($conexao, $query_editar);


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


      //Marcando o tipo de promotora com base no valor do input 
      if ($_POST["inputPromotora"] == 1) {
        $promotora = "CREDIBRASIL LOJAS";
      }
      if ($_POST["inputPromotora"] == 2) {
        $promotora = "CREDIBRASIL CONSIGNADO";
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









      $query_editar = "UPDATE propostas set convenio = '$convenio', operacao = '$operacao', banco = '$banco', promotora = '$promotora', margem = '$margem',prazo = '$prazo', valor = '$valor', valorparcelas = '$valorparcelas', formalizacao = '$formalizacao', canal = '$canal', tabela = '$tabela', observacao = '$observacao' where idpropostas = '$id' ";

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


            <!-- INÍCIO DO CONTEÚDO TAB DADOS BANCÁRIOS-->

            <div class="form-row">
              <div class="form-group col-md-6">
                <form method="POST" action="">
                  <label for="inputBanco" id="inputBanco">BANCO</label>
                  <select name="inputBanco" class="form-control bancos required cadVenda select2-hidden-accessible" aria-hidden="true" tabindex="-1">
                    <option selected><?php echo $res_1['banco']; ?></option>
                    <option value="1">001 - BANCO DO BRASIL </option>
                    <option value="3">003 - BANCO DA AMAZONIA </option>
                    <option value="4">004 - BANCO DO NORDESTE DO BRASIL </option>
                    <option value="7">007 - BNDES </option>
                    <option value="10">010 - CREDICOAMO </option>
                    <option value="11">011 - Credit Suisse </option>
                    <option value="12">012 - BANCO INBURSA </option>
                    <option value="14">014 - NATIXIS BRASIL </option>
                    <option value="15">015 - UBS BRASIL CCTVM </option>
                    <option value="16">016 - CCM DESP TRANS SC E RS </option>
                    <option value="17">017 - BNY MELLON BANCO </option>
                    <option value="18">018 - BANCO TRICURY </option>
                    <option value="21">021 - BANCO BANESTES </option>
                    <option value="24">024 - BCO BANDEPE </option>
                    <option value="25">025 - BANCO ALFA . </option>
                    <option value="29">029 - BANCO ITAU CONSIGNADO </option>
                    <option value="33">033 - BANCO SANTANDER BRASIL </option>
                    <option value="36">036 - BANCO BBI </option>
                    <option value="37">037 - BANCO DO ESTADO DO PARA </option>
                    <option value="40">040 - BANCO CARGILL </option>
                    <option value="41">041 - BANRISUL </option>
                    <option value="47">047 - BANCO DO ESTADO DE SERGIPE </option>
                    <option value="60">060 - CONFIDENCE CC </option>
                    <option value="62">062 - HIPERCARD BM </option>
                    <option value="63">063 - BANCO BRADESCARD </option>
                    <option value="64">064 - GOLDMAN SACHS DO BRASIL BM </option>
                    <option value="65">065 - BANCO ANDBANK </option>
                    <option value="66">066 - BANCO MORGAN STANLEY </option>
                    <option value="69">069 - BANCO CREFISA </option>
                    <option value="70">070 - BANCO DE BRASILIA (BRB) </option>
                    <option value="74">074 - BCO. J.SAFRA </option>
                    <option value="75">075 - BCO ABN AMRO </option>
                    <option value="76">076 - BANCO KDB BRASIL . </option>
                    <option value="77">077 - BANCO INTER </option>
                    <option value="78">078 - HAITONG BI DO BRASIL </option>
                    <option value="79">079 - BANCO ORIGINAL DO AGRONEGÓCIO </option>
                    <option value="80">080 - B&amp;T CC LTDA </option>
                    <option value="81">081 - BBN BANCO BRASILEIRO DE NEGOCIOS </option>
                    <option value="82">082 - BANCO TOPAZIO </option>
                    <option value="83">083 - BANCO DA CHINA BRASIL </option>
                    <option value="84">084 - UNIPRIME NORTE DO PARANA </option>
                    <option value="85">085 - COOP CENTRAL AILOS </option>
                    <option value="89">089 - CCR REG MOGIANA </option>
                    <option value="91">091 - UNICRED CENTRAL RS </option>
                    <option value="92">092 - BRK </option>
                    <option value="93">093 - PÓLOCRED SCMEPP LTDA </option>
                    <option value="94">094 - BANCO FINAXIS </option>
                    <option value="95">095 - BANCO CONFIDENCE DE CAMBIO </option>
                    <option value="96">096 - BANCO B3 </option>
                    <option value="97">097 - CCC NOROESTE BRASILEIRO LTDA </option>
                    <option value="98">098 - CREDIALIANÇA CCR </option>
                    <option value="99">099 - UNIPRIME CENTRAL CCC LTDA </option>
                    <option value="100">100 - PLANNER CORRETORA DE VALORES </option>
                    <option value="101">101 - RENASCENCA DTVM LTDA </option>
                    <option value="102">102 - XP INVESTIMENTOS </option>
                    <option value="104">104 - CAIXA ECONOMICA FEDERAL (CEF) </option>
                    <option value="105">105 - LECCA CFI </option>
                    <option value="107">107 - BANCO BOCOM BBM </option>
                    <option value="108">108 - PORTOCRED </option>
                    <option value="111">111 - BANCO OLIVEIRA TRUST DTVM </option>
                    <option value="113">113 - MAGLIANO </option>
                    <option value="114">114 - CENTRAL COOPERATIVA DE CREDITO NO ESTADO DO E </option>
                    <option value="117">117 - ADVANCED CC LTDA </option>
                    <option value="118">118 - STANDARD CHARTERED BI </option>
                    <option value="119">119 - BANCO WESTERN UNION </option>
                    <option value="120">120 - BANCO RODOBENS </option>
                    <option value="121">121 - BANCO AGIBANK </option>
                    <option value="122">122 - BANCO BRADESCO BERJ </option>
                    <option value="124">124 - BANCO WOORI BANK DO BRASIL </option>
                    <option value="125">125 - BRASIL PLURAL BANCO </option>
                    <option value="126">126 - BR PARTNERS BI </option>
                    <option value="127">127 - CODEPE CVC </option>
                    <option value="128">128 - MS BANK BANCO DE CAMBIO </option>
                    <option value="129">129 - UBS BRASIL BI </option>
                    <option value="130">130 - CARUANA SCFI </option>
                    <option value="131">131 - TULLETT PREBON BRASIL CVC LTDA </option>
                    <option value="132">132 - ICBC DO BRASIL BM </option>
                    <option value="133">133 - CRESOL CONFEDERAÇÃO </option>
                    <option value="134">134 - BGC LIQUIDEZ DTVM LTDA </option>
                    <option value="136">136 - UNICRED COOPERATIVA </option>
                    <option value="137">137 - MULTIMONEY CC LTDA </option>
                    <option value="138">138 - GET MONEY CC LTDA </option>
                    <option value="139">139 - INTESA SANPAOLO BRASIL </option>
                    <option value="140">140 - EASYNVEST - TITULO CV </option>
                    <option value="142">142 - BROKER BRASIL CC LTDA </option>
                    <option value="143">143 - TREVISO CC </option>
                    <option value="144">144 - BEXS BANCO DE CAMBIO . </option>
                    <option value="145">145 - LEVYCAM CCV LTDA </option>
                    <option value="146">146 - GUITTA CC LTDA </option>
                    <option value="149">149 - FACTA . CFI </option>
                    <option value="157">157 - ICAP DO BRASIL CTVM LTDA </option>
                    <option value="159">159 - CASA CREDITO </option>
                    <option value="163">163 - COMMERZBANK BRASIL BANCO MULTIPLO </option>
                    <option value="169">169 - BANCO OLE CONSIGNADO </option>
                    <option value="172">172 - ALBATROSS CCV </option>
                    <option value="173">173 - BRL TRUST DTVM SA </option>
                    <option value="174">174 - PERNAMBUCANAS FINANC </option>
                    <option value="177">177 - GUIDE </option>
                    <option value="180">180 - CM CAPITAL MARKETS CCTVM LTDA </option>
                    <option value="182">182 - DACASA FINANCEIRA S/A </option>
                    <option value="183">183 - SOCRED </option>
                    <option value="184">184 - BANCO ITAU BBA </option>
                    <option value="188">188 - ATIVA INVESTIMENTOS </option>
                    <option value="189">189 - HS FINANCEIRA </option>
                    <option value="190">190 - SERVICOOP </option>
                    <option value="191">191 - NOVA FUTURA CTVM LTDA </option>
                    <option value="194">194 - PARMETAL DTVM LTDA </option>
                    <option value="196">196 - BANCO FAIR CC </option>
                    <option value="197">197 - STONE PAGAMENTOS </option>
                    <option value="204">204 - BANCO BRADESCO CARTOES </option>
                    <option value="208">208 - BANCO BTG PACTUAL </option>
                    <option value="212">212 - BANCO ORIGINAL </option>
                    <option value="213">213 - BCO ARBI </option>
                    <option value="217">217 - BANCO JOHN DEERE </option>
                    <option value="218">218 - BANCO BS2 </option>
                    <option value="222">222 - BANCO CREDIT AGRICOLE BR </option>
                    <option value="224">224 - BANCO FIBRA </option>
                    <option value="233">233 - BANCO CIFRA </option>
                    <option value="237">237 - BRADESCO </option>
                    <option value="241">241 - BANCO CLASSICO </option>
                    <option value="243">243 - BANCO MAXIMA </option>
                    <option value="246">246 - BANCO ABC BRASIL </option>
                    <option value="249">249 - BANCO INVESTCRED UNIBANCO </option>
                    <option value="250">250 - BANCO BCV </option>
                    <option value="253">253 - BEXS CC </option>
                    <option value="254">254 - PARANA BANCO </option>
                    <option value="260">260 - NU PAGAMENTOS (NUBANK) </option>
                    <option value="265">265 - BANCO FATOR </option>
                    <option value="266">266 - BANCO CEDULA </option>
                    <option value="268">268 - BARIGUI CH </option>
                    <option value="269">269 - HSBC BANCO DE INVESTIMENTO </option>
                    <option value="270">270 - SAGITUR CC LTDA </option>
                    <option value="271">271 - IB CCTVM LTDA </option>
                    <option value="273">273 - CCR DE SÃO MIGUEL DO OESTE </option>
                    <option value="276">276 - SENFF </option>
                    <option value="278">278 - GENIAL INVESTIMENTOS CVM </option>
                    <option value="279">279 - CCR DE PRIMAVERA DO LESTE </option>
                    <option value="280">280 - AVISTA </option>
                    <option value="283">283 - RB CAPITAL INVESTIMENTOS DTVM LTDA </option>
                    <option value="285">285 - FRENTE CC LTDA </option>
                    <option value="286">286 - CCR DE OURO </option>
                    <option value="288">288 - CAROL DTVM LTDA </option>
                    <option value="290">290 - Pagseguro Internet </option>
                    <option value="292">292 - BS2 DISTRIBUIDORA DE TITULOS E INVESTIMENTOS </option>
                    <option value="293">293 - LASTRO RDV DTVM LTDA </option>
                    <option value="298">298 - VIPS CC LTDA </option>
                    <option value="300">300 - BANCO LA NACION ARGENTINA </option>
                    <option value="301">301 - BPP INSTITUIÇÃO DE PAGAMENTOS </option>
                    <option value="310">310 - VORTX DTVM LTDA </option>
                    <option value="318">318 - BANCO BMG </option>
                    <option value="320">320 - BANCO CCB BRASIL </option>
                    <option value="321">321 - CREFAZ SCMEPP LTDA </option>
                    <option value="323">323 - Mercado Pago - conta do Mercado Livre </option>
                    <option value="329">329 - Q I Sociedade </option>
                    <option value="335">335 - Banco Digio </option>
                    <option value="336">336 - C6 BANK </option>
                    <option value="340">340 - SUPER PAGAMENTOS S/A (SUPERDITAL) </option>
                    <option value="341">341 - ITAU UNIBANCO </option>
                    <option value="348">348 - BANCO XP S/A </option>
                    <option value="359">359 - ZEMA CFI S/A </option>
                    <option value="364">364 - GERENCIANET PAGAMENTOS DO BRASIL </option>
                    <option value="366">366 - BANCO SOCIETE GENERALE BRASIL </option>
                    <option value="370">370 - BANCO MIZUHO </option>
                    <option value="376">376 - BANCO J.P. MORGAN </option>
                    <option value="389">389 - BANCO MERCANTIL DO BRASIL </option>
                    <option value="394">394 - BANCO BRADESCO FINANCIAMENTOS </option>
                    <option value="399">399 - KIRTON BANK </option>
                    <option value="412">412 - BANCO CAPITAL </option>
                    <option value="413">413 - BANCO BV </option>
                    <option value="422">422 - BANCO SAFRA </option>
                    <option value="456">456 - BANCO MUFG BRASIL </option>
                    <option value="464">464 - BANCO SUMITOMO MITSUI BRASIL </option>
                    <option value="473">473 - BANCO CAIXA GERAL BRASIL </option>
                    <option value="477">477 - CITIBANK N.A </option>
                    <option value="479">479 - BANCO ITAUBANK </option>
                    <option value="487">487 - DEUTSCHE BANK BANCO ALEMÃO </option>
                    <option value="488">488 - JPMORGAN CHASE BANK </option>
                    <option value="492">492 - ING BANK N.V </option>
                    <option value="494">494 - BANCO REP ORIENTAL URUGUAY </option>
                    <option value="495">495 - LA PROVINCIA BUENOS AIRES BANCO </option>
                    <option value="505">505 - BANCO CREDIT SUISSE (BRL) </option>
                    <option value="545">545 - SENSO CCVM </option>
                    <option value="600">600 - BANCO LUSO BRASILEIRO </option>
                    <option value="604">604 - BANCO INDUSTRIAL DO BRASIL </option>
                    <option value="610">610 - BANCO VR </option>
                    <option value="611">611 - BANCO PAULISTA </option>
                    <option value="612">612 - BANCO GUANABARA </option>
                    <option value="613">613 - OMNI BANCO </option>
                    <option value="623">623 - BANCO PAN </option>
                    <option value="626">626 - BANCO FICSA </option>
                    <option value="630">630 - BANCO INTERCAP </option>
                    <option value="633">633 - BANCO RENDIMENTO </option>
                    <option value="634">634 - BANCO TRIANGULO (BANCO TRIANGULO) </option>
                    <option value="637">637 - BANCO SOFISA (SOFISA DIRETO) </option>
                    <option value="641">641 - BANCO ALVORADA </option>
                    <option value="643">643 - BANCO PINE </option>
                    <option value="652">652 - ITAU UNIBANCO HOLDING BM </option>
                    <option value="653">653 - BANCO INDUSVAL </option>
                    <option value="654">654 - BANCO A.J. RENNER </option>
                    <option value="655">655 - NEON PAGAMENTOS </option>
                    <option value="707">707 - BANCO DAYCOVAL </option>
                    <option value="712">712 - BANCO OURINVEST </option>
                    <option value="739">739 - BANCO CETELEM </option>
                    <option value="741">741 - BANCO RIBEIRÃO PRETO </option>
                    <option value="743">743 - BANCO SEMEAR </option>
                    <option value="745">745 - BANCO CITIBANK </option>
                    <option value="746">746 - BANCO MODAL </option>
                    <option value="747">747 - Banco RABOBANK INTERNACIONAL DO BRASIL </option>
                    <option value="748">748 - SICREDI </option>
                    <option value="751">751 - SCOTIABANK BRASIL </option>
                    <option value="752">752 - BNP PARIBAS BRASIL </option>
                    <option value="753">753 - NOVO BANCO CONTINENTAL BM </option>
                    <option value="754">754 - BANCO SISTEMA </option>
                    <option value="755">755 - BOFA MERRILL LYNCH BM </option>
                    <option value="756">756 - BANCOOB (BANCO COOPERATIVO DO BRASIL) </option>
                    <option value="757">757 - BANCO KEB HANA DO BRASIL </option>
                    <option value="908">908 - PARATI – CREDITO FINANCIAMENTO E INVESTIMENTO </option>
                    <option value="954">954 - BANCO CBSS </option>
                    <option value="955">955 - BANCO BONSUCESSO CONSIGNADO </option>
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
    $("#inputDataNascimento").mask("00/00/0000");
    $(".inputDataNascimento").mask("00/00/0000");
    $("#inputCep").mask("99999-999");
  });
</script>

<script>
  // máscara para input da valor R$
  String.prototype.reverse = function() {
    return this.split('').reverse().join('');
  };

  function mascaraMoeda(campo, evento) {
    var tecla = (!evento) ? window.event.keyCode : evento.which;
    var valor = campo.value.replace(/[^\d]+/gi, '').reverse();
    var resultado = "";
    var mascara = "##.###.###,##".reverse();
    for (var x = 0, y = 0; x < mascara.length && y < valor.length;) {
      if (mascara.charAt(x) != '#') {
        resultado += mascara.charAt(x);
        x++;
      } else {
        resultado += valor.charAt(y);
        y++;
        x++;
      }
    }
    campo.value = resultado.reverse();
  }
</script>
<!-- final dos Scripts de máscara dos inputs -->


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

<!-- lógica para exclusão de registro -->
<?php
if (isset($_GET['func']) && $_GET['func'] == 'deleta') {
  $id = isset($_GET['id']) ? $_GET['id'] : null;

  if ($id !== null) {
    $query = "DELETE FROM propostas where idpropostas = '$id'";
    $result = mysqli_query($conexao, $query);

    if ($result) {
      echo "<script language='javascript'> window.alert('Excluído com Sucesso!'); </script>";
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



              <div class="form-group">
                <label for="id_produto">Status</label>
                <select name="statusproposta" class="custom-select" id="statusproposta">
                  <option selected><?php echo $res_1['statusproposta']; ?></option>
                  <option value="1">PENDENTE</option>
                  <option value="2">AVERBADA</option>
                  <option value="3">INTEGRADO</option>
                  <option value="4">AGUARDANDO AVERBAÇÃO</option>
                  <option value="5">CANCELADO</option>
                  <option value="6">PAGA</option>
                  <option value="7">DIGITADO</option>
                  <option value="8">SALDO RETORNADO</option>
                  <option value="9">EM DIGITAÇÃO</option>
                  <option value="10">FORMALIZAÇÃO CONCLUÍDA</option>
                </select>
                <small class="text-muted">Selecione o novo status da proposta</small>
              </div>


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



      if ($_POST["statusproposta"] == "1") {
        $statusproposta = "PENDENTE";
      }
      if ($_POST["statusproposta"] == "2") {
        $statusproposta = "AVERBADA";
      }
      if ($_POST["statusproposta"] == "3") {
        $statusproposta = "INTEGRADO";
      }
      if ($_POST["statusproposta"] == "4") {
        $statusproposta = "AGUARDANDO AVERBAÇÃO";
      }
      if ($_POST["statusproposta"] == "5") {
        $statusproposta = "CANCELADO";
      }
      if ($_POST["statusproposta"] == "6") {
        $statusproposta = "PAGO";
      }
      if ($_POST["statusproposta"] == "7") {
        $statusproposta = "DIGITADO";
      }
      if ($_POST["statusproposta"] == "8") {
        $statusproposta = "SALDO RETORNADO";
      }
      if ($_POST["statusproposta"] == "9") {
        $statusproposta = "EM DIGITAÇÃO";
      }
      if ($_POST["statusproposta"] == "10") {
        $statusproposta = "CONCLUÍDA";
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


<script>
   function consultaEndereco() {
    // Obter o valor do CEP digitado
    let cep = document.querySelector('#cep').value;

    if (cep.length !== 8){
      alert('Cep inválido!');
    }

    let url = 'https://viacep.com.br/ws/' + cep + '/json/';

    fetch(url)
      .then(function(response){
        if (!response.ok) {
          throw new Error('Erro na requisição');
        }
        return response.json();
      })
      .then(function(data){
        console.log(data);
        mostrarEndereco(data); // Chama a função para preencher os inputs
      })
      .catch(function(error) {
        console.error('Erro:', error);
      });
   }

   function mostrarEndereco(dados){
      document.getElementById('inputRua').value = dados.logradouro || '';
      document.getElementById('inputNumero').value = ''; // Defina a lógica para o número
      document.getElementById('inputComplemento').value = dados.complemento || '';
      document.getElementById('inputBairro').value = dados.bairro || '';
      document.getElementById('inputCidade').value = dados.localidade || '';
      document.getElementById('inputUf').value = dados.uf || '';
   }
</script>

