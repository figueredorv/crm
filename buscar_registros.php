<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['nome'])) {
    $nomePesquisado = $_GET['nome'];
    $query = "SELECT nome FROM propostas WHERE nome LIKE '%$nomePesquisado%'";
    $result = mysqli_query($conexao, $query);

    $registros = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $registros[] = $row;
    }

    echo json_encode($registros);
}
?>
