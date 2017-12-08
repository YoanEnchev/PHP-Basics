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
</form>
</body>
</html>

<?php

if(isset($_GET['output-tags'])) {
    $tags = explode(', ', $_GET['tags']);

    for ($i = 0; $i < sizeof($tags); $i++) {
        echo "{$i} : {$tags[$i]}". "</br>";
    }
}
