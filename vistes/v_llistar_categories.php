<!-- // views/llistar_categories.php -->

<?php foreach ($categories as $categoria): ?>
    <div class="marca" onclick="selectMarca(this, <?php echo $categoria['id'] ?>);">
        <img src="/img/<?php echo $categoria['imatge'];?>" alt="Imagen" class="marca-image">
        <p class="marca-text"><?php echo $categoria['nom'] ?></p>
    </div>
<?php endforeach; ?>
<div id="productes"></div>
