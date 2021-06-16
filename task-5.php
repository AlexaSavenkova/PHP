<!-- Посмотреть на встроенные функции PHP. 
Используя имеющийся HTML-шаблон, вывести текущий год в подвале при помощи встроенных функций PHP. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: grid;
            min-height: 100vh;
            grid-template-rows: auto 1fr auto;
        }

        footer {
            height: 70px;
        }
    </style>
</head>

<body>
    <header>
        <h1>Header</h1>
    </header>

    <main>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium vitae facilis, necessitatibus, recusandae distinctio odit consequatur architecto, mollitia veniam doloribus accusamus veritatis totam est facere illum aliquid sint eligendi voluptate. Error perferendis esse consequatur? Consectetur quae excepturi praesentium quasi voluptatibus nam eaque, animi ipsa rem, facilis illum necessitatibus cum quidem sint voluptates, ipsum unde dolores? Molestiae, quae. Ipsa aut ullam harum temporibus eveniet illum error natus suscipit aliquam provident odio ex inventore, cupiditate laudantium quis aliquid voluptatum doloribus voluptatibus aspernatur.</p>
    </main>

    <footer>
        <hr>
        Copyright &copy; <?php echo date("Y"); ?>
        <br>
    </footer>

</body>

</html>