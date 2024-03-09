<?php

    if(isset($_SESSION['cart']))
    {
        unset($_SESSION['cart']);
    }
    if(isset($_SESSION['total_price']))
    {
        unset($_SESSION['total_price']);
    }
    if(isset($_SESSION['quantity']))
    {
        unset($_SESSION['quantity']);
    }

    $response = isset($_SESSION['cart']) || isset($_SESSION['total_price']) || isset($_SESSION['quantity']) ? 'failed' : 'success';

    include __DIR__.'/../vistes/v_response.php';
?>