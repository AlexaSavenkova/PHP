<!-- Реализовать функцию с тремя параметрами: 
function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. 
В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) 
и вернуть полученное значение (использовать switch). -->

<?php
function mathOperation($arg1, $arg2, $operation) {
    switch($operation){
        case 'sum' :
            return sum($arg1, $arg2);   
        case 'difference':
            return difference($arg1, $arg2);  
        case 'multiplication':
            return multiplication($arg1, $arg2);  
        case 'division':
            return division($arg1, $arg2);   
        default:
            return 'mistake';         
    }
}

function sum($a, $b)
{
    return $a + $b;
}
function difference($a, $b)
{
    return $a - $b;
}

function multiplication($a, $b)
{
    return $a * $b;
}
function division($a, $b)
{
    return $a / $b;
}


// проверка
echo mathOperation(5, 2, 'sum') . '</br>';
echo mathOperation(5, 2, 'difference') . '</br>';
echo mathOperation(5, 2, 'multiplication') . '</br>';
echo mathOperation(5, 2, 'division') . '</br>';
echo mathOperation(5, 2, 'Other Operation');

?>