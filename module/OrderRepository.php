<?php
class OrderRepository
{
    function create( $ref )
    {
        $date_register = date('Y-m-d');
        $date_update   = date('Y-m-d');
        $sql = "INSERT INTO `order` ( client_id, date_register, date_update, ref, total, status )  VALUES ( '0', '$date_register', '$date_update', '{$ref}','0.0', 'abandoned' )";
        query($sql);
    }
    function get_status()
    {
        return [
            "abandoned" => "abandonado",
            "canceled" => "cancelado",
            "finished" => "finalizado",
            "waiting" => "aguardando"
        ];
    }
    function get_metas()
    {
        return [
            "TYPE_SEND",
            "ADDRESS_SEND"
        ];
    }
    function update_total($ref, $total)
    {
        $date_update = date('Y-m-d');
        query("UPDATE `order` SET total={$total}, date_update='{$date_update}'  WHERE ref='{$ref}'");
    }
    function delete(int $id)
    {
        query("DELETE FROM `order` WHERE id='{$id}'");
    }
    function list(array $params)
    {
        $sql = "SELECT * FROM `order` LIMIT {$params['offset']},{$params['max_result']}";
        return query($sql);
    }
    function about(int $order_id)
    {
        return query("SELECT * FROM `order` WHERE id=$order_id");
    }
    function get_by_ref($ref)
    {
        $sql = "SELECT * FROM `order` WHERE ref='{$ref}'";
        $query = query($sql);
        return $query[0];
    }
}
