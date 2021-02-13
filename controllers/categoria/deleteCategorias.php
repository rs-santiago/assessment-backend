<?php
require_once('../../models/Categoria.php');
$categoria = new Categoria();

$categoria->delete($_POST['categoria-id']);

?>