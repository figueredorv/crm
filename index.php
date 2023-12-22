<?php
session_start();
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRM CORBAN</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


</head>

<body>

   
    <form class="my-form" action="login.php" method="post">
        <div class="login-welcome-row">
            <a href="#" title="Logo">
                <img src="assets/storeify.png" alt="Logo" class="logo">
            </a>
            <h1>CRMCORBAN</h1>
            <p>Por favor insira seus dados!</p>

            <!-- Exibir mensagem de erro -->
            <?php if (isset($_SESSION['erro_login'])) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['erro_login']; ?>
                </div>
            <?php
                unset($_SESSION['erro_login']); // Limpa a mensagem de erro após exibição
            endif;
            ?>

        </div>
        <div class="input__wrapper">
           
                <input type="text" id="usuario" name="usuario" class="input__field" placeholder="Seu usuário" required>
                <label for="usuario" class="input__label">Usuário:</label>
                <svg class="input__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                    <path d="M16 12v1.5a2.5 2.5 0 0 0 5 0v-1.5a9 9 0 1 0 -5.5 8.28"></path>
                </svg>
        </div>
        <div class="input__wrapper">
            <input id="password" name="senha" type="password" class="input__field" placeholder="Sua senha" title="Minimum 6 characters at least 1 Alphabet and 1 Number" required>
            <label for="password" class="input__label">
                Senha
            </label>
            <svg class="input__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z"></path>
                <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0"></path>
                <path d="M8 11v-4a4 4 0 1 1 8 0v4"></path>
            </svg>
        </div>
        <button type="submit" name="btn" class="btn login_btn my-form__button">
            Login
        </button>
       
       
    </form>

   
</body>

</html>

