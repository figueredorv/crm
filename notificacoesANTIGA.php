<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Notificações</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Observações</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/observacoes.css"> <!-- Certifique-se de ajustar o caminho conforme necessário -->
    <script src="//code.jivosite.com/widget/fgSW8k1Bo7" async></script>
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