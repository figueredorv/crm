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
              <button name="buttonpropostamaisantiga" class="btn btn-warning  mb-3" type="submit"><i class="fa fa-search">MAIS ANTIGA</i></button>
            </form>
            <form class="form-inline my-2 my-lg-0" style="margin-left:20px;">
              <button name="buttonpropostamaisnova" class="btn btn-success mb-3" type="submit"><i class="fa fa-search">MAIS NOVA</i></button>
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
                    // novo codigo ( procurar por animais não adotados)
                    else if (isset($_GET['buttonpetsemvacina'])) {
                      $nome = '';
                      $query = "select * from animais where vacinas = '$nome'   order by data asc";
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
                            $statusproposta = $res_1["statusproposta"];
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
                              if ($statusproposta == "Pendente") : ?>
                                <td class="badge badge-pill badge-warning"><?php echo $statusproposta; ?></td>
                              <?php
                              endif;

                              ?>
                              <?php
                              if ($statusproposta == "Finalizada") : ?>
                                <td class="badge badge-pill badge-success"><?php echo $statusproposta; ?></td>
                              <?php
                              endif;

                              ?>
                              <?php
                              if ($statusproposta == "Cancelada") : ?>
                                <td class="badge badge-pill badge-danger"><?php echo $statusproposta; ?></td>
                              <?php
                              endif;
                              ?>



                              <td>

                                <div class="btn-group" role="group" aria-label="Exemplo básico">
                                  <a class="btn btn-info btn-sm" href="propostas.php?func=edita&id=<?php echo $id; ?>"><i class="fa fa-pencil-square-o"> Editar</i></a>

                                  <a class="btn btn-danger btn-sm" href="propostas.php?func=deleta&id=<?php echo $id; ?>"><i class="fa fa-minus-square"> Deletar</i></a>





                                  <?php
                                  if ($statusproposta == "Pendente") : ?>
                                    <a class="btn btn-warning btn-sm disabled" href="animais.php?func=adotar&id=<?php echo $id; ?>"><i class="fa fa-check-square-o"> Adotar</i></a>
                                  <?php

                                  endif;

                                  ?>


                                  <?php
                                  if ($statusproposta == "Finalizado") : ?>
                                    <a class="btn btn-warning btn-sm" href="animais.php?func=adotar&id=<?php echo $id; ?>"><i class="fa fa-check-square-o"> Adotar</i></a>
                                  <?php

                                  endif;
                                  ?>



                                  <?php
                                  if ($statusproposta == "Cancelado") : ?>
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
                      <form method="POST" action="">
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="inputNome">NOME</label>
                            <input name="inputNome" type="text" class="form-control" id="inputNome" placeholder="" required>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputCpf">CPF</label>
                            <input name="inputCpf" type="text" class="form-control" id="inputCpf" placeholder="">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputRg">RG</label>
                            <input name="inputRg" type="text" class="form-control" id="inputRg" placeholder="">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputDataNascimento">DATA DE NASCIMENTO</label>
                            <input name="inputDataNascimento" type="text" class="form-control" id="inputDataNascimento" placeholder="">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputNomeMae">NOME DA MÃE</label>
                            <input name="inputNomeMae" type="text" class="form-control" id="inputNomeMae" placeholder="">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputNomePai">NOME DO PAI</label>
                            <input name="inputNomePai" type="text" class="form-control" id="inputNomePai" placeholder="">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputCep">CEP</label>
                            <input name="inputCep" type="text" class="form-control" id="inputCep" placeholder="">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputRua">RUA</label>
                            <input name="inputRua" type="text" class="form-control" id="inputRua" placeholder="">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputNumero">NÚMERO</label>
                            <input name="inputNumero" type="text" class="form-control" id="inputNumero" placeholder="">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputComplemento">COMPLEMENTO</label>
                            <input name="inputComplemento" type="text" class="form-control" id="inputComplemento" placeholder="">
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="inputBairro">BAIRRO</label>
                            <input name="inputBairro" type="text" class="form-control" id="inputBairro">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputCidade">CIDADE</label>
                            <input name="inputCidade" type="text" class="form-control" id="inputCidade">
                          </div>
                          <div class="form-group col-md-6">
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
                    <div class="tab-pane fade" id="contato" role="tabpanel" aria-labelledby="contato-tab">
                      <!-- INÍCIO DO CONTEÚDO TAB CONTATO-->
                      <div class="form-group col-md-6">
                        <label for="inputTelefone">TELEFONE</label>
                        <input name="inputTelefone" type="text" class="form-control" id="inputTelefone" placeholder="">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputEmail">EMAIL</label>
                        <input name="inputEmail" type="email" class="form-control" id="inputEmail" placeholder="">
                      </div>
                      <!-- FINAL DO CONTEÚDO TAB CONTATO-->
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
                          <input name="inputTipoConta" type="text" class="form-control" id="inputTipoConta" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputAgencia">AGENCIA</label>
                          <input name="inputAgencia" type="text" class="form-control" id="inputAgencia" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputAgenciaDv">AGENCIA DV</label>
                          <input name="inputAgenciaDv" type="text" class="form-control" id="inputAgenciaDv" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputConta">CONTA</label>
                          <input name="inputConta" type="text" class="form-control" id="inputConta" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputDigito">DIGITO</label>
                          <input name="inputDigito" type="text" class="form-control" id="inputDigito" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputRenda">RENDA</label>
                          <input name="inputRenda" type="text" class="form-control" id="inputRenda" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputComplemento">COMPLEMENTO</label>
                          <input name="inputComplemento" type="text" class="form-control" id="inputComplemento" placeholder="">
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
                          <select name="inputBanco" id="inputBanco" class="form-control bancos required cadVenda select2-hidden-accessible" aria-hidden="true" tabindex="-1">
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
                          <input name="inputDocumento" type="file" class="form-control-file" id="inputDocumento">
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
  $usuario = $_SESSION['nome_usuario'];
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
  $covenio = $_POST['inputConvenio'];
  $banco = $_POST['inputBanco'];
  $tipodeconta = $_POST['inputTipoConta'];
  $agencia = $_POST['inputAgencia'];
  $agenciadigito = $_POST['inputAgenciaDv'];
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
  $documentoanexado   = $_POST['inputDocumento'];
  $observacao   = $_POST['inputObservacao'];
  $statusproposta = 'Pendente';
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


  //Marcando o tipo de convênio com base no valor do input 
  if ($_POST["inputConvenio"] == "1") {
    $covenio = "INSS";
  }
  if ($_POST["inputConvenio"] == "2") {
    $covenio = "FGTS";
  }
  if ($_POST["inputConvenio"] == "3") {
    $covenio = "AUXÍLIO BRASIL";
  }
  if ($_POST["inputConvenio"] == "4") {
    $covenio = "GOVERNO DE SÃO PAULO";
  }
  if ($_POST["inputConvenio"] == "5") {
    $covenio = "PREFEITURA DE SÃO PAULO";
  }
  if ($_POST["inputConvenio"] == "6") {
    $covenio = "GOVERNO DO RIO DE JANEIRO";
  }
  if ($_POST["inputConvenio"] == "7") {
    $covenio = "SIAPE";
  }
  if ($_POST["inputConvenio"] == "8") {
    $covenio = "GOVERNO DA BAHIA";
  }
  if ($_POST["inputConvenio"] == "9") {
    $covenio = "PESSOAL";
  }


  //Marcando o tipo de promotora com base no valor do input 
  if ($_POST["inputPromotora"] == "1") {
    $promotora = "CREDIBRASIL LOJAS";
  }
  if ($_POST["inputPromotora"] == "2") {
    $promotora = "CREDIBRASIL CONSIGNADO";
  }






  //VERIFICAR SE O NOME JÁ ESTÁ CADASTRADO
  $query_verificar = "select * from propostas where nome = '$nome' ";

  $result_verificar = mysqli_query($conexao, $query_verificar);
  $row_verificar = mysqli_num_rows($result_verificar);

  if ($row_verificar > 0) {
    echo "<script language='javascript'> window.alert('Proposta para esse cliente já Cadastrada!'); </script>";
    exit();
  }



  $query = "INSERT into propostas (idusuario, nome,cpf, rg, nascimento, nomedamae, nomedopai, cep, rua, numero, complemento, bairro, cidade, uf, telefone, email, covenio, banco, tipodeconta, agencia, agenciadigito, renda, operacao, tabela, promotora, margem, prazo, valor, valorparcelas, formalizacao, canal, documentoanexado, observacao, statusproposta, data) VALUES ('$usuario','$nome','$cpf', '$rg', '$nascimento','$nomedamae', '$nomedopai', '$cep', '$rua', '$numero','$complemento','$bairro','$cidade','$uf','$telefone','$email','$covenio','$banco','$tipodeconta','$agencia','$agenciadigito','$renda','$operacao','$tabela','$promotora','$margem','$prazo','$valor','$valorparcelas','$formalizacao','$canal','$documentoanexado','$observacao','$statusproposta',curDate())";
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

  echo "<script language='javascript'> window.location='propostas.php'; </script>";
}
?>



