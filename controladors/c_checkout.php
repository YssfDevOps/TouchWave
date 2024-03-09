<?php
    require_once __DIR__.'/../models/m_connectaBD.php';
    require_once __DIR__.'/../models/m_productes.php';
    require_once __DIR__.'/../models/m_comandes.php';

    $response = json_encode(array('fail' => true));
    if(isset($_SESSION['user_data']) && isset($_SESSION['cart']))
    {
        if($_SESSION['quantity'] > 0)
        {
            // Crear nova comanda
            $commanda = newCommanda(array(date("d/m/Y"), $_SESSION['quantity'], $_SESSION['total_price'], $_SESSION['user_data']['id']));

            $subComandes = [];
            $dataProductes = [];
            // Afegir productes a la comanda
            $cart = $_SESSION['cart'];
            $matrixSize = count($cart);
            foreach ($cart as $id => $quantity)
            {
                $productData = getProductById($id);
                updateStock(array($productData['id'], $productData['quantitat'] - $quantity)); // Update the stock with the new quantity
                $subComandes[] = addLineToCommand(array($productData['nom'], $quantity, $productData['preu'], $productData['preu']*$quantity, $commanda['id'], $id));
                $dataProductes[] = $productData;
            }

            // Buidar Carro
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

            $nextDate = genNextDate($commanda['data_creacio']);

            include __DIR__.'/../vistes/v_resum_comanda.php';
        }
        else{
            header('Content-Type: application/json');
            include __DIR__.'/../vistes/v_response.php';
        }
    }
    else{
        header('Content-Type: application/json');
        include __DIR__.'/../vistes/v_response.php';
    }
?>