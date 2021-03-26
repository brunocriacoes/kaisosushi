<?php
$headers = "From: contato@kaisosushi.pt" . "\r\n";
var_dump( mail( 'br.rafael@outlook.com', 'teste', 'ok', $headers) );