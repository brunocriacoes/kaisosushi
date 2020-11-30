<?php
class AdminRepository
{
    function register( array $params )
    {
        $password = md5( $params['password'] );
        query( "INSERT INTO `admin` 
        ( name, email, password, photo ) 
        VALUES 
        ( `{$params['name']}`, `{$params['email']}`, `{$password}`, `{$params['photo']}` ) " );
    }    
    function update( array $params )
    {
        query( "UPDATE `admin` SET
        name=`{$params['name']}`, email=`{$params['email']}`, photo=`{$params['photo']}`
        WHERE id=`{$params['id']}` " );
    }    

    function alterPassword( array $param )
    {
        $password = md5( $params['password'] );
        query( "UPDATE `admin` SET password=`{$password}` WHERE id=`{$param['id']}`" );
    }
    function recoverPassword( int $client_id )
    {
        $new_pass = uniqid();
        $password = md5( $new_pass );
        query( "UPDATE `admin` SET password=`{$password}` WHERE id=`{$client_id}`" );
        return $new_pass;
    }    
    function list( array $params )
    {
        return query( "SELECT * FROM `admin` LIMIT `{$params['offset']},{$params['max_result']}`" );
    }    
    function count()
    {
        return query( "SELECT COUNT(*) AS total FROM `admin`" );
    }
    function about( int $client_id )
    {
        return query( "SELECT * FROM `admin` WHERE id=$client_id" );
    }
    function login( array $params )
    {
        $password = md5( $params['password'] );
        return query( "SELECT * FROM `admin` WHERE email=`{$params['email']}` AND password=`$password`" );
    }
    function delete( int $id )
    {
        query( "DELETE FROM `admin` WHERE id=`{$id}`" );
    }  
}