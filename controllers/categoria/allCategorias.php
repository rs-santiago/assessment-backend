<?php
require_once('../../models/Categoria.php');

$categoria = new Categoria();
$categorias = $categoria->getAll();
die(json_encode($categorias));

?>