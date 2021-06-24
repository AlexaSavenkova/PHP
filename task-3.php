<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal Window</title>
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

        .view img {
            margin: 20px 20px;
        }

        footer {
            height: 70px;
        }

        .popup img {
            max-width: 100%;
            margin: 30px 30px;
        }

        .popup {
            display: none;
            position: fixed;
            background-color: black;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 50%;
            height: auto;
            text-align: center;
        }

        .close {
            color: white;
            float: right;
            padding: 10px;
            cursor: pointer;
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
                <div class="view">
                    <img width="100" src="<?php echo $dir . $image; ?>" alt="">
                </div>

        <?php
            endforeach;
        }

        createGallery("./img/");
        ?>

        <div class="popup">
            <div class="close">X</div>
            <img src="" alt="" />
        </div>
    </main>

    <footer>
        <hr>
        Copyright &copy; <?php echo date("Y"); ?>
        <br>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script>
        $(function() {
            $('.view img').click(function() {
                let src = $(this).attr('src');
                $('.popup img').attr('src', src);
                $('.popup').fadeIn();
            });
            $('.close').click(function() {
                $('.popup').fadeOut();
            });
        });
    </script>
</body>

</html>