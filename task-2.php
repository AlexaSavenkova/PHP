<!-- Строить фотогалерею, не указывая статичные ссылки к файлам, а просто передавая в функцию построения адрес папки с изображениями. 
Функция сама должна считать список файлов и построить фотогалерею со ссылками в ней. -->

<!-- Строю галерею так же как и в 1-м задании, только картинка открывается не в новой вкладке,
а том же окне браузера. В остальном код тот же -->

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
                <a href="<?php echo $dir . $image; ?>">
                    <img width="100" src="<?php echo $dir . $image; ?>" alt="">
                </a>

            <?php
            endforeach;
        }

        createGallery("./img/");

        ?>
    </main>
    <footer>
        <hr>
        Copyright &copy; <?php echo date("Y"); ?>
        <br>
    </footer>
</body>

</html>
