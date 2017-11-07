<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
$name = 'Yoan';
$phone = '0882-321-987';
$age = 19;
$adress = 'Somewhere above the rainbow';

createTable($name, $phone, $age, $adress);

function createTable($name, $phone, $age, $adress)
{
    echo "<table>
          <tbody>";
    echo "<tr>
          <th>Name</th>
          <td>{$name}</td>
          </tr>";
    echo "<tr>
          <th>Phone number</th>
          <td>{$phone}</td>
          </tr>";
    echo "<tr>
          <th>Age</th>
          <td>{$age}</td>
          </tr>";
    echo "<tr>
          <th>Adress</th>
          <td>{$adress}</td>
          </tr>";
    echo "</tbody>
          </table>";
}
?>
</body>
</html>