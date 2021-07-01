<!-- Создать страницу каталога товаров:

товары хранятся в БД (структура прилагается);
страница формируется автоматически;
по клику на товар открывается карточка товара с подробным описанием.
подумать, как лучше всего хранить изображения товаров. -->


<?php
function createCatalog($db_link): void
{
    if ($result = mysqli_query($db_link, "SELECT id, name, name_mini, price FROM products where 1 ORDER BY viewed DESC;")) {
        $products = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }
        echo "<h2>Каталог товаров</h2>";
        echo "<div class ='catalog' >";
        foreach ($products as $product) :
?>
            <a href="?id=<?php echo $product['id']; ?>">
                <figure>
                    <p><img height="100" src="<?php echo $product['name_mini']; ?>" alt=""></p>
                    <figcaption><?php echo $product['name']; ?></figcaption>
                </figure>
            </a>

<?php
        endforeach;
        echo "</div>";
    } else {
        echo
        "ошибка в запросе SQL";
    }
}

function getProductById($db_link, $id): void
{
    if ($result = mysqli_query($db_link, "SELECT name, description, price , viewed FROM products where id=$id;")) {

        if (mysqli_num_rows($result) != 0) {

            $row = mysqli_fetch_assoc($result);
            $name = $row['name'];
            $description = $row['description'];
            $price = $row['price'];

            echo "<h2>$name</h2>";
            if ($result_img = mysqli_query($db_link, "SELECT image_file FROM products_images where product_id=$id;")) {
                $images = [];
                while ($row = mysqli_fetch_assoc($result_img)) {
                    $images[] = $row;
                }

                foreach ($images as $image) {
                    $src = $image['image_file'];
                    echo "<img src='$src' height = '300'>";
                }
            }

            echo "<p>$description</p>";

            $count = $row['viewed'] + 1;
            if (!mysqli_query($db_link, "UPDATE products SET viewed = viewed +1 WHERE id=$id;")) {
                echo
                "Ошибка в запросе SQL. Не удалось обновить счетчик просмотров";
            }

            echo "<p>Цена: $price руб.</p>";
        } else {
            echo "не найден товар с id $id";
        }
    } else {
        echo "ошибка в запросе SQL";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <style>
        .catalog {
            display: flex;
        }
    </style>
</head>

<body>


    <?php
    if ($link = mysqli_connect('localhost', 'root', '', 'shop')) {
        if (isset($_GET['id'])) {
            getProductById($link, $_GET['id']);
        } else {
            createCatalog($link);
        }

        mysqli_close($link);
    } else {
        echo "ошибка подключения к базе данных";
    }
    ?>

</body>

</html>