<?php

require_once __DIR__.'/../models/m_connectaBD.php';
require_once __DIR__.'/../models/m_productes.php';

$products = getAllProducts();

include __DIR__.'/../vistes/v_llistar_tots_productes.php';
?>