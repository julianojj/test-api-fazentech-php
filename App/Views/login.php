<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de login</title>
    <link rel="stylesheet" href="public/css/login.css">
</head>
<body>
    <div class="form-login">
        <form action="/login" method="post">
            <div>
                <h2>Bem-Vindo!</h2>
            </div>
            <div>
                <input type="email" name="email" placeholder="E-mail">
            </div>
            <div>
                <input type="password" name="password" placeholder="Senha">
            </div>
            <div>
                <button type="submit">Entrar</button>
            </div>
            <?php
            if (isset($_SESSION['message'])) :
            ?>
                <p><?php echo $_SESSION['message']; ?></p>
            <?php
            endif;
            unset($_SESSION['message']);
            ?>
        </form>
    </div>
</body>
</html>