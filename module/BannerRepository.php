<?php
class BannerRepository
{
    public $dir_file;
    function __construct()
    {
        $this->dir_file = __DIR__ . "/../view/upload/banner";
        if( !file_exists($this->dir_file) ) :
            make_dir($this->dir_file);
        endif;
    }
    function register( array $params )
    {
        query( "INSERT INTO banner ( photo ) VALUES ( `{$params['photo']}` )" );
    }
    
    function list()
    {
        $lista_images = glob( $this->dir_file . '/*.*');
        $lista_images = array_map( function( $img ) {
            $img = pathinfo( $img);
            $img = dir_template( '/view/upload/banner/' . $img["filename"] . '.' . $img["extension"] );
            return $img;
        }, $lista_images );
        return $lista_images;
    }

    function delete( int $id )
    {
        query( "DELETE FROM banner WHERE id = $id" );
    }

    function run() {
        add_action( 'js_footer', function() {
            $intes_banner = json_encode( $this->list() );
            echo "
                globalThis.slider = {
                    step: 0,
                    itens: $intes_banner
                }
            "; 
        } );
    }
}