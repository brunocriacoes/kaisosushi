<?php
class CategoryRepository
{
    function register( array $params )
    {
        query( "INSERT INTO category ( name, slug ) VALUES ( '{$params['name']}', '{$params['slug']}' )" );
    }    
    function update( array $params )
    {
        query( "UPDATE cateory SET name=`{$params['name']}`, slug=`{$params['slug']}` WHERE id={$params['id']} " );
    }    
    function delete( int $id )
    {
        query( "DELETE FROM category WHERE id=`{$id}`" );
    }    
    function list( array $params )
    {
        return query( "SELECT * FROM category" );
    }
}
