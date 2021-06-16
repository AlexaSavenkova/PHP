<!-- *С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), 
где $val – заданное число, $pow – степень. -->

<?php
function power($val, $pow){
    if($pow < 0) return 'error'; // отрицательный показатель степени здесь не рассматриваем

    if($pow === 0) return 1;
    if($pow === 1) 
        return $val;
    else 
        return $val * power($val,$pow-1);     
}

// проверка
echo power(2,5);

?>
