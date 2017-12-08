<html>
<head>
</head>
<body>
<form>
    <label>
        Enter Tags:
        <input type="text" name="tags">
    </label>

    <input type="submit" name="output-tags">
    <input type="submit" name="clear" value="Clear">
</form>

<?php

session_start();

if(!isset($_SESSION['tagAndOccurance'])) {
    $_SESSION['tagAndOccurance'] = [];
}

if(isset($_GET['clear'])) {
    $_SESSION['tagAndOccurance'] = [];
}

if (isset($_GET['output-tags'])) {
$tags = explode(', ', $_GET['tags']);

foreach ($tags as $tag) {
    if (!isset($_SESSION['tagAndOccurance'][$tag])) {
        $_SESSION['tagAndOccurance'][$tag] = 0;
    }

    $_SESSION['tagAndOccurance'][$tag]++;
}

arsort($_SESSION['tagAndOccurance']);
?>
<div>
    <?php
    foreach ($_SESSION['tagAndOccurance'] as $key => $value) {
        echo "{$key}: {$value} times" . "<br/>";
    }

    reset($_SESSION['tagAndOccurance']);
    $mostFrequent = key($_SESSION['tagAndOccurance']);

    echo "<br>";
    echo "Most Frequent tag is : {$mostFrequent}";
    }
    ?>
</div>
</body>
</html>

