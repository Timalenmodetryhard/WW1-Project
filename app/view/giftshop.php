<section class="produits">
<?php if (!empty($data['data'])): ?>
    <?php foreach ($data['data'] as $row): ?>
        <article class="produit">
            <img src="<?php echo $row["image"]; ?>" alt="Produit 1">
            <h3><?php echo $row["name"]; ?></h3>
            <span class="description"><?php echo $row["description"]; ?></span>
            <span class="prix"><?php echo $row["price"]; ?></span>
        </article>
    <?php endforeach ?>
<?php else: ?>
    <h2>There is no events for now, more are coming in the future...</h2>
<?php endif ?>
</section>