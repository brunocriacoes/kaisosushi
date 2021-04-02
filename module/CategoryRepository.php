<?php
class CategoryRepository
{
    function register( array $params )
    {
        query( "INSERT INTO category ( name, slug ) VALUES ( '{$params['name']}', '{$params['slug']}' )" );
    }    
    function update( array $params )
    {
        $sql = "UPDATE category SET name='{$params['name']}', slug='{$params['slug']}' WHERE id={$params['id']} ";
        query( $sql  );
    }    
    function delete( $id )
    {
        query( "DELETE FROM category WHERE id={$id}" );
    }
    function get_by_id($id)
    {
        $sql = "SELECT * FROM category WHERE id={$id}";
        $query = query($sql);
        return $query[0];
    }
    function list()
    {
        return query( "SELECT * FROM category" );
    }
    function all_cat()
    {     
        $sql = "SELECT * FROM taxonomy WHERE relation='IN_CATEGORY'";
        return query($sql);
    }
}
