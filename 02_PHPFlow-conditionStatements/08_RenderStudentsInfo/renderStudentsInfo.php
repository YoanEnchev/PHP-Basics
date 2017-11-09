<html>
<body>
<form method="post">
    <div>
        Delimiter:
        <select name="delimiter">
            <option value=",">,</option>
            <option value="|">|</option>
            <option value="&">&</option>
        </select>
    </div>
    <div>
        Name:
        <input type="text" name="names"/>
    </div>
    <div>
        Ages:
        <input type="text" name="ages"/>
    </div>
    <div>
        <input type="submit" name="filter" value="Filter!"/>
    </div>
</form>
</body>
</html>

<?php
if (isset($_POST['filter'])) :
    $delimiter = $_POST['delimiter'];
    $names = explode($delimiter, $_POST['names']);
    $ages = explode($delimiter, $_POST['ages']);
    ?>
    <table border="1" cellpadding="0">
        <thead>
        <tr>
            <th>Name</th>
            <th>Age</th>
        </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($names); $i++):?>
                <tr>
                    <td> <?php echo $names[$i] ?></td>
                    <td> <?php echo $ages[$i] ?></td>
                </tr>
        <?php endfor;?>
        </tbody>
    </table>
<?php endif; ?>
