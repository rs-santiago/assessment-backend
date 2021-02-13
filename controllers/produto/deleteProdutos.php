<?php
require_once('../../models/Produto.php');
$produto = new Produto();

$produto->delete($_POST['produto-id']);

?>