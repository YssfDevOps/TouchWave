<?php foreach ($products as $product): ?>
    <div class="producto">
        <div class="producto-seleccion" onclick="selectProducte(<?php echo $product['id'] ?>);">
            <h2 class="producto-nombre"> <?php echo $product['nom'] ?> </h2>
            <img src="/img/<?php echo $product['imatge'] ?>" alt="Imagen del producto" class="producto-imagen">
            <div class="producto-detalles">
                <p class="producto-precio"><?php echo $product['preu'] . "€" ?></p>
            </div>
        </div>
        <button class="add-to-cart" id="add-to-cart" data-product-id=<?php echo $product['id']; ?>>Añadir al carrito</button>
    </div>
        
<?php endforeach; ?>