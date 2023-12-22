<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<?php
session_start();
?>

<!DOCTYPE html>
<html>



<head>

	<html lang="pt-BR">
	<title>CRM CORBAN</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
	<link rel="stylesheet" href="css/login.css">


</head>

<!--Coded with love by Mutiullah Samim-->

<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="https://images.vexels.com/media/users/3/142890/isolated/preview/4ea2d7c4bf3cad23a4f18ee58752deb8-logotipo-de-aneis-de-alta-tecnologia.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form action="login.php" method="post">
						<div class="mx-auto" style="width: 200px;">
							<h3>CRM CORBAN</h3>
							<br>
						</div>

						<!-- Exibir mensagem de erro -->
						<?php if (isset($_SESSION['erro_login'])) : ?>
							<div class="alert alert-danger" role="alert">
								<?php echo $_SESSION['erro_login']; ?>
							</div>
						<?php
							unset($_SESSION['erro_login']); // Limpa a mensagem de erro após exibição
						endif;
						?>



						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="usuario" class="form-control input_user" value="" placeholder="Usuário">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="senha" class="form-control input_pass" value="" placeholder="Senha">
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customControlInline">
								<label class="custom-control-label" for="customControlInline">Manter logado</label>
							</div>
						</div>
						<div class="d-flex justify-content-center mt-3 login_container">
							<button type="submit" name="btn" class="btn login_btn">Entrar</button>
						</div>
					</form>
				</div>


			</div>
		</div>
	</div>




	<style>
		body {
			background-image: url('img/bg.jpg');
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: 100% 100%;
		}
	</style>


</body>

</html>