

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal CPF</title>



<!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">      
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <script src="//code.jivosite.com/widget/fgSW8k1Bo7" async></script>

    <!--     Toast alerts javascript     -->
  <script src="https://jsuites.net/v4/jsuites.js"></script>
  <link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    

</head>
<body>


<!-- Modal solicitando o CPF ao clicar em adicionar proposta -->
<div class="modal fade" id="modal_cpf" tabindex="-1" role="dialog" aria-labelledby="modal_cpf" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CADASTRAR PROPOSTA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="propostas.php">
          <div class="form-group col-md-12">
            <label for="inputCpf">CPF</label>
            <input name="inputCpf" type="text" class="form-control inputCpf" id="inputCpf" placeholder="">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="button_prosseguir" id="button_prosseguir" class="btn btn-primary">Prosseguir</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- SOLICITANDO CPF AO CLICAR EM ADICIONAR PROPOSTA -->

<!--EDITAR -->
<?php
if (isset($_POST['button_prosseguir'])) {
  $cpf = $_POST['inputCpf'];
  $query = "select * from propostas where cpf = '$cpf'";
  $result = mysqli_query($conexao, $query);




  while ($res_1 = mysqli_fetch_array($result)) {


?>






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
              <ul class="nav nav-tabs container mt-4" id="myTab" role="tablist">
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
              <div class="tab-content mt-2" id="myTabContent">
                <div class="tab-pane fade show active" id="cliente" role="tabpanel" aria-labelledby="cliente-tab">
                  <!-- CONTEÚDO TAB CLIENTE-->
                  <form method="POST" action="propostas.php" enctype="multipart/form-data">
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputNome">NOME*</label>
                        <input name="inputNome" type="text" class="form-control" id="inputNome" placeholder="" required value="<?php echo $res_1['nome']; ?>">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputCpf">CPF</label>
                        <input name="inputCpf" type="text" class="form-control inputCpf" id="inputCpf" placeholder="" value="<?php echo $res_1['cpf']; ?>" disabled>
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
                        <label for="inputDataEmissao">DATA EMISSÃO</label>
                        <input name="inputDataEmissao" type="text" class="form-control" id="inputDataEmissao" placeholder="" value="<?php echo $res_1['dataemissao']; ?>">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputOrgaoEmissor">ORGÃO EMISSOR</label>
                        <input name="inputOrgaoEmissor" type="text" class="form-control" id="inputOrgaoEmissor" placeholder="" value="<?php echo $res_1['orgaoemissor']; ?>">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputNaturalidade">NATURALIDADE</label>
                        <input name="inputNaturalidade" type="text" class="form-control" id="inputNaturalidade" value="<?php echo $res_1['naturalidade']; ?>">
                      </div>
                      <!-- INÍCIO DO CONTEÚDO CONTATO-->
                      <div class="form-group col-md-4">
                        <label for="inputTelefone">TELEFONE</label>
                        <input name="inputTelefone" type="text" class="form-control inputTelefone" id="inputTelefone" placeholder="" value="<?php echo $res_1['telefone']; ?>">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputEmail">EMAIL</label>
                        <input name="inputEmail" type="email" class="form-control" id="inputEmail" placeholder="" value="<?php echo $res_1['email']; ?>">
                      </div>
                      <!-- FINAL DO CONTEÚDO CONTATO-->
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
                        <div class="input-group">
                        <input name="inputCep" type="text" class="form-control" id="inputCep" placeholder="" value="<?php echo $res_1['cep']; ?>">
                          <div class="input-group-append">
                            <button class="btn btn-outline-dark" type="button" onclick="consultaEndereco()">
                              <i class="fa fa-search"></i>
                            </button>
                          </div>
                        </div>
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
                      <div class="form-group col-md-3">
                        <label for="inputBairro">BAIRRO</label>
                        <input name="inputBairro" type="text" class="form-control" id="inputBairro" value="<?php echo $res_1['bairro']; ?>">
                      </div>
                      <div class="form-group col-md-3">
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
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">R$</span>
                        </div>
                        <input name="inputValor" id="inputValor" type="Text" class="form-control" size="12" onKeyUp="mascaraMoeda(this, event)" value="">
                      </div>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="inputValorParcelas">VALOR PARCELAS</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">R$</span>
                        </div>
                        <input name="inputValorParcelas" id="inputValorParcelas" type="Text" class="form-control" size="12" onKeyUp="mascaraMoeda(this, event)" value="">
                      </div>
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


              <button id="salvarBotao" type="submit" class="btn btn-primary mb-3 btn-lg" name="button">Salvar </button>


              <button type="button" class="btn btn-secondary mb-3 btn-lg" data-dismiss="modal">Cancelar </button>


              </form>
            </div>
          </div>
        </div>
      </div>



    <script>
      $("#modalExemplo").modal("show");
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
      if ($result == '') {
        echo "<script>
        jSuites.notification({
          error: 1,
          name: 'Erro.',
          message: 'Ocorreu um erro ao editar!',
      });
              </script>";
      } else {
        echo "<script>
                jSuites.notification({ 
                  name: 'Sucesso!', 
                  message: 'Editado com sucesso!',
                  timeout: 3000, // Ajuste o tempo em milissegundos conforme necessário
                });
      
                // Aguardar 3 segundos antes de redirecionar
                setTimeout(function() {
                    window.location.href = 'propostas.php';
                }, 3000);
              </script>";
      }
    }
    ?>


<?php }
}  ?>





    
    <?php echo "$cpf" ?>
    
    
</body>
</html>




