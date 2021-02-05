
<?php
function teste($a){
    if($a == "abandoned"){
        $a = "Abandonado";
    }
    elseif($a == "waiting"){
        $a = "Esperando";
    }
    elseif($a == "finshed"){
        $a = "Concluído";
    }
    elseif($a == "canceled") {
        $a = "Cancelado";
    }
    return $a;
}

function corretorNum($a){
    return number_format($a, 2, ",", ".");
}

function estadoPedido($a){$result = get_meta($a);
    return $result["TYPE_SEND"] ?? "Não definido";
}