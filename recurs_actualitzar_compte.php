<!-- recurs_actualitzar_compte.php -->

<html lang="ca">
<head>
    <title>Mi cuenta - TDIW</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <link rel="icon" href="img/ProvisionalIcon.jpg" type="image/x-icon">
    <link id="stylesheet" rel="stylesheet" href="vistes/recursos/css/mi_cuenta.css">
    <link rel="stylesheet" href="vistes/recursos/css/header.css">

</head>
<body>

<header>
    <?php require __DIR__ . '/controladors/c_header.php';?>
</header>
<main id="mainContent">
<div class="container">
    <?php require __DIR__ . '/controladors/c_actualizar_cuenta.php'; ?>
</div>
</main>

</body>
</html>