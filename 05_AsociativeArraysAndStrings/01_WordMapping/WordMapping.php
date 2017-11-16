<style>
    <?php include('style.css')?>
</style>
<form>
    <textarea name="words"></textarea>
    <input type="submit" name="map-words" value="Count words">
</form>

<?php
if (isset($_GET['map-words'])) :
    $text = $_GET['words'];
    $wordsAndIndexes = str_word_count($text, 1);
    $wordsAndFrequency = array_count_values($wordsAndIndexes);
    ?>

    <table>
        <thead>
        <tr>
            <th>Word</th>
            <th>Count</th>
        <tr>
        </thead>
        <tbody>
        <?php foreach ($wordsAndFrequency as $key => $value): ?>
            <tr>
                <td><?= $key ?></td>
                <td><?= $value ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

