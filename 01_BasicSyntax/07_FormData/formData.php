<style>
    <?php include 'style.css'?>
</style>
<?php
echo '<form action="formData.php" method="get">
        <input type="text" placeholder="Name..." name="name"/> 
        <input type="number" placeholder="Age..." name="age"/> 
        <label><input type="radio" name="gender" value="male">Male</label>
        <label><input type="radio" name="gender" value="femele">Female</label>
        <input type="submit" name="submit" value="Submit">
      </form>';

if( isset( $_GET['submit'] ))
{
    $name = $_GET['name'];
    $age = $_GET['age'];
    $gender = $_GET['gender'];
    echo "<p>Hello, my name is {$name}, I am ${age} years old ${gender}.</p>";
}
?>
