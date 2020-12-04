<?php
class Admin
{
    function run()
    {
        add_router( '/admin', function() {}, __DIR__ . "/../view/admin/index.php"  );
        add_router( '/admin/painel', function() {}, __DIR__ . "/../view/admin/painel.php"  );
        add_router( '/admin/categorias', function() {}, __DIR__ . "/../view/admin/categorias.php"  );
        add_router( '/admin/clientes-detalhe', function() {}, __DIR__ . "/../view/admin/clientes-detalhe.php"  );
        add_router( '/admin/clientes', function() {}, __DIR__ . "/../view/admin/clientes.php"  );
        add_router( '/admin/cupom', function() {}, __DIR__ . "/../view/admin/cupom.php"  );
        add_router( '/admin/destaques', function() {}, __DIR__ . "/../view/admin/destaques.php"  );
        add_router( '/admin/editar-categorias', function() {}, __DIR__ . "/../view/admin/editar-categoria.php"  );
        add_router( '/admin/editar-frete', function() {}, __DIR__ . "/../view/admin/editar-frete.php"  );
        add_router( '/admin/editar-produto', function() {}, __DIR__ . "/../view/admin/editar-produto.php"  );
        add_router( '/admin/pedidos-visualizar', function() {}, __DIR__ . "/../view/admin/pedidos-visualizar.php"  );
        add_router( '/admin/frete', function() {}, __DIR__ . "/../view/admin/frete.php"  );
        add_router( '/admin/pedidos', function() {}, __DIR__ . "/../view/admin/pedidos.php"  );
        add_router( '/admin/produtos', function() {}, __DIR__ . "/../view/admin/produtos.php"  );
        add_router( '/admin/produtos', function() {}, __DIR__ . "/../view/admin/produtos.php"  );
        add_router( '/admin/criacao-cupom', function() {}, __DIR__ . "/../view/admin/criacao-cupom.php"  );
    }
}