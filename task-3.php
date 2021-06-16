<!-- Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. 
Обязательно использовать оператор return. -->

<?php
function sum ($a, $b){
    return $a + $b;
}
function difference($a, $b)
{
    return $a - $b;
}

function multiplication ($a, $b)
{
    return $a * $b;
}
function division($a, $b)
{
    return $a / $b;
}
// проверка
echo sum(5,2).'</br>'; 
echo difference(5, 2).'</br>';
echo multiplication(5, 2) . '</br>'; 
echo division(5, 2);

?>