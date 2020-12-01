<?php
class ProductRepository
{
    function register( array $params )
    {
        query( "INSERT INTO product ( name, slug, description, price, price_offer, photo ) VALUES ( '{$params['name']}', '{$params['slug']}', '{$params['description']}', '{$params['price']}', '{$params['price_offer']}', '{$params['photo']}' )" );
    }    
    function update( array $params )
    {
        query( "UPDATE product SET
        name='{$params['name']}', slug='{$params['slug']}', description='{$params['description']}', price='{$params['price']}', 
        price_offer='{$params['price_offer']}', photo_main='{$params['photo_main']}', 
        photo_1='{$params['photo_1']}', photo_2='{$params['photo_2']}', photo_3='{$params['photo_3']}'
        WHERE id='{$params['id']}'
        " );
    }    
    function delete( int $id )
    {
        query( "DELETE FROM product WHERE id='{$id}'" );
    }    
    function list( array $params )
    {
        return query( "SELECT * FROM product LIMIT '{$params['offset']},{$params['max_result']}'" );
    }    
    function listByCategorySlug( string $params )
    {
        $category    = query( "SELECT * FROM category WHERE slug='{$slug_category['category_slug']}'" );
        $category_id = $category[0]->id;
        $toxonomy    = query( "SELECT * FROM taxonomy WHERE post_id=$category_id AND relation='APLY_CATEGORY'" );
        $products_ids = array_map( function( $product ) { return $product['id']; }, $toxonomy );
        $ids = implode( ',', $products_ids );
        return query( "SELECT * FROM product WHERE id IN ($ids) LIMIT '{$params['offset']},{$params['max_result']}'" );
    }
    function getBySlug( string $slug )
    {
        $query = query( "SELECT * FROM product WHERE slug=$slug" );
        return $query[0];
    }
    function getById( int $id )
    {
        $query = query( "SELECT * FROM product WHERE id=$id" );
        return $query[0];
    }
    function count()
    {
        return query( "SELECT COUNT(*) AS total FROM product" );
    }

    function search( string $term )
    {
        return query( "SELECT * FROM product WHERE product.name LIKE '%{$term}%'" );
    }
}