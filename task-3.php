<?php
    $a = 5;
    $b = '05';
    var_dump($a == $b);      // Почему true?
    // php приводит переменные к одному типу, в данном случае integer и получается что 5 = 5 - это истина  

    var_dump((int)'012345');     // Почему 12345?
    // преобразует строку '012345' в тип integer, получается целое число 12345  

    var_dump((float)123.0 === (int)123.0); // Почему false?
    // === проверяет равенстов не только значений, но и типов
    // одни операнд float, другой  integer, поэтому получаем false

    var_dump((int)0 === (int)'hello, world'); // Почему true?
    // тип совпадает, т.к. оба операнда приводятся к типу integer. 
    // (int)0 дает 0. 
    // (int)'hello, world' - первый символ строки не является цифрой, знаком + или -, она преобразуется в 0.
    
?>