

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
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="submit" name="button_prosseguir" id="button_prosseguir" class="btn btn-primary">Avançar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- SOLICITANDO CPF AO CLICAR EM ADICIONAR PROPOSTA -->

<!--EDITAR -->
<?php
if (isset($_POST['button_prosseguir']) &&  $_POST['inputCpf'] != "" ) {
  $cpf = $_POST['inputCpf'];
  $query = "select * from propostas where cpf = '$cpf'";
  $result = mysqli_query($conexao, $query);

  if (isset($_POST['button_prosseguir']) != "") {
    $cpf = $_POST['inputCpf'];
    $query_verifica_cpf = "SELECT * FROM propostas WHERE cpf = '$cpf'";
    $result_verifica_cpf = mysqli_query($conexao, $query_verifica_cpf);

    if (mysqli_num_rows($result_verifica_cpf) > 0) {
        // Se houver resultados (CPF cadastrado), execute o restante do código
        while ($res_1 = mysqli_fetch_array($result_verifica_cpf)) {
            // restante do código
            //echo "CPF cadastrado.";
        }
    } else {
        // Se não houver resultados (CPF não cadastrado), exiba uma mensagem ou faça o que desejar
        //echo "CPF não cadastrado. Insira um CPF válido.";

        // Abra o modal usando jQuery após o carregamento completo da página
        echo '<script>';
        echo '$(document).ready(function() {';
        echo '  $("#modalExemplo").modal("show");';
        echo '});';
        echo '</script>';
    }
}


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
                        <input name="inputCpf" type="text" class="form-control inputCpf" id="inputCpf" placeholder="" value="<?php echo $res_1['cpf']; ?>" readonly>
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
                      <option selected><?php echo $res_1['tipodeconta']; ?></option>
                        <option value="1">CONTA CORRENTE</option>
                        <option value="2">CONTA SALÁRIO</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputAgencia">AGENCIA</label>
                      <input name="inputAgencia" type="text" class="form-control" id="inputAgencia" placeholder="" value="<?php echo $res_1['agencia']; ?>">
                      <small class="text-muted">Com o dígito verificador se existir</small>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputConta">CONTA</label>
                      <input name="inputConta" type="text" class="form-control" id="inputConta" placeholder="" value="<?php echo $res_1['conta']; ?>">
                      <small class="text-muted">Com o dígito verificador</small>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputRenda">RENDA</label>
                      <input name="inputRenda" type="text" class="form-control" id="inputRenda" placeholder="" value="<?php echo $res_1['renda']; ?>" size="12" onKeyUp="mascaraMoeda(this, event)">
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






    <!--Comando paraCADASTRAR os dados -->
    <?php
    if (isset($_POST['buttonEditar'])) {
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
  $statusproposta = 'AGUARD DIGITAÇÃO';
  $data = date('d/m/Y H:i');






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
    $formalizacao = "FÍSICO";
  } elseif ($_POST['inputFormalizacao'] == 2) {
    $formalizacao = "DIGITAL";
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


  $query = "INSERT into propostas (idusuario, nome,cpf, rg, numerobeneficio, dataemissao, orgaoemissor, nascimento, nomedamae, nomedopai, cep, rua, numero, complemento, bairro, cidade, naturalidade, uf, telefone, email, convenio, banco, bancoproposta, tipodeconta, agencia, conta, renda, operacao, tabela, promotora, margem, prazo, valor, valorparcelas, formalizacao, canal, statusproposta, data) VALUES ('$usuario','$nome','$cpf', '$rg','$numerobeneficio','$dataemissao','$orgaoemissor', '$nascimento','$nomedamae', '$nomedopai', '$cep', '$rua', '$numero','$complemento','$bairro','$cidade','$naturalidade','$uf','$telefone','$email','$convenio','$banco','$bancoproposta','$tipodeconta','$agencia','$conta','$renda','$operacao','$tabela','$promotora','$margem','$prazo','$valor','$valorparcelas','$formalizacao','$canal','$statusproposta',curDate())";
  $result = mysqli_query($conexao, $query);

  $idproposta = mysqli_insert_id($conexao); // Obtém o último ID inserido da proposta acima para usar no cadastro de documentos abaixo e recuperar o documento apenas referente a proposta.

  //marcador para editar observacoes
  if ($_POST['inputObservacao'] != "") {
    $nomeusuario = $_SESSION['nome_usuario'];
    $observacao = $_POST['inputObservacao'];
    $idproposta = mysqli_insert_id($conexao);



    $query = "INSERT into observacoes (usuario, observacao, idpropostas, data) VALUES ('$nomeusuario','$observacao',' $idproposta',curDate())";
    $result = mysqli_query($conexao, $query);
  }


  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $imagens = $_FILES['imagens'];

    foreach ($imagens['name'] as $key => $nomedocumento) {
      if ($imagens['error'][$key] === 0) {
        $extensao = pathinfo($nomedocumento, PATHINFO_EXTENSION);
        $novo_nome = md5(uniqid()) . '.' . $extensao;

        if (move_uploaded_file($imagens['tmp_name'][$key], 'documentos/' . $novo_nome)) {
          // Insira o nome do arquivo no banco de dados, usando o $idproposta obtido anteriormente
          $query = "INSERT INTO documentos (nome, caminho, idproposta) VALUES ('$nome', '$novo_nome', '$idproposta')";
          mysqli_query($conexao, $query);
        }
      }
    }
  }

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
  echo "<script>
  jSuites.notification({
    error: 1,
    name: 'Erro.',
    message: 'Ocorreu um erro ao cadastrar!',
});
        </script>";
} else {
  echo "<script>
          jSuites.notification({ 
            name: 'Sucesso!', 
            message: 'Proposta cadastrada com sucesso!',
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
    
    

<?php  }
}  ?>





    
   
    
    
</body>
</html>




<script>
function consultaEndereco() {
  // Obter o valor do CEP digitado
  let cep = document.querySelector('#inputCep').value;

  if (cep.length !== 8) {
    alert('CEP inválido!');
    return;
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
      if (data.erro) {
        alert('CEP não encontrado!');
        return;
      }
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
  document.getElementById('inputCep').value = dados.cep || '';

}
</script>


<!-- Scripts de máscara dos inputs -->
<script type="text/javascript">
  $(document).ready(function() {
   
    $('.inputCpf').mask('000.000.000-00'); // aplicando a máscara em todos os inputs que tem a classe inputCpf.
    
  });
</script>