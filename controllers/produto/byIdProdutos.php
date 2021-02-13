<?php
require_once('../../models/Produto.php');
$produto = new Produto();

$produtos = $produto->getById($_GET['produto-id']);
$categorias = $produto->categorias($_GET['produto-id']);
$produtos['categorias'] = $categorias;
die(json_encode($produtos));
?>