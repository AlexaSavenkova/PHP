<h2>Корзина</h2>
<?php if ($count == 0) : ?>
    <p> Корзина пуста </p>
    <p><?= $message ?> </p>
<?php else : ?>


    <?php foreach ($basket as $item) : ?>
        <div>
            <p><img height="50" src="<?php echo IMG_SMALL . $item['image']; ?>" alt=""></p>
            <?= $item['name'] ?><br>
            цена: <?= number_format($item['price'], 2, ',', ' ') ?><br>
            кол-вo: <?= $item['quantity'] ?><br>
            всего: <?= number_format($item['price'] * $item['quantity'], 2, ',', ' ') ?><br>
            <a href="/basket/delete/?id=<?= $item['basket_id'] ?>">Удалить</a>
        </div>
        <hr>

    <?php endforeach; ?>
    ИТОГО: <?= number_format($summ, 2, ',', ' ') ?>
    <br><br><br><br>

    Оформить заказ:<br>
    <p> <?= $message; ?> </p>
    <form action="/basket/addorder/" method="post">
        <input type="text" name="name" placeholder="Имя">
        <input type="text" name="phone" placeholder="Телефон">
        <input type="submit" value="Оформить заказ">
    </form>

    Итого: <span id="summ"><?= number_format($summ, 2, ',', ' ') ?></span>

<?php endif; ?>