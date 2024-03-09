<h1 id="fin">
    La compra ha finalizado correctamente.
</h1>
<h2 id="checkcorreo">
    Comprueba tu correo electrónico para ver los detalles del pedido.
</h2>

<h1 id="tituloPedido">Resumen de tu pedido</h1>
<div class="small-container pedido-page">
    <div id="info-pedido">
        <p id="Dia-Pedido">Pedido realizado: <?php echo $commanda['data_creacio']; ?></p>
        <p id="Dia-Entrega">Entrega prevista: <?php echo $nextDate; ?></p>
    </div>
    <table>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
        </tr>
        <?php 
        for ($i = 0; $i < $matrixSize; $i++) {
            $subCommanda = $subComandes[$i];
            $producte = $dataProductes[$i];
        ?>
        <tr>
            <td>
                <div class = "info-pedido">
                    <img src="/img/<?php echo $producte['imatge'] ?>" alt="FotoProducto1">
                    <div>
                        <p><?php echo $producte['nom'] ?></p>
                        <small>Precio: <?php echo $producte['preu'] ?>€</small>
                    </div>
                </div>
            </td>
            <td><?php echo $subCommanda['quantitat'] ?></td>
            <td><?php echo $subCommanda['preu_total'] ?>€</td>
        </tr>
        <?php }; ?>
    </table>
    <div class="precio-total">
        <table>
            <tr>
                <td>Total</td>
                <td><?php echo $commanda['import_total'] ?>€</td>
            </tr>
        </table>
    </div>
</div>

<a id="but" href="index.php"><button>Volver a la página principal</button></a>