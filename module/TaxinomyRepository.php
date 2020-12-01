<?php
class TaxinomyRepository
{
    function register( array $params )
    {
        query( "INSERT INTO taxonomy ( post_id, post_taxonomy_id, relation ) VALUES ( '{$params['post_id']}', '{$params['post_taxonomy_id']}', '{$params['relation']}'  )" );
    }
    
    function delete( array $params )
    {
        query( "DELETE FROM taxonomy WHERE post_id='{$params['post_id']}' AND post_taxonomy_id='{$params['post_taxonomy_id']}' AND relation='{$params['relation']}'" );
    }
    
    function list( array $params )
    {
        return query( "SELECT post_id, post_taxonomy_id, relation FROM taxonomy WHERE post_id='{$params['post_id']}' AND relation='{$params['relation']}'" );
    }
}