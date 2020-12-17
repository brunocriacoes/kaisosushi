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
function cliear_string($string)
{
    $string =  preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/", "/(ç)/", "/(Ç)/"), explode(" ", "a A e E i I o O u U n N c C"), $string);
    return strtolower($string);
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
            "id" => $cat['id'],
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
        $is_admin = $admin->login($email, $pass);
        if (!empty($is_admin)) :
            $_SESSION["ADMIN"] = true;
            $_SESSION["ADMIN_NAME"] = $is_admin[0]['name'];
            redirect(dir_template('/admin/painel'));
        else :
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
        redirect(dir_template('/admin/painel'));
    endif;
}
function admin_private()
{
    if (!admin_is_logged()) :
        redirect(dir_template('/admin'));
    endif;
}
function admin_logout()
{
    $_SESSION["ADMIN"] = false;
    redirect(dir_template('/admin'));
}
function remover_banner()
{
    $file = $_REQUEST["file"];
    $file = pathinfo($file);
    $file = $file["basename"];
    unlink(__DIR__ . "/../view/upload/banner/{$file}");
    redirect(dir_template('/admin/destaques'));
}
function get_all_coupon()
{
    $coupon = new CouponRepository;
    return $coupon->list();
}
function get_all_frete()
{
    $frete = new DeliveryRepository;
    return $frete->list([
        "offset" => 0,
        "max_result" => 1000
    ]);
}
function get_all_pedido()
{
    $order = new OrderRepository;
    return $order->list([
        "offset" => 0,
        "max_result" => 100
    ]);
}
function get_all_client()
{
    $order = new ClientRepository;
    return $order->list([
        "offset" => 0,
        "max_result" => 1000
    ]);
}
function add_frente()
{
    if (!empty($_POST)) :
        $frete = new DeliveryRepository;
        $frete->register([
            "address" => $_REQUEST["address"],
            "type" => $_REQUEST["type"],
            "money" => $_REQUEST["money"],
        ]);
        redirect(dir_template('/admin/frete'));
    endif;
}
function edit_frente()
{
    $frete = new DeliveryRepository;
    $parse_url =  get_param('/admin/editar-frete/:id');
    if (!empty($_POST)) :
        $query = $frete->update([
            "id" => $parse_url["id"],
            "address" => $_REQUEST["address"],
            "type" => $_REQUEST["type"],
            "money" => $_REQUEST["money"],
        ]);
        redirect(dir_template('/admin/frete'));
    else :
        $_REQUEST = $frete->get_by_id($parse_url["id"]);
    endif;
}
function del_frente()
{
    $frete = new DeliveryRepository;
    $parse_url =  get_param('/admin/frete/deletar/:id');
    $frete->delete($parse_url["id"]);
    redirect(dir_template('/admin/frete'));
}

function add_category()
{
    if (!empty($_POST)) :
        $cat = new CategoryRepository;
        $cat->register([
            "name" => $_REQUEST["name"],
            "slug" => $_REQUEST["slug"]
        ]);
        redirect(dir_template('/admin/categorias'));
    endif;
}
function edit_category()
{
    $cat = new CategoryRepository;
    $parse_url =  get_param('/admin/editar-categorias/:id');
    if (!empty($_POST)) :
        $query = $cat->update([
            "id" => $parse_url["id"],
            "name" => $_REQUEST["name"],
            "slug" => $_REQUEST["slug"]
        ]);
        redirect(dir_template('/admin/categorias'));
    else :
        $_REQUEST = $cat->get_by_id($parse_url["id"]);
    endif;
}
function del_category()
{
    $cat = new CategoryRepository;
    $parse_url =  get_param('/admin/categoria/del/:id');
    $cat->delete($parse_url["id"]);
    redirect(dir_template('/admin/categorias'));
}

function add_coupon()
{
    if (!empty($_POST)) :
        $cat = new CouponRepository;
        $cat->register([
            "code" => $_REQUEST["code"],
            "money" => $_REQUEST["money"],
            "percentage" => $_REQUEST["percentage"]
        ]);
        redirect(dir_template('/admin/cupom'));
    endif;
}
function del_coupon()
{
    $coupon = new CouponRepository;
    $parse_url = get_param('/admin/cupom/deletar/:id');
    $coupon->delete($parse_url["id"]);
    redirect(dir_template('/admin/cupom'));
}

