<?php

class Book
{
    protected $title;
    protected $author;
    protected $price;

    function __construct(string $title, string $author, float $price)
    {
        $this->setTitle($title);
        $this->setAuthor($author);
        $this->setPrice($price);
    }

    protected function getPrice()
    {
        return $this->price;
    }

    protected function setPrice($price)
    {
        if($price <= 0) {
            throw new exception("Price not valid!");
        }

        $this->price = $price;
    }

    protected function getAuthor()
    {
        return $this->author;
    }

    protected function setAuthor($author)
    {
        $tokens = explode(' ', $author);
        $secondName = $tokens[1];

        if(is_numeric($secondName[0])) { //first letter is digit
            throw new exception("Author not valid!");
        }

        $this->author = $author;
    }

    protected function getTitle()
    {
        return $this->title;
    }

    protected function setTitle($title)
    {
        if(strlen($title) < 3) {
            throw new exception("Title not valid");
        }

        $this->title = $title;
    }

    function __toString()
    {
        return "OK\n{$this->getPrice()}";
    }
}