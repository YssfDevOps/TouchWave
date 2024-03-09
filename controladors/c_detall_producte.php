<?php

require_once __DIR__.'/../models/m_connectaBD.php';

require_once __DIR__.'/../models/m_categories.php';
require_once __DIR__.'/../models/m_productes.php';

$productId = $_GET['product_id'] ? (int) $_GET['product_id'] : 1;

$product = getProductById($productId);

$categoria = getCategoryById((int) $product['categoria_id'])['nom'];

include __DIR__.'/../vistes/v_detall_producte.php';
?>