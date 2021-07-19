<?php if (is_null($product)) : ?>
    <p>Товар не найден</p>
<?php else : ?>
    <h2><?= $product["name"] ?></h2>
    <br>
    <?php foreach ($images as $image) : ?>
        <img src="<?= IMG_BIG . $image['image'] ?>" alt="" height="300">

    <?php endforeach; ?>
    <p><?= $product['description'] ?></p>
    <p>Цена: <?= $product['price'] ?> руб.</p>
    <a class="buy" href="/basket/buy/?id=<?= $product['id'] ?>">Купить</a>
    <br>
<?php endif; ?>