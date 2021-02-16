<?php

session_start();

header('Content-Type: text/html; charset=utf-8');

$file_env =  __DIR__ . "/.env";
if( file_exists( $file_env ) ):
    $_ENV = parse_ini_file( $file_env, TRUE, INI_SCANNER_RAW );
endif;

$list_dir = [    
    __DIR__ . "/module",
    __DIR__ . "/view",
    __DIR__ . "/view/upload",
    __DIR__ . "/view/language",
];

function make_dir( $path )
{
    $oldmask = umask( 0 );
    mkdir( $path, 0777 );
    umask( $oldmask );
}

foreach( $list_dir as $dir ) :
    if ( !is_dir( $dir ) ) :
        make_dir( $dir );
    endif;
endforeach;

function add_router( string $path, $callable, $template = null ) 
{
    $GLOBALS['APP_ROUTER'][$path]   = $callable;
    $GLOBALS['APP_TEMPLATE'][$path] = $template;
}

$haccess = __DIR__ . "/.htaccess";
if ( !file_exists( $haccess ) ) :
    file_put_contents( $haccess, "RewriteEngine On\nRewriteCond %{SCRIPT_FILENAME} !-f\nRewriteCond %{SCRIPT_FILENAME} !-d\nRewriteRule ^(.*) index.php" );
endif;

$env = __DIR__ . "/.env";
if ( !file_exists( $env ) ) :
    file_put_contents( $env.'.exemplo', "HOST=\nHOST_USER=\nHOST_PASS=\nHOST_DB=\nPREFIX_TEMPLATE=" );
endif;

function do_router()
{
    $url = parse_url( $_SERVER['REQUEST_URI'] );
    $callable = !empty( $GLOBALS['APP_ROUTER']['/404'] ) ? $GLOBALS['APP_ROUTER']['/404'] : null ;
    $routers = !empty( $GLOBALS['APP_ROUTER'] ) ? $GLOBALS['APP_ROUTER'] : [];
    $path_exist = true;
    foreach ( $routers as $path => $call ):
        if( router_compare( $path ) ) :
            if( is_callable( $call ) ):
                call_user_func( $call );
            endif;
            $path_exist = false;
            $template = $GLOBALS['APP_TEMPLATE'][$path] ?? '';
            if( file_exists( $template ) && !is_dir( $template ) ):
                include $template;
            endif;
            break;
        endif;
    endforeach;
    if ( $path_exist ) :
        if( is_callable( $callable ) ):
            call_user_func( $callable );
        endif;
        $template = $GLOBALS['APP_TEMPLATE']['/404'] ?? '';
        if( file_exists( $template ) && !is_dir( $template ) ):
            include $template;
        endif;
    endif;
   
}

function add_action( $name, $callable, $priority = 0 )
{
    $GLOBALS['APP_PIPE_LINE'][$name][$priority][] = $callable;
}

function do_action( $name ) 
{
    $actions = $GLOBALS['APP_PIPE_LINE'][$name] ?? [];
    foreach( $actions as $prioritys ) :
        foreach( $prioritys as $action ):
            if( is_callable( $action ) ):
                call_user_func( $action );
            endif;
        endforeach;
    endforeach;
}

function add_filter( $name, $callable, $priority = 0 )
{
    $GLOBALS['APP_PIPE_LINE'][$name][$priority] = $callable;
}

function dir_template( $path = '/' )
{
    $domain =  $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] ;
    $fix    = !empty( $_ENV['PREFIX_TEMPLATE'] ) ? $_ENV['PREFIX_TEMPLATE'] : '';
    return $domain . $fix . $path;
}

function apply_filter( $name, &$mixed ) 
{
    $filters = $GLOBALS['APP_PIPE_LINE'][$name] ?? [];
    foreach( $filters as $prioritys ) :
        foreach( $prioritys as $filter ):
            if( is_callable( $filter ) ):
                call_user_func( $filter, [&$mixed] );
            endif;
        endforeach;
    endforeach;
}

