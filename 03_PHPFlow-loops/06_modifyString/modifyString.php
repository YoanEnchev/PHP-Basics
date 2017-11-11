<form method="get">
    <input name="sequence"/>
    <input type="radio" name="option" value="palindrome"/>Check Palindrome
    <input type="radio" name="option" value="reverse"/>Reverse String
    <input type="radio" name="option" value="split"/>Split
    <input type="radio" name="option" value="hash"/>Hash String
    <input type="radio" name="option" value="shuffle"/>Shuffle String
    <input type="submit" value="Submit" />
</form>

<?php
$sequence = $_GET['sequence'];
switch($_GET['option']) {
    case 'palindrome':
        checkIfPalindrome($sequence);
        break;
    case 'reverse':
        reverseString($sequence);
        break;
    case 'split':
        splitString($sequence);
        break;
    case 'hash':
        hashString($sequence);
        break;
    case 'shuffle':
        shuffleString($sequence);
        break;
}

function checkIfPalindrome($sequence) {
    $isPalindrome = true;

    $length = strlen($sequence);
    for ($i = 0; $i <  floor($length / 2); $i++) {
        if($sequence[$i] != $sequence[ ($length - $i - 1)]) {
            $isPalindrome = false;
            break;
        }
    }

    if($isPalindrome) {
        echo "{$sequence} is a palindrome!";
    }
    else {
        echo "{$sequence} is not a palindrome!";
    }
}

function reverseString($sequence) {
    echo strrev($sequence);
}

function splitString($sequence) {
    $sequence = str_replace(' ', '', $sequence);//removes spaces
    $chars = str_split($sequence);
    echo implode(' ', $chars);
}

function hashString($sequence) {
    echo hash('ripemd160' ,$sequence);
}

function shuffleString($sequence) {
    echo str_shuffle($sequence);
}