<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo dir_template( '/view/admin/img/ico.png' ); ?>">
    <link rel="stylesheet" href="<?php echo dir_template( '/view/admin/style.css' ); ?>">
    <title><?php echo get_title_site(); ?></title>
</head>
<body class="estoylokito">
    <section id="rec">
        <img src="<?php echo dir_template( '/view/admin/img/kaiso.svg' ); ?>" alt="">
        <form action="" method="POST">
            <?php if(isset( $_POST['email'] )): ?>
                <div onclick="fechar()" id="alerta" class="alerta">
                    Nova senha enviada com sucesso <span title="Fechar">X</span>
                </div>
            <?php endif ?>
            <p>Insira seu e-mail e em seguida enviaremos um e-mail com sua senha temporaria. Isso pode levar alguns minutos.</p>
            <input type="email" name="email" placeholder="E-mail">
            
            <div>
                <input type="submit" value="Recuperar">
                <a href="<?= dir_template( '/admin' ); ?>">Entrar</a>
            </div>
        </form>
    </section>
    <script src="<?php echo dir_template( '/view/admin/script.js' ); ?>"></script>
</body>
</html>