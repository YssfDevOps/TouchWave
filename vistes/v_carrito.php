<h1 id="titolCarrito">Carrito</h1>
<div class="small-container cart-page">
    <div class="clear-cart">
        <a href="javascript:void(0);" id="empty">Vaciar Cesta</a>
    </div>
    <table>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
        </tr>
        <?php if (isset($cart) && $total > 0.0){ foreach ($cart as $id => $data){?>
        <tr>
            <td>
                <div class = "cart-info">
                    <img src="/img/<?php echo $data['imatge'] ?>" alt="FotoMovil">
                    <div>
                        <p><?php echo $data['nom']; ?></p>
                        <small>Precio: <?php echo $data['preu']; ?>€</small>
                        <br>
                        <a href="javascript:void(0);" id="erase" data-product-id=<?php echo $data['id'] ?>>Eliminar</a>
                    </div>
                </div>
            </td>
            <td><input type="number" id="update" class="update-input" data-product-id=<?php echo $data['id'] ?> value=<?php echo $data['quantity']; ?> min="0" max=<?php echo $data['quantitat']; ?>></td>
            <td><?php echo $data['preu']*$data['quantity']; ?>€</td>
        </tr>
        <?php };} else{ ?>
            <tr>
            <td>
                <div class = "cart-info">
                    <div>
                        <p>No has añadido nada al carrito!</p>
                    </div>
                </div>
            </td>
            <td>0</td>
            <td>0€</td>
        </tr>
            <?php }; ?>
    </table>

    <div class="total-price">
        <table>
            <tr>
                <td>Total</td>
                <td><?php echo $total; ?>€</td>
            </tr>
        </table>
    </div>
    <div class="checkout">
        <button id="checkout-button">Finalizar Compra</button>
    </div>
</div>