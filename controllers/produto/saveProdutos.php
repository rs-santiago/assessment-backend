<?php 
require_once('../../models/Produto.php');
$produto = new Produto();

$produto->produto_nome = $_POST['name'];
$produto->produto_sku = $_POST['sku'];
$produto->produto_preco = $_POST['price'];
$produto->produto_descricao = $_POST['description'];
$produto->produto_qtd = $_POST['quantity'];

foreach ($_POST['category'] as $key => $value) {
    $produto->produto_categorias[] = $value;
}
$produto->save();

?>