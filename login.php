<?php
session_start();
include('conexao.php');

if(empty($_POST['usuario']) || empty($_POST['senha'])){
	header('Location: index.php');
	exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select * from usuarios where usuario = '{$usuario}' and senha = '{$senha}' ";


$result = mysqli_query($conexao, $query);
$dado = mysqli_fetch_array($result);
$row = mysqli_num_rows($result);

if($row > 0){
	$_SESSION['usuario'] = $usuario;
	$_SESSION['nome_usuario'] = $dado["nome"];
	$_SESSION['cargo_usuario'] = $dado["cargo"];
	$_SESSION['idusuarios'] = $dado["idusuarios"];
	$_SESSION['senha'] = $dado["senha"];
	


    if ($_SESSION['cargo_usuario'] == 'Master' || $_SESSION['cargo_usuario'] == 'Adm') {
    	header('Location: painel_funcionario.php');
    	exit();
    }

  	/*if ($_SESSION['cargo_usuario'] == 'Tesoureiro') {
    	header('Location: painel_tesouraria.php');
    	exit();
    }*/

    if ($_SESSION['cargo_usuario'] == 'Operador') {
    	header('Location: painel_funcionario.php');
    	exit();
    }
	
	

	exit();
}else{
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');

	exit();
}

?>









<?php
session_start();




$query = "select * from usuarios ";


$result = mysqli_query($conexao, $query);
$dado = mysqli_fetch_array($result);
$row = mysqli_num_rows($result);

if($row > 0){
	
	$_SESSION['idusuarios'] = $dado["idusuarios"];
	

	

	exit();
}else{
	$_SESSION['nao_autenticado'] = true;
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








