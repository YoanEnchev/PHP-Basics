<?php
include "db_config.php";
include "Student.php";
?>

<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form>
    <fieldset>
        <label>
            First Name:<input type="text" name="firstName" required>
        </label>
        <label>
            Last Name: <input type="text" name="lastName" required>
        </label>
        <label>
            Student Number: <input type="text" name="studentNumber" required>
        </label>
        <label>
            Course name: <input type="text" name="courseName" required>
        </label>
        <input type="submit" value="Add Students Data" name="addStudentData">
    </fieldset>
</form>

<form>
    <input type="submit" value="Show Data" name="showData">
</form>

<?php

    if (isset($_GET['addStudentData'])) {
        $student = new Student($_GET['firstName'], $_GET['lastName'], $_GET['studentNumber'], $_GET['courseName']);
        $student->insertIntoDB($db);
    }
?>

<?php
    if(isset($_GET['showData'])) :
?>
<table>
    <thead>
    <tr>
        <th>Full Name</th>
        <th>Number</th>
        <th>Course</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $stm = $db->prepare("CALL GetData();");
    $stm->execute();
    $studentData = $stm->fetchAll(PDO::FETCH_ASSOC);
    foreach ($studentData as $student) :
        ?>
        <tr>
            <td><?=$student['full_name']?></td>
            <td><?=$student['number']?></td>
            <td><?=$student['course_name']?></td>
        </tr>
        <?php
    endforeach;
    exit();
    ?>
    </tbody>
</table>

<?php endif;?>
</body>
</html>
