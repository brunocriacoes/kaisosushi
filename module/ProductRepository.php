<?php
class ProductRepository
{
    function register( array $params )
    {
        query( "INSERT INTO product ( name, slug, description, price, price_offer, photo ) VALUES ( '{$params['name']}', '{$params['slug']}', '{$params['description']}', '{$params['price']}', '{$params['price_offer']}', '{$params['photo']}' )" );
    }    
    function update( array $params )
    {
        $sql = "UPDATE product SET
        name='{$params['name']}', slug='{$params['slug']}', description='{$params['description']}', price='{$params['price']}', 
        price_offer='{$params['price_offer']}', photo='{$params['photo']}'
        WHERE id={$params['id']} ";
        query( $sql );
    }    
    function delete( $id )
    {
        query( "DELETE FROM product WHERE id={$id}" );
    }    
    function list( array $params )
    {
        return query( "SELECT * FROM product ORDER BY id ASC LIMIT {$params['offset']},{$params['max_result']}  " );
    }    
    function listByCategorySlug( array $params )
    {
        $category    = query( "SELECT * FROM category WHERE slug = '{$params['category_slug']}'" );
        $category_id = $category[0]["id"];
        $toxonomy    = query( "SELECT * FROM taxonomy WHERE post_id=$category_id AND relation='IN_CATEGORY'" );
        $products_ids = array_map( function( $product ) { return $product['post_taxonomy_id']; }, $toxonomy );
        $ids = implode( ',', $products_ids );
        $sql = "SELECT * FROM product WHERE id IN ($ids) LIMIT {$params['offset']},{$params['max_result']}";
        return query( $sql );
    }
    function getBySlug( string $slug )
    {
        $query = query( "SELECT * FROM product WHERE slug='$slug'" );
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
    function get_by_id($id)
    {
        $sql = "SELECT * FROM product WHERE id={$id}";
        $query = query($sql);
        return $query[0];
    }
    function search( string $term )
    {
        return query( "SELECT * FROM product WHERE product.name LIKE '%{$term}%'" );
    }
}