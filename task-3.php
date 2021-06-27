 <!-- 
На странице просмотра фотографии полного размера под картинкой должно быть указано число ее просмотров.
 -->

 <?php
    function createGallery($db_link): void
    {
        if ($result = mysqli_query($db_link, "SELECT id, dir, name_mini FROM images where 1;")) {
            $images = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $images[] = $row;
            }

            foreach ($images as $image) :
    ?>
             <a href="?id=<?php echo $image['id']; ?>">
                 <img width="100" src="<?php echo $image['dir'] . $image['name_mini']; ?>" alt="">
             </a>

 <?php
            endforeach;
        } else {
            echo
            "ошибка в запросе SQL";
        }
    }

    function getImageById($db_link, $id)
    {

        if ($result = mysqli_query($db_link, "SELECT dir, name_origin, viewed FROM images where id=$id;")) {

            if (mysqli_num_rows($result) != 0) {

                $row = mysqli_fetch_assoc($result);
                $image = $row['dir'] . $row['name_origin'];
                echo "<img src='$image'>";
                $count = $row['viewed'] + 1;
                if (!$viewed_update = mysqli_query($db_link, "UPDATE images SET viewed = viewed +1 WHERE id=$id;")){
                    echo
                    "Ошибка в запросе SQL. Не удалось обновить счетчик просмотров";
                }
                
                echo "<p>Кол-во просмотров: $count</p>";
            } else {
                echo "не найден файл с id $id";
            }
        } else {
            echo "ошибка в запросе SQL";
        }
    }


    if ($link = mysqli_connect('localhost', 'root', '', 'GB')) {
        if (isset($_GET['id'])) {
            getImageById($link, $_GET['id']);
        } else {
            createGallery($link);
        }

        mysqli_close($link);
    } else {
        echo "ошибка подключения к базе данных";
    }
