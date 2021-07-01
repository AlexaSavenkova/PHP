 <!-- Создать калькулятор, который будет определять тип выбранной пользователем операции, ориентируясь на нажатую кнопку. -->

 <form action="" method="post">
     <input type="number" name="operand1">
     <input type="number" name="operand2">
     <br>
     <br>
     <input type="submit" name="sum" value="sum">
     <input type="submit" name="difference" value="difference">
     <input type="submit" name="multiplication" value="multiplication">
     <input type="submit" name="division" value="division">
 </form>


 <?php
    if (isset($_POST)) {

        if (isset($_POST['sum'])) {
            $result = $_POST['operand1'] + $_POST['operand2'];
            $operation = " + ";
        } elseif (isset($_POST['difference'])) {
            $result = $_POST['operand1'] - $_POST['operand2'];
            $operation = " - ";
        } elseif (isset($_POST['multiplication'])) {
            $result = $_POST['operand1'] * $_POST['operand2'];
            $operation = " * ";
        } elseif (isset($_POST['division'])) {
            $operation = " / ";
            if ($_POST['operand2'] == 0)
                    $result = "ошибка : деление на ноль";
            else
                    $result = $_POST['operand1'] / $_POST['operand2'];    
           
        }
        echo $_POST['operand1'] . $operation. $_POST['operand2'] . " = ". $result;
    }
