<?php
class DeliveryRepository
{
    function register( array $params )
    {
        query( "INSERT INTO delivery ( address, post_code, type, money ) VALUES ( `{$params['address']}`, `{$params['post_code']}`, `{$params['type']}`, `{$params['money']}` ) " );
    }    
    function update( array $params )
    {
        query( "UPDATE delivery SET address=`{$params['address']}`, post_code=`{$params['post_code']}`, type=`{$params['type']}`, money=`{$params['money']}` WHERE id=`{$params['id']}` " );
    }    
    function delete( int $id )
    {
        query( "DELETE FROM delivery WHERE id=`{$id}`" );
    }    
    function list( array $params )
    {
        return query( "SELECT * FROM delivery LIMIT `{$params['offset']},{$params['max_result']}`" );
    }    
    function search( array $params )
    {
        return query( "SELECT * FROM delivery WHERE CONCAT( delivery.address, delivery.post_code ) LIKE `%{$params['address']}%` AND type=`{$params['type']}`" );
    }
}