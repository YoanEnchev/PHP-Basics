<html>
<head>
</head>
<body>
<form>
    <label>
        Enter Amount:
        <input type="number" name="amount" required> <br>
    </label>
    <input type="radio" name="currency" value="USD" checked> USD
    <input type="radio" name="currency" value="EUR"> EUR
    <input type="radio" name="currency" value="BGN"> BGN <br>
    <label>
        Compound Insert Amount:
        <input type="number" name="compoundInterest" required>
    </label>
    <br>
    <select name="months">
        <option value="6" selected>6 months</option>
        <option value="12">1 Year</option>
        <option value="24">2 Years</option>
        <option value="60">5 Years</option>
    </select>
    <input type="submit" name="calculate" value="Calculate">
</form>

<?php
if(isset($_GET['calculate'])) {
    $moneySuffix = "";
    $moneyPrefix = "";

    switch ($_GET['currency']) {
        case 'USD':
            $moneyPrefix = "$";
            break;
        case 'EUR':
            $moneyPrefix = "&pound;";
            break;
        case 'BGN':
            $moneySuffix = "лв";
            break;
    }

    $moneyAfter = $_GET['amount'];
    $months = intval($_GET['months']);
    $insertPerMonth = $_GET['compoundInterest']/12;

    for ($i = 1; $i <= $months; $i++) {
        $moneyAfter += $moneyAfter * $insertPerMonth / 100;
    }

    $result = number_format($moneyAfter, 2, '.', '');
    echo"$moneyPrefix $result $moneySuffix";
}
?>
