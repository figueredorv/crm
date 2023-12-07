<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Observações</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script src="//code.jivosite.com/widget/fgSW8k1Bo7" async></script>
    <link rel="stylesheet" href="css/observacoes.css"> <!-- Certifique-se de ajustar o caminho conforme necessário -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="painel_funcionario.php"><big><big><i class="fa fa-arrow-left"></i></big></big></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

    <div class="container">







        <div class="row">
            <h2 style="margin-bottom: 30px; margin-top: 20px;">Observações das propostas</h2>

        </div>
        <div class="qa-message-list" id="wallmessages">
            <?php
            // Inclui o arquivo de conexão
            include 'conexao.php';

            // Consulta para obter informações da proposta
            $queryProposta = "SELECT * FROM propostas";
            $resultProposta = mysqli_query($conexao, $queryProposta);

            if ($resultProposta) {
                while ($rowProposta = mysqli_fetch_assoc($resultProposta)) {
                    // Restante do seu código para exibir as informações da proposta

                    // Consulta para obter observações da proposta
                    $idpropostas = $rowProposta['idpropostas'];
                    $queryObservacoes = "SELECT * FROM observacoes order by id desc";
                    $resultObservacoes = mysqli_query($conexao, $queryObservacoes);

                    if ($resultObservacoes) {
                        // Restante do seu código para exibir as observações
                    } else {
                        echo 'Erro na consulta de observações: ' . mysqli_error($conexao);
                    }

                    // Restante do seu código para exibir as informações da proposta
                }
            } else {
                echo 'Erro na consulta de propostas: ' . mysqli_error($conexao);
            }

            // Exibe as observações
            while ($rowObservacao = mysqli_fetch_assoc($resultObservacoes)) {
                echo '<div class="message-item">';
                echo '<div class="message-inner">';
                echo '<div class="message-head clearfix">';
                echo '<div class="avatar pull-left"><img src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png"></div>';
                echo '<div class="user-detail">';
                echo '<h5 class="handle">' . $rowObservacao['usuario'] . '</h5>';
                echo '<div class="post-meta">';
                echo '<div class="asker-meta">';
                echo '<span class="qa-message-what"></span>';
                echo '<span class="qa-message-when">';
                echo '<span class="qa-message-when-data">' . date('d/m/Y', strtotime($rowObservacao['data'])) . '</span>';
                echo '</span>';
                echo '<span class="qa-message-who">';
                echo '<span class="qa-message-who-pad"> Proposta </span>';
                //inicio <a href></a>
                echo '<a href="propostas.php?txtpesquisarcpf=&txtpesquisardata=&txtpesquisar=' . $rowObservacao['idpropostas'] . '&buttonPesquisar=&txtpesquisaroperador=" target="_blank">';
                echo '<span class="qa-message-who-data">' . $rowObservacao['idpropostas'] . '</span>';
                echo '</a>';
                 //final  <a href></a>
                echo '</span>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '<div class="qa-message-content">';
                echo $rowObservacao['observacao'];
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }

            // Fecha a conexão com o banco de dados
            mysqli_close($conexao);
            ?>
        </div>
    </div>
    </div>

</body>

</html>