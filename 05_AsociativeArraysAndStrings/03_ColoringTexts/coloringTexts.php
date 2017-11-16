<style>
    <?php include('style.css')?>
</style>
<form>
    <textarea name="input-text"></textarea>
    <input type="submit" name="color-text" value="Count words">
</form>

<?php if (isset($_GET['color-text'])) :
    $text = $_GET['input-text'];
    $text = str_replace(' ', '', $text); //remove spaces

    for ($i = 0; $i < strlen($text); $i++) : ?>
        <?php if (ord($text[$i]) % 2 == 0) : ?>
            <span class="evenAscii"><?=$text[$i]?></span>
        <?php else: ?>
            <span class="oddAscii"><?=$text[$i]?></span>
        <?php endif; ?>
    <?php endfor; ?>
<?php endif; ?>