<?php

function get_whatsapp()
{
    return $_ENV['LINK_WATSAPP'];
}
function get_email()
{
    return $_ENV['EMAIL'];
}
function get_title_site()
{
    return $_ENV['TITLE_SITE'];
}
function get_facebook()
{
    return $_ENV['LINK_FACEBOOK'];
}
function get_instagram()
{
    return $_ENV['LINK_INSTAGRAM'];
}
function get_fidelidade()
{
    return $_ENV['LINK_FIDELIDADE'];
}
function get_banner()
{
    $banner = new BannerRepository;
    return $banner->list();
}
function remove_accent($string)
{
    $string =  preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/", "/(ç)/", "/(Ç)/"), explode(" ", "a A e E i I o O u U n N c C"), $string);
    $char = array(' & ', 'ª ', '  (', ') ', '(', ')', ' - ', ' / ', ' /', '/ ', '/', ' | ', ' |', '| ', ' | ', '|', '_', ' ');
    return strtolower(str_replace($char, '-', $string));
}
function maker_slug($string)
{
    $string = remove_accent($string);
    $string = str_replace(["/", "@", ",", ".", "?", "!", "#"], '', $string);
    $string = preg_replace("/\s{1,10}/", '-', $string);
    $string = strtolower($string);
    return $string;
}
function import_foto($foto_dir)
{
    $image = pathinfo($foto_dir);
    // copy($foto_dir, __DIR__ . "/../view/upload/product/" . $image["basename"]);
    return $image["basename"];
}
function get_last_product($number = 12)
{
    $prods = new ProductRepository;
    $list = $prods->list(["offset" => 0, "max_result" => $number]);
    $list = array_map(function ($prod) {
        $prod["link"] = dir_template('/produto/') . $prod['slug'];
        if (!file_exists(__DIR__ . "/../view/upload/product/" . $prod["photo"])) :
            $prod["photo"] = dir_template('/view/upload/product/default.jpg');
        else :
            $prod["photo"] = dir_template('/view/upload/product/') . utf8_encode($prod['photo']);
        endif;
        $prod["title"] = utf8_encode($prod['name']);
        $prod["price"] = '&euro; ' . number_format($prod["price"], '2', ',', '.');
        return $prod;
    }, $list);
    return $list;
}
function set_corruent_prod()
{
    $parse_url =  get_param('produto/:slug_prod');
    $product = new ProductRepository;
    $prod    = $product->getBySlug($parse_url["slug_prod"]);
    $GLOBALS["corruent"]["id"] = $prod['id'];
    $GLOBALS["corruent"]["title"] = utf8_encode($prod['name']);
    $GLOBALS["corruent"]["photo"] = dir_template('/view/upload/product/') . utf8_encode($prod['photo']);
    $GLOBALS["corruent"]["price"] = '&euro; ' . number_format($prod["price"], '2', ',', '.');
    $GLOBALS["corruent"]["description"] = utf8_encode($prod['description']);
}
function title()
{
    return $GLOBALS["corruent"]["title"] ?? null;
}
function photo()
{
    return $GLOBALS["corruent"]["photo"] ?? null;
}
function price()
{
    return $GLOBALS["corruent"]["price"] ?? null;
}
function description()
{
    return $GLOBALS["corruent"]["description"] ?? null;
}
function id()
{
    return $GLOBALS["corruent"]["id"] ?? null;
}

function get_all_category()
{
    $category = new CategoryRepository;
    $list = $category->list();
    $list = array_map(function ($cat) {
        return [
            "title" => utf8_encode($cat['name']),
            "link" => dir_template('/menu/') . $cat['slug']
        ];
    }, $list);
    return $list;
}
function get_product_corruent_cat()
{
    $prods = new ProductRepository;
    $parse_url =  get_param('produto/:slug_cat');
    $list = $prods->listByCategorySlug([
        "category_slug" => $parse_url['slug_cat'],
        "offset" => 0,
        "max_result" => 100
    ]);
    $list = array_map(function ($prod) {
        $prod["link"] = dir_template('/produto/') . $prod['slug'];
        if (!file_exists(__DIR__ . "/../view/upload/product/" . $prod["photo"])) :
            $prod["photo"] = dir_template('/view/upload/product/default.jpg');
        else :
            $prod["photo"] = dir_template('/view/upload/product/') . utf8_encode($prod['photo']);
        endif;
        $prod["title"] = utf8_encode($prod['name']);
        $prod["price"] = '&euro; ' . number_format($prod["price"], '2', ',', '.');
        return $prod;
    }, $list);
    return $list;
}
function admin_login()
{
    if (!empty($_REQUEST)) :
        $email = $_REQUEST["email"] ?? '';
        $pass = $_REQUEST["pass"] ?? '';
        $admin = new AdminRepository;
        $is_admin = $admin->login( $email, $pass );
        if( !empty($is_admin) ):
            $_SESSION["ADMIN"] = true;
            redirect( dir_template( '/admin/painel' ) );
        else:
            $GLOBALS['error'] = "Usuário ou senha esta errado";
        endif;
    endif;
}
function the_error()
{
    return $GLOBALS['error'] ?? false;
}
function admin_is_logged()
{
    return $_SESSION["ADMIN"] ?? false;
}
function admin_public()
{
    if (admin_is_logged()) :
        redirect( dir_template( '/admin/painel' ) );
    endif;
}
function admin_private()
{
    if (!admin_is_logged()) :
        redirect( dir_template( '/admin' ) );
    endif;
}
function admin_logout() 
{
    $_SESSION["ADMIN"] = false;
    redirect( dir_template( '/admin' ) );
}

// http://www.diogomatheus.com.br/blog/php/configurando-o-php-para-enviar-email-no-windows-atraves-do-gmail/
// mail( 'br.rafael@outlook.com', 'teste off', 'mensagem de teste' );