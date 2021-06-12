<!-- Используя имеющийся HTML-шаблон, сделать так, чтобы главная страница генерировалась через PHP.
Создать блок переменных в начале страницы.
Сделать так, чтобы h1, title и текущий год генерировались в блоке контента из созданных переменных. -->


<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $h1 = 'Заголовок h1';
    $title = 'Загловок документа';
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>

<body>
    <h1>
        <?php echo $h1; ?>
    </h1>
    текущий год <?php echo date("Y"); ?>

</body>

</html>