function add_product()
{
    if (!empty($_POST)) :
        $prod = new ProductRepository;
        $rand = time();
        $name = remove_accent($_FILES["photo"]["name"]);
        $name = str_replace(' ', '', $name);
        $name = strtolower($name);
        $name = "{$rand}-{$name}";
        copy($_FILES["photo"]["tmp_name"], __DIR__ . "/../view/upload/product/{$name}");
        $prod->register([
            "name" => $_REQUEST["name"],
            "slug" => $_REQUEST["slug"],
            "price" => $_REQUEST["price"],
            "price_offer" => $_REQUEST["price_offer"],
            "description" => $_REQUEST["description"],
            "photo" => $name,
        ]);
        redirect(dir_template('/admin/produtos'));
    endif;
}
function edit_product()
{
    $prod = new ProductRepository;
    $parse_url =  get_param('/admin/editar-produto/:id');
    if (!empty($_POST)) :
        if (!empty($_FILES["photo"]["name"])) :
            $rand = time();
            $name = remove_accent($_FILES["photo"]["name"]);
            $name = str_replace(' ', '', $name);
            $name = strtolower($name);
            $name = "{$rand}-{$name}";
            $_REQUEST["old_photo"] = $name;
            copy($_FILES["photo"]["tmp_name"], __DIR__ . "/../view/upload/product/{$name}");
        endif;
        $prod->update([
            "id" => $parse_url["id"],
            "name" => $_REQUEST["name"],
            "slug" => $_REQUEST["slug"],
            "price" => $_REQUEST["price"],
            "price_offer" => $_REQUEST["price_offer"],
            "description" => $_REQUEST["description"],
            "photo" => $_REQUEST["old_photo"],
        ]);
        redirect(dir_template('/admin/produtos'));
    else :
        $_REQUEST = $prod->get_by_id($parse_url["id"]);
    endif;
}
function del_product()
{
    $prod = new ProductRepository;
    $parse_url =  get_param('/admin/produto/del/:id');
    $prod->delete($parse_url["id"]);
    redirect(dir_template('/admin/produtos'));
}
function get_details_client()
{
    $parse_url =  get_param('/admin/clientes-detalhe/:id');
    $client = new ClientRepository;
    $address = new AddressRepository;
    return [
        "user" => $client->get_by_id($parse_url['id']),
        "address" => $address->list($parse_url['id'])
    ];
}
function the_name_admin()
{
    return $_SESSION["ADMIN_NAME"];
}
function get_id_cart()
{
    if (empty($_SESSION['CART'])) :
        $ref   = md5(uniqid());
        $order = new OrderRepository;
        $order->create($ref);
        $_SESSION["CART"] = $ref;
    endif;
    return $_SESSION["CART"];
}
function cart_clear()
{
    unset($_SESSION["CART"]);
}
function is_cart()
{
    return !empty($_SESSION["CART"]);
}
function add_prod()
{
    $corruent_client = client_is_logged();
    $url = get_param('/api/v1/cart/add/:prod_id/:quant');
    $ref = get_id_cart();
    $iten = new ItenRepository;
    $iten->add($ref, $url["prod_id"], $url["quant"]);
    if ($corruent_client) {
        $os = new OrderRepository;
        $os->update_user($ref, $corruent_client);
    }
    echo json_encode(cart_calc());
}
function del_prod()
{
    $url = get_param('/api/v1/cart/del/:prod_id');
    $ref = get_id_cart();
    $iten = new ItenRepository;
    $iten->delete($ref, $url["prod_id"]);
    echo json_encode(cart_calc());
}
function calc_frete( $distance = 0 )
{
    $fretes = new DeliveryRepository;
    $list_calc_frete = [];
    $lista = $fretes->list( [
        "offset" => 0,
        "max_result" => 1000
    ] );    
    foreach( $lista as $address):
        $range_max = $address["address"];
        if( $distance <= $range_max  ) :
            $list_calc_frete[] = floatval($address["money"] );
        endif;
    endforeach;
    $min = 0;
    if( count($list_calc_frete) > 0 ):
        $min = min( $list_calc_frete );
    endif;
    return $min;    
}
function cart_calc($id = null)
{
    $ref = $id ? $id : get_id_cart();
    $producty = new ProductRepository;
    $iten = new ItenRepository;
    $os = new OrderRepository;
    $order = $os->get_by_ref($ref);
    $prods = $iten->list($ref);
    $total = 0;
    $prods = array_map(function ($prod) use ($producty, &$total) {
        $info = $producty->get_by_id($prod["product_id"]);
        $subtotal = $info["price_offer"] * $prod["quantity"];
        $total += $subtotal;
        return [
            "id" => $info["id"],
            "name" => utf8_encode($info["name"]),
            "price" =>  $info["price_offer"],
            "price_html" => number_format(+$info["price_offer"], 2, ',', '.'),
            "sub_total" => $subtotal,
            "sub_total_html" => number_format(+$subtotal, 2, ',', '.'),
            "quantity" => $prod["quantity"],
            "photo" => dir_template('/view/upload/product/') . utf8_encode($info["photo"]),
        ];
    }, $prods);
    $metas = get_meta($order["id"]);
    $metas_meta = get_meta($ref);
    $fee = [];
    $total_fee = 0;
    if( !empty( $metas_meta["COUPON"] ) ):
        $coupon = new CouponRepository; 
        $desconto = $coupon->get_by_code($metas_meta["COUPON"]);
        $money = $desconto["money"];
        $percentage = empty( $desconto["percentage"] ) ? 0 : $desconto["percentage"] ;
        $cal_percent = $total * $percentage / 100;
        $total_fee = ($money + $cal_percent ) - $total_fee;
        $fee['coupon'] = -($money + $cal_percent );
        $fee['coupon_html'] = number_format(-$money, 2, ',', '.');
        $fee['coupon_porcentage_html'] = $cal_percent;
    endif;
    $os->update_total($ref, $total);
    $is_adrress = get_meta($order["id"], 'ADDRESS_SEND');
    $is_adrress = explode(' ', $is_adrress["ADDRESS_SEND"]);
    $is_adrress = end( $is_adrress );
    $price_frete = calc_frete( floatval($is_adrress) );
    if( $price_frete > 0 ) {
        set_meta($order["id"], 'FEE_FRETE', $price_frete);
        set_meta($order["id"], 'FEE_FRETE_HTML',number_format($price_frete, 2, ',', '.'));
        set_meta($order["id"], 'TYPE_SEND', 'delivery');
        $total_fee += $price_frete;
    }else {
        set_meta($order["id"], 'FEE_FRETE', 0);
        set_meta($order["id"], 'FEE_FRETE_HTML', '00,00');
        set_meta($order["id"], 'TYPE_SEND', 'takeway');        
    }
    return [
        "client_id" => $order["client_id"],
        "id" => $order["id"],
        "numero" => $order["id"] + 1200,
        "ref" => $ref,
        "prods" => $prods,
        "total" => $total,
        "total_fee" => $total - $total_fee,
        "total_html" => number_format(+$total, 2, ',', '.'),
        "total_fee_html" => number_format($total - $total_fee, 2, ',', '.'),
        "meta" => array_merge( $metas, $metas_meta ),
        "fee" => $fee,
        "address" => ""
    ];
}
function get_meta($post_id)
{
    $meta = new MetaRepository;
    return $meta->list($post_id);
}
function set_meta($post_id, $relation, $content)
{
    $meta = new MetaRepository;
    $meta->set($post_id, $relation, $content);
}
function set_cart_method()
{
    $ref = get_id_cart();
    $os = new OrderRepository;
    $order = $os->get_by_ref($ref);
    $content = $_REQUEST['text'];
    set_meta($order["id"], 'TYPE_SEND', $content);
    echo json_encode(cart_calc());
}
function set_cart_address()
{
    $ref = get_id_cart();
    $os = new OrderRepository;
    $order = $os->get_by_ref($ref);
    $content = $_REQUEST['text'];
    set_meta($order["id"], 'ADDRESS_SEND', $content);
    echo json_encode(cart_calc());
}
function client_login()
{
    client_public();
    if (!empty($_REQUEST)) :
        $email = $_REQUEST["email"] ?? '';
        $pass = $_REQUEST["pass"] ?? '';
        $client = new ClientRepository;
        $is_client = $client->login($email, $pass);
        if (!empty($is_client)) :
            $_SESSION["CLIENT"] = $is_client[0]["id"];
            redirect(dir_template('/perfil'));
        else :
            $GLOBALS['error'] = "Usuário ou senha esta errado";
        endif;
    endif;
}
function client_is_logged()
{
    return $_SESSION["CLIENT"] ?? false;
}
function client_public()
{
    if (admin_is_logged()) :
        redirect(dir_template('/perfil'));
    endif;
}
function client_private()
{
    if (!admin_is_logged()) :
        redirect(dir_template('/login'));
    endif;
}
function client_logout()
{
    session_destroy();
    redirect(dir_template('/login'));
}
function get_client($id = false)
{
    $client_id = $id ? $id : client_is_logged();
    $client = new ClientRepository;
    return $client->get_by_id($client_id);
}
function client_perfil()
{
    if (!empty($_POST)) :
        $client = get_client();
        $cl = new ClientRepository;
        $cl->update([
            "name" => $_POST["name"],
            "last_name" => $_POST["last_name"],
            "phone" => $_POST["phone"],
            "whatsapp" => $_POST["whatsapp"],
            "id" => $client['id'],
        ]);
    endif;
    $client = get_client();
    $_GET = $client;
}
function client_alter_pass()
{
    if (!empty($_POST)) :
        if ($_POST["pass"] == $_POST["confirm_pass"]) :
            $client = get_client();
            $cl = new ClientRepository;
            $cl->alterPassword($client['id'], $_POST["pass"]);
            redirect(dir_template('/perfil'));
        else :
            $GLOBALS['error'] = true;
        endif;
    endif;
}
function client_moradas()
{
    if (!empty($_POST)) :
        $address =  new AddressRepository;
        if (!empty($_POST["id"])) :
            $address->update($_POST);
        else :
            $address->register($_POST);
        endif;
    endif;
}
function gravatar($email)
{
    $hash =  md5(strtolower(trim($email)));
    return "https://www.gravatar.com/avatar/{$hash}?s=200";
}
function get_moradas($id = false)
{
    $client_id = $id ? $id : client_is_logged();
    $address =  new AddressRepository;
    return $address->list($client_id);
}
function get_may_os()
{
    $os = new OrderRepository;
    $client_id = client_is_logged();
    return $os->get_by_client_id($client_id);
}
function me_registar()
{
    if (!empty($_POST)) :
        if ($_POST["pass"] == $_POST["confirm_pass"]) :
            $client = new ClientRepository;
            $exist  = $client->email_exist($_POST["email"]);
            if (empty($exist)) :
                $client->register($_POST["name"], $_POST["email"], $_POST["pass"]);
                $new_user = $client->email_exist($_POST["email"]);
                $_SESSION["CLIENT"] = $new_user[0]["id"];
                redirect(dir_template('/perfil'));
            else :
                $GLOBALS['error'] = 'Email já cadastrado';
            endif;
        else :
            $GLOBALS['error'] = 'As senhas tem que ser igual';
        endif;
    endif;
}
function set_coupon()
{
    $coupon = new CouponRepository;
    $url = get_param('/api/v1/cart/coupon/:code');
    $code = $url["code"];
    $order_ref = get_id_cart();
    $is_coupon = $coupon->get_by_code($code);
    if (!empty($is_coupon)):
        set_meta( $order_ref, 'COUPON', $code );
    endif;
    echo json_encode(cart_calc());
}
function get_address_kaiso()
{
    return [
        "logadouro" => "R. Carlos Reis",
        "post_code" => "1600-216",
        "city" => "Lisboa",
        "lat" => 38.743638,
        "long" => -9.156017
    ];
}
function get_distance($origem_lat, $origen_long, $destino_lat, $destino_long)
{
    $origem_lat = deg2rad($origem_lat);
    $origen_long = deg2rad($origen_long);
    $destino_lat = deg2rad($destino_lat);
    $destino_long = deg2rad($destino_long);

    $latitude = $origem_lat - $destino_lat;
    $longitude = $origen_long - $destino_long;

    $distancia_km = 2 * asin(sqrt(pow(sin($latitude / 2), 2) +
    cos($destino_lat) * cos($origem_lat) * pow(sin($longitude / 2), 2)));
    $distancia_km = $distancia_km * 6371;
    return floatval( number_format($distancia_km, 2, '.', '') );

}
function get_distance_kaiso( $lat, $long )
{
    $kayso = get_address_kaiso();
    return get_distance( $kayso['lat'], $kayso["long"], $lat, $long );
}
function get_address( ) {
    $address = file( __DIR__ . "/../view/banco/pt_postal_codes.csv" );
    $address = array_map( function( $local ) {
        $local = explode( ',', $local );
        return [
            "logadouro" =>  utf8_encode( $local[1] ) . " " . $local[0],
            "post_code" => $local[0],
            "city" => $local[2],
            "distance" => get_distance_kaiso( floatval($local[5]), floatval($local[6]) ) ,        
        ];
    }, $address );
    return $address;
}
function search_address( $term )
{
    $term = trim($term);
    $term = str_replace('-', '', $term);
    $term = cliear_string($term);
    $address = file_get_contents( __DIR__ . "/../view/banco/postcode.txt" );
    $address = utf8_encode( $address );
    $address = explode(";", $address);
    $address = array_filter( $address, function( $local ) use ( $term ) {
        return stripos(  $local,  $term ) !== false ;
    } );
    return $address;
}
function get_address_search( )
{
    $search = empty($_REQUEST["search"]) ? false :  $_REQUEST["search"];
    if($search) :
        $address = search_address($search);
        echo json_encode( array_values( $address ) );
        return null;
    endif;
    echo json_encode( [] );
}
function render_post_code()
{
    // var_dump(get_address());
    // 'logadouro' => string 'Place Name Postal Code' (length=22)
    //   'post_code' => string 'Postal Code' (length=11)
    //   'city' => string 'State' (length=5)
    //   'distance' => float 4408.28
    $address = '';
    foreach( get_address() as $local ) {
        $logadouro = utf8_decode($local['logadouro']);
        $address .= "{$logadouro } {$local['city']} {$local['distance']};"; 
    }
    $address = trim( $address );
    $address = cliear_string( $address );
    $address = str_replace('-', '', $address );
    echo $address ;
    // file_put_contents( __DIR__ . "/../view/banco/postcode-2.txt", $address );
}
function set_log( $message )
{
    file_put_contents( __DIR__ . "/../.log", date( "d-m-Y H:i" ) . " $message \n", FILE_APPEND);
}

