<style>
<?php include 'primeStyle.css';?>
</style>

<form method="get">
    <label>Starting Index:
        <input type="number" name="startIndex"/>
    </label>
    <label>End:
        <input type="number" name="endIndex"/>
    </label>
    <input type="submit" name="outputNumbers" value="Submit"/>
</form>

<?php
if (isset($_GET['outputNumbers'])) {
    $startIndex = $_GET['startIndex'];
    $endIndex = $_GET['endIndex'];

    while ($startIndex <= $endIndex) {
        $numberIsPrime = checkIfPrime($startIndex);

        if ($numberIsPrime) {
            echo "<span class='prime'>{$startIndex}</span>";
        } else {
            echo "<span>{$startIndex}</span>";
        }

        if ($startIndex != $endIndex ) {
            echo ', ';
        }
        $startIndex++;
    }
}

function checkIfPrime($number)
{
    if ($number <= 1) {
        return false;
    }

    for ($i = 2; $i < $number; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}

?>