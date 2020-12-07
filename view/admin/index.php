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
        <div class="alerta">
            E-mail ou Senha incorretos. Insira novamente! <span title="Fechar">X</span>
        </div>
        <form action="" method="POST">
            <input name="email" require type="email" placeholder="E-mail">
            <input name="pass" require type="password" placeholder="Password">
            <div>
                <input type="submit" value="Entrar"> <a href="rec-senha.html">Não me lembro da minha password</a>
            </div>
        </form>
    </section>
    <script src="script.js"></script>
</body>
</html>