<?php
class Admin
{
    function run()
    {
        add_router( '/admin', function() {}, __DIR__ . "/../view/admin/index.php"  );
        add_router( '/admin/painel', function() {}, __DIR__ . "/../view/admin/painel.php"  );
    }
}