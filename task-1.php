<!-- Создать форму-калькулятор с операциями: сложение, вычитание, умножение, деление. 
Не забыть обработать деление на ноль! Выбор операции можно осуществлять с помощью тега <select>. -->

    <form action="" method="post">
        <input type="number" name="operand1">
        <select name="operation" id="">
            <option value="+"> + </option>
            <option value="-"> - </option>
            <option value="*"> * </option>
            <option value="/"> ÷ </option>
        </select>
        <input type="number" name="operand2">
        <input type="submit">
    </form>


    <?php
    if (isset($_POST)) {
        echo $_POST['operand1'] . " " . $_POST['operation'] . " " . $_POST['operand2'] . " = ";
        switch ($_POST['operation']) {
            case "+":
                $result = $_POST['operand1'] + $_POST['operand2'];
                break;
            case "-":
                $result = $_POST['operand1'] - $_POST['operand2'];
                break;
            case "*":
                $result = $_POST['operand1'] * $_POST['operand2'];
                break;
            case "/":
                if ($_POST['operand2'] == 0)
                    $result = "ошибка : деление на ноль";
                else
                    $result = $_POST['operand1'] / $_POST['operand2'];
                break;
        }
        echo $result;
        
    }
