<?php
class CouponRepository
{
    function register( array $params )
    {
        query( "INSERT INTO coupon ( code, money, porcentage ) VALUES ( `{$params['code']}`, `{$params['money']}`, `{$params['porcetage']}` ) " );
    }    
    function update( array $params )
    {
        query( "UPDATE coupon SET code=`{$params['code']}`, money=`{$params['money']}`, porcetage=`{$params['porcetage']}` WHERE id=`{$params['id']}` " );
    }    
    function delete( int $id )
    {
        query( "DELETE FROM coupon WHERE id=`{$id}`" );
    }    
    function list( array $params )
    {
        return query( "SELECT * FROM coupon " );
    }    
    function about( string $code )
    {
        return query( "SELECT * FROM coupon WHERE code=`{$code}`" );
    }
}