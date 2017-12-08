(function attachEvents() {
    const tableBody = $('tbody');
    const addButton = $('span.add');

    for (let i = 0; i < 3; i++) {
        generateRow();
    }

    addButton.click(generateRow);

    function generateRow() {
        let row = $("<tr>")
            .append('<td><input name="firstNames[]" required></td>')
            .append('<td><input name="lastNames[]" required></td>')
            .append('<td><input name="emails[]" required></td>');

        let lastColumn = $("<td>")
            .append('<input name="examScores[]" type="number" required>');

        let removeButton = $('<span class="remove">')
            .click(removeRow)
            .text('-')
            .appendTo(lastColumn);

        row.append(lastColumn);

        tableBody.append(row);

        function removeRow() {
            let rowToRemove = $(this).parent().parent();
            rowToRemove.remove();
        }
    }
})();