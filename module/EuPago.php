<?php
class EuPago
{
    const CLIENT_ID = "4741247f40244b04aef01ef66f704602";
    CONST KEY_API = "be7d-e267-6f99-131b-6a85";
    CONST SECRET = "4abaeca304e0415c82f82026e5bd8827";
    const DEV = "https://sandbox.eupago.pt/replica.eupagov14.wsdl";
    const PROD = "https://clientes.eupago.pt/eupagov16.wsdl";
    public function post($path,  $params = [], $is_json = false)
    {
        $full_url = self::URL_API . $path;
        set_log( "POST $full_url PARANS ". json_encode( $params ) );
        $params = $is_json ? http_build_query($params) : json_encode($params);
        $defaults = [
            CURLOPT_POST           => true,
            CURLOPT_HEADER         => false,
            CURLOPT_URL            => $full_url,
            CURLOPT_FRESH_CONNECT  => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FORBID_REUSE   => true,
            CURLOPT_TIMEOUT        => self::REQUEST_TIMEOUT,
            CURLOPT_POSTFIELDS     => $params,
            CURLOPT_USERPWD        => self::SECRET,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_HTTPHEADER     => [
                "Content-Type" => "application/json; charset=UTF-8",
                "accept" => "application/json"
            ]
        ];
        $ch = curl_init();
        curl_setopt_array($ch, $defaults);
        $result = curl_exec($ch);
        curl_close($ch);
        var_dump( $full_url );
        $result = json_decode($result);
        set_log( "RESPONSE $full_url BODY " . json_encode($result) );
        return $result;
    }
    public function Authorization()
    {
        $path = "/autorizacaoDD";
    }
    public function PayMBW()
    {
        $path = "/pedidoMBW";
        $param = [
            "valor" => 3.50,
            "chave" => self::KEY_API,
            "id" => uniqid(),
            "admin_callback" => dir_template('/webhook'),
            "campos_extra" => [
              "id" => 0,
              "valor" => "string"
            ],
            "alias" => "string",
            "descricao" => "compra pelo site"
        ];
        $res = $this->post( $path, $param );
        var_dump($res);
    }
}