
<?php 
include('conexao.php');
session_start();

// Atualize a coluna 'ultima_autenticacao' com a data 0000-00-00 para poder mostrar no painel do usuário que o mesmo está offline.
$idUsuario =  $_SESSION['idusuarios'];
$query = "UPDATE usuarios SET ultima_autenticacao = '0000-00-00' WHERE idusuarios = $idUsuario";
mysqli_query($conexao, $query);


session_destroy();
header('Location:index.php');
	exit();

 ?>