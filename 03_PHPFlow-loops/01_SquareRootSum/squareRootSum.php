<style>
    <?php include ('../style/style.css');?>
</style>
<?php $sum = 0; ?>
<table>
    <thead>
        <tr>
            <th>Number</th>
            <th>Square</th>
        </tr>
    </thead>
    <tbody>
    <?php for($i = 0; $i <= 100; $i+=2):

    $squareRoot = round(sqrt($i), 2);
    $sum += $squareRoot;
    ?>
        <tr>
            <td><?=$i;?></td>
            <td><?=$squareRoot;?></td>
        </tr>
    <?php endfor;?>
    <tr>
        <td id="total">Total:</td>
        <td><?=$sum;?></td>
    </tr>
    </tbody>
</table>