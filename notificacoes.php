<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Notificações</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script src="//code.jivosite.com/widget/fgSW8k1Bo7" async></script>
    <link rel="stylesheet" href="css/notificacoes.css"> <!-- Certifique-se de ajustar o caminho conforme necessário -->
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

        <div style="margin-top: 10px;">
        <form method="post" action="">
            <button type="submit" name="marcarLidas" class="btn btn-info" onclick="demo.showNotification('top','right')">Marcar como lidas</button>
        </form>
        </div>

        
        


        <ul class="timeline">
            <?php
            // Conectar ao banco de dados
            include('conexao.php');

            $idUsuario = $_SESSION['idusuarios'];

            // Verifica se o botão foi pressionado
            if (isset($_POST['marcarLidas'])) {
                // Obter as notificações não lidas para este usuário
                $query = "SELECT id FROM notificacoes WHERE lida = '0'";
                $resultNotificacoes = mysqli_query($conexao, $query);

                // Inserir informações na tabela visualizacoes_notificacoes
                while ($rowNotificacao = mysqli_fetch_assoc($resultNotificacoes)) {
                    $idNotificacao = $rowNotificacao['id'];

                    $insertQuery = "INSERT INTO visualizacoes_notificacoes (id_usuario, id_notificacao) 
                        VALUES ($idUsuario, $idNotificacao)";
                    mysqli_query($conexao, $insertQuery);
                }
                echo "<script language='javascript'> window.alert('Notificações marcada como visualizadas!'); </script>";
            }
            

            // Obter todas as notificações no banco de dados
            $query = "SELECT * FROM notificacoes ORDER BY id desc";
            $result = mysqli_query($conexao, $query);


            // Exibir as notificações dinamicamente
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<li>';
                echo '<div class="timeline-badge"><i class="glyphicon glyphicon-check ' . ($row['icon'] ? $row['icon'] : 'fa fa-bell-o') . '"></i></div>';
                echo '<div class="timeline-panel">';
                echo '<div class="timeline-heading">';

                if (!empty($row['link'])) {
                    echo '<h4 class="timeline-title"><a href="' . $row['link'] . '" target="_blank">' . $row['titulo'] . '</a></h4>';
                    echo '<p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> ' . date('d/m/Y', strtotime($row['data_publicacao'])) . '</small></p>';
                } else {
                    echo '<h4 class="timeline-title">' . $row['titulo'] . '</h4>';
                    echo '<p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> ' . date('d/m/Y', strtotime($row['data_publicacao'])) . '</small></p>';
                }

                echo '</div>';
                echo '<div class="timeline-body">';
                echo '<p>' . $row['descricao'] . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</li>';
            }

            // Fechar a conexão com o banco de dados
            mysqli_close($conexao);
            ?>
        </ul>
    </div>

</body>

</html>