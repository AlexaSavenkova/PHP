 <!-- Создать галерею изображений, состоящую из двух страниц:

 просмотр всех фотографий (уменьшенных копий);
 просмотр конкретной фотографии (изображение оригинального размера) по ее ID в базе данных. -->


<!-- Я создала в базе еще одно дополнительное поле 
name_mini - там хранится имя уменьшенной копии файла.
При создании галереи загружаются только миниатюры , а при клике открывается большой файл -->

 <?php
    function createGallery($db_link): void
    {
        if($result = mysqli_query($db_link, "SELECT id, dir, name_mini FROM images where 1;")) {
            $images = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $images[] = $row;
            }
            
            foreach ($images as $image) :
                ?>
                <a href="?id=<?php echo $image['id']; ?>">
                    <img width="100" src="<?php echo $image['dir']. $image['name_mini']; ?>" alt="">
                </a>

                <?php
            endforeach;
        } else {
            echo
            "ошибка в запросе SQL";
        }    
    }

    function getImageById($db_link,$id) {

        if ($result = mysqli_query($db_link, "SELECT dir, name_origin FROM images where id=$id;")) {

            if(mysqli_num_rows($result) != 0) {

                // по id всегда одна строка, поэтому я не делала цикл while ($row = mysqli_fetch_assoc($result))
                // не уверена, что это корректно, но работает
                // напишите, пожалуйста в комментариях можно так делать или нет
                $row = mysqli_fetch_assoc($result); 
                $image = $row['dir'].$row['name_origin'];
                 echo "<img src='$image'>";
            } else {
                echo "не найден файл с id $id";
            }
            
            
        } else {
            echo "ошибка в запросе SQL";
        }    
       
    }

    
    if ($link = mysqli_connect('localhost', 'root', '', 'GB')) {
        if (isset($_GET['id'])) {
            getImageById($link, $_GET['id']) ;
        } else {
            createGallery($link);
        }
        
        mysqli_close($link);

    } else {
        echo "ошибка подключения к базе данных";
    }
