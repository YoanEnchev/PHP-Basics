<form>
    <label for="categories">Categories</label>
    <input name="categories" id="categories" ><br>
    <label for="tags">Tags</label>
    <input name="tags" id="tags"><br>
    <label for="months">Months</label>
    <input name="months" id="months"><br><br>
    <input type="submit" name="generate" value="Generate">
</form>

<?php
    if(isset($_GET['generate'])) {
        $categories = explode(', ', $_GET['categories']);
        $tags = explode(', ', $_GET['tags']);
        $months = explode(', ', $_GET['months']);

        buildNavigation('Categories', $categories);
        buildNavigation('Tags', $tags);
        buildNavigation('Months', $months);
    }
?>

<?php

    function buildNavigation($name, $items) {
        echo "<h2>{$name}</h2>";
        echo "<ul>";

        for ($i = 0; $i < sizeof($items); $i++) {
            echo "<li>{$items[$i]}</li>";
        }

        echo "</ul>";
    }
?>