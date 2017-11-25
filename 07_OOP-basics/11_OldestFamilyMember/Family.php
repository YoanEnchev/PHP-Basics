<?php

class Family
{
    public $listOfPeople;

    function __construct()
    {
        $this->listOfPeople = [];
    }

    function addMember(Person $person): void
    {
        array_push($this->listOfPeople, $person);
    }

    function getOldestMember() {
        $allMembers = $this->listOfPeople;
        $oldestMember = $allMembers[0];

        foreach ($allMembers as $member) {
            if($oldestMember->age < $member->age) {
                $oldestMember = $member;
            }
        }

        return $oldestMember;
    }
}