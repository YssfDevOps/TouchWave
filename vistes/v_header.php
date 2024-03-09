<div class="left">
    <button class="cta" onclick="mostrarTotProductes();">Todos los productos</button>
    <a class="cta"><button onclick="mostrarCarrito()" style="direction: rtl;"><img src="img/shopping-cart-dollar.png" alt="Carrito" 
        style="width:15px; height:15px;"> Carrito</button></a>
</div>
<a href="index.php"><h1>TouchWave</h1></a>
<div class="right"> 
    <div class="ResumCompra">
        <h3>Resumen compra:</h3>
        <p id="numProducts">Numero de productos: <?php echo $nProducts; ?> </p>
        <p id="totalPrice">Precio Total: <?php echo $totalPrice; ?>$</p>
    </div>
    
    <button id="menuButton">Cuenta</button>
    <div class="sub-menu-wrap" id="subMenuLog">
        <div class="sub-menu">
            <div class="user-info">
                <img src="<?php echo $filesPublicPath.$_SESSION['user_data']['imatge'] ?>" alt="PFP">
                <h2><?php echo $userName ?></h2>
            </div>
            <hr>
            <a href="index.php?action=mi_cuenta" class="sub-menu-link">
                <p>Mirar cuenta</p>
                <span></span>
            </a>
            <a href="index.php?action=mis_pedidos" class="sub-menu-link">
                <p>Mirar pedidos</p>
                <span></span>
            </a>
            <a href="index.php?action=logout" class="sub-menu-link">
                <p>Cerrar sesión</p>
                <span></span>
            </a>
        </div>
    </div>
    <div class="sub-menu-wrap" id="subMenuNoLog">
        <div class="sub-menu">
            <div class="user-info">
                No has iniciado sesión.
            </div>
            <hr>
            <a href="index.php?action=signin" class="sub-menu-link">
                <p>Registrarse</p>
                <span></span>
            </a>
            <a href="index.php?action=login" class="sub-menu-link">
                <p>Iniciar Sesión</p>
                <span></span>
            </a>
        </div>
    </div>
    <div style="clear: both;"></div>

    <div class="alert hide"> 
        <span class="msg">Producto añadido correctamente!</span>
        <span class="close-btn">
            <span class="fas fa-times"> X </span>
        </span>
    </div>
</div>