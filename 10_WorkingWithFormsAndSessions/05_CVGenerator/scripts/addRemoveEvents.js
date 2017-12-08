(function attachEvents() {
    const addProgrLang = $('#addProgrLang');
    const removeProgrLang = $('#removeLastPrLang');

    const addLanguage = $('#addLang');
    const removeLanguage = $('#removeLastLang');

    const computerSkills = $('#computerSkills');
    const languageSection = $('#languages');
    

    addProgrLang.click(addProgrLanguage);
    removeProgrLang.click(removeLastProgrLang);
    addLanguage.click(addLang);
    removeLanguage.click(removeLang);

    function addProgrLanguage() {
        let newLanguage = $('<div class="programing-language">');
        let languageName = $(`<input name="progr-lang-name[]">`);
        let level = $(`<select name="progr-lang-level[]">`)
        .append('<option>Beginer</option>')
            .append('<option>Programer</option>')
            .append('<option>Ninja</option>');

        newLanguage.append(languageName)
            .append(level);
        computerSkills.append(newLanguage);
    }
    
    function removeLastProgrLang() {
        $lastLanguage = computerSkills.children().last();
        $lastLanguage.remove();
    }
    
    function addLang() {
        let newLang = $('<div class="language">');
        let name = $(`<input name="lang-name[]">`);
        let comprehension = $(`<select name="comprehension[]">`);
        let reading = $(`<select name="reading[]">`);
        let writing = $(`<select name="writing[]">`);

        comprehension
            .append('<option selected>-Comprehension-</option>')
            .append('<option value="beginer">beginer</option>')
            .append('<option value="intermedidate">intermedidate</option>')
            .append('<option value="advanced">advanced</option>');

        reading
            .append('<option selected>-Reading-</option>')
            .append('<option value="beginer">beginer</option>')
            .append('<option value="intermedidate">intermedidate</option>')
            .append('<option value="advanced">advanced</option>');

        writing
            .append('<option selected>-Writing-</option>')
            .append('<option value="beginer">beginer</option>')
            .append('<option value="intermedidate">intermedidate</option>')
            .append('<option value="advanced">advanced</option>');

        newLang
            .append(name)
            .append(comprehension)
            .append(reading)
            .append(writing)
            .appendTo(languageSection);
    }

    function removeLang() {
        $lastLanguage = languageSection.children().last();
        $lastLanguage.remove();
    }

})();