
<?php
function tradutor($a){
    $termos = [
        "abandoned" => "Abandonado",
        "waiting" => "Esperando pagamento",
        "canceled" => "Cancelado",
        "delivery" => "Entrega",
        "finished" => "Pago",
        "takeway" => "Retirada",
        "preparing" => "Em preparação",
        "en_route" => "A caminho",
        "delivered" => "Entregue",
    ];
    return $termos[$a] ?? $termos;
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
function selectCreator($status, $prefix = '') {
    $os = new OrderRepository;
    $statusCollection = $os->get_status();
    
    foreach($statusCollection as $indice => $valor) {
        $traducao = tradutor($indice);
        $selected = selecPedidoStatus($status, $indice);
        echo "<option value='{$prefix}".$indice."' ".$selected.">" .$traducao. "</option>";
    }
}