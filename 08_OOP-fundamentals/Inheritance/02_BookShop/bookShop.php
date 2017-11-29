<?php
include "Book.php";
include "GoldenEditionBook.php";

$author = trim(fgets(STDIN));
$title = trim(fgets(STDIN));
$price = floatval(fgets(STDIN));
$type = trim(fgets(STDIN));

switch ($type) {
    case 'STANDARD':
        $book = new Book($title, $author, $price);
        break;
    case 'GOLD':
        $book = new GoldenEditionBook($title, $author, $price);
        break;
    default:
        throw new Error("Type is not valid!");
}

echo  $book;