function redirect( $path )
{
    header( "Location: $path" );
    echo "<script> window.location.href=\"{$path}\" </script>";
    die;
}
function is_dev() {
    return stripos( $_SERVER['HTTP_HOST'], '.con' ) !== false;
}
function query( $sql )
{
    $host = is_dev() ? $_ENV['HOST'] : $_ENV['HOST_PRODUCTION']['HOST'];
    $user = is_dev() ? $_ENV['HOST_USER'] : $_ENV['HOST_PRODUCTION']['HOST_USER'];
    $pass = is_dev() ? $_ENV['HOST_PASS'] : $_ENV['HOST_PRODUCTION']['HOST_PASS'];
    $db = is_dev() ? $_ENV['HOST_DB'] : $_ENV['HOST_PRODUCTION']['HOST_DB'];
    try {
        $con = new PDO("mysql:host={$host};dbname={$db}", $user, $pass);
        $query = $con->query( $sql );
        $result = $query->fetchAll();
        return $result;
    } catch (\Throwable $th) {
        echo "error ao conectar ao banco";
        file_put_contents(__DIR__ . "/.log", date("d-m-Y H:i") . " ERROR AO CONECTAR $sql \n", FILE_APPEND);
        return [];
    }
}

function send_mail( $to, $subject, $body, $header = [] ) 
{
   return mail($to, $subject, $body, implode( "\n", $header ) );
}

function api_get( string $path, array $param = [] )
{
    $uri       = $path . "?" . http_build_query( $param );
    $call_http = file_get_contents( $uri );
    return json_decode( $call_http );
}

function api_post( string $path, array $param = [] )
{  
    $ch = curl_init( $path );
    curl_setopt( $ch, CURLOPT_POST, true );
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch, CURLOPT_TIMEOUT, 3 );
    curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $param ) );    
    $response = curl_exec( $ch );    
    curl_close( $ch );
    return json_decode( $response );
}

function transl( $to_translate )
{
    @$lang          = $_SESSION['lang'] ?? $_REQUEST['lang'] ?? 'pt';
    $file_translate = __DIR__ . "/view/language/{$lang}.php";
    if ( file_exists( $file_translate ) ) :
        $dicionary = include $file_translate;
        if ( is_array( $dicionary ) ) :
            if ( !empty( $dicionary[ $to_translate ] ) ) :
                return $dicionary[ $to_translate ];
            endif;
        endif;
    endif;
    return $to_translate;
}

function web_socket()
{}

function url_to_array( string $path )
{
    $path =  explode( '/', $path );
    $path = array_filter( $path, function( $router ) {
        return strlen( $router ) > 0;
    } );
    return array_values( $path );
}

function router_compare( string $path )
{
    $url = parse_url( $_SERVER['REQUEST_URI'] );
    $url = url_to_array( $url['path'] );
    $path = url_to_array( $path );
    foreach ( $path as $index => $router ) :
        if ( stripos( $router, ':' ) !== false ) :
            if( !empty( $url[ $index ] ) ) :
                $path[ $index ] = $url[ $index ];
            endif;
        endif;
    endforeach;
    $url = implode( '/', $url );
    $path = implode( '/', $path );
    $compare = $url == $path;
    return $compare;
}

function get_param( string $path )
{
    $url    = parse_url( $_SERVER['REQUEST_URI'] );
    $url    = url_to_array( $url['path'] ); 
    $path   = url_to_array( $path );
    $params = [];
    foreach ( $path as $index => $router ) :
        if ( stripos( $router, ':' ) !== false ) :
            $router = str_replace( ':', '', $router );
            $params[ $router ] = $url[ $index ];
        endif;
    endforeach;
    $params = array_merge( $_REQUEST, $params );
    return $params;
}

$list_module = glob( __DIR__ . "/module/*.php*" );
foreach( $list_module as $module ) :
    include_once $module;
    $name_module = basename( $module );
    $name_module = str_ireplace( '.php', '', $name_module );
    if( class_exists( $name_module ) ) :
        $run_module = new $name_module;
        if( method_exists( $run_module, 'run' ) ) :
            $run_module->run();
        endif;
    endif;
endforeach;

do_router();