<?php
class OrderRepository
{
    function register( array $params )
    {
        $date_register = date('Y-m-d');
        $date_update   = date('Y-m-d');
        query( "INSERT INTO `order` 
        ( cliente_id, date_register, date_update, status ) 
        VALUES
        ( '{$params['cliente_id']}', '$date_register', '$date_update', '{$params['status']}' ) " );
    }    
    function update( array $params )
    {
        $date_update = date('Y-m-d');
        query( "UPDATE `order` SET cliente_id='{$params['cliente_id']}',  WHERE date_update='$date_update' AND status='{$params['status']}' " );
    }    
    function delete( int $id )
    {
        query( "DELETE FROM `order` WHERE id='{$id}'" );
    }    
    function list( array $params )
    {
        $sql = "SELECT * FROM `order` LIMIT {$params['offset']},{$params['max_result']}";
        return query( $sql );
    }  
    function about( int $order_id )
    {
        return query( "SELECT * FROM `order` WHERE id=$order_id" );
    }
}