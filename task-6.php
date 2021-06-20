<!-- В имеющемся шаблоне сайта заменить статичное меню (ul – li) на генерируемое через PHP. 
Необходимо представить пункты меню как элементы массива и вывести их циклом. 
Подумать, как можно реализовать меню с вложенными подменю? Попробовать его реализовать. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 6</title>
</head>
<body>
    
    <?php 
    $menu = [
        'Item 1',
        'Item 2'=>['item 2.1','item 2.2'],
        'Item 3'=>['item 3.1'=> 
                        ['item 3.1.1', 'item 3.1.2'],
                  'item 3.2' =>
                        ['item 3.2.1', 'item 3.2.2']
                    ],
        'Item 4'=> ['item 4.1']           
    ];

    function printMenu($items){
        echo '<ul>';

        foreach($items as $key=>$value) {
            // если в данном пункте меню нет вложенного подменю, то ключом будте целое число (индекс элемента массива)
            // если есть подменю, по этот пункт будет ключом, а значением массив вложенного меню
            if(is_int($key)) $item = $value;
            else $item = $key;

            echo "<li> $item";
                if(is_array($value)) {
                    printMenu($value);
                }
            echo "</li>";    
        }

        echo '</ul>';
    }

    
    printMenu($menu);
    
    ?>
    

</body>
</html>