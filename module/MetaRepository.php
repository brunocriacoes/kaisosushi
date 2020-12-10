<?php
class MetaRepository
{
    function set( $post_id, $relation, $content )
    {
        $sql = "SELECT * FROM meta WHERE post_id='{$post_id}' AND relation='{$relation}'";
        $exit = query($sql);
        if( empty($exit) ):
            query( "INSERT INTO meta ( post_id, relation, content ) VALUES ( '{$post_id}', '{$relation}', '{$content}' )" );
        else:
            query( "UPDATE meta SET content='$content' WHERE post_id='{$post_id}' AND relation='{$relation}'" );
        endif;
    }
    function list( $post_id )
    {
        $list = query( "SELECT relation, content FROM meta WHERE post_id='{$post_id}'" );
        $render = [];
        foreach( $list as $meta ):
            $render[$meta['relation']] = $meta['content'];
        endforeach;
        return $render;
    }
}