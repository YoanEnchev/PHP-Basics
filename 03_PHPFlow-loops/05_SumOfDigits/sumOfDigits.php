<style>
    <?php include '../style/style.css'?>
</style>

<form method="get">
    <label>Input string:
        <input name="sequence"/>
    </label>
    <input type="submit" name="getSum" value="Submit"/>
</form>

<?php if (isset($_GET['getSum'])): ?>
<table>
    <tbody>
    <?php $sequence = $_GET['sequence'];
    $numbers = explode(', ',$sequence);
    for ($i = 0; $i < count($numbers);$i++) : ?>
    <tr>
        <td><?= $numbers[$i] ?></td>
        <td>
            <?php
            if(is_numeric($numbers[$i]) ) {
                $number = abs($numbers[$i]); //avoid -
                $sum = array_sum(str_split($number)); //get sum of digits
                echo $sum;
            }
            else {
                echo 'I cannot sum that';
            }
            ?>
        </td>
    </tr>
        <?php endfor; ?>
    </tbody>
    <?php endif; ?>
</table>

