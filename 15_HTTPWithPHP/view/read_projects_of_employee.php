<?php if(sizeof($data) == 0) {?>
        <h1>Employee does not participate in project.</h1>
    <?php } else { ?>
<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Start Date</th>
        <th>End Date</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $project) :?>
        <tr>
            <td><?= $project['name'] ?></td>
            <td><?= $project['description'] ?></td>
            <td><?= $project['start_date']?></td>
            <td><?= $project['end_date']?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php } ?>