<?php
class AddressRepository
{
    function register( array $params )
    {
        query( "INSERT INTO address 
        ( client_id, name, address, number, city, post_code, complement ) 
        VALUES
        ( {$params['client_id']}, '{$params['name']}', '{$params['address']}', '{$params['number']}', '{$params['city']}', '{$params['post_code']}', '{$params['complement']}' ) " );
    }    
    function update( array $params )
    {
        query( "UPDATE address SET name='{$params['name']}', address='{$params['address']}', number='{$params['number']}', city='{$params['city']}', post_code='{$params['post_code']}', complement='{$params['complement']}'  WHERE id={$params['id']}" );
    }    
    function delete( int $id )
    {
        query( "DELETE FROM address WHERE id='{$id}'" );
    }    
    function list( $cliente_id )
    {
        return query( "SELECT * FROM address WHERE client_id=$cliente_id" );
    }  
    function about( int $id )
    {
        return query( "SELECT * FROM address WHERE id=$id" );
    }

}
