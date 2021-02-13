<?php
require_once('../../models/Categoria.php');
$categoria = new Categoria();

$categorias = $categoria->getById($_GET['categoria-id']);
die(json_encode($categorias));
?>