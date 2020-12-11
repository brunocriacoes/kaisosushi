<?php
class ClientRepository
{
    function register( $name, $email, $pass )
    {
        $data_register = date( 'Y-m-d' );
        $password = md5( $pass );
        query( "INSERT INTO client 
        ( name, email, password, data_register ) 
        VALUES 
        ( '{$name}', '{$email}', '{$password}', '{$data_register}' ) " );
    }    
    function update( array $params )
    {
        query( "UPDATE client SET
        name='{$params['name']}', last_name='{$params['last_name']}', phone='{$params['phone']}', whatsapp='{$params['whatsapp']}'
        WHERE id='{$params['id']}' " );
    }    
    function suspend( int $client_id )
    {
        query( "UPDATE client SET status=0 WHERE id='{$client_id}'" );
    }
    function active( int $client_id )
    {
        query( "UPDATE client SET status=1 WHERE id='{$client_id}'" );
    }
    function alterPassword( $id, $pass )
    {
        $password = md5( $pass );
        query( "UPDATE client SET password='{$password}' WHERE id='{$id}'" );
    }
    function recoverPassword( int $client_id )
    {
        $new_pass = uniqid();
        $password = md5( $new_pass );
        query( "UPDATE client SET password='{$password}' WHERE id='{$client_id}'" );
        return $new_pass;
    }    
    function list( array $params )
    {
        return query( "SELECT * FROM client LIMIT {$params['offset']},{$params['max_result']}" );
    }    
    function count()
    {
        return query( "SELECT COUNT(*) AS total FROM product" );
    }
    function about( int $client_id )
    {
        return query( "SELECT * FROM client WHERE id=$client_id" );
    }
    function login( $email, $pass )
    {
        $password = md5( $pass );
        return query( "SELECT * FROM client WHERE email='{$email}' AND password='$password'" );
    }
    function get_by_id($id)
    {
        $sql = "SELECT * FROM client WHERE id={$id}";
        $query = query($sql);
        return $query[0] ?? null;
    }
    function email_exist( $email )
    {
        $sql = "SELECT * FROM client WHERE email='{$email}'";
        $query = query($sql);
        return $query;
    }
}