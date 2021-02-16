
<?php
function tradutor($a){
    if($a == "abandoned"){
        $a = "Abandonado";
    }
    elseif($a == "waiting"){
        $a = "Esperando pagamento";
    }
    elseif($a == "finished"){
        $a = "Pago";
    }
    elseif($a == "canceled") {
        $a = "Cancelado";
    }
    elseif($a == "delivery"){
        $a = "Entrega";
    }
    elseif($a == "takeway"){
        $a = "Retirada";
    }
    return $a;
}

function corretorNum($a){
    return number_format($a, 2, ",", ".");
}

function estadoPedido($a){$result = get_meta($a);
    return $result["TYPE_SEND"] ?? "Não definido";
}

function selecPedidoStatus($status, $option) {
    if($status == $option) {
        return "selected";
    }else {
        return "";
    }
}
function selectCreator($status) {
    $os = new OrderRepository;
    $statusCollection = $os->get_status();
    
    foreach($statusCollection as $indice => $valor) {
        $traducao = tradutor($indice);
        $selected = selecPedidoStatus($status, $indice);
        echo "<option value='".$indice."' ".$selected.">" .$traducao. "</option>" ;
    }
}


function arrayteste($os) {
    if(array_key_exists('COUPON', $os['meta'])){
        return $os['meta']['COUPON'];
    }else {
        return "";
    }
}