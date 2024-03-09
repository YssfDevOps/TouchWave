<?php

    #Comprovar si hi ha sessio activa
    $userName = isset($_SESSION['user_data']) ? $_SESSION['user_data']['nom'] : "NULL";
    $userImage = isset($_SESSION['user_data']) ? $_SESSION['user_data']['imatge'] : "NULL";
    $nProducts = isset($_SESSION['quantity']) ? $_SESSION['quantity'] : 0;
    $totalPrice = isset($_SESSION['total_price']) ? $_SESSION['total_price'] : 0.0;
    include __DIR__.'/../vistes/v_header.php';
    # Necesitamos coger el path de la foto del perfil.
?>