<?php
session_start();
include('conexao.php');



if (isset($_POST['btn'])) {
    $usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

    if (empty($usuario) || empty($senha)) {
        $_SESSION['erro_login'] = 'Usuário e senha são obrigatórios.';
        header('Location: index.php');
        exit();
    }

    $query = "SELECT * FROM usuarios WHERE BINARY usuario = '{$usuario}' AND BINARY senha = '{$senha}'";
    $result = mysqli_query($conexao, $query);

    if ($result) {
        $row = mysqli_num_rows($result);

        if ($row > 0) {
            $dado = mysqli_fetch_array($result);

            $_SESSION['usuario'] = $usuario;
            $_SESSION['nome_usuario'] = $dado["nome"];
            $_SESSION['cargo_usuario'] = $dado["cargo"];
            $_SESSION['idusuarios'] = $dado["idusuarios"];
            $_SESSION['senha'] = $dado["senha"];
            $_SESSION['imagem'] = $dado["imagem"];
            $_SESSION['sobremim'] = $dado["sobremim"];
            $_SESSION['ultima_autenticacao'] = $dado["ultima_autenticacao"];
           
          
            

            if ($_SESSION['cargo_usuario'] == 'Master' || $_SESSION['cargo_usuario'] == 'Adm') {
                header('Location: painel_funcionario.php');
                exit();
            }

            if ($_SESSION['cargo_usuario'] == 'Operador') {
                header('Location: painel_funcionario.php');
                exit();
            }
        } else {
            $_SESSION['erro_login'] = 'Credenciais inválidas.';
            header('Location: index.php');
            exit();
        }
    } else {
        $_SESSION['erro_login'] = 'Erro no banco de dados.';
        header('Location: index.php');
        exit();
    }
} else {
    $_SESSION['erro_login'] = 'Acesso não autorizado.';
    header('Location: index.php');
    exit();
}
?>




<?PHP

session_start();




$query = "SELECT u.usuario, COALESCE(COUNT(p.idusuario), 0) as propostas
FROM usuarios u
LEFT JOIN propostas p ON u.idusuarios = p.idusuario
GROUP BY u.usuario
ORDER BY propostas DESC;";


$result = mysqli_query($conexao, $query);
$dado = mysqli_fetch_array($result);
$row = mysqli_num_rows($result);

if($row > 0){
	
	$usuario = $res_1["usuario"];

	

	exit();
}else{
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');

	exit();
}

?>













