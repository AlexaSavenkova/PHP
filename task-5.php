<!-- Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку. -->

<?php 
function changeSpaces($text) {
   return strtr($text," ","_");
    
}
echo changeSpaces('Some text and more text.');

?>