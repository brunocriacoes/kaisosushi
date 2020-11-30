<?php
class MetaRepository
{
    function register( array $params )
    {
        query( "INSERT INTO meta ( post_id, relation, content ) VALUES ( `{$params['post_id']}`, `{$params['relation']}`, `{$params['content']}`  )" );
    }
    
    function update( array $params )
    {
        query( "UPDATE meta SET content=`{$params['content']}` WHERE post_id=`{$params['post_id']}` AND relation=`{$params['relation']}`" );
    }
    
    function list( $post_id )
    {
        return query( "SELECT relation, content FROM meta WHERE post_id= $post_id" );
    }
}