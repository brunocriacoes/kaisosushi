<?php
class AddressRepository
{
    function register( array $params )
    {
        query( "INSERT INTO `address` 
        ( cliente_id, address, number, cyte, post_code, complement ) 
        VALUES
        ( `{$params['cliente_id']}`, `{$params['address']}`, `{$params['number']}`, `{$params['cyte']}`, `{$params['post_code']}`, `{$params['complement']}` ) " );
    }    
    function update( array $params )
    {
        query( "UPDATE `address` SET address=`{$params['address']}`, number=`{$params['number']}`, cyte=`{$params['cyte']}`, post_code=`{$params['post_code']}`, complement=`{$params['complement']}`  WHERE id={$params['id']}" );
    }    
    function delete( int $id )
    {
        query( "DELETE FROM `address` WHERE id=`{$id}`" );
    }    
    function list( int $cliente_id )
    {
        return query( "SELECT * FROM `address` WHERE cliente_id=$cliente_id" );
    }  
    function about( int $id )
    {
        return query( "SELECT * FROM `address` WHERE id=$id" );
    }

}
