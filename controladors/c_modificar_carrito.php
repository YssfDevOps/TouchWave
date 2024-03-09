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
        if ($productId !== null && $quantity !== null && isset($_SESSION['cart'])) {
            // Return success message
            $productData = getProductById($productId);
            $quantity = $quantity > $productData['quantitat'] ? $productData['quantitat'] : $quantity;
            if (isset($_SESSION['cart'][$productId]) && $productData){
                $response = 'success';
                // subtract from the total (considering its updated by 1 per request)
                $_SESSION['total_price'] += $productData['preu'] * ($quantity - $_SESSION['cart'][$productId]);
                $_SESSION['quantity'] += ($quantity - $_SESSION['cart'][$productId]);

                // Update session based on quantity
                if ($quantity <= 0)
                {
                    unset($_SESSION['cart'][$productId]);
                }
                else
                {
                    // Update or add the quantity for the specified product
                    $_SESSION['cart'][$productId] = $quantity;
                }
            }
        }
    }

    include __DIR__.'/../vistes/v_response.php';
?>