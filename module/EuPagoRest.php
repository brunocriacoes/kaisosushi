<?php
class EuPagoRest
{
    const CLIENT_ID = "4741247f40244b04aef01ef66f704602";
    const KEY_API = "be7d-e267-6f99-131b-6a85";
    const KEY_API_DEV = 'xxxx-xxxx-xxxx-xxxx-xxxx';
    const SECRET = "4abaeca304e0415c82f82026e5bd8827";
    const SAND_BOX = 'https://sandbox.eupago.pt/clientes/rest_api';
    const PROD_URI = 'https://clientes.eupago.pt/clientes/rest_api';
    const REQUEST_TIMEOUT = 3;
    function web_hook()
    {
        return $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . "/webhook";
    }
    function post( $path, $params )
    {

        $full_url = self::PROD_URI .  $path;
        // set_log( "POST $full_url PARANS ". json_encode( $params ) );
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
        // set_log( "RESPONSE $full_url BODY " . json_encode($result) );
        return $result;
    }
    function multibanco_create( $params )
    {
        return $this->post( '/multibanco/create', [
            "chave" => self::KEY_API,
            "valor" => floatval($params['valor']) ,
            "id" => (string) $params['id'],
            "data_inicio" => (string) $params['data_inicio'],
            "data_fim" => (string) $params['data_fim'],
            "valor_maximo" => floatval($params['valor_maximo']) ,
            "valor_minimo" => floatval($params['valor_minimo']) ,
            "per_dup" => (boolean) $params['per_dup'],
        ] );
    }
    function multibanco_info( $params )
    {
        return $this->post( '/multibanco/info', [
            "chave" => self::KEY_API,
            "referencia" => floatval($params['referencia']),
            "entidade" => floatval($params['entidade'])
        ] );
    }
    function cc_purchase_tds( $params )
    {
        return $this->post( '/cc/purchase_tds', [
            "chave" => self::KEY_API,
            "valor" => floatval($params['referencia']),
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
            "valor" => floatval($params['referencia']),
            "id" => (string) $params['id'],
            "alias" => (int) $params['alias'], //9 digitos
            "descricao" => (string) $params['descricao'],
        ] );        
    }
    function payshop_create( $params )
    {
        return $this->post( '/payshop/create', [
            "chave" => self::KEY_API,
            "valor" => floatval($params['referencia']),
            "id" => (string) $params['id'],
        ] );
    }
    function paysafecard_create( $params )
    {
        return $this->post( '/paysafecard/create', [
            "chave" => self::KEY_API,
            "valor" => floatval($params['referencia']),
            "id" => (string) $params['id'],
            "url_retorno" => $this->web_hook(),
        ] );
    }
}