<!-- Добавить функционал отзывов в имеющийся у вас проект. -->
<h2>Напишите ваш отзыв</h2>
<form enctype="multipart/form-data" method="post">
    <textarea name="review" id="" cols="60" rows="10"></textarea>
    <br>
    <br>
    <input type="submit" value="Отправить">
</form>

<?php
function createGallery($db_link): void
{
    if ($result = mysqli_query($db_link, "SELECT review FROM reviews where 1 ORDER BY created_at DESC;")) {
        $reviews = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $reviews[] = $row;
        }
        echo "<h2>Отзывы наших клиентов</h2>";
        foreach ($reviews as $review){
            echo "<p>".$review['review']."</p>" ;
        }

    } else {
        echo
        "ошибка в запросе SQL";
    }
}

function addReview($db_link): void
{

    $review = mysqli_real_escape_string($db_link, (string)htmlspecialchars(strip_tags($_POST['review'])));
    $review = trim($review);
    if ($review == "") return;

    $query = "INSERT INTO reviews (review) VALUES ('$review');";
    if (!mysqli_query($db_link, $query)) {

        echo "Ошибка в запросе SQL. Не удалось отправить отзыв";
    }
}



$link = mysqli_connect('localhost', 'root', '', 'shop');
if (!$link) {
    die("Ошибка подключения к базе данных");
}

if (isset($_POST['review'])) {
    addReview($link);
} 
createGallery($link);
mysqli_close($link);
