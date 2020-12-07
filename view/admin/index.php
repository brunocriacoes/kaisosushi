<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo dir_template( '/view/admin/img/ico.png' ); ?>">
    <link rel="stylesheet" href="<?php echo dir_template( '/view/admin/style.css' ); ?>">
    <title><?php echo get_title_site(); ?></title>
</head>
<body class="estoylokito">
    <section id="index">
        <img src="<?php echo dir_template( '/view/admin/img/kaiso.svg' ); ?>" alt="">
        <?php if(the_error()): ?>
            <div onclick="fechar()" id="alerta" class="alerta">
                <?= the_error() ?> <span title="Fechar">X</span>
            </div>
        <?php endif ?>
        <form action="" method="POST">
            <input name="email" require type="email" placeholder="E-mail">
            <input name="pass" require type="password" placeholder="Password">
            <div>
                <input type="submit" value="Entrar"> 
                <a href="<?php echo dir_template( '/admin/rec-senha' ); ?>">Não me lembro da minha password</a>
            </div>
        </form>
    </section>
    <script src="<?php echo dir_template( '/view/admin/script.js' ); ?>"></script>
</body>
</html>