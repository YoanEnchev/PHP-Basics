<style>
    <?php include ('../style/style.css');?>
</style>

<form method="get">
    <label>Enter number of years:
        <input type="number" name="years-count"/>
    </label>
    <input type="submit" name="outputCosts" value="Show costs"/>
</form>

<?php
if (isset($_GET['outputCosts'])):
    $years_count = $_GET['years-count'];
    $lastYear = date("Y") - 1;
    ?>
    <table>
        <thead>
        <tr>
            <th>Year</th>
            <th>January</th>
            <th>February</th>
            <th>March</th>
            <th>April</th>
            <th>May</th>
            <th>June</th>
            <th>July</th>
            <th>August</th>
            <th>September</th>
            <th>October</th>
            <th>November</th>
            <th>December</th>
        </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < $years_count; $i++ ):?>
                <tr>
                    <td><?=$lastYear - $i?></td>
                <?php for ($m = 1; $m <= 12; $m++):?>
                    <td><?=rand(1, 999)?></td>
                    <?php endfor;?>
                </tr>
            <?php endfor;?>
        </tbody>
    </table>
<?php endif; ?>