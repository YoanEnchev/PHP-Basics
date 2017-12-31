<table>
    <thead>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Job</th>
        <th>Department</th>
        <th>Salary</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $employee) : ?>
        <tr>
            <td><?= $employee['first_name'] ?></td>
            <td><?= $employee['last_name'] ?></td>
            <td><?= $employee['job_title'] ?></td>
            <td><?= $employee['dep_name'] ?></td>
            <td><?= $employee['salary'] ?></td>
            <td>
                <a href="http://localhost/PHP-Basics/15_HTTPWithPHP/?controller=EmployeeController&action=addProject&id=<?=$employee['employee_id']?>">Add Project</a>
                <a href="http://localhost/PHP-Basics/15_HTTPWithPHP/?controller=EmployeeController&action=viewProjects&id=<?=$employee['employee_id']?>">View Projects</a>
                <a href="http://localhost/PHP-Basics/15_HTTPWithPHP/?controller=AddressController&action=viewEmployeeAddress&id=<?=$employee['employee_id']?>">View Address</a>
                <a href="http://localhost/PHP-Basics/15_HTTPWithPHP/?controller=EmployeeController&action=changeAddress&id=<?=$employee['employee_id']?>">Change Address</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>