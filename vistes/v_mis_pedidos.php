<h1 id="tituloPedido">MIS PEDIDOS</h1>
<?php if($response == "success") { ?>

<div class="small-container pedido-page">

    <?php 
    for ($i = 0; $i < count($comandes); $i++) { //Iterador de comandes
    $comanda = $comandes[$i];
    $commandaData = $commandsData[$i];
    $productaData = $productsData[$i];
    $nextDate = $nextDates[$i];
    ?>

    <div id="info-pedido">
        <p id="Dia-Pedido">Pedido realizado: <?php echo $comanda['data_creacio']; ?></p>
        <p id="Dia-Entrega">Entrega prevista:  <?php echo $nextDate; ?><p>
    </div>

    <table>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
        </tr>
        <?php 
        for ($j = 0; $j < count($commandaData); $j++) {
            $subCommanda = $commandaData[$j];
            $producte = $productaData[$j];
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
                <td><?php echo $comanda['import_total'] ?>€</td>
            </tr>
        </table>
    </div>
    </br>
    </br>
    <?php }; ?>
</div>

<?php } else { ?>
    <h1 id="tituloPedido">No teneis ningun pedido</h1>
<?php }; ?>