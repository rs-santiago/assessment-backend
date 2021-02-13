<?php 
require_once('../../models/Categoria.php');
$categoria = new Categoria();

$categoria->categoria_nome = $_POST['category-name'];
$categoria->categoria_id = $_POST['category-code'];
$categoria->save();

?>