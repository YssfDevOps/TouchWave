<?php
require_once __DIR__.'/../models/m_connectaBD.php';
require_once __DIR__.'/../models/m_productes.php';

$response = 'error';
// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the product ID and quantity from the POST data
    $productId = isset($_POST['product_id']) ? $_POST['product_id'] : null;
    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : null;
    // Check if both product ID and quantity are provided
    if ($productId !== null && $quantity !== null) {
        $productData = getProductById($productId);
        $quantity = $quantity > $productData['quantitat'] ? $productData['quantitat'] : $quantity;
         // Check if the cart session variable is set
        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
            $_SESSION['quantity'] += $quantity;
            $_SESSION['total_price'] += $productData['preu'] * $quantity;
            
            // Update quantity based on what quantity we already had for the update
            if (isset($_SESSION['cart'][$productId])){
                // Check if increasing the quantity exceeds the total
                if ($_SESSION['cart'][$productId] + $quantity > $productData['quantitat']){
                    $_SESSION['quantity'] += $productData['quantitat'] - $_SESSION['cart'][$productId] - $quantity; // Add new quantity and subtract old quantity
                    $_SESSION['total_price'] += $productData['preu'] * ($productData['quantitat'] - $_SESSION['cart'][$productId] - $quantity); // The same with the price
                    $quantity = $productData['quantitat']; //Update quantity to everything
                } else{
                    $quantity += $_SESSION['cart'][$productId];
                }
            }
        }else{
            $_SESSION['quantity']=$quantity;
            $_SESSION['total_price']=$productData['preu']*$quantity;
        }
        // Update or add the quantity for the specified product
        $cart[$productId] = $quantity;

        // Update the cart session variable
        $_SESSION['cart'] = $cart;

        // Return success message
        $response = 'success';
    }
}

include __DIR__.'/../vistes/v_response.php';
?>