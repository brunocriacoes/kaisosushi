<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=Ka, initial-scale=1.0">
    <title><?= get_title_site() ?></title>
    <link rel="shortcut icon" href="<?= dir_template( '/view/site/src/image/ico.png' ) ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= dir_template( '/view/site/src/css/style.css' ) ?>">

</head>
<body>
    <div class="load"> <img src="<?= dir_template( '/view/site/src/image/logo.png' ) ?>" alt=""> </div>
    <div class="cargar" hidden> <img src="<?= dir_template( '/view/site/src/image/loading.gif' ) ?>" alt="cargar"> </div>
    <div class="inner inner-menu">
        <div class="container">
            <div class="grid-menu">
                <div> 
                    <a href="<?= dir_template( '/' ) ?>" title="<?= get_title_site() ?>" >
                        <img src="<?= dir_template( '/view/site/src/image/logo.png' ) ?>" alt="<?= get_title_site() ?>"> 
                    </a>
                </div>
                <div class="link-menu menu"> 
                    <div> <img src="<?= dir_template( '/view/site/src/ico/menu.svg' ) ?>" alt=""> <span class="hidden-md">MENU</span> </div>
                    <div> <img src="<?= dir_template( '/view/site/src/ico/close.svg' ) ?>" alt=""> <span class="hidden-md">MENU</span> </div>                     
                </div>
                <div class="link-user user loged"> 
                    <div>
                        <a href="<?= get_fidelidade() ?>" class="hidden-md" target="_blank"> Fidelidade </a>
                        <a href="<?= dir_template( '/login' ) ?>" class="hidden-log ico-user"> <img src="<?= dir_template( '/view/site/src/ico/user.svg' ) ?>" alt="user"> </a>                   
                        <a href="<?= dir_template( '/login' ) ?>" class="hidden-md">LOGIN</a> <span class="hidden-md"> | </span>
                        <a href="<?= dir_template( '/me-registrar' ) ?>" class="hidden-md">REGISTRAR</a>
                    </div>
                    <div>
                        <a href="<?= get_fidelidade() ?>" class="hidden-md" target="_blank"> Fidelidade </a>
                        <a href="<?= dir_template( '/perfil' ) ?>" class="hidden-log ico-user"> <img src="<?= dir_template( '/view/site/src/ico/user.svg' ) ?>" alt="user"> </a>                   
                        <span class="hidden-md">Olá <b>Bruno</b></span> <span class="hidden-md"> | </span>
                        <a href="<?= dir_template( '/perfil' ) ?>" class="hidden-md">Perfil</a>
                    </div>
                </div>
                <div class="btn-addcart"><img src="<?= dir_template( '/view/site/src/ico/cart.svg' ) ?>" alt=""></div>                    
            </div>
        </div>
    </div>
    <div class="inner inner-pop-menu menu">
        <div class="container">
            <div class="grid-pop-menu"></div>
            <div class="space"></div>
            <a href="<?= dir_template( '/menu' ) ?>" class="link-menu-completo"> ver menu completo </a>
        </div>
    </div>
    