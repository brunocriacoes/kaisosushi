<?php
class Site
{
    function run()
    {
        
        add_router( '/', function() {}, __DIR__ . "/../view/site/index.php"  );
        add_router( '/menu', function() {}, __DIR__ . "/../view/site/menu.php"  );
        add_router( '/produto/:slug_prod', function() {}, __DIR__ . "/../view/site/produto.php"  );
        add_router( '/login', function() {}, __DIR__ . "/../view/site/login.php"  );
        add_router( '/me-registrar', function() {}, __DIR__ . "/../view/site/me-registrar.php"  );
        add_router( '/finalizar', function() {}, __DIR__ . "/../view/site/finalizar.php"  );
        add_router( '/perfil', function() {}, __DIR__ . "/../view/site/perfil.php"  );
        add_router( '/termos-e-consicoes', function() {}, __DIR__ . "/../view/site/termo.php"  );
        add_router( '/politica-de-privacidade', function() {}, __DIR__ . "/../view/site/termo.php"  );
        add_router( '/acerca-kaiso', function() {}, __DIR__ . "/../view/site/termo.php"  );
        add_router( '/alergenios', function() {}, __DIR__ . "/../view/site/termo.php"  );
        add_router( '/404', function() {}, __DIR__ . "/../view/site/404.php"  );
        
    }
}