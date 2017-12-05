<?php

class Smartphone implements icallPhones, IBrowsWeb
{
    public function callPhone(string $phone)
    {
        if(preg_match("/^[0-9]*$/",$phone)) {
            echo "Calling... {$phone}\n";
        }

        else {
            echo "Invalid number\n";
        }
    }

    public function browseWeb(string $url)
    {

        if(!preg_match("/[0-9]/",$url)) { //no digits
            echo "Browsing: {$url}\n";
        }

        else { //contains digits
            echo "Invalid URL!\n";
        }
    }
}