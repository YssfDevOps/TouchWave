

<button class="back" onclick="goBack();">←Volver</button>

<div class="small-container single-product" id="detall">
    <div class="row">
        <div class="col-2">
            <img src="/img/<?php echo $product['imatge'] ?>" width="100%" id="ProductImg" alt="Imagen del producto">
        </div>
        <div class="col-2">
            <p>Smart Phones / <?php echo $categoria ?></p>
            <h1><?php echo $product['nom'] ?></h1>
            <h4><?php echo $product['preu'] . "€"?></h4>
            <?php if ($product['quantitat'] > 0) { ?>
            <input id="quantity" type="number" value="1" min="1" max="5">
            <button class="updateBtn" id="add-to-cart" data-product-id=<?php echo $productId ?> style="direction: rtl;">
                <img src="img/shopping-cart-dollar.png" alt="Carrito"
                     style="width:15px; height:15px;">
                Añadir al carrito 
            </button>
            <?php } else { ?>
                <input id="quantity" type="number" value="0" min="0" max="0">
                <button class="updateBtn" id="add-to-cart" data-product-id=<?php echo $productId ?> disabled style="direction: rtl;">
                    Agotado
                </button>
                <?php }; ?>
            <h3>Descripción: <i class="fa fa-indent"></i></h3>
            <br>
            <p><?php echo $product['descripcio'] ?></p>
        </div>
    </div>
</div>