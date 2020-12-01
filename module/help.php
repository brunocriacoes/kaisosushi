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
    $string =  preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ç)/","/(Ç)/"),explode(" ","a A e E i I o O u U n N c C"),$string);
    $char = array(' & ', 'ª ', '  (', ') ', '(', ')', ' - ', ' / ', ' /', '/ ', '/', ' | ', ' |', '| ', ' | ', '|', '_', '.', ' ');
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
