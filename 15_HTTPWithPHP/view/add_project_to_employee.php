<h2>Selected employee will be added to the new project</h2>
<h2>Fill Project Data: </h2>

<form method="post">
    <label>
        Name: <input name="name">
    </label>
    <label>
        Description: <textarea name="description" required></textarea>
    </label>
    <label>
        Start Date: <input name="start_date" type="date" required>
    </label>
    <label>
        End date: <input name="end_date" type="date" required>
    </label>
    <input type="submit" value="Submit" name="sendData" required>
</form>
