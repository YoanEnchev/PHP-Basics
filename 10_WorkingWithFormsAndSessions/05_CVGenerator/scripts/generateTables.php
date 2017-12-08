<?php
$drivingLicenses = [];
if (isset($_GET['submit'])) :
    $namesAndLanguages_regex = "/^([a-z]|[A-Z]){2,20}$/";
    $company_regex = "/^([a-z]|[A-Z]|[0-9]){2,20}$/";
    $phoneRegex = "/^(\-|\+|[0-9]|\ )+$/";
    $emailRegex = "/^([A-Z]|[a-z]|[0-9])+\@([A-Z]|[a-z]|[0-9])+\.([A-Z]|[a-z]|[0-9])+$/";

    if (!preg_match($namesAndLanguages_regex, $_GET['firstName'])) {
        echo "Invalid first name\n";
        echo "Should contain only letters and have between 2 and 20 symbols.\n";
        return;
    }
    if (!preg_match($namesAndLanguages_regex, $_GET['lastName'])) {
        echo "Invalid last name\n";
        echo "Should contain only letters and have between 2 and 20 symbols.\n";
        return;
    }

    foreach ($_GET['lang-name'] as $language) {
        if (!preg_match($namesAndLanguages_regex, $language)) {
            echo "'{$language}' is invalid\n";
            return;
        }
    }

    if(!preg_match($company_regex, $_GET['company'])) {
        echo "Invalid company\n";
        echo "Should contain between2 and 20 letters and numbers\n";
        return;
    }

    if(!preg_match($phoneRegex, $_GET['phoneNumber'])) {
        echo "Invalid phone\n";
        return;
    }
    if(!preg_match($emailRegex, $_GET['email'])) {
        echo "Invalid email\n";
        return;
    }

    ?>

    <h1>CV</h1>

    <table>
        <thead>
        <tr>
            <th colspan="2">Personal Information</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>First Name</td>
            <td><?= $_GET['firstName'] ?></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><?= $_GET['lastName'] ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?= $_GET['email'] ?></td>
        </tr>
        <tr>
            <td>Phone Number</td>
            <td><?= $_GET['phoneNumber'] ?></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td><?= $_GET['gender'] ?></td>
        </tr>
        <tr>
            <td>Birth Date</td>
            <td><?= $_GET['birthDate'] ?></td>
        </tr>
        <tr>
            <td>Nationality</td>
            <td><?= $_GET['nationality'] ?></td>
        </tr>
        </tbody>
    </table>
    <br>
    <table>
        <thead>
        <tr>
            <th colspan="2">Last Work Position</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Company Name</td>
            <td><?= $_GET['company'] ?></td>
        </tr>
        <tr>
            <td>From</td>
            <td><?= $_GET['from'] ?></td>
        </tr>
        <tr>
            <td>To</td>
            <td><?= $_GET['to'] ?></td>
        </tr>
        </tbody>
    </table>
    <br>

    <table>
        <thead>
        <tr>
            <th colspan="3">Computer Skills</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td rowspan="<?= sizeof($_GET['progr-lang-name']) + 1 ?>">
                Programing Languages
            </td>
            <td>
                Language
            </td>
            <td>
                Skill Level
            </td>
        </tr>
        <?php
        for ($i = 0; $i < sizeof($_GET['progr-lang-name']); $i++) {
            $programmingLang = $_GET["progr-lang-name"][$i];
            $level = $_GET["progr-lang-level"][$i];

            echo "<tr>";
            echo "<td>$programmingLang</td>";
            echo "<td>$level</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>

    <br>
    <table>
        <thead>
        <tr>
            <th colspan="5">Computer Skills</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th rowspan="<?= sizeof($_GET['lang-name']) + 1 ?>">Languages</th>
            <th>Language</th>
            <th>Comprehension</th>
            <th>Reading</th>
            <th>Writing</th>
        </tr>
        <?php
        for ($i = 0; $i < sizeof($_GET["lang-name"]); $i++) {
            $language = $_GET["lang-name"][$i];
            $comprehension = $_GET["comprehension"][$i];
            $reading = $_GET["reading"][$i];
            $writing = $_GET["writing"][$i];

            echo "<tr>";
            echo "<td>$language</td>";
            echo "<td>$comprehension</td>";
            echo "<td>$reading</td>";
            echo "<td>$writing</td>";
            echo "</tr>";
        }

        $license = "";

        if (isset($_GET['B'])) {
            $license = "B";
            array_push($drivingLicenses, $license);
        }
        if (isset($_GET['A'])) {
            $license = "A";
            array_push($drivingLicenses, $license);
        }
        if (isset($_GET['C'])) {
            $license = "C";
            array_push($drivingLicenses, $license);
        }
        ?>
        <tr>
            <th>Driver's license</th>
            <td colspan="4"><?= join(', ', $drivingLicenses) ?></td>
        </tr>
        </tbody>
    </table>
<?php endif; ?>