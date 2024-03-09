<?php

session_start();
$accio = $_GET['action'] ?? NULL;

$UPLOADS_FULL_PATH = '/home/TDIW/tdiw-l13/public_html/pfp/';
$filesPublicPath = 'pfp/';

switch ($accio) {
    case 'categories':
        require __DIR__.'/recurs_llistar_categories.php';
        break;
    case 'llistar_tots_productes':
        require __DIR__.'/recurs_llistar_productes.php';
        break;
    case 'productes_per_categoria':
        require __DIR__.'/recurs_llistar_productes_categoria.php';
        break;

    case 'detall_producte':
        require __DIR__.'/recurs_detall_producte.php';
        break;
        
    case 'login':
        require __DIR__.'/recurs_login.php';
        break;

    case 'signin':
        require __DIR__.'/recurs_registre.php';
        break;

    case 'mi_cuenta':
        require __DIR__.'/recurs_mi_cuenta.php';
        break;

    case 'logout':
        require __DIR__.'/recurs_logout.php';
        break;        
    case 'comprovar_sessio':
        require __DIR__.'/recurs_comprovar_sessio.php';
        break;
    
    case 'incrementar_cistella':
        require __DIR__.'/recurs_incrementar_cistella.php';
        break;

    case 'get_info_compra':
        require __DIR__.'/recurs_get_info_compra.php';
        break;

    case 'carrito':
        require __DIR__.'/recurs_carrito.php';
        break;

    case 'empty_cart':
        require __DIR__.'/recurs_buidar_carrito.php';
        break;
    
    case 'modificar_cistella':
        require __DIR__.'/recurs_modificar_carrito.php';
        break;

    case 'checkout':
        require __DIR__.'/recurs_checkout.php';
        break;

    case 'mis_pedidos':
        require __DIR__.'/recurs_mis_pedidos.php';
        break;

    case 'update_account':
        require __DIR__.'/recurs_actualitzar_compte.php';
        break;

    default:
        require __DIR__.'/recurs_home.php';
        break;
}
?>