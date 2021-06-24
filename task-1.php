<!-- Создать галерею фотографий. Она должна состоять всего из одной странички, на которой пользователь видит все картинки в уменьшенном виде 
и форму для загрузки нового изображения. При клике на фотографию она должна открыться в браузере в новой вкладке. 
Размер картинок можно ограничивать с помощью свойства width. 
При загрузке изображения необходимо делать проверку на тип и размер файла. -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Галерея</title>
    <style>
        body {
            display: grid;
            min-height: 100vh;
            grid-template-rows: auto 1fr auto;
        }

        main {
            display: flex;
            flex-wrap: wrap;
        }

        main img {
            margin: 20px 20px;
        }

        footer {
            height: 70px;
        }
        form {
            padding-top: 20px;
        }
        form input {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <header>
        <h1>Галерея</h1>
    </header>
    <main>
        <?php

        function createGallery($dir): void
        {
            $images = scandir($dir);

            if (!$images) {
                echo "Directory $dir doesn't exist";
                return;
            }
            // убираем '..' , '.' и '.DS_Store'
            $images = array_diff($images, ['..', '.', '.DS_Store']);

            foreach ($images as $image) :
        ?>
                <a href="<?php echo $dir . $image; ?>" target="_blank">
                    <img width="100" src="<?php echo $dir . $image; ?>" alt="">
                </a>

        <?php
            endforeach;
        }


        // так как $_FILES массив голобальный , я не передаю его как аргумент
        function upload_image(): void {
           
            $file = $_FILES['filename']['type'];
            $size = $_FILES['filename']['size'];
          
         
            if ($file != 'image/jpeg' && $file != 'image/png' && $file != 'image/pjpeg' && $file != 'image/gif') 
            {
        
                echo "<script type='text/javascript'>alert('Файл должен быть в формате gif, jpeg или png !');</script>";
                return;
               
            }
            if ($size > 20000) {
                echo "<script type='text/javascript'>alert('Размер файла не должен превышать 20 Kb !');</script>";
                return;
            }

            $name = './img/' . $_FILES["filename"]["name"];
            move_uploaded_file($_FILES["filename"]["tmp_name"], $name);
            echo " <a href= '$name' target='_blank'>";
            echo  "<img width='100' src= '$name' >";
            echo "</a>";
        }

        createGallery("./img/");

        if ($_FILES && $_FILES["filename"]["error"] == UPLOAD_ERR_OK) {
            
            upload_image();
        }

        ?>

        <div class="form">
            <form method="post" enctype="multipart/form-data">
                Загрузите свой файл: <br><input type="file" name="filename"><br>
                <input type="submit" value="Загрузить">
            </form>
        </div>

    </main>
    <footer>
        <hr>
        Copyright &copy; <?php echo date("Y"); ?>
        <br>
    </footer>
</body>

</html>