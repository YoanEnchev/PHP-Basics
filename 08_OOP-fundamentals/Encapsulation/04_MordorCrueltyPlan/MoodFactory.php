<?php

class MoodFactory
{
    private $moodStatus;
    private $moodPoints;

    function __construct()
    {
        $this->moodStatus = "";
        $this->moodPoints = 0;
    }

    public function processFood(array $foodList)
    {
        foreach ($foodList as $food) {
            switch ($food) {
                case 'cram':
                    $this->moodPoints += 2;
                    break;
                case'lembas':
                    $this->moodPoints += 3;
                    break;
                case 'apple':
                    $this->moodPoints += 1;
                    break;
                case 'melon':
                    $this->moodPoints += 1;
                    break;
                case'honeycake':
                    $this->moodPoints += 5;
                    break;
                case'mushrooms':
                    $this->moodPoints -= 10;
                    break;
                default:
                    $this->moodPoints -= 1;
                    break;
            }
        }
    }

    public function getMoodStatus() {
        $moodPoints = $this->moodPoints;

        if($moodPoints <= -5) {
            return "Angry";
        }

        else if ($moodPoints <= 0) {
            return "Sad";
        }

        else if ($moodPoints <= 15) {
            return "Happy";
        }

        else {
            return "PHP";
        }
    }

    public function getMoodPoints(): int
    {
        return $this->moodPoints;
    }
}