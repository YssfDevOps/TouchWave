<?php
    // controller/llistat_categories.php

    require_once __DIR__.'/../models/m_connectaBD.php';
    require_once __DIR__.'/../models/m_categories.php';

    $categories = getCategories();

    include __DIR__.'/../vistes/v_llistar_categories.php';

?>