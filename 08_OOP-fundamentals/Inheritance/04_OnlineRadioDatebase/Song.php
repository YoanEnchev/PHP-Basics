<?php

class Song
{
    protected $artist;
    protected $name;
    protected $length;
    protected $validity;

    protected function getArtist()
    {
        return $this->artist;
    }

    protected function setArtist($artist)
    {
        $length = strlen($artist);
        if ($length < 3 || $length > 20) {
            echo("Artist name should be between 3 and 20 symbols.\n");
            $this->validity = false;
        }

        $this->artist = $artist;
    }

    protected function getName()
    {
        return $this->name;
    }

    protected function setName($name)
    {
        $length = strlen($name);
        if ($length < 3 || $length > 30) {
            echo("Song name should be between 3 and 30 symbols.\n");
            $this->validity = false;
        }

        $this->name = $name;
    }

    protected function getLength()
    {
        return $this->length;
    }

    protected function setLength($length)
    {
        $tokens = explode(':', $length);
        list($minutes, $seconds) = array_map('intval', $tokens);

        if ($minutes < 0 || $minutes > 14) {
            echo("Song minutes should be between 0 and 14.\n");
            $this->validity = false;
        }

        if ($seconds < 0 || $seconds > 59) {
            echo("Song seconds should be between 0 and 59.\n");
            $this->validity = false;
        }

        $this->length = $length;
    }

    public function getValidity()
    {
        return $this->validity;
    }

    public function __construct($artist, $name, $length)
    {
        $this->validity = true;
        $this->setArtist($artist);
        $this->setName($name);
        $this->setLength($length);
    }
}