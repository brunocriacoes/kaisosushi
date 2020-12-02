<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo dir_template( '/view/admin/img/maki.png' ); ?>">
    <link rel="stylesheet" href="<?php echo dir_template( '/view/admin/style.css' ); ?>">
    <title><?php echo get_title_site(); ?></title>
</head>
<body class="estoylokito">
    <section id="index">
        <img src="<?php echo dir_template( '/view/admin/img/logo.png' ); ?>" alt="">
        <form action="<?php echo dir_template( '/admin/painel' ); ?>">
            <input type="email" placeholder="E-mail">
            <input type="password" placeholder="Password">
            <div>
                <input type="submit" value="Entrar"> <a href="rec-senha.html">Não me lembro da minha password</a>
            </div>
        </form>
    </section>
    <script src="script.js"></script>
</body>
</html>