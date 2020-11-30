<?php
class ClientRepository
{
    function register( array $params )
    {
        $data_register = date( 'Y-m-d' );
        $password = md5( $params['password'] );
        query( "INSERT INTO client 
        ( name, last_name, email, phone, whatsapp, password, photo, status, data_register ) 
        VALUES 
        ( `{$params['name']}`, `{$params['last_name']}`, `{$params['email']}`, `{$params['phone']}`, `{$params['whatsapp']}`, `{$password}`, `{$params['photo']}`, 1, `{$data_register}` ) " );
    }    
    function update( array $params )
    {
        query( "UPDATE client SET
        name=`{$params['name']}`, last_name=`{$params['last_name']}`, email=`{$params['email']}`, phone=`{$params['phone']}`, whatsapp=`{$params['whatsapp']}`, photo=`{$params['photo']}`
        WHERE id=`{$params['id']}` " );
    }    
    function suspend( int $client_id )
    {
        query( "UPDATE client SET status=0 WHERE id=`{$client_id}`" );
    }
    function active( int $client_id )
    {
        query( "UPDATE client SET status=1 WHERE id=`{$client_id}`" );
    }
    function alterPassword( array $param )
    {
        $password = md5( $params['password'] );
        query( "UPDATE client SET password=`{$password}` WHERE id=`{$param['id']}`" );
    }
    function recoverPassword( int $client_id )
    {
        $new_pass = uniqid();
        $password = md5( $new_pass );
        query( "UPDATE client SET password=`{$password}` WHERE id=`{$client_id}`" );
        return $new_pass;
    }    
    function list( array $params )
    {
        return query( "SELECT * FROM client LIMIT `{$params['offset']},{$params['max_result']}`" );
    }    
    function count()
    {
        return query( "SELECT COUNT(*) AS total FROM product" );
    }
    function about( int $client_id )
    {
        return query( "SELECT * FROM client WHERE id=$client_id" );
    }
    function login( array $params )
    {
        $password = md5( $params['password'] );
        return query( "SELECT * FROM client WHERE email=`{$params['email']}` AND password=`$password`" );
    }
}