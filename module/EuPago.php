<?php
class EuPago
{
    const CLIENT_ID = "4741247f40244b04aef01ef66f704602";
    CONST KEY_API = "be7d-e267-6f99-131b-6a85";
    const KEY_API_DEV = 'demo-xxxx-xxxx-xxxx-xxx';
    CONST SECRET = "4abaeca304e0415c82f82026e5bd8827";
    const DEV = "https://sandbox.eupago.pt/replica.eupagov14.wsdl";
    const PROD = "https://clientes.eupago.pt/eupagov16.wsdl";
   
    protected function money_format( $money ) {
        return number_format( $money, 2, '.', '' );
    }
    public function pay_mbw($money, $order_id, $phone)
    {
        $client = new SoapClient( self::DEV, array('cache_wsdl' => WSDL_CACHE_NONE));
        $res = $client->pedidoMBW(array(
            "chave" => self::KEY_API,
            "valor" => $this->money_format($money),
            "id" => $order_id,
            "alias" => $phone
          ));
        var_dump($res);
        return $res;
    }
}