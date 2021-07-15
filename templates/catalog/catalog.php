<h2>Каталог товаров</h2>
<div class='catalog'>

    <?php foreach ($catalog as $product) : ?>
        <div class="item">
            <a href="/catalog/item/?id=<?php echo $product['id']; ?>">
                <figure>
                    <p><img height="100" src="<?php echo IMG_SMALL . $product['image']; ?>" alt=""></p>
                    <figcaption><?php echo $product['name']; ?></figcaption>
                </figure>
            </a>
            <a class="buy" href="/basket/buy/?id=<?= $product['id'] ?>">Купить</a>
        </div>

    <?php endforeach; ?>
</div>