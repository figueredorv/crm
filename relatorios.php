<?php
include('conexao.php');

$msg = false;

if(isset($_FILES['arquivo'])){
  $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
  $novonome = md5(time()) . $extensao;

  $diretorio = "upload/";

move_uploaded_file($_FILES['arquivo']['temp_name'], $diretorio.$novonome);

$sql_code = "INSERT INTO RELATORIOS (id, nome, endereco, arquivo) VALUES (null, 'endereco','$novonome')";


}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Usuários</title>


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
  <a class="navbar-brand" href="painel_admin.php"><big><big><i class="fa fa-arrow-left"></i></big></big></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav mr-auto">
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input name="txtpesquisar" class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
      <button name="buttonPesquisar" class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</nav>



<?php 

if ($msg != false)
 echo "<p> $msg</p>"; ?>

<h4 class="modal-title">Usuários</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form method="POST" action="relatorios.php" enctype="multpart/form-data">
              <div class="form-group">
                <label for="id_produto">Número do relatório</label>
                <input type="text" class="form-control mr-2" name="numrelatorio" placeholder="Nº do documento" required>
              </div>
              <div class="form-group">
                <label for="id_produto">Endereço</label>
                <input type="text" class="form-control mr-2" name="endereco" placeholder="Endereço" required>
              </div>
               <div class="form-group">
                <label for="fornecedor">Documento em PDF</label>
                 <input type="file" class="form-control mr-2" name="arquivo"  required>

                 <input type = "submit" value ="Salvar">
              </div>


</body>
</html>




