<?php
// Check if the cart session variable is set
$nProducts = 0;
$totalPrice = 0.0;
if (isset($_SESSION['cart'])) {
    $nProducts = isset($_SESSION['quantity']) ? $_SESSION['quantity'] : 0;
    $totalPrice = isset($_SESSION['total_price']) ? $_SESSION['total_price'] : 0.0;
}
include __DIR__.'/../vistes/v_get_info_compra.php';
?>