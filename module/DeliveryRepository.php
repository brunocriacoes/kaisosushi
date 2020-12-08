<?php
class DeliveryRepository
{
    function register(array $params)
    {
        query("INSERT INTO delivery ( address, type, money ) VALUES ( '{$params['address']}', '{$params['type']}', '{$params['money']}' ) ");
    }
    function update(array $params)
    {
        $sql = "UPDATE delivery SET address='{$params['address']}', type='{$params['type']}', money='{$params['money']}' WHERE id={$params['id']} ";
        return query($sql);
    }
    function delete($id)
    {
        query("DELETE FROM delivery WHERE id=$id");
    }
    function list(array $params)
    {
        return query("SELECT * FROM delivery LIMIT {$params['offset']},{$params['max_result']}");
    }
    function get_by_id($id)
    {
        $sql = "SELECT * FROM delivery WHERE id={$id}";
        $query = query($sql);
        return $query[0];
    }
    function search(array $params)
    {
        return query("SELECT * FROM delivery WHERE CONCAT( delivery.address, delivery.post_code ) LIKE '%{$params['address']}%' AND type='{$params['type']}'");
    }
}
