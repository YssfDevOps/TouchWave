<?php
    require_once __DIR__.'/../models/m_connectaBD.php';
    require_once __DIR__.'/../models/m_productes.php';
    require_once __DIR__.'/../models/m_comandes.php';

    $response = "fail";
    $comandes = [];
    $commandsData = [];
    $productsData = [];
    $nextDates = [];
    if (isset($_SESSION['user_data']))
    {
        $comandes = getUserCommands(array($_SESSION['user_data']['id']));

        if(count($comandes) > 0)
        {
            $response = "success";
            foreach ($comandes as $comanda){
                $nextDates[] = genNextDate($comanda['data_creacio']);
                $liniesComanda = getCommandLines(array($comanda['id']));
                $cdata = [];
                $pdata = [];                
                foreach ($liniesComanda as $linea){
                    $cdata[] = $linea;
                    $pdata[] = getProductById($linea['producte_id']);
                }

                $commandsData[] = $cdata;
                $productsData[] = $pdata;
            }
        }
    }


    include __DIR__.'/../vistes/v_mis_pedidos.php';    
?>