function eu_pago()
{
    $eupago = new EuPagoRest;
    $res = $eupago->multibanco_create( [
        "valor" => 122.5,
        "id" => "Exemplo-em-JSON",
        "data_inicio" => "2020-12-01",
        "data_fim" => "2021-01-15",
        "valor_minimo" => "122.5",
        "valor_maximo" => "122.5",
        "per_dup" => "0"
    ] );
    var_dump( $res );
}
function editar_detalhes_pedidos()
{
    admin_private();
    $url = "/admin/pedidos-visualizar/:id";
    $params = get_param($url);
    $pedido_ref = $params["id"];
    if( isset( $_REQUEST["status"] ) ) :
        $status = $_REQUEST["status"];
        $os = new OrderRepository;
        $os->update_status($pedido_ref, $status );
    endif;
    if( isset( $_REQUEST["del"] ) ) :
        $prod_id = $_REQUEST["del"];
        $iten = new ItenRepository;
        $iten->delete( $pedido_ref, $prod_id );
    endif;
    if( isset( $_REQUEST["quantity"] ) ) :
        $quantity = $_REQUEST["quantity"];
        $prod_id = $_REQUEST["prod_id"];
        $item = new ItenRepository;
        $item->add($pedido_ref, $prod_id, $quantity);
    endif;
    if( isset( $_REQUEST["add_prod_id"] ) ) :
        $quantity = $_REQUEST["quant"];
        $prod_id = $_REQUEST["add_prod_id"];
        $item = new ItenRepository;
        $item->add($pedido_ref, $prod_id, $quantity);
    endif;
    if( isset( $_REQUEST["coupon"] ) ) :
        $code = $_REQUEST["coupon"];
        $coupon = new CouponRepository;
        $is_coupon = $coupon->get_by_code($code);
        if (!empty($is_coupon)):
            set_meta( $pedido_ref, 'COUPON', $code );
        endif;
    endif;
}
// http://www.diogomatheus.com.br/blog/php/configurando-o-php-para-enviar-email-no-windows-atraves-do-gmail/
// mail( 'br.rafael@outlook.com', 'teste off', 'mensagem de teste' );