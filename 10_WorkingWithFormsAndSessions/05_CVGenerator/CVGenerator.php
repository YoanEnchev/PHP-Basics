<html>
<body>
<head>
    <link rel="stylesheet" href="style/style.css"/>
</head>
<form>
    <fieldset>
        <legend>Personal Information</legend>
        <input type="text" placeholder="First Name" name="firstName" required> <br>
        <input type="text" placeholder="Last Name" name="lastName" required> <br>
        <input type="text" placeholder="Email" name="email" required> <br>
        <input type="text" placeholder="Phone Number" name="phoneNumber" required> <br>

        <input type="radio" name="gender" value="male" checked> Male
        <input type="radio" name="gender" value="female"> Female <br>
        <label>
            Birth Date <br>
            <input name="birthDate" type="date" required>
        </label>
        <br>
        <label>
            Nationality
            <select name="nationality">
                <option value="Bulgarian">Bulgarian</option>
                <option value="American">American</option>
                <option value="Indian">Indian</option>
                <option value="Chinese">Chinese</option>
                <option value="Englishman">English</option>
            </select>
        </label>
    </fieldset>
    <fieldset>
        <legend>Last Work Position</legend>
        <label>
            Company Name
            <input type="text" name="company">
        </label>
        <br>
        <label>
            From
            <input type="date" name="from">
        </label>
        <br>
        <label>
            To
            <input type="date" name="to">
        </label>
    </fieldset>
    <fieldset>
        <legend>Computer Skills</legend>
        <p>Programing Languages </p>
        <section id="computerSkills">
            <div class="programing-language">
                <input name="progr-lang-name[]">
                <select name="progr-lang-level[]">
                    <option>Beginer</option>
                    <option>Programer</option>
                    <option>Ninja</option>
                </select>
            </div>
        </section>
        <button type="button" id="removeLastPrLang">Remove Language</button>
        <button type="button" id="addProgrLang">Add Language</button>
    </fieldset>
    <fieldset>
        <legend>Other skills</legend>
        <p>Languages</p>
        <section id="languages">
            <div class="language">
                <input name="lang-name[]">
                <select required name="comprehension[]">
                    <option selected>-Comprehension-</option>
                    <option value="beginer">beginer</option>
                    <option value="intermedidate">intermedidate</option>
                    <option value="advanced">advanced</option>
                </select>
                <select required name="reading[]">
                    <option selected>-Reading-</option>
                    <option value="beginer">beginer</option>
                    <option value="intermedidate">intermedidate</option>
                    <option value="advanced">advanced</option>
                </select>
                <select required name="writing[]">
                    <option selected>-Writing-</option>
                    <option value="beginer">beginer</option>
                    <option value="intermedidate">intermedidate</option>
                    <option value="advanced">advanced</option>
                </select>
            </div>
        </section>
        <button type="button" id="removeLastLang">Remove Language</button>
        <button type="button" id="addLang">Add Language</button>
        <br>
        Driver's License<br>
        <input type="radio" value="B" name="B">B
        <input type="radio" value="A" name="A">A
        <input type="radio" value="C" name="C">C
    </fieldset>

    <button type="submit" name="submit">Generate CV</button>
</form>
<script src="scripts/jquery-3.1.1.min.js"></script>
<script src="scripts/addRemoveEvents.js"></script>
</body>
</html>

<?php
include 'scripts/generateTables.php';
