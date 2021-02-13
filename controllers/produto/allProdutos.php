<?php
require_once('../../models/Produto.php');

$produto = new Produto();
$produtos = $produto->getAll();

foreach ($produtos as $key => $value) {
    $categorias = $produto->categorias($value['produto_id']);
    $produtos[$key]['categorias'] = $categorias;
}

die(json_encode($produtos));
?>