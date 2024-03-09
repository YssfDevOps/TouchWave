<?php

require_once __DIR__.'/../models/m_connectaBD.php';
require_once __DIR__.'/../models/m_productes.php';

$categoryId = $_GET['category_id'] ? (int) $_GET['category_id'] : 1;

$products = getProductByCategory($categoryId);

include __DIR__.'/../vistes/v_llistar_productes_categoria.php';
?>