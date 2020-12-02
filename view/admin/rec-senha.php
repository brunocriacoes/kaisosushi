<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo dir_template( '/view/admin/img/maki.png' ); ?>">
    <link rel="stylesheet" href="<?php echo dir_template( '/view/admin/style.css' ); ?>">
    <title>日本語わからない</title>
</head>
<body class="estoylokito">
    <section id="rec">
        <img src="<?php echo dir_template( '/view/admin/img/logo.png' ); ?>" alt="">
        <form action="painel.html">
            <p>Insira seu e-mail e em seguida enviaremos um e-mail com sua senha temporaria. Isso pode levar alguns minutos.</p>
            <input type="email" placeholder="E-mail">
            
            <div>
                <input type="submit" value="Recuperar">
                <a href="<?php echo dir_template( '/view/admin/index.php' ); ?>">Entrar</a>
            </div>
        </form>
    </section>
    <script src="<?php echo dir_template( '/view/admin/script.js' ); ?>"></script>
</body>
</html>