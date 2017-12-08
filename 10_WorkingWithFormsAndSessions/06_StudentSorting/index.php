<html>
<head>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<form>
    <table>
        <thead>
        <tr>
            <th>First name:</th>
            <th>Second name:</th>
            <th>Email:</th>
            <th>Exam score:</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <span class="add">+</span>
    <label>Sort by:
        <select name="sort-parameter">
            <option value="firstName">First name</option>
            <option value="lastName">Last name</option>
            <option value="email">Email</option>
            <option value="score">Exam score</option>
        </select>
    </label>
    <label>Order:
        <select name="sort-method">
            <option value="ascending">Ascending</option>
            <option value="descending">Descending</option>
        </select>
    </label>
    <button id="submit" name="submit">Submit</button>
</form>
</body>
<script src="scripts/jquery-3.1.1.min.js"></script>
<script src="scripts/addAndRemoveEvents.js"></script>
</html>

<?php
include 'Student.php';

if (isset($_GET['submit'])):?>

    <table>
        <thead>
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Exam Score</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $students = [];
        $toralScores = 0;

        for ($i = 0; $i < sizeof($_GET['firstNames']); $i++) {
            $firstName = $_GET['firstNames'][$i];
            $lastName = $_GET['lastNames'][$i];
            $email = $_GET['emails'][$i];
            $examScore = intval($_GET['examScores'][$i]);

            $student = new Student($firstName, $lastName, $email, $examScore);
            array_push($students, $student);
        }

        $sortMethod = $_GET['sort-method'];
        $sortParameter = $_GET['sort-parameter'];


        switch ($sortParameter) {
            case 'firstName':
                usort($students, "sortFirstNames_ascending");
                break;
            case 'lastName':
                usort($students, "sortLastNames_ascending");
                break;
            case 'email':
                usort($students, "sortEmails_ascending");
                break;
            case 'score':
                usort($students, "sortScores_ascending");
                break;
        }

        if($sortMethod == "descending") {
            $students = array_reverse($students);
        }

        foreach ($students as $student):?>
            <tr>
                <td>
                    <?= $student->getFirstName() ?>
                </td>
                <td>
                    <?= $student->getLastName() ?>
                </td>
                <td>
                    <?= $student->getEmail() ?>
                </td>
                <td>
                    <?= $student->getScore() ?>
                </td>
            </tr>
            <?php $toralScores += $student->getScore();
        endforeach; ?>
        <tr>
            <th colspan="3">Average score:</th>
            <th><?= $toralScores / sizeof($students) ?></th>
        </tr>
        </tbody>
    </table>

<?php endif; ?>

<?php

function sortFirstNames_ascending(Student $a,  Student $b)
{
    return strcmp($a->getFirstName(), $b->getLastName());
}

function sortLastNames_ascending(Student $a,  Student $b)
{
    return strcmp($a->getLastName(), $b->getLastName());
}

function sortEmails_ascending(Student $a,  Student $b)
{
    return strcmp($a->getEmail(), $b->getEmail());
}

function sortScores_ascending(Student $a,  Student $b)
{
    if($a->getScore() == $b->getScore()){ return 0 ; }
    return ($a->getScore() < $b->getScore()) ? -1 : 1;
}

?>