<!--EDITAR -->
<?php
if (@$_GET['func'] == 'edita') {
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

                  <h4 class="modal-title">EDITAR PROPOSTA</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                  <!-- INÍCIO DO CÓDIGO DAS TABS DE EDIÇÃO DE PROPOSTA-->
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
                      <form method="POST" action="">
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="inputNome">NOME</label>
                            <input name="inputNome" type="text" class="form-control" id="inputNome" placeholder="" required value="<?php echo $res_1['nome']; ?>">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputCpf">CPF</label>
                            <input name="inputCpf" type="text" class="form-control" id="inputCpf" placeholder="" value="<?php echo $res_1['cpf']; ?>">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputRg">RG</label>
                            <input name="inputRg" type="text" class="form-control" id="inputRg" placeholder="" value="<?php echo $res_1['rg']; ?>">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputDataNascimento">DATA DE NASCIMENTO</label>
                            <input name="inputDataNascimento" type="text" class="form-control" id="inputDataNascimento" placeholder="">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputNomeMae">NOME DA MÃE</label>
                            <input name="inputNomeMae" type="text" class="form-control" id="inputNomeMae" placeholder="">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputNomePai">NOME DO PAI</label>
                            <input name="inputNomePai" type="text" class="form-control" id="inputNomePai" placeholder="">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputCep">CEP</label>
                            <input name="inputCep" type="text" class="form-control" id="inputCep" placeholder="">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputRua">RUA</label>
                            <input name="inputRua" type="text" class="form-control" id="inputRua" placeholder="">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputNumero">NÚMERO</label>
                            <input name="inputNumero" type="text" class="form-control" id="inputNumero" placeholder="">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputComplemento">COMPLEMENTO</label>
                            <input name="inputComplemento" type="text" class="form-control" id="inputComplemento" placeholder="">
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="inputBairro">BAIRRO</label>
                            <input name="inputBairro" type="text" class="form-control" id="inputBairro">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputCidade">CIDADE</label>
                            <input name="inputCidade" type="text" class="form-control" id="inputCidade">
                          </div>
                          <div class="form-group col-md-6">
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
                    <div class="tab-pane fade" id="contato" role="tabpanel" aria-labelledby="contato-tab">
                      <!-- INÍCIO DO CONTEÚDO TAB CONTATO-->
                      <div class="form-group col-md-6">
                        <label for="inputTelefone">TELEFONE</label>
                        <input name="inputTelefone" type="text" class="form-control" id="inputTelefone" placeholder="">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputEmail">EMAIL</label>
                        <input name="inputEmail" type="email" class="form-control" id="inputEmail" placeholder="">
                      </div>
                      <!-- FINAL DO CONTEÚDO TAB CONTATO-->
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
                          <input name="inputTipoConta" type="text" class="form-control" id="inputTipoConta" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputAgencia">AGENCIA</label>
                          <input name="inputAgencia" type="text" class="form-control" id="inputAgencia" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputAgenciaDv">AGENCIA DV</label>
                          <input name="inputAgenciaDv" type="text" class="form-control" id="inputAgenciaDv" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputConta">CONTA</label>
                          <input name="inputConta" type="text" class="form-control" id="inputConta" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputDigito">DIGITO</label>
                          <input name="inputDigito" type="text" class="form-control" id="inputDigito" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputRenda">RENDA</label>
                          <input name="inputRenda" type="text" class="form-control" id="inputRenda" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputComplemento">COMPLEMENTO</label>
                          <input name="inputComplemento" type="text" class="form-control" id="inputComplemento" placeholder="">
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
                          <select name="inputBanco" id="inputBanco" class="form-control bancos required cadVenda select2-hidden-accessible" aria-hidden="true" tabindex="-1">
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
                          <input name="inputDocumento" type="file" class="form-control-file" id="inputDocumento">
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
      $covenio = $_POST['inputConvenio'];
      $banco = $_POST['inputBanco'];
      $tipodeconta = $_POST['inputTipoConta'];
      $agencia = $_POST['inputAgencia'];
      $agenciadigito = $_POST['inputAgenciaDv'];
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
      $documentoanexado   = $_POST['inputDocumento'];
      $observacao   = $_POST['inputObservacao'];
      $statusproposta = 'Pendente';
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


      //Marcando o tipo de convênio com base no valor do input 
      if ($_POST["inputConvenio"] == "1") {
        $covenio = "INSS";
      }
      if ($_POST["inputConvenio"] == "2") {
        $covenio = "FGTS";
      }
      if ($_POST["inputConvenio"] == "3") {
        $covenio = "AUXÍLIO BRASIL";
      }
      if ($_POST["inputConvenio"] == "4") {
        $covenio = "GOVERNO DE SÃO PAULO";
      }
      if ($_POST["inputConvenio"] == "5") {
        $covenio = "PREFEITURA DE SÃO PAULO";
      }
      if ($_POST["inputConvenio"] == "6") {
        $covenio = "GOVERNO DO RIO DE JANEIRO";
      }
      if ($_POST["inputConvenio"] == "7") {
        $covenio = "SIAPE";
      }
      if ($_POST["inputConvenio"] == "8") {
        $covenio = "GOVERNO DA BAHIA";
      }
      if ($_POST["inputConvenio"] == "9") {
        $covenio = "PESSOAL";
      }


      //Marcando o tipo de promotora com base no valor do input 
      if ($_POST["inputPromotora"] == "1") {
        $promotora = "CREDIBRASIL LOJAS";
      }
      if ($_POST["inputPromotora"] == "2") {
        $promotora = "CREDIBRASIL CONSIGNADO";
      }











      $query_editar = "UPDATE propostas set nome = '$nome', cpf = '$cpf', rg = '$rg', nascimento = '$nascimento',nomedamae = '$nomedamae', nomedopai = '$nomedopai', cep = '$cep', rua = '$rua', numero = '$numero', complemento = '$complemento', bairro = '$bairro', cidade = '$cidade', uf = '$uf', telefone = '$telefone', email = '$email', covenio = '$covenio', banco = '$banco', tipodeconta = '$tipodeconta', agencia = '$agencia', agenciadigito = '$agenciadigito', $renda = '$renda', operacao = '$operacao', tabela = '$tabela', promotora = '$promotora', margem = '$margem', prazo = '$prazo', valor = '$valor', valorparcelas = '$valorparcelas', formalizacao = '$formalizacao', canal = '$canal', documentoanexado = '$documentoanexado', observacao = '$observacao', statusproposta = '$statusproposta' where idpropostas = '$id' ";

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

<script>
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