<?php
class ItenRepository
{
    function add( $order_ref, $prod_id, $quant )
    {
        $sql  = "SELECT * FROM item WHERE order_ref='{$order_ref}' AND product_id='{$prod_id}'";
        $prod = query( $sql );
        if ( empty( $prod ) ) :
            query( "INSERT INTO item ( order_ref, product_id, quantity ) VALUES ( '{$order_ref}', '$prod_id', '{$quant}' )" );
        else:
            if(+$quant > 0) :
                query( "UPDATE item SET quantity='{$quant}'  WHERE order_ref='{$order_ref}' AND product_id='{$prod_id}'" );
            endif;
        endif;
    }   
    function delete( $order_ref, $prod_id )
    {
        query( "DELETE FROM item WHERE order_ref='{$order_ref}' AND product_id='{$prod_id}'" );
    }    
    function list( $order_ref )
    {
        return query( "SELECT * FROM item WHERE order_ref='$order_ref'" );
    }
}