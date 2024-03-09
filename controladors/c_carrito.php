<?php
require_once __DIR__.'/../models/m_connectaBD.php';
require_once __DIR__.'/../models/m_productes.php';

    if(isset($_SESSION['cart']))
    {
        $cart = $_SESSION['cart'];
        foreach ($cart as $id => $quantity)
        {
            $cart[$id] = getProductById($id);
            $cart[$id]['quantity'] = $quantity;
        }
    }

    $total = isset($_SESSION['total_price']) ? $_SESSION['total_price'] : 0.0;
    include __DIR__.'/../vistes/v_carrito.php';
?>