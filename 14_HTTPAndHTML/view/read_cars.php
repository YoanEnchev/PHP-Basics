<table>
    <th>Make</th>
    <th>Model</th>
    <th>Manufacture Year</th>

    <?php foreach($carsData as $i => $iv): ?>
        <tr>
            <td><?php echo($iv['make']);?></td>
            <td><?php echo($iv['model']);?></td>
            <td><?php echo($iv['year_production']);?></td>
        </tr>
    <?php endforeach; ?>
</table>