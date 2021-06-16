<!-- Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:

22 часа 15 минут
21 час 43 минуты -->

<?php 
    function getTime (){
        $hours = date('H');
        $minutes = date('i');

        
        if ($hours =="01" || $hours == "21")
            $hoursText = 'час';
        elseif ($hours == "02" || $hours == "03" || $hours == "04" || $hours == "22" || $hours == "23")
            $hoursText = 'часа';  
        else
            $hoursText = 'часов';     
            
        $minLast = substr($minutes,1);    // проверяем по последней цифре

        if ($minutes == "11" || $minutes == "12")
            $minutesText = 'минут';
        elseif ($minLast == '1')
            $minutesText = 'минута';
        elseif ($minLast == '2' || $minLast == '3' || $minLast == '4')
            $minutesText = 'минуты';
        else    
            $minutesText = 'минут';  

        echo "$hours $hoursText $minutes $minutesText";   
        
    }

 getTime();   
?>