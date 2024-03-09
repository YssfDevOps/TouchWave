<!DOCTYPE html>
<html lang="es">
    <head>
        <title>TouchWave - Sing In</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="autor de la pàgina" />
        <meta name="description" content="descripció de la pàgina" />
        <meta name="keywords" content="paraules clau de la pàgina" />
        <meta name="robots" content="(no)index, (no)follow" />
        <link id="stylesheet" rel="stylesheet" href="vistes/recursos/css/signlog.css">
        <link rel="stylesheet" href="vistes/recursos/css/header.css">
        <link rel="icon" href="img/ProvisionalIcon.jpg" type="image/x-icon">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
    </head>
    <body>
        <header>
            <?php require __DIR__ . '/controladors/c_header.php'; ?>
        </header>
        <main id="mainContent">
        <?php
            require __DIR__ . '/controladors/c_registre.php';
        ?>
        </main>
    </body>
</html>