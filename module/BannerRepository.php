<?php
class BannerRepository
{
    function register( array $params )
    {
        query( "INSERT INTO banner ( photo ) VALUES ( `{$params['photo']}` )" );
    }
    
    function list()
    {
        return query( "SELECT photo FROM banner" );
    }

    function delete( int $id )
    {
        query( "DELETE FROM banner WHERE id = $id" );
    }
}