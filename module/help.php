<?php

function get_whatsapp() { return $_ENV['LINK_WATSAPP']; }
function get_email() { return $_ENV['EMAIL']; }
function get_title_site() { return $_ENV['TITLE_SITE']; }
function get_facebook() { return $_ENV['LINK_FACEBOOK']; }
function get_instagram() { return $_ENV['LINK_INSTAGRAM']; }
function get_fidelidade() { return $_ENV['LINK_FIDELIDADE']; }
function get_banner() {
    $banner = new BannerRepository;
    return $banner->list();
}