<?php

interface IMisson
{
    public function getCode();
    public function getName();
    public function getState();
    public function completeMisson();
}