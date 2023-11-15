<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificações</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="notificacoes.php">
</head>
<body>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h4>Notificações</h4>
            <ul class="timeline">
                <?php
                // Conectar ao banco de dados
                include('conexao.php');

                // Consultar as notificações no banco de dados
                $query = "SELECT * FROM notificacoes";
                $result = mysqli_query($conexao, $query);

                // Exibir as notificações dinamicamente
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<li>';
                    
                    if (!empty($row['link'])) {
                        echo '<a href="' . $row['link'] . '" target="_blank">' . $row['titulo'] . '</a>';
                        echo '<a href="' . $row['link'] . '" class="float-right">' . $row['data_publicacao'] . '</a>';
                    } else {
                        echo '<span>' . $row['titulo'] . '</span>';
                        echo '<span class="float-right">' . $row['data_publicacao'] . '</span>';
                    }
                    
                    echo '<p>' . $row['descricao'] . '</p>';
                    echo '</li>';
                }

                // Fechar a conexão com o banco de dados
                mysqli_close($conexao);
                ?>
            </ul>
        </div>
    </div>
</div>

<div class="text-muted mt-5 mb-5 text-center small">by: <a class="text-muted" target="_blank" href="http://totoprayogo.com">totoprayogo.com</a></div>

</body>
</html>
