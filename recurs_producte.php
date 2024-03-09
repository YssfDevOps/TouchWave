<!-- resource_llistar_categories.php -->

<html lang="ca">
<head>
    <title>Producte - TDIW</title>
</head>
<body>

<header>
    <?php require __DIR__.'/controladors/menu_superior.php'; ?>
</header>

<div class="container">
    <?php require __DIR__ . '/controladors/c_llistar_categories.php'; ?>
    <?php require __DIR__ . '/controladors/c_detall_producte.php'; ?>
</div>

</body>
</html>