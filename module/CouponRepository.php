<?php
class CouponRepository
{
    function register( array $params )
    {
        query( "INSERT INTO coupon ( code, money, percentage ) VALUES ( '{$params['code']}', '{$params['money']}', '{$params['percentage']}' ) " );
    }    
    function update( array $params )
    {
        query( "UPDATE coupon SET code='{$params['code']}', money='{$params['money']}', porcetage='{$params['porcetage']}' WHERE id='{$params['id']}' " );
    }    
    function delete( int $id )
    {
        query( "DELETE FROM coupon WHERE id='{$id}'" );
    }    
    function list()
    {
        return query( "SELECT * FROM coupon " );
    }    
    function about( string $code )
    {
        return query( "SELECT * FROM coupon WHERE code='{$code}'" );
    }
    function get_by_code($code)
    {
        $sql = "SELECT * FROM coupon WHERE code='{$code}'";
        $query = query($sql);
        return $query[0] ?? [];
    }
}