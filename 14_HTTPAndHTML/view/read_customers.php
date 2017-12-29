<table>
    <th>First Name</th>
    <th>Family Name</th>

    <?php foreach($customersData as $i => $iv): ?>
        <tr>
            <td><?php echo($iv['first_name']);?></td>
            <td><?php echo($iv['family_name']);?></td>
        </tr>
    <?php endforeach; ?>
</table>