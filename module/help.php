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
    return !empty( $_SESSION["CART"] );
}
function add_prod()
{
    $corruent_client = client_is_logged();
    $url = get_param('/api/v1/cart/add/:prod_id/:quant');
    $ref = get_id_cart();
    $iten = new ItenRepository;
    $iten->add($ref, $url["prod_id"], $url["quant"]);
    if( $corruent_client ) {
        $os = new OrderRepository;
        $os->update_user($ref, $corruent_client);
    }
    echo json_encode( cart_calc() );
}
function del_prod()
{
    $url = get_param('/api/v1/cart/del/:prod_id');
    $ref = get_id_cart();
    $iten = new ItenRepository;
    $iten->delete($ref, $url["prod_id"]);
    echo json_encode( cart_calc() );
}
function cart_calc( $id = null )
{
    $ref = $id ? $id : get_id_cart();
    $producty = new ProductRepository;
    $iten = new ItenRepository;
    $os = new OrderRepository;
    $order = $os->get_by_ref($ref);
    $prods = $iten->list( $ref );
    $total = 0;
    $prods = array_map( function($prod) use ($producty, &$total) {
        $info = $producty->get_by_id($prod["product_id"]);
        $subtotal = $info["price_offer"] * $prod["quantity"];
        $total += $subtotal;
        return [
            "id" => $info["id"],
            "name" => utf8_encode( $info["name"] ),
            "price" =>  $info["price_offer"] ,
            "price_html" => number_format(+$info["price_offer"], 2, ',', '.'),
            "sub_total" => $subtotal,
            "sub_total_html" => number_format(+$subtotal, 2, ',', '.'),
            "quantity" => $prod["quantity"],
            "photo" => dir_template( '/view/upload/product/' ) . utf8_encode( $info["photo"] ),
        ];
    }, $prods );
    $metas = get_meta($order["id"]);
    $os->update_total($ref, $total);
    return [
        "client_id" => $order["client_id"],
        "id" => $order["id"],
        "numero" => $order["id"] + 1200,
        "ref" => $ref,
        "prods" => $prods,
        "total" => $total,
        "total_html" => number_format(+$total, 2, ',', '.'),
        "coupon" => '',
        "meta" => $metas,
        "fee" => [],
        "address" => ""
    ];
}
function get_meta( $post_id )
{
    $meta = new MetaRepository;
    return $meta->list( $post_id );
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
    set_meta( $order["id"], 'TYPE_SEND', $content );
    echo json_encode( cart_calc() );
}
function set_cart_address()
{
    $ref = get_id_cart();
    $os = new OrderRepository;
    $order = $os->get_by_ref($ref);
    $content = $_REQUEST['text'];
    set_meta( $order["id"], 'ADDRESS_SEND', $content );
    echo json_encode( cart_calc() );
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
    if( !empty($_POST) ):
        $client = get_client();
        $cl = new ClientRepository;
        $cl->update( [
            "name" => $_POST["name"],
            "last_name" => $_POST["last_name"],
            "phone" => $_POST["phone"],
            "whatsapp" => $_POST["whatsapp"],
            "id" => $client['id'],
        ] );
    endif;
    $client = get_client();
    $_GET = $client;
}
function client_alter_pass()
{
    if( !empty($_POST) ):
        if( $_POST["pass"] == $_POST["confirm_pass"] ):
            $client = get_client();
            $cl = new ClientRepository;
            $cl->alterPassword( $client['id'], $_POST["pass"] );
            redirect(dir_template('/perfil'));
        else:
            $GLOBALS['error'] = true;
        endif;
    endif;
}
function client_moradas()
{
    if( !empty( $_POST ) ) :
        $address =  new AddressRepository;
        if( !empty( $_POST["id"] ) ) :
            $address->update($_POST);
        else:
            $address->register($_POST);
        endif;
    endif;
}
function gravatar( $email )
{
   $hash =  md5( strtolower( trim( $email ) ) );
   return "https://www.gravatar.com/avatar/{$hash}?s=200";
}
function get_moradas( $id = false )
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
    if( !empty($_POST) ):
        if( $_POST["pass"] == $_POST["confirm_pass"] ):
            $client = new ClientRepository;
            $exist  = $client->email_exist($_POST["email"]);
            if( empty( $exist ) ) :
                $client->register( $_POST["name"], $_POST["email"], $_POST["pass"]);
                $new_user = $client->email_exist($_POST["email"]);
                $_SESSION["CLIENT"] = $new_user[0]["id"];
                redirect(dir_template('/perfil'));
            else:
                $GLOBALS['error'] = 'Email já cadastrado';
            endif;
        else:
            $GLOBALS['error'] = 'As senhas tem que ser igual';
        endif;
    endif;    
}

// http://www.diogomatheus.com.br/blog/php/configurando-o-php-para-enviar-email-no-windows-atraves-do-gmail/
// mail( 'br.rafael@outlook.com', 'teste off', 'mensagem de teste' );