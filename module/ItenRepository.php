<?php
class ItenRepository
{
    function register( array $params )
    {
        query( "INSERT INTO iten ( order_id, product_id, quantity ) VALUES ( `{$params['order_id']}`, `{$params['product_id']}`, `{$params['quantity']}` ) " );
    }    
    function update( array $params )
    {
        query( "UPDATE iten SET quantity=`{$params['quantity']}`,  WHERE order_id=`{$params['order_id']}` AND product_id=`{$params['product_id']}` " );
    }    
    function delete( int $id )
    {
        query( "DELETE FROM iten WHERE id=`{$id}`" );
    }    
    function list( int $order_id )
    {
        return query( "SELECT * FROM iten WHERE order_id=$order_id " );
    }
}