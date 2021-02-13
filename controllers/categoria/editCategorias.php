<?php
require_once('../../models/Categoria.php');
$categoria = new Categoria();
$categoria->categoria_nome = $_POST['category-name'];
$categoria->update($_POST['category-code']);

?>