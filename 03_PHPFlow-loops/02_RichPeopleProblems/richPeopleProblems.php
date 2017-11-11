<style>
    <?php include ('../style/style.css');?>
</style>

<form method="get">
    <label>Enter cars
        <input type="text" name="cars"/>
    </label>
    <input type="submit" name="outputCars" value="Show result"/>
</form>
<?php
if (isset($_GET['outputCars'])) :
    $colors = array('black', 'gray', 'green', 'blue', 'purple', 'red');
    $models = explode(', ', $_GET['cars']);

    $random_quantity = rand(1, 5);
    $random_color = $colors[rand(0, count($colors) - 1)];
    ?>

    <table>
        <thead>
        <tr>
            <th>Car</th>
            <th>Color</th>
            <th>Count</th>
        </tr>
        </thead>
        <tbody>
        <?php for ($i = 0; $i < count($models); $i++): ?>
            <tr>
                <td><?= $models[$i] ?></td>
                <td><?= $random_color ?></td>
                <td><?= $random_quantity ?></td>
            </tr>
            <?php
            $random_quantity = rand(1, 5);;
            $random_color = $colors[rand(0, count($colors) - 1)];
        endfor; ?>
        </tbody>
    </table>
<?php endif; ?>
