<html>
<body>
<form method="get">
    <div>
        Operation:
        <select name="operation">
            <option value="sum">Sum</option>
            <option value="subtract">Subtract</option>
        </select>
    </div>
    <div>
        Number 1:
        <input type="text" name="number_one"/>
    </div>
    <div>
        Number 2:
        <input type="text" name="number_two"/>
    </div>
    <div>
        <input type="submit" name="calculate" value="Calculate!"/>
    </div>
</form>
</body>
</html>

<?php
if (isset($_GET['calculate'])) {
    $operation = $_GET['operation'];
    $num_1 = $_GET['number_one'];
    $num_2 = $_GET['number_two'];

    echo "Result: ";

    if ($operation == 'sum') {
        echo "<input type='text' disabled='disabled' readonly='readonly' value='" . ($num_1 + $num_2) . "'/>";
    }
    else if ($operation == 'subtract') {
        echo "<input type='text' disabled='disabled' readonly='readonly' value='" . ($num_1 - $num_2) . "'/>";
    }
    else {
        echo "<input type='text' disabled='disabled' readonly='readonly' value='Invalid operation supplied'/>";
    }
}
?>