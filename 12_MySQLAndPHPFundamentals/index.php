<?php
include "db_config.php";
include "Employee.php";
?>

<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<section id="forms">
    <form id="employeeData" method="post">
        <fieldset>
            <legend>Employee Data:</legend>
            <div class="data">
                <label>
                    First Name:
                    <input type="text" name="firstName" required>
                </label>
                <label>
                    Middle Name:
                    <input type="text" name="middleName" required>
                </label>
                <label>
                    Last Name:
                    <input type="text" name="lastName" required>
                </label>
                <label>
                    Department:
                    <input type="text" name="department">
                </label>
                <label>
                    Position:
                    <input type="text" name="position">
                </label>
                <label>
                    Passport ID:
                    <input type="text" name="passportID">
                </label>
                <input type="submit" name="addEmployee">
            </div>
        </fieldset>
    </form>
    <form id="emailData" method="post">
        <fieldset>
            <legend>Email Data:</legend>
            <p>If three names are unique</p>
            <div class="data">
                <label>
                    First Name:
                    <input type="text" name="firstName" required>
                </label>
                <label>
                    Middle Name:
                    <input type="text" name="middleName" required>
                </label>
                <label>
                    Last Name:
                    <input type="text" name="lastName" required>
                </label>
                <label>
                    Email:
                    <input type="text" name="email">
                </label>
                <label>
                    Type:
                    <select name="type">
                        <option value="personal">Personal</option>
                        <option value="work">Work</option>
                    </select>
                </label>
                <input type="submit" name="addEmailByThreeNames">
            </div>
        </fieldset>
    </form>
    <form id="phoneData" method="post">
        <fieldset>
            <legend>Phone Data:</legend>
            <p>Add phones data by employee ID</p>
            <div class="data">
                <label>
                    Employee ID:
                    <input type="text" name="employeeID">
                </label>
                <label>
                    Work Phone:
                    <input type="text" name="workPhone" required>
                </label>
                <label>
                    Second Work Phone:
                    <input type="text" name="secondWorkPhone">
                </label>
                <label>
                    Personal:
                    <input type="text" name="personalPhone">
                </label>
                <input type="submit" name="addPhoneData">
            </div>
        </fieldset>
    </form>
    <form id="getDataByFirstAndLastName" method="post">
        <fieldset>
            <legend>Get Data:</legend>
            <p>Get data about employees </p>
            <p> by first and last name</p>
            <div class="data">
                <label>
                    First Name:
                    <input type="text" name="firstName" required>
                </label>
                <label>
                    Last Name:
                    <input type="text" name="lastName" required>
                </label>
                <input type="submit" name="getDataByFirstAndLastName">
            </div>
        </fieldset>
    </form>
</section>

<?php
if (isset($_POST['addEmployee'])) {
    $employee = new Employee($_POST['firstName'], $_POST['middleName'], $_POST['lastName'],
        $_POST['department'], $_POST['position'], $_POST['passportID']);
    $employee->insertEmployee($db);
}

if (isset($_POST['addEmailByThreeNames'])) {
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];

    $stmt = $db->prepare("SELECT * FROM EMPLOYEE
        WHERE first_name = :firstName AND middle_name = :middleName AND last_name = :lastName");
    $stmt->bindParam("firstName", $firstName);
    $stmt->bindParam("middleName", $middleName);
    $stmt->bindParam("lastName", $lastName);
    $stmt->execute();

    $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $occurrences = sizeof($info);

    if ($occurrences == 0) {
        echo "Not found employee $firstName $middleName $lastName";
    } else if ($occurrences == 1) {
        $id = $info[0]['employee_id'];
        $email = $_POST['email'];
        $type = $_POST['type'];

        $stmt = $db->prepare("INSERT INTO employee_emails(email, employee_id, type)
        VALUES(:email, :id, :type)");
        $stmt->bindParam('email', $email);
        $stmt->bindParam('id', $id);
        $stmt->bindParam('type', $type);
        $stmt->execute();

        echo "Added email about $firstName $middleName $lastName employee";
    } else {
        echo "Found more than 1 employee $firstName $middleName $lastName";
    }
}

if (isset($_POST['addPhoneData'])) {
    $id = $_POST['employeeID'];
    $workPhone = $_POST['workPhone'];
    $secondWorkPhone = $_POST['secondWorkPhone'];
    $personalPhone = $_POST['personalPhone'];

    $stmt = $db->prepare("SELECT * FROM EMPLOYEE
        WHERE employee_id = :id");
    $stmt->bindParam("id", $id);
    $stmt->execute();

    $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $occurrences = sizeof($info);

    if ($occurrences == 0) {
        echo "Not found employee with such ID";
    } else {

        $stmt = $db->prepare("INSERT INTO employee_phones(employee_id, work, second_work, personal)
        VALUES(:id, :work, :second_work, :personal)");
        $stmt->bindParam('id', $id);
        $stmt->bindParam('work', $workPhone);
        $stmt->bindParam('second_work', $secondWorkPhone);
        $stmt->bindParam('personal', $personalPhone);
        $stmt->execute();

        echo "Added phone about employee";
    }
}

if (isset($_POST['getDataByFirstAndLastName'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];

    $stmt = $db->prepare("SELECT first_name, middle_name, last_name, department,
    position, passport_id, email, type, work, second_work, personal  FROM EMPLOYEE
    INNER JOIN employee_emails ON employee.employee_id = employee_emails.employee_id
    INNER JOIN employee_phones ON employee.employee_id = employee_phones.employee_id
    WHERE first_name = :firstName AND last_name = :lastName");
    $stmt->bindParam('firstName', $firstName);
    $stmt->bindParam('lastName', $lastName);
    $stmt->execute();

    $info = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (sizeof($info) == 0) {
        echo "No employee found.";
    } else { ?>
        <table>
        <thead>
        <tr>
            <th>First name</th>
            <th>Middle name</th>
            <th>Last name</th>
            <th>Department</th>
            <th>Position</th>
            <th>email</th>
            <th>email type</th>
            <th>Work Phone</th>
            <th>Second Work Phone</th>
            <th>Personal Phone</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($info as $employee) { ?>
            <tr>
                <td><?= $employee['first_name'] ?></td>
                <td><?= $employee['middle_name'] ?></td>
                <td><?= $employee['last_name'] ?></td>
                <td><?= $employee['department'] ?></td>
                <td><?= $employee['position'] ?></td>
                <td><?= $employee['email'] ?></td>
                <td><?= $employee['type'] ?></td>
                <td><?= $employee['work'] ?></td>
                <td><?= $employee['second_work'] ?></td>
                <td><?= $employee['personal'] ?></td>
            </tr>
            </tbody>
            </table>
            <?php
        }
    }
}
?>
</body>
</html>