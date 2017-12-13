<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<section id="forms">
    <form id="addRecord" method="post">
        <fieldset>
            <legend>Add Record:</legend>
            <div class="data">
            <label>
                First Name:
                <input type="text" name="firstName" required>
            </label>
            <label>
                Last Name:
                <input type="text" name="lastName" required>
            </label>
            <label>
                Student Number:
                <input type="text" name="studentNumber" required>
            </label>
            <label>
                Phone:
                <input type="text" name="phone">
            </label>
            <input type="submit" name="addRecord">
            </div>
        </fieldset>
    </form>
    <form id="updateRecord" method="post">
        <fieldset>
            <legend>Change Records:</legend>
            <div class="data">
            <label>
                Student Number:
                <input type="text" name="numberEdit" required>
            </label>
            <label>
                Parameter:
                <select name="parameter">
                    <option value="first_name">First Name</option>
                    <option value="last_name">Last Name</option>
                    <option value="student_number">Student Number</option>
                    <option value="phone_number">Phone</option>
                </select>
            </label>
            <label>
                New Value:
                <input type="text" name="newValue" required>
            </label>
            <input type="submit" value="Submit" name="edit-record">
            </div>
        </fieldset>
    </form>
    <form id="deleteRecord" method="post">
        <fieldset>
            <legend>Delete record</legend>
            <div class="data">
            <label>Student number:
                <input type="text" name="number_delete">
            </label>
            <input type="submit" name="delete">
            </div>
        </fieldset>
    </form>
</section>
<form>
    <input type="submit" id="generateTable" name="generateTable" value="Show Data">
</form>
</body>
</html>

<?php

$host = "localhost";
$dbName = 'php_course';
$user = 'root';
$pass = '';

$db = new PDO("mysql:host=$host;dbname=$dbName", $user, $pass);

if (isset($_POST['addRecord'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $studentNumber = $_POST['studentNumber'];
    $phone = $_POST['phone'];

    if ($phone != "") {
        $stmt = $db->prepare("INSERT INTO STUDENTS(first_name, last_name, number, phone)
        VALUES (:first_name, :last_name, :student_number, :phone_number)");
        $stmt->bindParam('first_name', $firstName);
        $stmt->bindParam('last_name', $lastName);
        $stmt->bindParam('student_number', $studentNumber);
        $stmt->bindParam('phone_number', $phone);
    } else {
        $stmt = $db->prepare("INSERT INTO STUDENTS(first_name, last_name, number)
        VALUES (:first_name, :last_name, :student_number)");
        $stmt->bindParam('first_name', $firstName);
        $stmt->bindParam('last_name', $lastName);
        $stmt->bindParam('student_number', $studentNumber);
    }

    $stmt->execute();
}

if (isset($_POST['edit-record'])) {
    $number = $_POST['numberEdit'];
    $parameter = $_POST['parameter'];
    $newValue = $_POST['newValue'];

    switch ($parameter) {
        case 'first_name':
            $stmt = $db->prepare("UPDATE students
            SET first_name = :changedValue
            WHERE number = :student_number");
            break;
        case 'last_name':
            $stmt = $db->prepare("UPDATE students
            SET last_name = :changedValue
            WHERE number = :student_number");
            break;
        case 'student_number':
            $stmt = $db->prepare("UPDATE students
            SET number = :changedValue
            WHERE number = :student_number");
            break;
        case 'phone_number':
            $stmt = $db->prepare("UPDATE students
            SET phone = :changedValue
            WHERE number = :student_number");
            break;
    }

    $stmt->bindParam('changedValue', $newValue);
    $stmt->bindParam('student_number', $number);
    $stmt->execute();
}

if (isset($_POST['delete'])) {
    $numberToDelete = $_POST['number_delete'];
    $stmt = $db->prepare("DELETE FROM students
    WHERE number = :number");
    $stmt->bindParam('number', $numberToDelete);
    $stmt->execute();
}

if(isset ($_GET['generateTable'])) :
$stmt = $db->prepare("SELECT * FROM STUDENTS");
$stmt->execute();
?>
<table>
        <thead>
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Number</th>
            <th>Phone</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
    <tr>
        <td><?= $row['first_name'] ?></td>
        <td><?= $row['last_name'] ?></td>
        <td><?= $row['number'] ?></td>
        <td><?= $row['phone'] ?></td>
    </tr>
    <?php
    endwhile;
    endif; ?>
</tbody>
</table>

