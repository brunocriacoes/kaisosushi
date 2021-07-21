<?php
class EuPagoRest
{
    const KEY_API = "ed4c-3687-af30-106b-d631";
    const PROD_URI = 'https://clientes.eupago.pt/clientes/rest_api';

    // const KEY_API = 'demo-71b4-b43b-f789-c9f';
    // const PROD_URI = 'https://sandbox.eupago.pt/clientes/rest_api';

    const CLIENT_ID = "7debf0ed81174315843f079549675c94";
    const SECRET = "c87932b43d304416b0671aae54bee73d";
    const REQUEST_TIMEOUT = 3;
    function web_hook()
    {
        return $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . "/webhook";
    }
    function post( $path, $params )
    {

        $full_url = self::PROD_URI .  $path;
        set_log( "POST $full_url PARANS ". json_encode( $params ) );
        $params =  http_build_query($params);
        $defaults = [
            CURLOPT_POST           => true,
            CURLOPT_HEADER         => false,
            CURLOPT_URL            => $full_url,
            CURLOPT_FRESH_CONNECT  => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FORBID_REUSE   => true,
            CURLOPT_TIMEOUT        => self::REQUEST_TIMEOUT,
            CURLOPT_POSTFIELDS     => $params,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
        ];
        $ch = curl_init();
        curl_setopt_array($ch, $defaults);
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result);
        set_log( "RESPONSE $full_url BODY " . json_encode($result) );
        return $result;
    }
    function multibanco_create( $params )
    {
        return $this->post( '/multibanco/create', [
            "chave" => self::KEY_API,
            "valor" => floatval($params['total']) ,
            "id" => (string) $params['id'],
            "data_inicio" => (string) date('Y-m-d'),
            "data_fim" => (string) date('Y-m-d'),
            "valor_maximo" => floatval($params['total']) ,
            "valor_minimo" => floatval($params['total']) ,
            "per_dup" => 0,
        ] );
    }
    function multibanco_info( $params )
    {
        return $this->post( '/multibanco/info', [
            "chave" => self::KEY_API,
            "referencia" => $params['referencia'],
            "entidade" => $params['entidade']
        ] );
    }
    function cc_purchase_tds( $params )
    {
        return $this->post( '/cc/purchase_tds', [
            "chave" => self::KEY_API,
            "valor" => floatval($params['total']),
            "id" => (string) $params['id'],
            "numero" => (string) $params['numero'],
            "cripto" => (string) $params['cripto'],
            "validade" => (string) $params['validade'],
            "url_retorno" => $this->web_hook(),
        ] );
    }
    function mbway_create( $params )
    {
        return $this->post( '/mbway/create', [
            "chave" => self::KEY_API,
            "valor" => floatval($params['total']),
            "id" => (string) $params['id'],
            "alias" => (int) $params['paymento_value'], //9 digitos
            "descricao" => 'Compra pelo site',
        ] );        
    }
    function payshop_create( $params )
    {
        return $this->post( '/payshop/create', [
            "chave" => self::KEY_API,
            "valor" => floatval($params['total']),
            "id" => (string) $params['id'],
        ] );
    }
    function paysafecard_create( $params )
    {
        return $this->post( '/paysafecard/create', [
            "chave" => self::KEY_API,
            "valor" => floatval($params['total']),
            "id" => (string) $params['id'],
            "url_retorno" => $this->web_hook(),
        ] );
    }
    function money( $params )
    {
        return (object) [
            "sucesso" => true
        ];
    }
}