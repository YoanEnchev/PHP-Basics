<?php
include "db_config.php";
include "Sale.php";
include "CarShop.php";
?>

<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form>
    <fieldset>
        <label>
            Brand: <input name="make" required>
        </label>
        <label>
            Model: <input name="model" required>
        </label>
        <label>
            Year: <input name="year" required>
        </label>
        <label>
            Buyer First Name: <input name="firstName" required>
        </label>
        <label>
            Buyer Family Name: <input name="familyName" required>
        </label>
        <label>
            Amount: <input type="number" name="amount required">
        </label>
        <input type="submit" value="Add Sale" name="addSale">
    </fieldset>
</form>
<form>
    <input type="submit" value="Show Sales" name="showSales">
</form>

<?php
if (isset($_GET['addSale'])) {
    $sale = new Sale($_GET['make'], $_GET['model'], $_GET['year'], $_GET['firstName'], $_GET['familyName'], $_GET['amount']);
    $sale->insertIntoDB($db);
}
?>

<?php
if (isset($_GET['showSales'])) {
    $carShop = new CarShop();
    $saleData = $carShop->getAllSales($db);
    $sum = $carShop->getSumOfSales($db);
    ?>
    <h2>Total Sum Of Sales: <?=$sum?></h2>
    <h1>Sales</h1>

    <table>
    <thead>
    <tr>
        <th>Make</th>
        <th>Model</th>
        <th>Year Of Manufacture</th>
        <th>Date</th>
        <th>Amount</th>
        <th>Buyer Full Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($saleData as $sale) { ?>
        <tr>
            <td><?= $sale['make'] ?></td>
            <td><?= $sale['model'] ?></td>
            <td><?= $sale['year_production'] ?></td>
            <td><?= $sale['sale_date'] ?></td>
            <td><?= $sale['amount'] ?></td>
            <td><?= $sale['full_name']?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
    </table>
    <div class="total">

    </div>
    <?php
    exit();
}
?>
</body>
</html>

